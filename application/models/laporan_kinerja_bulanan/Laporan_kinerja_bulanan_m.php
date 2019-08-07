<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Laporan_kinerja_bulanan_m extends PKCC_Model {
        
        protected $table = 'laporan_kinerja_bulanan';
        protected $primary_key = 'id'; 
        protected $fillable = ['file_id', 'lkb_year', 'lkb_month'];
        protected $authors = TRUE;
        protected $timestamps = TRUE;   

        public function view_file()
        {
            $this->db->select('laporan_kinerja_bulanan.*, files.file_path, files.file_download_path')
            ->join('files', 'files.id = laporan_kinerja_bulanan.file_id');
        }

    }