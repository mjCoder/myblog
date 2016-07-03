<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends BLOG_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Blogs');
    }

    public function index()
    {
        $this->content = 'home';
        $result = $this->Blogs->getAllBlogs();
        $this->data = $result;
        $this->layout();
    }

    public function about()
    {
        $this->content = 'about';
        $this->layout();
    }

    public function post($id)
    {
        $this->content = 'post';
        $result = $this->Blogs->getBlogById($id);
        $this->data = $result;
        $this->layout();
    }

    public function contact()
    {
        $this->content = 'contact';
        $this->layout();
    }

    public function login()
    {
        $this->content = 'login';
        $this->layout();
    }

    public function register()
    {
        $this->content = 'register';
        $this->layout();
    }
}
