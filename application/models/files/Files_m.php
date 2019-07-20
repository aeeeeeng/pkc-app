<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Files_m extends PKCC_Model {
        protected $table = 'files'; 
        protected $primary_key = 'id'; 
        protected $fillable = ['file_name', 'file_path', 'file_ext', 'file_download_path'];
        protected $authors = FALSE;
        protected $timestamps = FALSE;
    }