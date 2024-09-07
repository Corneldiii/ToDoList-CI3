<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todomodel extends CI_Model{

    public function todoAkun($id){
        $this->db->where('id_akun',$id);
        return $this->db->get('todo');
    }

    public function insertTodo($data){
        return $this->db->insert('todo',$data);
    }

    public function updateTodo($id,$data){
        $this->db->where('id_akun',$id);
        return $this->db->update('todo',$data);
    }

    public function deleteTodo($id){
        $this->db->where('id_akun',$id);
        return $this->db->delete('todo');
    }
}