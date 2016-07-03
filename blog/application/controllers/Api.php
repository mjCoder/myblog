<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Blogs');
    }

    public function getAllBlogs()
    {
        $result = $this->Blogs->getAllBlogs();
        if ($result['success']) {
            $response = array(
                'success' => 1,
                'response_code' => 200,
                'data' => $result['data']
            );
        } else {
            $response = array(
                'success' => 0,
                'response_code' => 400,
                'data' => array()
            );
        }
        echo json_encode($response);
    }

    public function getBlog($id)
    {
        $result = $this->Blogs->getBlogById($id);
        if ($result['success']) {
            $response = array(
                'success' => 1,
                'response_code' => 200,
                'data' => $result['data']
            );
        } else {
            $response = array(
                'success' => 0,
                'response_code' => 400,
                'data' => array()
            );
        }
        echo json_encode($response);
    }

    public function createBlog()
    {
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $this->input->post('slug'),
            'content' => $this->input->post('content'),
            'user_id' => $this->input->post('userid')
        );

        $result = $this->Blogs->createBlog($data);
        if ($result) {
            $response = array(
                'success' => 1,
                'response_code' => 200
            );
        } else {
            $response = array(
                'success' => 0,
                'response_code' => 400
            );
        }
        echo json_encode($response);
    }

    public function updateBlog()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'title' => $this->input->post('title'),
            'slug' => $this->input->post('slug'),
            'content' => $this->input->post('content'),
            'user_id' => $this->input->post('userid')
        );

        $result = $this->Blogs->updateBlog($data);
        if ($result) {
            $response = array(
                'success' => 1,
                'response_code' => 200
            );
        } else {
            $response = array(
                'success' => 0,
                'response_code' => 400
            );
        }
        echo json_encode($response);
    }

    public function deleteBlog($id)
    {
        $result = $this->Blogs->deleteBlog($id);
        if ($result) {
            $response = array(
                'success' => 1,
                'response_code' => 200
            );
        } else {
            $response = array(
                'success' => 0,
                'response_code' => 400
            );
        }
        echo json_encode($response);
    }
}
