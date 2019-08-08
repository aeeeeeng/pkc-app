<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Harga_non_subsidi extends PKCC_Controller {

    protected $status = 0;
    protected $result = [];
    public $users_m;  

    public function __construct()
    {
        parent::__construct();
        $this->load->model('harga_non_subsidi/harga_non_subsidi_m');
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
            $harga_non_subsidi = $this->datatable->resource($this->harga_non_subsidi_m)
            ->view('file')
            ->edit_column('hns_product', function($model){
                switch($model->hns_product) {
                    case '1': return 'Pupuk';
                    case '2': return 'Non Pupuk';
                    case '3': return 'Utilitas';
                    default: return '';
                }
            })
            ->edit_column('created_at', function($model){
                return $this->general->tgl_ind($model->created_at);
            })
            ->edit_column('updated_at', function($model){
                return $this->general->tgl_ind($model->updated_at);
            })
            ->edit_column('hns_date', function($model){
                return $this->general->tgl_ind($model->hns_date);
            })
            ->filter(function($model){
                if($year = $this->input->get('year')) {
                    $model->where('harga_non_subsidi.hns_year', intval($year));   
                }
                if($product = $this->input->get('product')) {
                    $model->like('harga_non_subsidi.hns_product', $product);   
                }
            })
            ->custom_sort(function($model){
                if($sort_by = $this->input->get('sort_by') && $sort_type = $this->input->get('sort_type')) {
                    $model->order_by($sort_by, $sort_type);
                }
            })
            ->generate(TRUE);
            $this->status = 200;
            $harga_non_subsidi['success'] = TRUE;
            $harga_non_subsidi['message'] = 'Data fetched';
            $this->result = $harga_non_subsidi;
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
            ['field' => 'hns_year', 'label' => 'Tahun', 'rules' => 'required|numeric|min_length[4]|max_length[4]'],
            ['field' => 'hns_product', 'label' => 'Produk', 'rules' => 'required|numeric'],
            ['field' => 'hns_date', 'label' => 'Tanggal', 'rules' => 'required'],
            ['field' => 'hns_number', 'label' => 'Nomor', 'rules' => 'required'],
            ['field' => 'hns_about', 'label' => 'Perihal', 'rules' => 'required'],
            ['field' => 'hns_description', 'label' => 'Keterangan', 'rules' => 'required'],
        ];
        if (empty($_FILES['file']['name']))
            array_push($validations, ['field' => 'file', 'label' => 'File', 'rules' => 'required']);
        $this->form_validation->set_rules($validations);
        if($this->form_validation->run()){
            if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                $hns_year = $this->input->post('hns_year');
                $hns_product = $this->input->post('hns_product');
                $hns_date = $this->input->post('hns_date');
                $hns_number = $this->input->post('hns_number');
                $hns_about = $this->input->post('hns_about');
                $hns_description = $this->input->post('hns_description');
                $upload = $this->files->upload_file(date("Y/m/d/H/i/s").'-harga_tebus_non_subsidi-'.$hns_year, './upload/documents/harga_non_subsidi');
                if ($upload['success']) {
                    $message = $upload['message'];
                    $file = [
                        'file_name' => $message['file_name'],
                        'file_path' => $message['full_path'],
                        'file_download_path' => base_url('api/harga_non_subsidi/download?path='.base64_encode('./upload/documents/harga_non_subsidi/'.$message['file_name'])),
                        'file_ext' => $message['file_ext']
                    ];
                    $this->transaction->start();
                    $this->files_m->insert($file);
                    $file_id = $this->files_m->insert_id();
                    $harga_non_subsidi = [
                        'file_id' => $file_id,
                        'hns_year' => $hns_year,
                        'hns_product' => $hns_product,
                        'hns_date' => $hns_date,
                        'hns_number' => $hns_number,
                        'hns_about' => $hns_about,
                        'hns_description' => $hns_description
                    ];
                    $this->harga_non_subsidi_m->insert($harga_non_subsidi);
                    if($this->transaction->complete()){
                        $this->status = 200 ;
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
            $harga_non_subsidi = $this->harga_non_subsidi_m->view('file')->find($id);
            $this->status = 200;
            $this->result = ['success' => TRUE, 'message' => 'data fetched', 'data' => $harga_non_subsidi];
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
            ['field' => 'hns_year', 'label' => 'Tahun', 'rules' => 'required|numeric|min_length[4]|max_length[4]'],
            ['field' => 'hns_product', 'label' => 'Produk', 'rules' => 'required|numeric'],
            ['field' => 'hns_date', 'label' => 'Tanggal', 'rules' => 'required'],
            ['field' => 'hns_number', 'label' => 'Nomor', 'rules' => 'required'],
            ['field' => 'hns_about', 'label' => 'Perihal', 'rules' => 'required'],
            ['field' => 'hns_description', 'label' => 'Keterangan', 'rules' => 'required'],
        ];
        $this->form_validation->set_rules($validations);
        if($this->form_validation->run()){
            $this->transaction->start();
            $hns_year = $this->input->post('hns_year');
            $hns_product = $this->input->post('hns_product');
            $hns_date = $this->input->post('hns_date');
            $hns_number = $this->input->post('hns_number');
            $hns_about = $this->input->post('hns_about');
            $hns_description = $this->input->post('hns_description');
            $message = [];
            if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                $old = $this->harga_non_subsidi_m->find($id);
                $old_file = $this->files_m->find($old->file_id);
                $this->load->helper("file");
                unlink($old_file->file_path);
                $upload = $this->files->upload_file(date("Y/m/d/H/i/s").'-harga_tebus_non_subsidi-'.$hns_year, './upload/documents/harga_non_subsidi');
                $message = $upload['message'];
                $new_file = [
                    'file_name' => $message['file_name'],
                    'file_path' => $message['full_path'],
                    'file_download_path' => base_url('api/harga_non_subsidi/download?path='.base64_encode('./upload/documents/harga_non_subsidi/'.$message['file_name'])),
                    'file_ext' => $message['file_ext']
                ];
                $this->files_m->update($old_file->id, $new_file);
            }
            $new_harga_non_subsidi = [
                'hns_year' => $hns_year,
                'hns_product' => $hns_product,
                'hns_date' => $hns_date,
                'hns_number' => $hns_number,
                'hns_about' => $hns_about,
                'hns_description' => $hns_description
            ];
            $this->harga_non_subsidi_m->update($id, $new_harga_non_subsidi);
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
            $this->harga_non_subsidi_m->delete($id);
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