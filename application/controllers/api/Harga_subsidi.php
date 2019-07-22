<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Harga_subsidi extends PKCC_Controller {

    protected $status = 0;
    protected $result = [];
    public $users_m;  

    public function __construct()
    {
        parent::__construct();
        $this->load->model('harga_subsidi/harga_subsidi_m');
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
            $harga_subsidi = $this->datatable->resource($this->harga_subsidi_m)
            ->view('file')
            ->filter(function($model){
                if($year = $this->input->get('year')) {
                    $model->where('harga_subsidi.hs_year', intval($year));   
                }
                if($hs_number = $this->input->get('hs_number')) {
                    $model->like('harga_subsidi.hs_number', $hs_number);   
                }
            })
            ->custom_sort(function($model){
                if($sort_by = $this->input->get('sort_by') && $sort_type = $this->input->get('sort_type')) {
                    $model->order_by($sort_by, $sort_type);
                }
            })->generate(TRUE); 
            $this->status = 200;
            $harga_subsidi['success'] = TRUE;
            $harga_subsidi['message'] = 'Data fetched';
            $this->result = $harga_subsidi;
        } catch (Exception $e) {
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
            ['field' => 'hs_year', 'label' => 'Tahun Harga Tebus Subsidi', 'rules' => 'required|numeric'],
            ['field' => 'hs_number', 'label' => 'Nomor Harga Tebus Subsidi', 'rules' => 'required'],
            ['field' => 'hs_description', 'label' => 'Perihal Harga Tebus Subsidi', 'rules' => 'required'],
            ['field' => 'hs_urea', 'label' => 'Rata2 Harga Tebus Urea', 'rules' => 'required'],
            ['field' => 'hs_npk', 'label' => 'Rata2 Harga Tebus NPK', 'rules' => 'required'],
            ['field' => 'hs_organik', 'label' => 'Rata2 Harga Tebus Organik', 'rules' => 'required'],
        ];
        if (empty($_FILES['file']['name']))
            array_push($validations, ['field' => 'file', 'label' => 'File', 'rules' => 'required']);
        $this->form_validation->set_rules($validations);
        if($this->form_validation->run()) {
            if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                $hs_year = $this->input->post('hs_year');
                $hs_number = $this->input->post('hs_number');
                $hs_description = $this->input->post('hs_description');
                $hs_urea = $this->input->post('hs_urea');
                $hs_npk = $this->input->post('hs_npk');
                $hs_organik = $this->input->post('hs_organik');
                $upload = $this->files->upload_file(date("Y/m/d/H/i/s").'-harga_tebus_subsidi-'.$hs_number.'-'.$hs_year, './upload/documents/harga_subsidi');   
                if ($upload['success']) {
                    $message = $upload['message'];
                    $file = [
                        'file_name' => $message['file_name'],
                        'file_path' => $message['full_path'],
                        'file_download_path' => base_url('api/harga_subsidi/download?path='.base64_encode('./upload/documents/harga_subsidi/'.$message['file_name'])),
                        'file_ext' => $message['file_ext']
                    ];
                    $this->transaction->start();
                    $this->files_m->insert($file);
                    $file_id = $this->files_m->insert_id();
                    $harga_subsidi = [
                        'file_id' => $file_id,
                        'hs_year' => $hs_year,
                        'hs_number' => $hs_number,
                        'hs_description' => $hs_description,
                        'hs_urea' => $hs_urea,
                        'hs_npk' => $hs_npk,
                        'hs_organik' => $hs_organik,
                    ];
                    $this->harga_subsidi_m->insert($harga_subsidi);
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
            $harga_subsidi = $this->harga_subsidi_m->view('file')->find($id);
            $this->status = 200;
            $this->result = ['success' => TRUE, 'message' => 'data fetched', 'data' => $harga_subsidi];
        } catch(Exception $e) {
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
            ['field' => 'hs_year', 'label' => 'Tahun Harga Tebus Subsidi', 'rules' => 'required|numeric'],
            ['field' => 'hs_number', 'label' => 'Nomor Harga Tebus Subsidi', 'rules' => 'required'],
            ['field' => 'hs_description', 'label' => 'Perihal Harga Tebus Subsidi', 'rules' => 'required'],
            ['field' => 'hs_urea', 'label' => 'Rata2 Harga Tebus Urea', 'rules' => 'required'],
            ['field' => 'hs_npk', 'label' => 'Rata2 Harga Tebus NPK', 'rules' => 'required'],
            ['field' => 'hs_organik', 'label' => 'Rata2 Harga Tebus Organik', 'rules' => 'required'],
        ];
        $this->form_validation->set_rules($validations);
        if($this->form_validation->run()){
            $this->transaction->start();
            $hs_year = $this->input->post('hs_year');
            $hs_number = $this->input->post('hs_number');
            $hs_description = $this->input->post('hs_description');
            $hs_urea = $this->input->post('hs_urea');
            $hs_npk = $this->input->post('hs_npk');
            $hs_organik = $this->input->post('hs_organik');
            $message = [];
            if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                $old_harga_subsidi = $this->harga_subsidi_m->find($id);
                $old_file = $this->files_m->find($old_harga_subsidi->file_id);
                $this->load->helper("file");
                unlink($old_file->file_path);
                $upload = $this->files->upload_file(date("Y/m/d/H/i/s").'-harga_tebus_subsidi-'.$hs_number.'-'.$hs_year, './upload/documents/harga_subsidi');   
                $message = $upload['message'];
                $new_file = [
                    'file_name' => $message['file_name'],
                    'file_path' => $message['full_path'],
                    'file_download_path' => base_url('api/harga_subsidi/download?path='.base64_encode('./upload/documents/harga_subsidi/'.$message['file_name'])),
                    'file_ext' => $message['file_ext']
                ];
                $this->files_m->update($old_file->id, $new_file);
            }
            $new_harga_subsidi = [
                'hs_year' => $hs_year,
                'hs_number' => $hs_number,
                'hs_description' => $hs_description,
                'hs_urea' => $hs_urea,
                'hs_npk' => $hs_npk,
                'hs_organik' => $hs_organik,
            ];
            $this->harga_subsidi_m->update($id, $new_harga_subsidi);
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
            $this->harga_subsidi_m->delete($id);
            $this->status = 200;
            $this->result = ['success' => TRUE, 'message' => 'berhasil di hapus'];
        } catch(Exception $e) {
            $this->status = 500;
            $this->result = ['success' => FALSE, 'message' => $e->getMessage()];
        }
        $this->output->set_content_type('application/json')
        ->set_status_header($this->status)->set_output(json_encode($this->result));   
    }

}