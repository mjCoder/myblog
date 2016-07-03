<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BLOG_Controller extends CI_Controller
{
    //set the class variable.
    var $template  = array();
    var $data      = array();
    var $content = '';
    //Load layout
    var $controllerName;
    var $controllerMethod;

    public function __construct()
    {
        parent::__construct();
        $this->controllerName = $this->uri->segment(1);
        $this->controllerMethod = $this->uri->segment(2);
    }

    public function layout() {
        // making temlate and send data to view.
        $this->template['header']   = $this->load->view('common/header', $this->data, true);
        $this->template['content'] = $this->load->view($this->content, $this->data, true);
        $this->template['footer'] = $this->load->view('common/footer', $this->data, true);
        $this->load->view('common/layout', $this->template);
    }
}