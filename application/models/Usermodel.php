<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermodel extends CI_Model{
    public function check_login() {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->db->where('username', $username);
        $query = $this->db->get('akun'); 

        if ($query->num_rows() > 0) {
            $user = $query->row();

            return $user;
            
            // if (password_verify($password, $user->password)) {
            //     return $user; 
            // }
        }
        
        return false;
    }

    public function get_user_by_id($user_id) {
        $this->db->where('id_akun', $user_id);
        $query = $this->db->get('akun');
        
        return $query->row(); 
    }
}