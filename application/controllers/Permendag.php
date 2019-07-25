<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Permendag extends PKCC_Controller {

        protected $bulan = [];

        public function __construct()
        {
            parent::__construct();
            $this->bulan  = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        }

        public function index()
        {
            $this->load->view('permendag/index');
        }

        public function create()
        {
            $this->load->view('permendag/create', ['months' => $this->bulan]);
        }

        public function edit($id)
        {
            $this->load->view('permendag/edit', ['months' => $this->bulan, 'id' => $id]);
        }

    }