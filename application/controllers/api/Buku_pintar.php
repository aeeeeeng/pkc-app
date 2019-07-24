<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_pintar extends PKCC_Controller {

    protected $status = 0;
    protected $result = [];
    public $users_m;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('buku_pintar/buku_pintar_m');
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
            $buku_pintar = $this->datatable
            ->resource($this->buku_pintar_m)
            ->view('file')
            ->filter(function($model){
                if ($year = $this->input->get('year')) {
                    $model->where('buku_pintar.bp_year', $year);   
                }
                if ($month = $this->input->get('month')) {
                    $model->where('buku_pintar.bp_month',intval($month));
                }
            })
            ->custom_sort(function($model){
                if($sort_by = $this->input->get('sort_by') && $sort_type = $this->input->get('sort_type')) {
                    $model->order_by($sort_by, $sort_type);
                }
            })
            ->generate(TRUE);
            $this->status = 200;
            $buku_pintar['success'] = TRUE;
            $buku_pintar['message'] = 'Data fetched';
            $this->result = $buku_pintar;
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
        // echo $real_path;
        $this->load->helper('download');
        force_download($real_path, NULL);
    }

    public function store()
    {
        $this->is_POST();
        $this->auth->user();
        $this->load->library('form_validation');
        $validations = [
            ['field' => 'bp_month', 'label' => 'Bulan Buku Pintar', 'rules' => 'required|numeric'],
            ['field' => 'bp_year', 'label' => 'Tahun Buku Pintar', 'rules' => 'required|numeric|min_length[4]|max_length[4]']
        ];
        if (empty($_FILES['file']['name']))
            array_push($validations, ['field' => 'file', 'label' => 'File', 'rules' => 'required']);
        $this->form_validation->set_rules($validations);
        if($this->form_validation->run()) {
            $bp_year = $this->input->post('bp_year');
            $bp_month = $this->input->post('bp_month');
            $upload = $this->files->upload_file(date("Y/m/d/H/i/s").'-buku_pintar-'.$bp_month.'-'.$bp_year, './upload/documents/buku_pintar');
            if($upload['success']) {
                $message = $upload['message'];
                $file = [
                    'file_name' => $message['file_name'],
                    'file_path' => $message['full_path'],
                    'file_download_path' => base_url('api/buku_pintar/download?path='.base64_encode('./upload/documents/buku_pintar/'.$message['file_name'])),
                    'file_ext' => $message['file_ext']
                ];
                $this->transaction->start();
                $this->files_m->insert($file);
                $file_id = $this->files_m->insert_id();
                $buku_pintar = [
                    'file_id' => $file_id,
                    'bp_year' => $this->input->post('bp_year'),
                    'bp_month' => $this->input->post('bp_month')
                ];
                $this->buku_pintar_m->insert($buku_pintar);
                if($this->transaction->complete()){
                    $this->status = 200;
                    $this->result = array(
                        'success' => TRUE,
                        'message' => $message
                    );
                } else {
                    $errNo   = $this->db->_error_number();
                    $errMess = $this->db->_error_message();
                    $this->status = 200;
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
            $buku_pintar = $this->buku_pintar_m->view('file')->find($id);
            $this->status = 200;
            $this->result = ['success' => TRUE, 'message' => 'data fetched', 'data' => $buku_pintar];
        } catch(Exception $e) {
            $this->status = 200;
            $this->result = ['success' => TRUE, 'message' => $e->getMessage()];
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
            ['field' => 'bp_month', 'label' => 'Bulan Buku Pintar', 'rules' => 'required|numeric'],
            ['field' => 'bp_year', 'label' => 'Tahun Buku Pintar', 'rules' => 'required|numeric|min_length[4]|max_length[4]']
        ];
        $this->form_validation->set_rules($validations);
        if($this->form_validation->run()) {
            $this->transaction->start();
            $bp_year = $this->input->post('bp_year');
            $bp_month = $this->input->post('bp_month');
            $message = [];
            if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                $old_bp = $this->buku_pintar_m->find($id);
                $old_file = $this->files_m->find($old_bp->file_id);
                $this->load->helper("file");
                unlink($old_file->file_path);
                $upload = $this->files->upload_file(date("Y/m/d/H/i/s").'-buku_pintar-'.$bp_month.'-'.$bp_year, './upload/documents/buku_pintar');
                $message = $upload['message'];
                $new_file = [
                    'file_name' => $message['file_name'],
                    'file_path' => $message['full_path'],
                    'file_download_path' => base_url('api/buku_pintar/download?path='.base64_encode('./upload/documents/buku_pintar/'.$message['file_name'])),
                    'file_ext' => $message['file_ext']
                ];
                $this->files_m->update($old_file->id, $new_file);
            }
            $new_bp = ['bp_year' => $bp_year, 'bp_month' => $bp_month];
            $this->buku_pintar_m->update($id, $new_bp);
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
            $this->buku_pintar_m->delete($id);
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