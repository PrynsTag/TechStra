<?php

class Profile extends CI_Controller
{
	public function index()
	{
		$this->redirect();

		$user_id = $this->session->userdata("user_info")["id"];
		$user_data = $this->profile_model->join_userdata($user_id)[0];

		$data = [
			"header_title" => "Profile - TechStra",
			"main_view" => "profile_view",
			"firstname" => $user_data->userinfo_firstname,
			"lastname" => $user_data->userinfo_lastname,
			"bio" => $user_data->userinfo_bio,
			"image" => $user_data->userinfo_image
		];

		$this->load->view('templates/home', $data);
	}

	public function edit_profile()
	{
		$this->redirect();

		$session_data = $this->session->userdata('user_info');

		$user_db = $this->profile_model->get_userinfo($session_data['id'])[0];

		$view_data = [
			'header_title' => 'Edit Profile',
			'main_view' => 'edit_profile_view',
			'user_image' => $user_db->userinfo_image,
			'input_firstname' => array('class' => 'form-control', 'id' => 'first_name', 'name' => 'firstname', 'type' => 'text', 'placeholder' => 'Firstname', 'value' => $user_db->userinfo_firstname),
			'input_lastname' => array('class' => 'form-control', 'id' => 'last_name', 'name' => 'lastname', 'type' => 'text', 'placeholder' => 'Lastname', 'value' => $user_db->userinfo_lastname),
			'input_bio' => array('class' => 'form-control', 'id' => 'bio', 'name' => 'bio', 'placeholder' => 'Bio', 'value' => $user_db->userinfo_bio),
			'input_upload' => array('class' => 'form-control', 'id' => 'file-upload', 'type' => 'file', 'name' => 'image')
		];

		$this->load->view('templates/main', $view_data);
	}

	public function edit()
	{
		$this->redirect();

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

		$this->form_validation->set_rules($input_rules);

		if ($this->form_validation->run() == false) {
			$this->session->set_tempdata('alert_error', validation_errors(), 1);

			redirect('profile/edit_profile');
		} else {
			$config = [
				'upload_path' => './assets/uploads/userprofile/',
				'allowed_types' => 'jpg|png'
			];

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('image')) {
				$this->session->set_tempdata('alert_error', $this->upload->display_errors(), 1);

				redirect('profile/edit_profile');
			} else {
				$firstname = $this->input->post('firstname', true);
				$lastname = $this->input->post('lastname', true);
				$bio = $this->input->post('bio', true);
				$userImage = $this->upload->data('file_name');

				$data = [
					'userinfo_firstname' => ucwords(strtolower($firstname)),
					'userinfo_lastname' => ucwords(strtolower($lastname)),
					'userinfo_bio' => $bio,
					'userinfo_image' => $userImage
				];

				$session_data = $this->session->userdata('user_info');

				$db_result = $this->profile_model->update_userdata($data, $session_data['id']);

				if ($db_result) {
					$this->session->set_tempdata('alert_success', 'You have successully edited your profile', 1);

					$newSession = [
						'id' => $session_data['id'],
						'username' => $session_data['username'],
						'userimage' => $userImage
					];

					$this->session->unset_userdata('user_info');

					$this->session->set_userdata('user_info', $newSession);

					redirect('profile');
				} else {
					$this->session->set_tempdata('alert_error', 'There is something wrong from database', 1);

					redirect('profile/edit_profile');
				}
			}
		}
	}

	public function change_password()
	{
		$this->redirect();

		$session_data = $this->session->userdata('user_info');

		$view_data = [
			'header_title' => 'Change Password - TechStra',
			'main_view' => 'change_password_view',
			'user_image' => $session_data['userimage'],
			'input_current' => array('class' => 'form-control', 'id' => 'curr-pass', 'name' => 'curr-pass', 'type' => 'password', 'placeholder' => 'Current Password'),
			'input_new' => array('class' => 'form-control', 'id' => 'new-pass', 'name' => 'new-pass', 'type' => 'password', 'placeholder' => 'New Password'),
			'input_confirm' => array('class' => 'form-control', 'id' => 'con-pass', 'name' => 'con-pass', 'type' => 'password', 'placeholder' => 'Confirm Password')
		];

		$this->load->view('templates/main', $view_data);
	}

	public function password()
	{
		$this->redirect();

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
				'rules' => 'required|matches[new-pass]'
			)
		);

		$this->form_validation->set_rules($input_rules);

		if ($this->form_validation->run() == false) {
			$this->session->set_tempdata('alert_error', validation_errors(), 1);

			redirect('profile/change_password');
		} else {

			$session_data = $this->session->userdata("user_info");
			$input_current = $this->input->post('curr-pass', true);
			$input_newpass = $this->input->post('new-pass', true);
			$pass_db = $this->profile_model->get_userdata($session_data['id'])[0]->user_password;

			if ($pass_db == $input_current) {
				$newPass = array(
					'user_password' => $input_newpass
				);

				$changepass_result = $this->profile_model->update_password($newPass, $session_data['id']);

				if ($changepass_result) {
					$this->session->set_tempdata('alert_success', 'You have successfully change your password', 1);

					redirect('profile');
				} else {
					$this->session->set_tempdata('alert_error', 'There is something wrong from the database.', 1);

					redirect('profile/change_password');
				}
			} else {
				$this->session->set_tempdata('alert_error', 'Current password incorrect', 1);

				redirect('profile/change_password');
			}
		}
	}

	public function redirect()
	{
		if ($this->session->userdata('user_info') == NULL) {
			redirect('login');
		}
	}
}
