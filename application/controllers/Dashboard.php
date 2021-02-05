<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Pengajuan_model');
        $this->load->model('Lembur_model');
        $this->load->model('Cuti_model');
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data['judul'] = "Dashboard";
        
        // FOR HRD
        if($this->session->userdata('department_id')==10){
            $data['total_pkb'] = count($this->Pengajuan_model->getDataPengajuanTotal());
            $data['pengajuan_pkb'] = count($this->Pengajuan_model->getDataPengajuan());
            $data['acc_pkb'] = count($this->Pengajuan_model->getDataPengajuanAcc());
            $data['dc_pkb'] = count($this->Pengajuan_model->getDataPengajuanDc());
        }

        // FOR MANAGER
        if($this->session->userdata('jabatan_id')==3){
            $data['total_l'] = count($this->Lembur_model->getDataPengajuanTotal());
            $data['pengajuan_l'] = count($this->Lembur_model->getDataPengajuan());
            $data['acc_l'] = count($this->Lembur_model->getDataPengajuanAcc());
            $data['dc_l'] = count($this->Lembur_model->getDataPengajuanDc());

            $data['total_c'] = count($this->Cuti_model->getDataPengajuanTotal());
            $data['pengajuan_c'] = count($this->Cuti_model->getDataPengajuan());
            $data['acc_c'] = count($this->Cuti_model->getDataPengajuanAcc());
            $data['dc_c'] = count($this->Cuti_model->getDataPengajuanDc());

            $data['total_pkb_m'] = $this->Pengajuan_model->getDataPengajuanTotalManager();
            $data['pengajuan_pkb_m'] = $this->Pengajuan_model->getDataPengajuanManager();
            $data['acc_pkb_m'] = $this->Pengajuan_model->getDataPengajuanAccManager();
            $data['dc_pkb_m'] = $this->Pengajuan_model->getDataPengajuanDcManager();
        }

        // FOR ALL
        $data['total_ls'] = $this->Lembur_model->getDataPengajuanTotalBySession();
        $data['pengajuan_ls'] = $this->Lembur_model->getDataPengajuanBySession();
        $data['acc_ls'] = $this->Lembur_model->getDataPengajuanAccBySession();
        $data['dc_ls'] = $this->Lembur_model->getDataPengajuanDcBySession();

        $data['total_cs'] = $this->Cuti_model->getDataPengajuanTotalBySession();
        $data['pengajuan_cs'] = $this->Cuti_model->getDataPengajuanBySession();
        $data['acc_cs'] = $this->Cuti_model->getDataPengajuanAccBySession();
        $data['dc_cs'] = $this->Cuti_model->getDataPengajuanDcBySession();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }
}

