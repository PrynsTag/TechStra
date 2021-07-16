<?php


class Home_model extends CI_Model
{
	public function get_all_post()
	{
		$result = $this->db->get("post");
		return $result->result();
	}

}
