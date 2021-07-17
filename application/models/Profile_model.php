<?php


class Profile_model extends CI_Model
{
	public function update_userdata($user_data, $user_id): bool
	{
		$user_db = [
			"user_firstname" => $user_data["userinfo_firstname"],
			"user_lastname" => $user_data["userinfo_lastname"]
		];

		$userinfo_db = [
			"userinfo_firstname" => $user_data["userinfo_firstname"],
			"userinfo_lastname" => $user_data["userinfo_lastname"],
			"userinfo_bio" => $user_data["userinfo_bio"],
			"userinfo_image" => $user_data["userinfo_image"]
		];
		$this->db->trans_start();
		// User DB
		$this->db->set($user_db);
		$this->db->where('user_id', $user_id);
		$this->db->update('user');

		// UserInfo DB
		$this->db->set($userinfo_db);
		$this->db->where('user_id', $user_id);
		$this->db->update('userinfo');

		$this->db->trans_complete();
		return $this->db->affected_rows() >= 0; //add your your code here
	}

	public function update_password($user_data, $user_id)
	{
		$this->db->set($user_data);
		$this->db->where('user_id', $user_id);
		$this->db->update('user');
		return $this->db->affected_rows() >= 0;
	}

	public function get_userdata($user_id)
	{
		$this->db->where("user_id", $user_id);
		return $this->db->get("user")->result();
	}

	public function join_userdata($user_id)
	{
		$this->db->select('*');
		$this->db->from('user u');
		$this->db->join('userinfo i', 'u.user_id=i.user_id', 'left');
		$this->db->where('u.user_id', $user_id);
		return $this->db->get()->result();
	}
}
