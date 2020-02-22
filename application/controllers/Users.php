<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function register()
	{
        $this->form_validation->set_rules('first_name','First Name','trim|required|xss_clean');
        $this->form_validation->set_rules('last_name','Last Name','trim|required|xss_clean');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');        
        $this->form_validation->set_rules('username','Username','trim|required|min_length[4]|xss_clean');      
        $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('password2','Confirm Password','trim|required|matches[password]|xss_clean');
        
        if($this->form_validation->run() == FALSE){
            $data['main_content'] = 'users/register';
            $this->load->view('layouts/main',$data);  
        } else {
            if($this->user_model->create_user()){
                $this->session->set_flashdata('message','Registration Successful!');
                redirect('home/index');

            }
        }
    }
    
    public function login()
	{
        $this->form_validation->set_rules('username','Username','trim|required|min_length[4]|xss_clean');      
        $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]|xss_clean');
        
        if($this->form_validation->run() == FALSE){
            //nothing
        } else {
            $username = $this->input->post('username',TRUE);
            $password = $this->input->post('password',TRUE);

            $user_data = $this->user_model->get_user_data($username);

            if(password_verify($password, $user_data->password)){
                $user_session_data = array(
                    'user_id' => $user_data->id,
                    'username' => $user_data->username,
                    'email' => $user_data->email,
                    'logged_in' => true,
                );
                $this->session->set_userdata($user_session_data);
                $this->session->set_flashdata('login_success','Successfully logged in!');
                redirect('home/index');
            }else{
                $this->session->set_flashdata('login_failed','Sorry, Username or Password is invalid!');
                redirect('home/index');
            }
        }
    }
    
    public function logout(){
        //Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        
         //Set message
        $this->session->set_flashdata('logged_out', 'You have been logged out');
        redirect('home/index');
    }
}
