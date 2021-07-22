<?php

class Home extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('user_info') == NULL) {
            redirect('login');
        }

        $user_id = $this->session->userdata("user_info")["id"];
		$user_data = (array)$this->profile_model->join_userdata($user_id)[0];

        $data = [
            'header_title' => 'Home Page - TechStra',
            'main_view' => 'home_view',
            'posts' => $this->home_model->get_all_post()
        ];

        $this->load->view('templates/home', array_merge($user_data, $data));
    }
}
