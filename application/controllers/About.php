<?php

class About extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('user_info') == NULL) {
            redirect('login');
        }
    }
}
