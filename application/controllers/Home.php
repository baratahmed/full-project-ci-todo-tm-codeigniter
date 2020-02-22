<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged_in')){
			$user_id = $this->session->userdata('user_id');
			$data['lists'] = $this->list_model->get_all_lists_of_user($user_id);
			$data['tasks'] = $this->Task_model->get_users_tasks($user_id);
		}
        $data['main_content'] = 'home';
		$this->load->view('layouts/main',$data);
	}

}
