<?php

class Posts extends CI_Controller
{
    public function index()
    {
        $session_data = $this->session->userdata('user_info');

        $posts = $this->post_model->getuser_posts($session_data['id']);

        $view_data = [
            'header_title' => 'Posts - TechStra',
            'main_view' => 'posts_view',
            'posts' => $posts
        ];

        $this->load->view('templates/home', $view_data);
    }

    public function add()
    {
        $view_data = [
            'header_title' => 'Add Posts - TechStra',
            'main_view' => 'addPost_view',
            'input_title' => array('class' => 'form-control input_text', 'name' => 'title', 'type' => 'text', 'placeholder' => 'Title'),
            'input_description' => array('class' => 'form-control input_text input_textarea', 'name' => 'description', 'type' => 'text', 'placeholder' => 'Description'),
            'input_upload' => array('class' => 'form-control input_text', 'name' => 'imageupload', 'type' => 'file', 'placeholder' => 'Upload Image')
        ];

        $this->load->view('templates/main', $view_data);
    }

    public function add_post()
    {
        $input_rules = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required|min_length[3]|max_length[20]'
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required|min_length[3]|max_length[20]'
            )
        );

        $this->form_validation->set_rules($input_rules);

        if ($this->form_validation->run() == false) {
            $message = [
                'alert_error' => validation_errors()
            ];

            $this->session->set_flashdata($message);

            redirect('posts/add');
        } else {
            $image_config = [
                'upload_path' => './assets/uploads/posts/',
                'allowed_types' => 'jpg|png'
            ];

            $this->upload->initialize($image_config);

            if (!$this->upload->do_upload('imageupload')) {
                $message = [
                    'alert_error' => $this->upload->display_errors()
                ];

                $this->session->set_flashdata($message);

                redirect('posts/add');
            } else {
                $session_data = $this->session->userdata('user_info');
                $user_id = $session_data['id'];
                $title = $this->input->post('title');
                $description = $this->input->post('description');
                $image = $this->upload->data('file_name');

                $query_data = array(
                    'user_id' => $user_id,
                    'post_title' => $title,
                    'post_description' => $description,
                    'post_photo' => $image
                );

                $this->post_model->addPost($query_data);

                $message = [
                    'alert_success' => 'Add Successfully'
                ];

                $this->session->set_flashdata($message);

                redirect('posts/add');
            }
        }
    }

    public function edit($post_id)
    {
        $posts = $this->post_model->getPostById($post_id)[0];

        $view_data = [
            'header_title' => 'Edit Post - Techstra',
            'main_view' => 'editPost_view',
            'posts' => $posts,
            'input_title' => array('class' => 'form-control input_text', 'name' => 'title', 'type' => 'text', 'placeholder' => 'Title', 'value' => $posts->post_title),
            'input_description' => array('class' => 'form-control input_text input_textarea', 'name' => 'description', 'type' => 'text', 'placeholder' => 'Description', 'value' => $posts->post_description),
            'input_upload' => array('class' => 'form-control input_text', 'name' => 'imageupload', 'type' => 'file', 'placeholder' => 'Upload Image', 'value' => $posts->post_photo)
        ];

        $this->load->view('templates/main', $view_data);
    }

    public function edit_post($post_id)
    {
        $input_rules = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required|min_length[3]|max_length[20]'
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required|min_length[3]|max_length[20]'
            )
        );

        $this->form_validation->set_rules($input_rules);

        if ($this->form_validation->run() == false) {
            $message = [
                'alert_error' => validation_errors()
            ];

            $this->session->set_flashdata($message);

            redirect('posts/edit/' . $post_id);
        } else {
            $image_config = [
                'upload_path' => './assets/uploads/posts/',
                'allowed_types' => 'jpg|png'
            ];

            $this->upload->initialize($image_config);

            if (!$this->upload->do_upload('imageupload')) {
                $message = [
                    'alert_error' => $this->upload->display_errors()
                ];

                $this->session->set_flashdata($message);

                redirect('posts/edit/' . $post_id);
            } else {
                $session_data = $this->session->userdata('user_info');
                $user_id = $session_data['id'];
                $title = $this->input->post('title');
                $description = $this->input->post('description');
                $image = $this->upload->data('file_name');

                $query_data = array(
                    'user_id' => $user_id,
                    'post_title' => $title,
                    'post_description' => $description,
                    'post_photo' => $image
                );

                $this->post_model->editPost($post_id, $query_data);

                $message = [
                    'alert_success' => 'Edit post successfully'
                ];

                $this->session->set_flashdata($message);

                redirect('posts/edit/' . $post_id);
            }
        }
    }

    public function delete($post_id)
    {
        $this->post_model->delete_post($post_id);

        $message = [
            'modal_success' => 'You have successfully delete a post'
        ];

        $this->session->set_flashdata($message);

        redirect('posts');
    }
}
