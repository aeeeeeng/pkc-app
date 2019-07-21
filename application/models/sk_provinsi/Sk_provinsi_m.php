<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Sk_provinsi_m extends PKCC_Model {
        protected $table = 'sk_provinsi';
        protected $primary_key = 'id';
        protected $fillable = [
            'file_id', 
            'sp_number',
            'sp_year',
            'sp_region',
            'sp_total_urea',
            'sp_total_npk',
            'sp_total_organik',
        ];   
        protected $authors = TRUE;
        protected $timestamps = TRUE;      
        public function view_file(){
            $this->db->select('sk_provinsi.*, files.file_path, files.file_download_path')
            ->join('files', 'files.id = sk_provinsi.file_id');
        }
    }