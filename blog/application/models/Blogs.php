<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get All Blogs
     * @return array
     */
    public function getAllBlogs()
    {
        $allBlogs = array();
        $fields = array('blogs.id', 'title', 'slug', 'content', 'username', 'blogs.created_at');
        $query = $this->db->select($fields)
                          ->from('blogs')
                          ->join('users', 'blogs.user_id = users.id')
                          ->get();

        $allBlogs = $query->result_array();
        if ($allBlogs) {
            return array(
                'success' => true,
                'data' => $allBlogs
            );
        } else {
            return array(
                'success' => false,
                'data' => null
            );
        }
    }

    /**
     * Get Blog by Id
     * @return array
     */
    public function getBlogById($id)
    {
        $allBlogs = array();
        $fields = array('blogs.id', 'title', 'slug', 'content', 'username', 'blogs.created_at');
        $query = $this->db->select($fields)
                      ->from('blogs')
                      ->join('users', 'blogs.user_id = users.id')
                      ->where('blogs.id', $id)
                      ->get();

        $allBlogs = $query->result_array();
        if ($allBlogs) {
            return array(
                'success' => true,
                'data' => $allBlogs
            );
        } else {
            return array(
                'success' => false,
                'data' => null
            );
        }
    }

    /**
     * Create a Blog
     * @param array $data
     * @return boolean
     */
    public function createBlog($data)
    {
        //id, title, slug, content, user_id, created_at, updated_at
        $blogData = array(
            'title' => $data['title'],
            'slug' => $data['slug'],
            'content' => $data['content'],
            'user_id' => $data['user_id'],
            'created_at' => date('Y-m-d')
        );
        $this->db->insert('blogs', $blogData);

        // determine if successful
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Update Blog
     * @param array $data
     * @return boolean
     */
    public function updateBlog($data)
    {
        $blogData = array(
            'title' => $data['title'],
            'slug' => $data['slug'],
            'content' => $data['content'],
            'user_id' => $data['user_id']
        );

        $this->db->where('id', $data['id']);
        $this->db->update('blogs', $blogData);

        // determine if successful
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete Blog
     * @param int $id
     * @return boolean
     */
    public function deleteBlog($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('blogs');

        // determine if successful
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

}
