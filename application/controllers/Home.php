<?php

class Home extends CI_Controller
{
    public function index()
    {
        $view_data = [
            'header_title' => 'Home Page - TechStra',
            'main_view' => 'home_view',
            'posts' => $this->home_model->get_all_post()
        ];

        $this->load->view('templates/home', $view_data);
    }
}
