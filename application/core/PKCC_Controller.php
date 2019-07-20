<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class PKCC_Controller extends CI_Controller {

        protected $_method = 'GET';
        public $users_m;

        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->library('template');
        }

        protected function is_POST()
        {
            $this->_method = $this->input->method(TRUE);
            if($this->_method !== 'POST') {
                show_404();
            }
        }

        protected function is_PUT()
        {
            $this->_method = $this->input->method(TRUE);
            if($this->_method !== 'PUT') {
                show_404();
            }
        }

        protected function is_GET()
        {
            $this->_method = $this->input->method(TRUE);
            if($this->_method !== 'GET') {
                show_404();
            }
        }

        protected function is_DELETE()
        {
            $this->_method = $this->input->method(TRUE);
            if($this->_method !== 'DELETE') {
                show_404();
            }
        }

    }