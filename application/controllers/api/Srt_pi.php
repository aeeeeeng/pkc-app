<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Srt_pi extends PKCC_Controller {

    protected $status = 0;
    protected $result = [];
    public $users_m;    

    public function __construct()
    {
        parent::__construct();
        $this->load->model('srt_pi/srt_pi_m');
        $this->load->model('files/files_m');
        $this->load->library('transaction');
        $this->load->library('files');
        $this->load->library('auth');           
    }

    public function index()
    {
        $this->is_GET();
        $this->auth->user();
        $this->load->library('datatable');
        try {
            $srt_pi = $this->datatable
            ->resource($this->srt_pi_m)
            ->view('file')
            ->filter(function($model){
                if($year = $this->input->get('year')) {
                    $model->where('srt_pi.sp_year', intval($year));
                }
                if($sp_number = $this->input->get('sp_number')) {
                    $model->like('srt_pi.sp_number', $sp_number);
                }
            })
            ->custom_sort(function($model){
                if($sort_by = $this->input->get('sort_by') && $sort_type = $this->input->get('sort_type')) {
                    $model->order_by($sort_by, $sort_type);
                }
            })->generate(TRUE); 
            $this->status = 200;
            $srt_pi['success'] = TRUE;
            $srt_pi['message'] = 'Data fetched';
            $this->result = $srt_pi;
        } catch(Exception $e) {
            $this->status = 500;
            $this->result = ['success' => FALSE, 'message' => $e->getMessage()];
        }
        $this->output->set_content_type('application/json')
        ->set_status_header($this->status)->set_output(json_encode($this->result));
    }

    public function download()
    {
        $this->is_GET();
        
        $path = $this->input->get('path');
        $real_path = base64_decode($path);
        $this->load->helper('download');
        force_download($real_path, NULL);
    }

    public function store()
    {
        $this->is_POST();
        $this->auth->user();
        $this->load->library('form_validation');
        
        $validations = [
            ['field' => 'sp_number', 'label' => 'Nomor Surat Peraturan', 'rules' => 'required'],
            ['field' => 'sp_year', 'label' => 'Tahun Surat Peraturan', 'rules' => 'required|numeric|min_length[4]|max_length[4]'],
            ['field' => 'sp_description', 'label' => 'Perihal Surat Peraturan', 'rules' => 'required'],
        ];
        if (empty($_FILES['file']['name']))
            array_push($validations, ['field' => 'file', 'label' => 'File', 'rules' => 'required']);
        
        $this->form_validation->set_rules($validations);
        if($this->form_validation->run()) {
            if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                $sp_number = $this->input->post('sp_number');
                $sp_year = $this->input->post('sp_year');
                $sp_description = $this->input->post('sp_description');
                $upload = $this->files->upload_file(date("Y/m/d/H/i/s").'-peraturan-pupuk-indonesia-'.$sp_number.'-'.$sp_year, './upload/documents/srt_pi');   
                if ($upload['success']) {
                    $message = $upload['message'];
                    $file = [
                        'file_name' => $message['file_name'],
                        'file_path' => $message['full_path'],
                        'file_download_path' => base_url('api/srt_pi/download?path='.base64_encode('./upload/documents/srt_pi/'.$message['file_name'])),
                        'file_ext' => $message['file_ext']
                    ];
                    $this->transaction->start();
                    $this->files_m->insert($file);
                    $file_id = $this->files_m->insert_id();
                    $srt_pi = [
                        'file_id' => $file_id,  
                        'sp_number' => $sp_number,  
                        'sp_year' => $sp_year,  
                        'sp_description' => $sp_description,
                    ];
                    $this->srt_pi_m->insert($srt_pi);
                    if($this->transaction->complete()){
                        $this->status = 200;
                        $this->result = array(
                            'success' => TRUE,
                            'message' => $message
                        );
                    } else {
                        $errNo   = $this->db->_error_number();
                        $errMess = $this->db->_error_message();
                        $this->status = 500;
                        $this->result = array(
                            'success' => FALSE,
                            'message' => [$errNo, $errMess]
                        );
                    }
                } else {
                    $this->status = 500;
                    $this->result = array(
                        'success' => TRUE,
                        'message' => $this->upload->display_errors()
                    );
                }
            }
        } else {
            $this->status = 400;
            $this->result = ['success' => FALSE, 'message' => $this->form_validation->error_array()];
        }
        $this->output->set_content_type('application/json')
        ->set_status_header($this->status)->set_output(json_encode($this->result));
    }

    public function show($id)
    {
        $this->is_GET();
        $this->auth->user();
        try {
            $srt_pi = $this->srt_pi_m->view('file')->find($id);
            $this->status = 200;
            $this->result = ['success' => TRUE, 'message' => 'data fetched', 'data' => $srt_pi];
        } catch (Exception $e) {
            $this->status = 500;
            $this->result = ['success' => FALSE, 'message' => $e->getMessage()];
        }
        $this->output->set_content_type('application/json')
        ->set_status_header($this->status)->set_output(json_encode($this->result));   
    }

    public function update($id)
    {
        $this->is_POST();
        $this->auth->user();
        $this->load->library('form_validation');
        $validations = [
            ['field' => 'sp_number', 'label' => 'Nomor Surat Peraturan', 'rules' => 'required'],
            ['field' => 'sp_year', 'label' => 'Tahun Surat Peraturan', 'rules' => 'required|numeric'],
            ['field' => 'sp_description', 'label' => 'Perihal Surat Peraturan', 'rules' => 'required'],
        ];
        $this->form_validation->set_rules($validations);
        if($this->form_validation->run()){
            $this->transaction->start();
            $sp_number = $this->input->post('sp_number');
            $sp_year = $this->input->post('sp_year');
            $sp_description = $this->input->post('sp_description');
            $message = [];
            if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                $old_srt_pi = $this->srt_pi_m->find($id);
                $old_file = $this->files_m->find($old_srt_pi->file_id);      
                $this->load->helper("file");
                unlink($old_file->file_path);
                $upload = $this->files->upload_file(date("Y/m/d/H/i/s").'-peraturan-pupuk-indonesia-'.$sp_number.'-'.$sp_year, './upload/documents/srt_pi');   
                $message = $upload['message'];
                $new_file = [
                    'file_name' => $message['file_name'],
                    'file_path' => $message['full_path'],
                    'file_download_path' => base_url('api/srt_pi/download?path='.base64_encode('./upload/documents/srt_pi/'.$message['file_name'])),
                    'file_ext' => $message['file_ext']
                ];
                $this->files_m->update($old_file->id, $new_file);
            }
            $new_srt_pi = [
                'sp_number' => $sp_number,  
                'sp_year' => $sp_year,  
                'sp_description' => $sp_description,
            ];
            $this->srt_pi_m->update($id, $new_srt_pi);
            if($this->transaction->complete()) {
                $this->status = 200;
                $this->result = ['success' => TRUE, 'message' => $message];
            } else {
                $errNo   = $this->db->_error_number();
                $errMess = $this->db->_error_message();
                $this->status = 500;
                $this->result = ['success' => FALSE, 'message' => [$errNo, $errMess]];
            }
        } else {
            $this->status = 400;
            $this->result = ['success' => FALSE, 'message' => $this->form_validation->error_array()];
        }
        $this->output->set_content_type('application/json')
        ->set_status_header($this->status)->set_output(json_encode($this->result));
    }

    public function destroy($id)
    {
        $this->is_DELETE();
        $this->auth->user();
        try {
            $this->srt_pi_m->delete($id);
            $this->status = 200;
            $this->result = ['success' => TRUE, 'message' => 'berhasil di hapus'];
        } catch (Exception $e) {
            $this->status = 500;
            $this->result = ['success' => FALSE, 'message' => $e->getMessage()];   
        }
        $this->output->set_content_type('application/json')
        ->set_status_header($this->status)->set_output(json_encode($this->result));   
    }

}