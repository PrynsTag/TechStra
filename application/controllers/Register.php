<?php
defined('BASEPATH') or exit('No direct script access allowed');
include ".config";

class Register extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('user_info') != NULL) {
			redirect('home');
		}

		$data = [
			"header_title" => "Sign Up",
			"main_view" => "register_view",
			'nav_icon' => 'astra-tech.jpg',
		];

		$this->load->view("templates/main", $data);
	}

	public function validation()
	{
		if ($this->session->userdata('user_info') != NULL) {
			redirect('home');
		}

		global $gmailUsername;
		global $gmailPassword;

		$this->form_validation->set_rules("firstname", "First Name", "required|trim");
		$this->form_validation->set_rules("lastname", "Last Name", "required|trim");
		$this->form_validation->set_rules("username", "Username", "required|trim|is_unique[user.user_username]");
		$this->form_validation->set_rules("password", "Password", "required|trim");
		$this->form_validation->set_rules("confirm_password", "Confirm Password", "required|trim|matches[password]");
		$this->form_validation->set_rules("email", "Email Address", "required|trim|valid_email|is_unique[user.user_email]");

		if ($this->form_validation->run()) {
			$verification_key = mt_rand(100000, 999999);
			//            $encrypted_password = $this->encrypt->encode($this->input->post("password")); if password needs to encrypted
			$data = array(
				"user_firstname" => $this->input->post("firstname"),
				"user_lastname" => $this->input->post("lastname"),
				"user_username" => $this->input->post("username"),
				"user_password" => $this->input->post("password"),
				"user_email" => $this->input->post("email"),
				"user_code" => $verification_key
			);

			$this->session->set_tempdata($data, NULL, 300);

			$id = $this->register_model->insert_user($data);

			if ($id > 0) {
				$subject = "Please verify your account!";
				$message = "<p>Hi " . $this->input->post('username') . "</p>" . "
                         <p>Click the link to verify your email address: " . "
                         <a href=" . base_url() . "register/verify_email/" . $verification_key . ">Link</a></p>";

				$config = array(
					"protocol" => "smtp",
					"smtp_host" => "smtp.gmail.com",
					"smtp_port" => 587,
					"_smtp_auth" => TRUE,
					"smtp_user" => $gmailUsername,
					"smtp_crypto" => "tls",
					"smtp_pass" => $gmailPassword,
					"send_multipart" => FALSE,
					"mailtype" => "html",
					"charset" => "utf-8",
					"wordwrap" => TRUE,
				);

				$this->email->initialize($config);
				$this->email->set_newline("\r\n");
				$this->email->from($gmailUsername);
				$this->email->to($this->input->post("email"));
				$this->email->subject($subject);
				$this->email->message($message);

				if ($this->email->send()) {
					$this->session->set_tempdata(array("register_message" => "Check your email to verify your account!"), NULL, 1);
					redirect("register/register_user");
				} else {
					show_error($this->email->print_debugger());
				}
			} else {
				$this->session->set_tempdata(array("register_message" => "Account not added."), NULL, 1);
				redirect("register/register_user");
			}
		} else {
			$this->index(array(
				"validation_error" => $this->session->set_tempdata(array("register_message" => validation_errors()), NULL, 1),
				"header_title" => "Validation Error",
				"main_view" => "register_view"
			));
		}
	}

	public function verify_email()
	{
		if ($this->session->userdata('user_info') != NULL) {
			redirect('home');
		}

		$uri_code = $this->uri->segment(3);

		$result = $this->register_model->get_code($uri_code);
		$db_code = $result->user_code;
		$updated = False;

		if ($uri_code === $db_code) {
			$data = array(
				'user_code' => '',
				'user_verification' => 1
			);

			$updated = $this->register_model->verify_user($data, $db_code);
		}

		$this->index(array(
			"email" => $result->user_email,
			"updated" => $updated,
			"main_view" => "register_view",
			"header_title" => "Login - Beta Juniors",
		));
	}
}
