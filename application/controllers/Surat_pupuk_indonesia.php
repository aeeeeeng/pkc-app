<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Surat_pupuk_indonesia extends PKCC_Controller {
        protected $bulan = [];

        public function __construct()
        {
            parent::__construct();
            $this->bulan  = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        }

        public function index()
        {
            $this->load->view('srt_pi/index');
        }

        public function create()
        {
            $this->load->view('srt_pi/create', ['months' => $this->bulan]);
        }

        public function edit($id)
        {
            $this->load->view('srt_pi/edit', ['months' => $this->bulan, 'id' => $id]);
        }

    }