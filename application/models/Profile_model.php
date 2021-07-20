<?php


class Profile_model extends CI_Model
{
	public function insert_userinfo($user_data, $user_id)
	{
		$this->db->where("user_id", $user_id);
		$this->db->insert('userinfo', array_merge($user_data, ["user_id" => $user_id]));
		return $this->db->insert_id();
	}

	public function update_userdata($user_data, $user_id): bool
	{
		$firstname = $user_data["userinfo_firstname"];
		$lastname = $user_data["userinfo_lastname"];
		$bio = $user_data["userinfo_bio"];
		$image = $user_data["userinfo_image"];

		$this->db->trans_start();
		$this->db->query("UPDATE userinfo 
							SET userinfo_firstname = '$firstname', 
							    userinfo_lastname = '$lastname', 
							    userinfo_bio = '$bio', 
							    userinfo_image = '$image' 
							WHERE userinfo_id = '$user_id'");
		$this->db->trans_complete();

		return $this->db->trans_status();
	}

	public function update_password($user_data, $user_id): bool
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

	public function get_userinfo($user_id)
	{
		$this->db->where("user_id", $user_id);
		return $this->db->get("userinfo")->result();
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
