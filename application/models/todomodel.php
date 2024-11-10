<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todomodel extends CI_Model{

    public function todoAkun($id) {
        $this->db->where('id_akun', $id);
        $this->db->order_by('id_list','DESC');
        $query = $this->db->get('todo');
        return $query->result_array(); 
    }    

    public function insertTodo(){
        $data = array(
            'List' => $this->input->post('list'),
            'status' => 1,
            'id_akun' => $this->session->userdata('user_id'),
        );

        $this->db->insert('todo',$data);
    }

    public function updateTodo($id){
        $data = array(
            'status' => 0
        );
        $this->db->where('id_list',$id);
        $this->db->update('todo',$data);
    }

    public function deleteTodo($id){
        $this->db->where('id_list',$id);
        $this->db->delete('todo');
    }
}