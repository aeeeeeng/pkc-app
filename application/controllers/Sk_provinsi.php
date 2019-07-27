<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Sk_provinsi extends PKCC_Controller {

        protected $bulan = [];

        public function __construct()
        {
            parent::__construct();
            $this->bulan  = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        }

        public function index()
        {
            $this->load->view('sk_provinsi/index');
        }

        public function create()
        {
            $this->load->view('sk_provinsi/create', ['months' => $this->bulan]);
        }

        public function edit($id)
        {
            $this->load->view('sk_provinsi/edit', ['months' => $this->bulan, 'id' => $id]);
        }

    }