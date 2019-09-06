<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Files {

    public function __construct() {
        $this->CI = get_instance();
    }

    public function upload_file($name, $path)
    {
        $config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|jpeg|png|xls|xlsx|pdf|doc|docx';
        $config['file_name']            = $name;
        $config['overwrite']			= true;
        $config['max_size']             = 500000;
        $result = [];
        $this->CI->load->library('upload');
        $this->CI->upload->initialize($config);
        if ($this->CI->upload->do_upload('file')) {
            $data = $this->CI->upload->data();
            $result['success'] = true;
            $result['message'] = $data;
        } else {
            $result['success'] = false;
            $result['message'] = $this->CI->upload->display_errors();
        }
        return $result;
    }

    

}