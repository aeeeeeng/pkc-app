<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Permentan extends PKCC_Controller {

    protected $status = 0;
    protected $result = [];
    public $users_m;    

    public function __construct()
    {
        parent::__construct();
        $this->load->model('permentan/permentan_m');
        $this->load->model('files/files_m');
        $this->load->library('transaction');
        $this->load->library('files');
        $this->load->library('auth');           
        $this->load->library('general');           
    }

    public function index()
    {
        $this->is_GET();
        $this->auth->user();
        $this->load->library('datatable');
        try {
            $permentan = $this->datatable
            ->resource($this->permentan_m)
            ->view('file')
            ->edit_column('created_at', function($model){
                return $this->general->tgl_ind($model->created_at);
            })
            ->edit_column('updated_at', function($model){
                return $this->general->tgl_ind($model->updated_at);
            })
            ->filter(function($model){
                if($year = $this->input->get('year')) {
                    $model->where('permentan.permentan_year', intval($year));   
                }
            })
            ->custom_sort(function($model){
                if($sort_by = $this->input->get('sort_by') && $sort_type = $this->input->get('sort_type')) {
                    $model->order_by($sort_by, $sort_type);
                }
            })->generate(TRUE);
            $this->status = 200;
            $permentan['success'] = TRUE;
            $permentan['message'] = 'Data fetched';
            $this->result = $permentan;
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
        // echo $real_path;
        $this->load->helper('download');
        force_download($real_path, NULL);
    }

    public function store()
    {
        $this->is_POST();
        $this->auth->user();
        $this->load->library('form_validation');
        $validation = [
            ['field' => 'permentan_number', 'label' => 'Nomor Permentan', 'rules' => 'required'],
            ['field' => 'permentan_year', 'label' => 'Tahun Permentan', 'rules' => 'required|numeric'],
            ['field' => 'permentan_description', 'label' => 'Perihal Permentan', 'rules' => 'required'],
            ['field' => 'permentan_total_urea', 'label' => 'Total Urea', 'rules' => 'required|numeric'],
            ['field' => 'permentan_total_npk', 'label' => 'Total NPK', 'rules' => 'required|numeric'],
            ['field' => 'permentan_total_organik', 'label' => 'Total Organik', 'rules' => 'required|numeric']
        ];
        if (empty($_FILES['file']['name']))
            array_push($validation, ['field' => 'file', 'label' => 'File', 'rules' => 'required']);
        $this->form_validation->set_rules($validation);
        if($this->form_validation->run()) {
            if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                $permentan_number = $this->input->post('permentan_number');
                $permentan_year = $this->input->post('permentan_year');
                $permentan_description = $this->input->post('permentan_description');
                $permentan_total_urea = $this->input->post('permentan_total_urea');
                $permentan_total_npk = $this->input->post('permentan_total_npk');
                $permentan_total_organik = $this->input->post('permentan_total_organik');
                $upload = $this->files->upload_file(date("Y/m/d/H/i/s").'-permentan-'.$permentan_number.'-'.$permentan_year, './upload/documents/permentan');   
                if ($upload['success']) {
                    $message = $upload['message'];
                    $file = [
                        'file_name' => $message['file_name'],
                        'file_path' => $message['full_path'],
                        'file_download_path' => base_url('api/permentan/download?path='.base64_encode('./upload/documents/permentan/'.$message['file_name'])),
                        'file_ext' => $message['file_ext']
                    ];
                    $this->transaction->start();
                    $this->files_m->insert($file);
                    $file_id = $this->files_m->insert_id();
                    $permentan = [
                        'file_id' => $file_id,
                        'permentan_number' => $permentan_number,
                        'permentan_year' => $permentan_year,
                        'permentan_description' => $permentan_description,
                        'permentan_total_urea' => $permentan_total_urea,
                        'permentan_total_npk' => $permentan_total_npk,
                        'permentan_total_organik' => $permentan_total_organik,
                    ];
                    $this->permentan_m->insert($permentan);
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
            $permentan = $this->permentan_m->view('file')->find($id);
            $this->status = 200;
            $this->result = ['success' => TRUE, 'message' => 'data fetched', 'data' => $permentan];
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
            ['field' => 'permentan_number', 'label' => 'Nomor Permentan', 'rules' => 'required'],
            ['field' => 'permentan_year', 'label' => 'Tahun Permentan', 'rules' => 'required|numeric'],
            ['field' => 'permentan_description', 'label' => 'Perihal Permentan', 'rules' => 'required'],
            ['field' => 'permentan_total_urea', 'label' => 'Total Urea', 'rules' => 'required|numeric'],
            ['field' => 'permentan_total_npk', 'label' => 'Total NPK', 'rules' => 'required|numeric'],
            ['field' => 'permentan_total_organik', 'label' => 'Total Organik', 'rules' => 'required|numeric']
        ];
        $this->form_validation->set_rules($validations);
        if($this->form_validation->run()){
            $this->transaction->start();
            $permentan_number = $this->input->post('permentan_number');
            $permentan_year = $this->input->post('permentan_year');
            $permentan_description = $this->input->post('permentan_description');
            $permentan_total_urea = $this->input->post('permentan_total_urea');
            $permentan_total_npk = $this->input->post('permentan_total_npk');
            $permentan_total_organik = $this->input->post('permentan_total_organik');
            $message = [];
            if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                $old_permentan = $this->permentan_m->find($id);
                $old_file = $this->files_m->find($old_permentan->file_id);
                $this->load->helper("file");
                unlink($old_file->file_path);
                $upload = $this->files->upload_file(date("Y/m/d/H/i/s").'-permentan-'.$permentan_number.'-'.$permentan_year, './upload/documents/permentan');
                $message = $upload['message'];
                $new_file = [
                    'file_name' => $message['file_name'],
                    'file_path' => $message['full_path'],
                    'file_download_path' => base_url('api/permentan/download?path='.base64_encode('./upload/documents/permentan/'.$message['file_name'])),
                    'file_ext' => $message['file_ext']
                ];
                $this->files_m->update($old_file->id, $new_file);
            }
             $new_permentan = [
                'permentan_number' => $permentan_number,
                'permentan_year' => $permentan_year,
                'permentan_description' => $permentan_description,
                'permentan_total_urea' => $permentan_total_urea,
                'permentan_total_npk' => $permentan_total_npk,
                'permentan_total_organik' => $permentan_total_organik,
            ];
            $this->permentan_m->update($id, $new_permentan);
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
            $this->permentan_m->delete($id);
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