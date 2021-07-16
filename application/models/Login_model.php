<?php

class Login_model extends CI_Model
{
    public function check_user($userdata)
    {
        $this->db->where($userdata);
        $result = $this->db->get('user');

        return $result->result();
    }
}
