<?php

class About extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('user_info') == NULL) {
            redirect('login');
        }

        $view_data = [
            'header_title' => 'About - TechStra',
            'main_view' => 'about_view',
            'nav_icon' => 'astra-tech.jpg'
        ];

        $this->load->view('templates/home', $view_data);
    }
}
