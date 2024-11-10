<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TodoController extends CI_Controller
{
    private $apiKey;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Todomodel');
        $this->load->database();
        $this->load->library('session');
        $this->cekLogin();
        $this->apiKey = 'eLoxe#RX5v+um8nXdXtE';
    }

    public function kirimWhatsApp($data)
    {
        $url = 'https://api.fonnte.com/send';

        $headers = [
            'Authorization: ' . $this->apiKey
        ];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => $headers,
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }


    public function index()
    {
        $user_id = $this->session->userdata('user_id');

        if (!$user_id) {
            redirect('LoginController/index');
        }

        $data['data'] = $this->Todomodel->todoAkun($user_id);
        // var_dump($user_id);
        $this->load->view('Todo/todoView', $data);
    }

    public function store()
    {
        $this->index();
        $data = [
            'target' => '6285640835130',
            'message' => 'Anda mempunyai todolist baru',
        ];

        $response = $this->kirimWhatsApp($data);

        $this->Todomodel->insertTodo();
        return redirect('TodoController/index');
    }

    public function delete($id)
    {
        $this->index();
        $this->Todomodel->deleteTodo($id);
        return redirect('TodoController/index');
    }

    public function update($id)
    {
        $this->index();
        $this->Todomodel->updateTodo($id);
        return redirect('TodoController/index');
    }

    public function cekLogin()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('LoginController/index');
        }
    }
}
