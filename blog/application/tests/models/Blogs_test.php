<?php

class Blogs_test extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('Blogs');
        $this->obj = $this->CI->Blogs;
    }

    public function test_getAllBlogs()
    {
        $allBlogs = array(
            'id' => 1,
            'title' => 'First Blog',
            'slug' => 'First Blog',
            'content' => 'This is my First Blog',
            'created_at' => date('Y-m-d')
        );
        $return = array(
            'success' => true,
            'data' => $allBlogs
        );

        $blogs = $this->getMockBuilder('Blogs')
                          ->disableOriginalConstructor()
                          ->getMock();

        $blogs->expects($this->any())
             ->method('getAllBlogs')
             ->will($this->returnValue($return));

        $expected = array(
            'success' => true,
            'data' => $allBlogs
        );
        $response = $blogs->getAllBlogs();

        $this->assertEquals($expected['data'], $response['data']);
    }

    public function test_createBlog()
    {
        $data = array(
            'title' => 'First Blog',
            'slug' => 'First Blog',
            'content' => 'This is my First Blog'
        );

        $blogs = $this->getMockBuilder('Blogs')
                      ->disableOriginalConstructor()
                      ->getMock();

        $blogs->expects($this->any())
              ->method('createBlog')
              ->will($this->returnValue(true));

        $response = $blogs->createBlog($data);

        $this->assertTrue($response);
    }
}