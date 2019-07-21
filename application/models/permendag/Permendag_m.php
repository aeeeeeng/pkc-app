<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Permendag_m extends PKCC_Model {
        protected $table = 'permendag';
        protected $primary_key = 'id';
        protected $fillable = [
            'file_id', 
            'permendag_number',
            'permendag_year',
            'permendag_description',
        ];   
        protected $authors = TRUE;
        protected $timestamps = TRUE;      
        public function view_file(){
            $this->db->select('permendag.*, files.file_path, files.file_download_path')
            ->join('files', 'files.id = permendag.file_id');
        }
    }