<?php

class Logout extends CI_Controller
{

    public function index()
    {
        $this->session->unset_userdata(
            'user_info',
            array(
                "id" => $this->session->userdata("id"),
                "username" => $this->session->userdata("username")
            )
        );
        
        redirect("login");
    }
}
