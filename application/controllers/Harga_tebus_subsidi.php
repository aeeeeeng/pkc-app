<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Harga_tebus_subsidi extends PKCC_Controller {
        protected $bulan = [];
        public function __construct()
        {
            parent::__construct();
            $this->bulan  = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        }

        public function index()
        {
            $this->load->view('harga_tebus_subsidi/index');
        }

        public function create()
        {
            $this->load->view('harga_tebus_subsidi/create', ['months' => $this->bulan]);
        }

        public function edit($id)
        {
            $this->load->view('harga_tebus_subsidi/edit', ['months' => $this->bulan, 'id' => $id]);
        }
    }