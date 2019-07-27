<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Users extends PKCC_Controller {

        public function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            $this->load->view('users/index');
        } 
        
        public function create()
        {
            $this->load->view('users/create');
        }

        public function edit($id)
        {
            $this->load->view('users/edit', ['id' => $id]);
        }

    }