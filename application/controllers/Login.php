<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('user_info') != NULL) {
			redirect('home');
		}

		$view_data = [
			'header_title' => 'Login - TechStra',
			'main_view' => 'login_view',
			'home_image' => 'home-image.jpg',
			'nav_icon' => '1024-alpha.png',
			'form_attributes' => array('method' => 'post'),
			'input_username' => array('class' => 'form-control input', 'id' => 'username', 'name' => 'username', 'type', 'text', 'placeholder' => 'Username'),
			'input_password' => array('class' => 'form-control input', 'id' => 'password', 'name' => 'password', 'type' => 'password', 'placeholder' => 'Password')
		];

		$this->load->view('templates/main', $view_data);
	}

	public function user_login()
	{
		if ($this->session->userdata('user_info') != NULL) {
			redirect('home');
		}

		$input_rules = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($input_rules);

		if ($this->form_validation->run() == false) {

			$this->session->set_tempdata('form_error', validation_errors(), 1);

			redirect('login');
		} else {
			$username = $this->input->post('username', true);
			$password = $this->input->post('password', true);

			$query_db = array(
				'user_username' => $username,
				'user_password' => $password
			);

			$user = $this->login_model->check_user($query_db);

			if (count($user) == 1) {
				$user = $user[0];

				$user_info = $this->login_model->get_userinfo($user->user_id)[0];


				$user_data = array(
					'id' => $user->user_id,
					'username' => $user->user_username,
					'userimage' => $user_info->userinfo_image
				);

				$this->session->set_userdata('user_info', $user_data);

				redirect('home');
			} else {

				$this->session->set_tempdata('form_error', 'User does not exist. Please try again.', 1);

				redirect('login');
			}
		}
	}
}
