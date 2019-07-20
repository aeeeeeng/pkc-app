<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'libraries/JWT/JWT.php';
use \Firebase\JWT\JWT;
class Users extends PKCC_Controller {

    protected $status;
    protected $result = [];
    public $users_m;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users/users_m');
        $this->load->library('auth');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->is_GET();
        $this->auth->user();
        $this->load->library('datatable');
        try{
            $user = $this->datatable->resource($this->users_m)->generate(true);
            $this->status = 200;
            $this->result = ['success' => TRUE, 'message' => $user];
        } catch (Exception $e) {
            $this->status = 500;
            $this->result = ['success' => FALSE, 'message' => $e->getMessage()];
        }
        $this->output->set_content_type('application/json')
                ->set_status_header($this->status)->set_output(json_encode($this->result));
    }

    public function refresh()
    {
        $this->is_GET();
        try{
            $check = $this->auth->user();
            $this->output->set_content_type('application/json')
                ->set_status_header(200)->set_output(json_encode($check));
        } catch(Exception $e) {
            redirect('login');
        }
    }

    public function store()
    {
        $this->is_POST();
        $input = $this->input->raw_input_stream;
        $user = json_decode($input, true);
        $_POST = $user;
        $this->load->library('form_validation');
        $validation = [
            ['field' => 'username', 'label' => 'Username', 'rules' => 'required|is_unique[users.username]'],
            ['field' => 'email', 'label' => 'Email', 'rules' => 'required|is_unique[users.email]'],
            ['field' => 'password', 'label' => 'Password', 'rules' => 'required'],
            ['field' => 'first_name', 'label' => 'First Name', 'rules' => 'required'],
            ['field' => 'passconf', 'label' => 'Password Confirmation', 'rules' => 'required|matches[password]' ],
            ['field' => 'access', 'label' => 'Access', 'rules' => 'required']
        ];
        $this->form_validation->set_rules($validation);
        if($this->form_validation->run()){
            $user['full_name'] = ($user['last_name'] !== null || $user['last_name'] !== '') ? $user['first_name'].' '.$user['last_name'] : $user['first_name'];
            $this->load->library('transaction');
            $this->transaction->start();
            $this->users_m->insert($user);
            if($this->transaction->complete()) {
                $this->status = 200;
                $this->result = ['success' => true, 'data' => $user];
            } else {
                $this->status = 500;
                $this->result = ['success' => false, 'message' => 'fail load data user'];
            }
        } else {
            $this->status = 400;
            $this->result = ['success' => false, 'message' => $this->form_validation->error_array()];
        }
        $this->output->set_content_type('application/json')
                ->set_status_header($this->status)->set_output(json_encode($this->result));
    }

    public function login($client = null)
    {
        $this->is_POST();
        $input = $this->input->raw_input_stream;
        $user = json_decode($input, true);
        $_POST = $user;
        $this->load->library('form_validation');
        $validation = [
            ['field' => 'username', 'label' => 'Username', 'rules' => 'required'],
            ['field' => 'password', 'label' => 'Password', 'rules' => 'required']
        ];
        $this->form_validation->set_rules($validation);
        if($this->form_validation->run()){
            $username = $user['username'];
            $password = $user['password'];
            if($client === null) {
                $login = $this->auth->attempt($username, $password, ['access' => 'admin']);
            } else if ($client === 'client') {
                $login = $this->auth->attempt($username, $password, ['access' => 'client']);
                if(!$login)
                    $login = $this->auth->attempt($username, $password, ['access' => 'admin']);
            } else {
                show_404();
            }
            if(!$login) {
                $this->status = 401;
                $this->result = ['success' => false, 'message' => ['username' => 'username is wrong', 'password' => 'password is wrong']];
            } else {
                $this->status = 200;
                $this->result = ['success' => true, 'data' => $login];
            }
        } else {
            $this->status = 400;
            $this->result = ['success' => false, 'message' => $this->form_validation->error_array()];
        }
        
        $this->output->set_content_type('application/json')
                ->set_status_header($this->status)->set_output(json_encode($this->result));
    }

    public function edit($id)
    {
        $this->is_GET();
        $this->auth->user();
        $users = $this->users_m->find($id);
        if($users) {
            $this->status = 200;
            $this->result = ['success' => true, 'data' => $users];
        } else {
            $this->status = 500;
            $this->result = ['success' => false];
        }
        $this->output->set_content_type('application/json')
        ->set_status_header($this->status)->set_output(json_encode($this->result));
    }

    public function update($id)
    {
        $this->is_PUT();
        $this->auth->user();
        $input = $this->input->raw_input_stream;
        $user_input = json_decode($input, true);
        try {
            $this->users_m->update($id, $user_input);
            $this->status = 200;
            $this->result = ['success' => TRUE, 'message' => 'update data berhasil', 'data' => $user_input];
        } catch(Exception $e) {
            $this->status = 500;
            $this->result = ['success' => TRUE, 'message' => $e->getMessage()];
        }
        $this->output->set_content_type('application/json')
        ->set_status_header($this->status)->set_output(json_encode($this->result));
    }

    public function destroy($id)
    {
        $this->is_DELETE();
        $this->auth->user();
        try {
            $this->users_m->delete($id);
            $this->status = 200;
            $this->result = ['success' => TRUE, 'message' => 'hapus data berhasil', 'data' => $id];
        } catch (Exception $e) {
            $this->status = 500;
            $this->result = ['success' => TRUE, 'message' => $e->getMessage()];
        }
        $this->output->set_content_type('application/json')
        ->set_status_header($this->status)->set_output(json_encode($this->result));   
    }

}