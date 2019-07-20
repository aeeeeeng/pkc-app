<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_harian extends PKCC_Controller {

    protected $status = 0;
    protected $result = [];
    public $users_m;    

    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_harian/laporan_harian_m');
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
            $lap_har = $this->datatable
            ->resource($this->laporan_harian_m)
            ->view('file')
            ->filter(function($model){
                $year = ($this->input->get('year') == '') ? date("Y") : $this->input->get('year');
                $model->where('laporan_harian.lh_year', $year);
                $month = ($this->input->get('month') == '') ? date("m") : $this->input->get('month');
                $model->where('laporan_harian.lh_month', intval($month));
                if($day = $this->input->get('day')) {
                    $model->where('laporan_harian.lh_day', intval($day));   
                }
            })
            ->custom_sort(function($model){
                if($sort_by = $this->input->get('sort_by') && $sort_type = $this->input->get('sort_type')) {
                    $model->order_by($sort_by, $sort_type);
                }
            })
            ->generate(TRUE);
            $this->status = 200;
            $lap_har['success'] = TRUE;
            $lap_har['message'] = 'Data fetched';
            $this->result = $lap_har;
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
        $validation = [
            ['field' => 'lh_year', 'label' => 'Tahun Laporan Harian', 'rules' => 'required|numeric'],
            ['field' => 'lh_month', 'label' => 'Bulan Laporan Harian', 'rules' => 'required|numeric'],
            ['field' => 'lh_day', 'label' => 'Hari Laporan Harian', 'rules' => 'required|numeric'],
        ];
        $this->form_validation->set_rules($validation);
        if($this->form_validation->run()) {
            if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                $lh_year = $this->input->post('lh_year');
                $lh_month = $this->input->post('lh_month');
                $lh_day = $this->input->post('lh_day');
                $upload = $this->files->upload_file(date("Y/m/d/H/i/s").'-laporan_harian-'.$lh_day.'-'.$lh_month.'-'.$lh_year, './upload/documents/laporan_harian');   
                if ($upload['success']) {
                    $message = $upload['message'];
                    $file = [
                        'file_name' => $message['file_name'],
                        'file_path' => $message['full_path'],
                        'file_download_path' => base_url('api/laporan_harian/download?path='.base64_encode('./upload/documents/laporan_harian/'.$message['file_name'])),
                        'file_ext' => $message['file_ext']
                    ];
                    $this->transaction->start();
                    $this->files_m->insert($file);
                    $file_id = $this->files_m->insert_id();
                    $laporan_harian = [
                        'file_id' => $file_id,
                        'lh_year' => $this->input->post('lh_year'),
                        'lh_year' => $this->input->post('lh_year'),
                        'lh_month' => $this->input->post('lh_month')
                    ];
                    $this->laporan_harian_m->insert($laporan_harian);
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
            $laporan_harian = $this->laporan_harian_m->view('file')->find($id);
            $this->status = 200;
            $this->result = ['success' => TRUE, 'message' => 'data fetched', 'data' => $laporan_harian];
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
            ['field' => 'lh_day', 'label' => 'Hari Laporan Harian', 'rules' => 'required|numeric'],
            ['field' => 'lh_month', 'label' => 'Bulan Laporan Harian', 'rules' => 'required|numeric'],
            ['field' => 'lh_year', 'label' => 'Tahun Laporan Harian', 'rules' => 'required|numeric']
        ];
        $this->form_validation->set_rules($validations);
        if($this->form_validation->run()){
            $this->transaction->start();
            $lh_day = $this->input->post('lh_day');
            $lh_month = $this->input->post('lh_month');
            $lh_year = $this->input->post('lh_year');
            $message = [];
            if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                $old_laphar = $this->laporan_harian_m->find($id);
                $old_file = $this->files_m->find($old_laphar->file_id);
                $this->load->helper("file");
                unlink($old_file->file_path);
                $upload = $this->files->upload_file(date("Y/m/d/H/i/s").'-laporan_harian-'.$lh_day.'-'.$lh_month.'-'.$lh_year, './upload/documents/laporan_harian');
                $message = $upload['message'];
                
                $new_file = [
                    'file_name' => $message['file_name'],
                    'file_path' => $message['full_path'],
                    'file_download_path' => base_url('api/laporan_harian/download?path='.base64_encode('./upload/documents/laporan_harian/'.$message['file_name'])),
                    'file_ext' => $message['file_ext']
                ];
                $this->files_m->update($old_file->id, $new_file);
            }
            $new_laphar = ['lh_day' => $lh_day, 'lh_year' => $lh_year, 'lh_month' => $lh_month];
            $this->laporan_harian_m->update($id, $new_laphar);
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
            $this->laporan_harian_m->delete($id);
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