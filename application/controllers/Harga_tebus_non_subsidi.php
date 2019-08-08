<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Harga_tebus_non_subsidi extends PKCC_Controller {
        protected $bulan = [];
        protected $products = [];
        public function __construct()
        {
            parent::__construct();
            $this->bulan  = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            $this->products = [
                ['id' => '1', 'name' => 'Pupuk'],
                ['id' => '2', 'name' => 'Non Pupuk'],
                ['id' => '3', 'name' => 'Utilitas']
            ];
        }
        public function index()
        {
            $this->load->view('harga_tebus_non_subsidi/index');
        }   
        public function create()
        {
            $this->load->view('harga_tebus_non_subsidi/create', ['months' => $this->bulan, 'products' => $this->products]);
        }
        public function edit($id)
        {
            $this->load->view('harga_tebus_non_subsidi/edit', ['months' => $this->bulan, 'products' => $this->products, 'id' => $id]);
        }
    }