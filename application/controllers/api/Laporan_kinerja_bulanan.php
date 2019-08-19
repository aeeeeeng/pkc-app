<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_kinerja_bulanan extends PKCC_Controller {

    protected $status = 0;
    protected $result = [];
    public $users_m;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_kinerja_bulanan/laporan_kinerja_bulanan_m');
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
            $lkb = $this->datatable
            ->resource($this->laporan_kinerja_bulanan_m)
            ->view('file')
            ->add_column('lkb_month_name', function($model){
                return $this->general->bln_ind($model->lkb_month);
            })
            ->edit_column('created_at', function($model){
                return $this->general->tgl_ind($model->created_at);
            })
            ->edit_column('updated_at', function($model){
                return $this->general->tgl_ind($model->updated_at);
            })
            ->filter(function($model) {
                if ($year = $this->input->get('year')) {
                    $model->where('laporan_kinerja_bulanan.lkb_year',intval($year));
                }
                if ($month = $this->input->get('month')) {
                    $model->where('laporan_kinerja_bulanan.lkb_month',intval($month));
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
            $lap_bul['success'] = TRUE;
            $lap_bul['message'] = 'Data fetched';
            $this->result = $lkb;
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
            ['field' => 'lkb_year', 'label' => 'Tahun Laporan Kinerja Bulanan', 'rules' => 'required|numeric|min_length[4]|max_length[4]'],
            ['field' => 'lkb_month', 'label' => 'Bulan Laporan Kinerja Bulanan', 'rules' => 'required|numeric']
        ];
        if (empty($_FILES['file']['name']))
            array_push($validations, ['field' => 'file', 'label' => 'File', 'rules' => 'required']);
        $this->form_validation->set_rules($validations);
        if($this->form_validation->run()){
            if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                $lkb_year = $this->input->post('lkb_year');
                $lkb_month = $this->input->post('lkb_month');
                $upload = $this->files->upload_file(date("Y/m/d/H/i/s").'-laporan_kinerja_bulanan-'.$lkb_month.'-'.$lkb_year, './upload/documents/laporan_kinerja_bulanan');
                if ($upload['success']) {
                    $message = $upload['message'];
                    $file = [
                        'file_name' => $message['file_name'],
                        'file_path' => $message['full_path'],
                        'file_download_path' => base_url('api/laporan_kinerja_bulanan/download?path='.base64_encode('./upload/documents/laporan_kinerja_bulanan/'.$message['file_name'])),
                        'file_ext' => $message['file_ext']
                    ];
                    $this->transaction->start();
                    $this->files_m->insert($file);
                    $file_id = $this->files_m->insert_id();
                    $laporan_kinerja_bulanan = [
                        'file_id' => $file_id,
                        'lkb_year' => $lkb_year,
                        'lkb_month' => $lkb_month
                    ];
                    $this->laporan_kinerja_bulanan_m->insert($laporan_kinerja_bulanan);
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
            $laporan_kinerja_bulanan = $this->laporan_kinerja_bulanan_m->view('file')->find($id);
            $this->status = 200;
            $this->result = ['success' => TRUE, 'message' => 'data fetched', 'data' => $laporan_kinerja_bulanan];
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
            ['field' => 'lkb_year', 'label' => 'Tahun Laporan Kinerja Bulanan', 'rules' => 'required|numeric|min_length[4]|max_length[4]'],
            ['field' => 'lkb_month', 'label' => 'Bulan Laporan Kinerja Bulanan', 'rules' => 'required|numeric']
        ];
        $this->form_validation->set_rules($validations);
        if($this->form_validation->run()){
            $this->transaction->start();
            $lkb_year = $this->input->post('lkb_year');
            $lkb_month = $this->input->post('lkb_month');
            $message = [];
            if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                $old = $this->laporan_kinerja_bulanan_m->find($id);
                $old_file = $this->files_m->find($old->file_id);
                $this->load->helper("file");
                unlink($old_file->file_path);
                $upload = $this->files->upload_file(date("Y/m/d/H/i/s").'-laporan_kinerja_bulanan-'.$lkb_month.'-'.$lkb_year, './upload/documents/laporan_kinerja_bulanan');
                $message = $upload['message'];
                $new_file = [
                    'file_name' => $message['file_name'],
                    'file_path' => $message['full_path'],
                    'file_download_path' => base_url('api/laporan_kinerja_bulanan/download?path='.base64_encode('./upload/documents/laporan_kinerja_bulanan/'.$message['file_name'])),
                    'file_ext' => $message['file_ext']
                ];
                $this->files_m->update($old_file->id, $new_file);
            }
            $new_laporan_kinerja_bulanan = [
                'lkb_year' => $lkb_year,
                'lkb_month' => $lkb_month
            ];
            $this->laporan_kinerja_bulanan_m->update($id, $new_laporan_kinerja_bulanan);
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
            $this->laporan_kinerja_bulanan_m->delete($id);
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