<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Blank extends PKCC_Controller {
        
        public function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            $this->load->view('blank');
        }

        public function next_blank()
        {
            $this->load->view('blank');
        }
    }