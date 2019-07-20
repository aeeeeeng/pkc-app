<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Laporan_harian_m extends PKCC_Model {
        protected $table = 'laporan_harian';
        protected $primary_key = 'id'; 
        protected $fillable = ['file_id', 'lh_year', 'lh_month', 'lh_day'];
        protected $authors = TRUE;
        protected $timestamps = TRUE;      

        public function view_file()
        {
            $this->db->select('laporan_harian.*, files.file_path, files.file_download_path')
            ->join('files', 'files.id = laporan_harian.file_id');
        }

    }