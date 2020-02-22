<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_model {

	public function create_user()
	{
        $enc_password = password_hash($this->input->post('password',TRUE),PASSWORD_DEFAULT);
        $data = array(
            'first_name' => $this->input->post('first_name',TRUE),
            'last_name' => $this->input->post('last_name',TRUE),
            'email' => $this->input->post('email',TRUE),
            'username' => $this->input->post('username',TRUE),
            'password' => $enc_password,
        );

        $insert = $this->db->insert('users', $data);
        return $insert;
    }
    
    public function get_user_data($username){
        $user_data = $this->db->select('*')
                              ->from('users')
                              ->where('username', $username)
                              ->get()
                              ->row();
        return $user_data;
    }
}
