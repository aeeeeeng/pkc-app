<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Permentan_m extends PKCC_Model {
        protected $table = 'permentan';
        protected $primary_key = 'id';
        protected $fillable = [
            'file_id', 
            'permentan_number',
            'permentan_year',
            'permentan_description',
            'permentan_total_urea',
            'permentan_total_npk',
            'permentan_total_organik'
        ];   
        protected $authors = TRUE;
        protected $timestamps = TRUE;      
        public function view_file(){
            $this->db->select('permentan.*, files.file_path, files.file_download_path')
            ->join('files', 'files.id = permentan.file_id');
        }
    }