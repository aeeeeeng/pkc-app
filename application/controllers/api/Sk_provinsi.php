<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sk_provinsi extends PKCC_Controller {

    protected $status = 0;
    protected $result = [];
    public $users_m;    

    public function __construct()
    {
        parent::__construct();
        $this->load->model('sk_provinsi/sk_provinsi_m');
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
            $skp = $this->datatable
            ->resource($this->sk_provinsi_m)
            ->view('file')
            ->edit_column('created_at', function($model){
                return $this->general->tgl_ind($model->created_at);
            })
            ->edit_column('updated_at', function($model){
                return $this->general->tgl_ind($model->updated_at);
            })
            ->filter(function($model){
                if($year = $this->input->get('year')) {
                    $model->where('sk_provinsi.sp_year', intval($year));   
                }
                if($number = $this->input->get('sp_number')) {
                    $model->like('sk_provinsi.sp_number', $number);   
                }
            })
            ->custom_sort(function($model){
                if($sort_by = $this->input->get('sort_by') && $sort_type = $this->input->get('sort_type')) {
                    $data_sort = explode(",", $this->input->get('sort_by'));
                    foreach($data_sort as $data) {
                        $model->order_by($data, $sort_type);
                    }
                }
            })->generate(TRUE);
            $this->status = 200;
            $skp['success'] = TRUE;
            $skp['message'] = 'Data fetched';
            $this->result = $skp;
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
        $this->load->helper('download');
        $path = $this->input->get('path');
        $name = $this->input->get('name');
        $real_path = base64_decode($path);
        $real_name = base64_decode($name);
        $files = $this->files_m->where('file_name', $real_name)->first();
        $download_sftp_file = $this->general->download_sftp($files->file_path, $real_path);
        $new_real_path = str_replace("./", "", $real_path);
        $path_delete = FCPATH.$new_real_path;
        if($download_sftp_file) {
            $file_content = file_get_contents($path_delete);
            if(file_exists($path_delete)){
                unlink($path_delete);
            }
            force_download($real_name, $file_content);
        } else {
            show_404();
        }
    }

    public function store()
    {
        $this->is_POST();
        $this->auth->user();
        $this->load->library('form_validation');
        $validations = [
            ['field' => 'sp_number', 'label' => 'Nomor SK Provinsi', 'rules' => 'required'],
            ['field' => 'sp_year', 'label' => 'Tahun SK Provinsi', 'rules' => 'required|numeric'],
            ['field' => 'sp_region', 'label' => 'Daerah SK Provinsi', 'rules' => 'required'],
            ['field' => 'sp_total_urea', 'label' => 'Total Urea', 'rules' => 'required|numeric'],
            ['field' => 'sp_total_npk', 'label' => 'Total NPK', 'rules' => 'required|numeric'],
            ['field' => 'sp_total_organik', 'label' => 'Total Organik', 'rules' => 'required|numeric'],
        ];
        if (empty($_FILES['file']['name']))
            array_push($validations, ['field' => 'file', 'label' => 'File', 'rules' => 'required']);
        $this->form_validation->set_rules($validations);
        if($this->form_validation->run()) {
            if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                $sp_number = $this->input->post('sp_number');
                $sp_year = $this->input->post('sp_year');
                $sp_region = $this->input->post('sp_region');
                $sp_total_urea = $this->input->post('sp_total_urea');
                $sp_total_npk = $this->input->post('sp_total_npk');
                $sp_total_organik = $this->input->post('sp_total_organik');
                $upload = $this->files->upload_file(date("Y/m/d/H/i/s").'-SK-PROVINSI-'.$sp_number.'-'.$sp_year, './upload/documents/sk_provinsi');   
                if ($upload['success']) {

                    $message = $upload['message'];
                    $target_add = 'sk_provinsi/'.$message['file_name'];
                    $sftp_file = $this->general->move_sftp($message, $target_add);

                    $file = [
                        'file_name' => $message['file_name'],
                        'file_path' => $sftp_file,
                        'file_download_path' => base_url('api/sk_provinsi/download?path='.base64_encode('./upload/documents/sk_provinsi/'.$message['file_name']).'&name='.base64_encode($message['file_name'])),
                        'file_ext' => $message['file_ext']
                    ];
                    $this->transaction->start();
                    $this->files_m->insert($file);
                    $file_id = $this->files_m->insert_id();
                    $skp = [
                        'file_id' => $file_id,
                        'sp_number' => $sp_number,
                        'sp_year' => $sp_year,
                        'sp_region' => $sp_region,
                        'sp_total_urea' => $sp_total_urea,
                        'sp_total_npk' => $sp_total_npk,
                        'sp_total_organik' => $sp_total_organik
                    ];
                    $this->sk_provinsi_m->insert($skp);
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
            $skp = $this->sk_provinsi_m->view('file')->find($id);
            $this->status = 200;
            $this->result = ['success' => TRUE, 'message' => 'data fetched', 'data' => $skp];
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
            ['field' => 'sp_number', 'label' => 'Nomor SK Provinsi', 'rules' => 'required'],
            ['field' => 'sp_year', 'label' => 'Tahun SK Provinsi', 'rules' => 'required|numeric'],
            ['field' => 'sp_region', 'label' => 'Daerah SK Provinsi', 'rules' => 'required'],
            ['field' => 'sp_total_urea', 'label' => 'Total Urea', 'rules' => 'required|numeric'],
            ['field' => 'sp_total_npk', 'label' => 'Total NPK', 'rules' => 'required|numeric'],
            ['field' => 'sp_total_organik', 'label' => 'Total Organik', 'rules' => 'required|numeric'],
        ];
        $this->form_validation->set_rules($validations);
        if($this->form_validation->run()){
            $this->transaction->start();
            $sp_number = $this->input->post('sp_number');
            $sp_year = $this->input->post('sp_year');
            $sp_region = $this->input->post('sp_region');
            $sp_total_urea = $this->input->post('sp_total_urea');
            $sp_total_npk = $this->input->post('sp_total_npk');
            $sp_total_organik = $this->input->post('sp_total_organik');
            $message = [];
            if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                $old_skp = $this->sk_provinsi_m->find($id);
                $old_file = $this->files_m->find($old_skp->file_id);
                $this->load->helper("file");
                $this->general->delete_sftp($old_file->file_path);
                $upload = $this->files->upload_file(date("Y/m/d/H/i/s").'-SK-PROVINSI-'.$sp_number.'-'.$sp_year, './upload/documents/sk_provinsi');   
                $message = $upload['message'];
                $target_add = 'sk_provinsi/'.$message['file_name'];
                $sftp_file = $this->general->move_sftp($message, $target_add);
                $new_file = [
                    'file_name' => $message['file_name'],
                    'file_path' => $sftp_file,
                    'file_download_path' => base_url('api/sk_provinsi/download?path='.base64_encode('./upload/documents/sk_provinsi/'.$message['file_name']).'&name='.base64_encode($message['file_name'])),
                    'file_ext' => $message['file_ext']
                ];
                $this->files_m->update($old_file->id, $new_file);
            }
            $new_skp = [
                'sp_number' => $sp_number,
                'sp_year' => $sp_year,
                'sp_region' => $sp_region,
                'sp_total_urea' => $sp_total_urea,
                'sp_total_npk' => $sp_total_npk,
                'sp_total_organik' => $sp_total_organik
            ];
            $this->sk_provinsi_m->update($id, $new_skp);
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
            $sp = $this->sk_provinsi_m->find($id);
            $file = $this->files_m->find($sp->file_id);
            $this->general->delete_sftp($file->file_path);
            $this->files_m->delete($file->id);
            $this->sk_provinsi_m->delete($id);
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