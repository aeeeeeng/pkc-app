<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Srt_pi_m extends PKCC_Model {
        protected $table = 'srt_pi';
        protected $primary_key = 'id';
        protected $fillable = [
            'file_id',
            'sp_number',
            'sp_year',
            'sp_description'
        ];
        protected $authors = TRUE;
        protected $timestamps = TRUE;      
        public function view_file(){
            $this->db->select('srt_pi.*, files.file_path, files.file_download_path')
            ->join('files', 'files.id = srt_pi.file_id');
        }
    }