<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Balansitas extends PKCC_Controller {

    protected $status = 0;
    protected $result = [];
    public $users_m;    

    public function __construct()
    {
        parent::__construct();
        $this->load->model('balansitas/balansitas_m');
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
            $balansitas = $this->datatable
            ->resource($this->balansitas_m)
            ->view('file')
            ->add_column('balansitas_month_name', function($model){
                return $this->general->bln_ind($model->balansitas_month);
            })
            ->edit_column('created_at', function($model){
                return $this->general->tgl_ind($model->created_at);
            })
            ->edit_column('updated_at', function($model){
                return $this->general->tgl_ind($model->updated_at);
            })
            ->filter(function($model){
                if($year = $this->input->get('year')) {
                    $model->where('balansitas.balansitas_year', intval($year));
                }
                if($month = $this->input->get('month')) {
                    $model->where('balansitas.balansitas_month', intval($month));
                }
                if($day = $this->input->get('day')) {
                    $model->where('balansitas.balansitas_day', intval($day));   
                }
            })
            ->custom_sort(function($model){
                if($sort_by = $this->input->get('sort_by') && $sort_type = $this->input->get('sort_type')) {
                    $data_sort = explode(",", $this->input->get('sort_by'));
                    foreach($data_sort as $data) {
                        $model->order_by($data, $sort_type);
                    }
                }
            })
            ->generate(TRUE);
            $this->status = 200;
            $balansitas['success'] = TRUE;
            $balansitas['message'] = 'Data fetched';
            $this->result = $balansitas;
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
            ['field' => 'balansitas_year', 'label' => 'Tahun Balansitas', 'rules' => 'required|numeric|min_length[4]|max_length[4]'],
            ['field' => 'balansitas_month', 'label' => 'Bulan Balansitas', 'rules' => 'required|numeric'],
            ['field' => 'balansitas_day', 'label' => 'Hari Balansitas', 'rules' => 'required|numeric'],
        ];
        if (empty($_FILES['file']['name']))
            array_push($validation, ['field' => 'file', 'label' => 'File', 'rules' => 'required']);
        $this->form_validation->set_rules($validation);
        if($this->form_validation->run()) { 
            if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) { 
                $balansitas_year = $this->input->post('balansitas_year');
                $balansitas_month = $this->input->post('balansitas_month');
                $balansitas_day = str_pad($this->input->post('balansitas_day'), 2, "0", STR_PAD_LEFT);
                $upload = $this->files->upload_file(date("Y/m/d/H/i/s").'-balansitas-'.$balansitas_day.'-'.$balansitas_month.'-'.$balansitas_year, './upload/documents/balansitas');   
                if($upload['success']) {
                    $message = $upload['message'];
                    $file = [
                        'file_name' => $message['file_name'],
                        'file_path' => $message['full_path'],
                        'file_download_path' => base_url('api/balansitas/download?path='.base64_encode('./upload/documents/balansitas/'.$message['file_name'])),
                        'file_ext' => $message['file_ext']
                    ];
                    $this->transaction->start();
                    $this->files_m->insert($file);
                    $file_id = $this->files_m->insert_id();
                    $balansitas = [
                        'file_id' => $file_id,
                        'balansitas_year' => $balansitas_year,
                        'balansitas_month' => $balansitas_month,
                        'balansitas_day' => $balansitas_day
                    ];
                    $this->balansitas_m->insert($balansitas);
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
            $balansitas = $this->balansitas_m->view('file')->find($id);
            $this->status = 200;
            $this->result = ['success' => TRUE, 'message' => 'data fetched', 'data' => $balansitas];
        } catch (Exception $e) {
            $this->status = 200;
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
            ['field' => 'balansitas_year', 'label' => 'Tahun Balansitas', 'rules' => 'required|numeric|min_length[4]|max_length[4]'],
            ['field' => 'balansitas_month', 'label' => 'Bulan Balansitas', 'rules' => 'required|numeric'],
            ['field' => 'balansitas_day', 'label' => 'Hari Balansitas', 'rules' => 'required|numeric'],
        ];
        $this->form_validation->set_rules($validations);
        if($this->form_validation->run()){
            $this->transaction->start();
            $balansitas_year = $this->input->post('balansitas_year');
            $balansitas_month = $this->input->post('balansitas_month');
            $balansitas_day = str_pad($this->input->post('balansitas_day'), 2, "0", STR_PAD_LEFT);
            $message = [];
            if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                $old_balansitas = $this->balansitas_m->find($id);
                $old_file = $this->files_m->find($old_balansitas->file_id);
                $this->load->helper("file");
                unlink($old_file->file_path);
                $upload = $this->files->upload_file(date("Y/m/d/H/i/s").'-balansitas-'.$balansitas_day.'-'.$balansitas_month.'-'.$balansitas_year, './upload/documents/balansitas');
                $message = $upload['message'];
                $new_file = [
                    'file_name' => $message['file_name'],
                    'file_path' => $message['full_path'],
                    'file_download_path' => base_url('api/balansitas/download?path='.base64_encode('./upload/documents/balansitas/'.$message['file_name'])),
                    'file_ext' => $message['file_ext']
                ];
                $this->files_m->update($old_file->id, $new_file);
            }
            $new_balansitas = [
                'balansitas_year' => $balansitas_year,
                'balansitas_month' => $balansitas_month,
                'balansitas_day' => $balansitas_day
            ];
            $this->balansitas_m->update($id, $new_balansitas);
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
            $this->balansitas_m->delete($id);
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