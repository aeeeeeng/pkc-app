<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Balansitas_m extends PKCC_Model {
        protected $table = 'balansitas';
        protected $primary_key = 'id'; 
        protected $fillable = ['file_id', 'balansitas_year', 'balansitas_month', 'balansitas_day'];
        protected $authors = TRUE;
        protected $timestamps = TRUE;      

        public function view_file()
        {
            $this->db->select('balansitas.*, files.file_path, files.file_download_path')
            ->join('files', 'files.id = balansitas.file_id');
        }
    }