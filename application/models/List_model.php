<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_model extends CI_model {
    
    public function get_lists(){
        $lists = $this->db->select('*')
                              ->from('lists')
                              ->get()
                              ->result();
        return $lists;
    }

    public function get_list_tasks($list_id,$active = true){
        $this->db->select('
            tasks.task_name,
            tasks.task_body,
            tasks.id as task_id,
            lists.list_name,
            lists.list_body
            ');
        $this->db->from('tasks');
        $this->db->join('lists', 'lists.id = tasks.list_id');
        $this->db->where('tasks.list_id',$list_id);
        if($active == true){
            $this->db->where('tasks.is_complete',0);
        } else {
            $this->db->where('tasks.is_complete',1);
        }
        $query = $this->db->get();
        if($query->num_rows() < 1){
            return FALSE;
        }
        return $query->result();
        
    }

    public function get_list($id){
        $this->db->select('*');
        $this->db->from('lists');
        $this->db->where('id',$id);
        $query = $this->db->get();
         if($query->num_rows() != 1){
            return FALSE;
        }
        return $list = $query->row();
    }

    public function create_list($data){
        $query = $this->db->insert('lists',$data);
        return $query;
    }

    public function get_list_data($list_id){
        $query = $this->db->where('id',$list_id)
                          ->get('lists')
                          ->row();
        return $query;
    }

    public function edit_list($list_id,$data){
        $this->db->where('id', $list_id);
        $this->db->update('lists', $data); 
        return TRUE;
    }

    public function delete_list($list_id){
        $this->db->where('id',$list_id);
        $this->db->delete('lists');
        $this->delete_tasks_of_list($list_id);
        return;
    }

    private function delete_tasks_of_list($list_id){
        $this->db->where('list_id',$list_id);
        $this->db->delete('tasks');
        return;
    }
    
    public function get_all_lists_of_user($user_id){
        $query = $this->db->select('*')
                          ->from('lists')
                          ->where('list_user_id', $user_id)
                          ->order_by('list_create_date','desc')
                          ->get()
                          ->result();
        return $query;
    }

}
