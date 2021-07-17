<?php

class Post_Model extends CI_Model
{
    public function getuser_posts($user_id)
    {
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('post');

        return $result->result();
    }

    public function getPostById($post_id)
    {
        $this->db->where('post_id', $post_id);
        $result = $this->db->get('post');

        return $result->result();
    }

    public function addPost($data)
    {
        $this->db->insert('post', $data);
    }

    public function editPost($post_id, $data)
    {
        $this->db->where('post_id', $post_id);
        $this->db->set($data);
        $this->db->update('post');
    }

    public function delete_post($post_id)
    {
        $this->db->where('post_id', $post_id);
        $this->db->delete('post');
    }
}
