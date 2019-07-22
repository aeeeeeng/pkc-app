<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Harga_subsidi_m extends PKCC_Model {
        protected $table = 'harga_subsidi';
        protected $primary_key = 'id';
        protected $fillable = [
            'file_id', 
            'hs_year',
            'hs_number',
            'hs_description',
            'hs_urea',
            'hs_npk',
            'hs_organik'
        ];   
        protected $authors = TRUE;
        protected $timestamps = TRUE;      
        public function view_file(){
            $this->db->select('harga_subsidi.*, files.file_path, files.file_download_path')
            ->join('files', 'files.id = harga_subsidi.file_id');
        }
    }