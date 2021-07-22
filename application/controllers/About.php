<?php

class About extends CI_Controller
{
    public function index()
    {
        $this->redirect();
		$user_id = $this->session->userdata("user_info")["id"];
		$user_data = (array)$this->profile_model->join_userdata($user_id)[0];

        $data = [
            'header_title' => 'About - TechStra',
            'main_view' => 'about_view',
            'nav_icon' => 'astra-tech.jpg'
        ];

        $this->load->view('templates/home', array_merge($user_data, $data));
    }

    public function redirect()
    {
        if ($this->session->userdata('user_info') == NULL) {
            redirect('login');
        }
    }
}
