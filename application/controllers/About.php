<?php

class About extends CI_Controller
{
    public function index()
    {
        $this->redirect();

        $view_data = [
            'header_title' => 'About - TechStra',
            'main_view' => 'about_view',
            'nav_icon' => 'astra-tech.jpg'
        ];

        $this->load->view('templates/home', $view_data);
    }

    public function redirect()
    {
        if ($this->session->userdata('user_info') == NULL) {
            redirect('login');
        }
    }
}
