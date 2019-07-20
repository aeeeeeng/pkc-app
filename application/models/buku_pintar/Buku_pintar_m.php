<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Buku_pintar_m extends PKCC_Model {
        
        protected $table = 'buku_pintar';
        protected $primary_key = 'id'; 
        protected $fillable = ['file_id', 'bp_year', 'bp_month'];
        protected $authors = TRUE;
        protected $timestamps = TRUE;   

        public function view_file()
        {
            $this->db->select('buku_pintar.*, files.file_path, files.file_download_path')
            ->join('files', 'files.id = buku_pintar.file_id');
        }

    }