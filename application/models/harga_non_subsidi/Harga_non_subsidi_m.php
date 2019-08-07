<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Harga_non_subsidi_m extends PKCC_Model {
        protected $table = 'harga_non_subsidi';
        protected $primary_key = 'id';
        protected $fillable = [
            'file_id',
            'hns_year',
            'hns_product',
            'hns_date',
            'hns_number',
            'hns_about',
            'hns_description'
        ];
        protected $authors = TRUE;
        protected $timestamps = TRUE;      
        public function view_file(){
            $this->db->select('harga_non_subsidi.*, files.file_path, files.file_download_path')
            ->join('files', 'files.id = harga_non_subsidi.file_id');
        }
    }