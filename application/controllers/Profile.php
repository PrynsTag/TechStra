<?php


class Profile extends CI_Controller
{
	public function index($data, $page = "templates/home")
	{
		$this->load->view($page, $data);
	}

	public function user()
	{
		$user_id = $this->session->userdata("user_info")["id"];
		$user_data = $this->profile_model->join_userdata($user_id)[0];

		$data = [
			"header_title" => "Profile",
			"main_view" => "profile_view",
			"firstname" => $user_data->user_firstname,
			"lastname" => $user_data->user_lastname,
			"bio" => $user_data->userinfo_bio,
			"image" => $user_data->userinfo_image
		];
		$this->index($data);
	}

	public function edit_profile()
	{
		$data = [
			"header_title" => "Edit Profile",
			"main_view" => $this->uri->segment(2) . "_view"
		];

		$input_rules = array(
			array(
				'field' => 'firstname',
				'label' => 'First Name',
				'rules' => 'required'
			),
			array(
				'field' => 'lastname',
				'label' => 'Last Name',
				'rules' => 'required'
			),
			array(
				'field' => 'bio',
				'label' => 'Profile Description',
				'rules' => 'required'
			)
		);

		if ($this->post_validation($input_rules)) {
			$firstname = $this->input->post("firstname");
			$lastname = $this->input->post("lastname");
			$bio = $this->input->post("bio");
			$image = $this->upload_image("image");

			$user_data = [
				"userinfo_firstname" => $firstname,
				"userinfo_lastname" => $lastname,
				"userinfo_bio" => $bio,
				"userinfo_image" => $image
			];
			if ($image) {
				$user_id = $this->session->userdata("user_info")["id"];

				$update_result = $this->profile_model->update_userdata($user_data, $user_id);

				if ($update_result) {
					$this->session->set_tempdata("profile_success", "Account Edited Successfully!", 1);
				} else {
					$this->session->set_tempdata("profile_error", "Account Edit Failed.", 1);
				}
				$this->index(array_merge($user_data, $data));
			} else {
				$this->session->set_tempdata("profile_error", "Something's wrong with your image.", 1);
			}
		}

		$user_id = $this->session->userdata("user_info")["id"];
		$user_data = (array)$this->profile_model->join_userdata($user_id)[0];
		$this->index(array_merge($user_data, $data));
	}

	public function upload_image($field_name)
	{
		$config['upload_path'] = './assets/uploads/user_profile';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 0;
		$config['max_width'] = 0;
		$config['max_height'] = 0;

		$this->upload->initialize($config);
		$uploaded = $this->upload->do_upload($field_name);

		if ($uploaded) {
			return $this->upload->data("file_name");
		}
		return NULL;
	}

	public function change_password()
	{
		$data = [
			"header_title" => "Change Password",
			"main_view" => $this->uri->segment(2) . "_view"
		];

		$input_rules = array(
			array(
				'field' => 'curr-pass',
				'label' => 'Current Password',
				'rules' => 'required'
			),
			array(
				'field' => 'new-pass',
				'label' => 'New Password',
				'rules' => 'required'
			),
			array(
				'field' => 'con-pass',
				'label' => 'Confirm Password',
				'rules' => 'required'
			)
		);
		$validated = $this->post_validation($input_rules);

		$user_id = $this->session->userdata("user_info")["id"];
		$user_data = (array)$this->profile_model->join_userdata($user_id)[0];

		if ($validated) {
			$user_pass = ["user_password" => $this->input->post("new-pass")];

			if ($this->profile_model->update_password($user_pass, $user_id)) {
				$this->session->set_tempdata("change_success", "Password Changed!", 1);
				redirect("profile/user");
			} else {
				$this->session->set_tempdata("change_error", "Password Not Changed!", 1);
				$this->index($data);
			}
		}
		$this->index(array_merge($user_data, $data));
	}

	public function post_validation($input_rules)
	{
		$this->form_validation->set_rules($input_rules);

		if ($this->form_validation->run()) {
			return TRUE;
		}

		return validation_errors();
	}
}
