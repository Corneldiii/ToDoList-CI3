<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TodoController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Todomodel');
        $this->load->database();
    }
    
    public function index(){
        $data['data'] = $this->Todomodel->todoAkun(2);
        $this->load->view('Todo/todoView',$data);
    }

    public function store(){
        $this->index();

        $this->Todomodel->insertTodo();
        return redirect($this->index());
    }

    public function delete($id){
        $this->index();
        $this->Todomodel->deleteTodo($id);
        return redirect($this->index());
    }

    public function update($id){
        $this->index();

        $this->Todomodel->updateTodo($id);
        return redirect($this->index());
    }

    
}

