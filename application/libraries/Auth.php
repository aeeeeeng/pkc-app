<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'libraries/JWT/JWT.php';
require_once APPPATH.'libraries/JWT/ExpiredException.php';
use \Firebase\JWT\JWT;
use \Firebase\JWT\ExpiredException;

class Auth {

    protected $CI;

    protected $username_field = 'username';

    protected $user;

    protected $username;

    protected $model = 'users/users_m';

    protected $key = 'PKC_APP_USER';

    protected $algorithm = ['HS256'];

    protected $expired_token = 36000;

    public function __construct() {
        $this->CI = get_instance();
        
        $this->CI->load->model($this->model);
        $parse_model = explode('/', $this->model);
        $this->model = end($parse_model);
        
        $this->model = $this->CI->{$this->model};
        // var_dump($this->model);
        $this->CI->load->helper('url');
        
        // $this->user = $this->reload();
    }

    public function __get($name) {
        if (!isset($this->{$name})) {
            if ($this->user) {
                return $this->user->{$name};
            } else {
                return null;
            }
        } else {
            return $this->{$name};
        }
    }

    public function attempt($username, $password, $attributes = null) {
        // echo $username; exit();
        $newModel = ($this->model !== NULL) ? $this->model : $this->CI->{'users_m'};
        if ($attributes) {
            $newModel->where($attributes);
        }
        $user = $newModel->where($this->username_field, $username)
        ->where('password', md5($password))
        ->first();
        if ($user) {
            $payloads = array(
                "username" => $user->username,
                "exp" => (time() + $this->expired_token)
            );
            $jwt = JWT::encode($payloads, $this->key);
            $this->CI->output->set_header('JWT: '.$jwt);
            return $this->user($jwt);
        } else {
            return false;
        }
    }

    public function user($token = null) {
        
        $jwt = null;
        if($token === null) {
            $headers = $this->CI->input->request_headers();
            $jwt = isset($headers['JWT']) ? $headers['JWT'] : 'ANCOK';
        } else {
            $jwt = $token;
        }
        
        try {
            $decoded = JWT::decode($jwt, $this->key, $this->algorithm);
            if(!isset($decoded->username) || !isset($decoded->exp)) {
                $this->CI->output->set_status_header(401);
                header('Content-Type: application/json');
                echo json_encode(["success" => FALSE, "message" => "Invalid Token"]);
                exit();
            } else if ($decoded->exp <= time()) {
                $this->CI->output->set_status_header(401);
                header('Content-Type: application/json');
                echo json_encode(["success" => FALSE, "message" => "Expired Token"]);
                exit();
            }
            $this->username = $decoded->username;
            $this->user = $this->reload();
            return $this->user;
        } catch (Exception $e) {
            $this->CI->output->set_status_header(401);
            header('Content-Type: application/json');
            echo json_encode(["success" => FALSE, "message" => "Undefined Token"]);
            exit();
        }
    }

    public function reload() {
        // echo $this->username; exit();
        $newModel = ($this->model !== NULL) ? $this->model : $this->CI->{'users_m'};
        $user = $newModel->where($this->username_field, $this->username)->first();
        if ($user) {
            return $user;
        } else {
            return false;
        }
    }

    public function authenticated($token) {
        if ($this->user($token)) {
            return true;
        } else {
            return false;
        }
    }

    // public function logout() {
    //     $this->user = null;
    //     $this->CI->session->unset_userdata('auth');
    //     return true;
    // }
}