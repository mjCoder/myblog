<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Create New User
     * @param array $data
     * @return boolean
     */
    public function createUser($data)
    {
        $userData = array(
            'email_address' => $data['email'],
            'password' => $data['password'],
            'username' => $data['username'],
            'first_name' => $data['fname'],
            'last_name' => $data['lname'],
            'deleted_flag' => 0,
            'created_at' => date('Y-m-d')
        );
        $this->db->insert('users', $userData);

        // determine if successful
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get User by Username
     * @param int $id
     * @return array
     */
    public function getUserByUsername($username)
    {
        $data = array('username', $username);
        $userData = $this->getUser($data);
        return $userData;
    }

    /**
     * Get User by ID
     * @param int $id
     * @return array
     */
    public function getUserById($id)
    {
        $data = array('id', $id);
        $userData = $this->getUser($data);
        return $userData;
    }

    /**
     * Get User Info
     * @param array $data
     * @return array
     */
    private function getUser($data)
    {
        $userData = array();
        $fields = array('id', 'email_address', 'password', 'username', 'first_name', 'last_name', 'created_at');

        $query = $this->db->select($fields)
                          ->where($data)
                          ->get('users');

        $userData = $query->result_array();
        if ($userData) {
            return array(
                'success' => true,
                'data' => $userData
            );
        } else {
            return array(
                'success' => false,
                'data' => null
            );
        }
    }

    /**
     * Update User Info
     * @param array $data
     * @return boolean
     */
    public function updateUser($data)
    {
        $userData = array(
            'email_address' => $data['email'],
            'password' => $data['password'],
            'username' => $data['username'],
            'first_name' => $data['fname'],
            'last_name' => $data['lname'],
            'deleted_flag' => $data['deleted']
        );

        $this->db->where('id', $data['id']);
        $this->db->update('users', $userData);

        // determine if successful
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Soft Delete User
     * @param int $id
     * @return boolean
     */
    public function deleteUser($id)
    {
        $userData = array(
            'deleted_flag' => 1
        );

        $this->db->where('id', $id);
        $this->db->update('users', $userData);

        // determine if successful
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
}