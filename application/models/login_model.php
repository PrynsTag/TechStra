<?php

class Login_Model extends CI_Model
{
    public function check_user($userdata)
    {
        $this->db->where($userdata);
        $result = $this->db->get('user');

        return $result->result();
    }
}
