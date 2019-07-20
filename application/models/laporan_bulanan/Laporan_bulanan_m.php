<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Laporan_bulanan_m extends PKCC_Model {
        
        protected $table = 'laporan_bulanan';
        protected $primary_key = 'id'; 
        protected $fillable = ['file_id', 'lb_year', 'lb_month'];
        protected $authors = TRUE;
        protected $timestamps = TRUE;   

        public function view_file()
        {
            $this->db->select('laporan_bulanan.*, files.file_path, files.file_download_path')
            ->join('files', 'files.id = laporan_bulanan.file_id');
        }

    }