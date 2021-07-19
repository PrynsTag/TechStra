<?php

class Login_model extends CI_Model
{
    public function check_user($userdata)
    {
        $this->db->where($userdata);
        $result = $this->db->get('user');

        return $result->result();
    }

    public function get_userinfo($user_id)
    {
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('userinfo');

        return $result->result();
    }
}
