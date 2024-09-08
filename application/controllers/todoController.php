<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TodoController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Todomodel');
        $this->load->database();
        $this->load->library('session');
        $this->cekLogin();
    }
    
    public function index(){
        $user_id = $this->session->userdata('user_id');

        if (!$user_id) {
            redirect('LoginController/index');
        }

        $data['data'] = $this->Todomodel->todoAkun($user_id);
        $this->load->view('Todo/todoView', $data);
    }

    public function store(){
        $this->index();

        $this->Todomodel->insertTodo();
        return redirect('TodoController/index');
    }

    public function delete($id){
        $this->index();
        $this->Todomodel->deleteTodo($id);
        return redirect('TodoController/index');
    }

    public function update($id){
        $this->index();
        $this->Todomodel->updateTodo($id);
        return redirect('TodoController/index');
    }

    public function cekLogin() {
        if (!$this->session->userdata('user_id')) {
            redirect('LoginController/index');
        }
    }
    
}
