<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TodoController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function index(){
        $this->load->model('Todomodel');
        $data['data'] = $this->Todomodel->todoAkun(2);
        $this->load->view('Todo/todoView',$data);
    }

    public function store(){
        $dataTodo = array(
            'List' => $this->input->post('list'),
            'status' => 1,
            'id_akun' => 2
        );

        $this->todomodel->insertTodo($dataTodo);
        redirect('Todo/todoView');
    }

    public function update($id) {
        $this->todomodel->updateTodo(2, ['status' => 'completed']);
        redirect('task/todo');
    }

    public function delete($id) {
        $this->todomodel->deleteTodo(2);
        redirect('task/todo');
    }
}

