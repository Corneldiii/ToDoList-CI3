<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Usermodel');
        $this->load->database();
        $this->load->library('session'); // Pastikan session library di-load
    }

    public function index(){
        $this->load->view('Todo/login');
    }

    public function login() {
        // Panggil model untuk memeriksa login
        $user = $this->Usermodel->check_login();

        if ($user) {
            // Set session dengan user ID
            $this->session->set_userdata('user_id', $user->id_akun);
            
            // Redirect ke TodoController dengan user ID
            redirect('TodoController/index');
        } else {
            // Jika login gagal, kembali ke halaman login
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('LoginController/index');
        }
    }
}
