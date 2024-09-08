<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Usermodel');
        $this->load->database();
        $this->load->library('session');
    }

    public function index(){
        $this->load->view('Todo/login');
    }

    public function login() {
        $user = $this->Usermodel->check_login();

        if ($user) {
            $this->session->set_userdata('user_id', $user->id_akun);
            
            redirect('TodoController/index');
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('LoginController/index');
        }
    }
}
