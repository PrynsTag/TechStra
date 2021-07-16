<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		$view_data = [
			'header_title' => 'Login - TechStra',
			'main_view' => 'login_view',
			'form_attributes' => array('method' => 'post'),
			'input_username' => array('class' => 'form-control', 'id' => 'username', 'name' => 'username', 'type', 'text'),
			'input_password' => array('class' => 'form-control', 'id' => 'password', 'name' => 'password', 'type' => 'password')
		];

		$this->load->view('templates/main', $view_data);
	}

	public function user_login()
	{
		$input_rules = array(
			array(
				'field' => '',
				'label' => '',
				'rules' => ''
			)
		);

		$this->form_validation->set_rules($input_rules);
	}
}
