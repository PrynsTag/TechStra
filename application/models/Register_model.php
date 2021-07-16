<?php


class Register_Model extends CI_Model
{
	public function insert_user($data)
	{
		$this->db->insert('user', $data);
		return $this->db->insert_id();
	}

	public function get_code($uri_code)
	{
		$query = $this->db->get_where("user", array("user_code" => $uri_code), 1);
		return $query->result()[0];
	}

	public function verify_user($update_data, $code)
	{
		$this->db->set("user_code", $update_data["user_code"]);
		$this->db->set("user_verification", $update_data["user_verification"]);
		$this->db->where("user_code", $code);
		$this->db->update("user");
		return True;
	}
}
