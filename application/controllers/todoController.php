<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TodoController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Todomodel');
        $this->load->database();
        $this->load->library('session'); // Pastikan session library di-load
    }
    
    public function index(){
        // Ambil user_id dari session
        $user_id = $this->session->userdata('user_id');

        // Cek apakah user_id ada di session, jika tidak redirect ke halaman login
        if (!$user_id) {
            redirect('LoginController/index');
        }

        // Ambil todo berdasarkan user_id
        $data['data'] = $this->Todomodel->todoAkun($user_id);
        
        // Tampilkan view dengan data todo
        $this->load->view('Todo/todoView', $data);
    }

    public function store(){
        // Pastikan user terautentikasi
        $this->index();

        $this->Todomodel->insertTodo();
        return redirect('TodoController/index');
    }

    public function delete($id){
        // Pastikan user terautentikasi
        $this->index();
        $this->Todomodel->deleteTodo($id);
        return redirect('TodoController/index');
    }

    public function update($id){
        // Pastikan user terautentikasi
        $this->index();
        $this->Todomodel->updateTodo($id);
        return redirect('TodoController/index');
    }
}
