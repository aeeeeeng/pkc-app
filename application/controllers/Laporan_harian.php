<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Laporan_harian extends PKCC_Controller {

        protected $bulan = [];
        
        public function __construct()
        {
            parent::__construct();
            $this->bulan  = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        }

        public function index()
        {
            $this->load->view('laporan_harian/index');
        }

        public function create()
        {
            $this->load->view('laporan_harian/create', ['months' => $this->bulan]);
        }

        public function edit($id)
        {
            $this->load->view('laporan_harian/edit', ['months' => $this->bulan, 'id' => $id]);
        }

    }