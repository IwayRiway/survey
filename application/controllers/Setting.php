<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Setting_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Data Setting";
        $data['setting'] = $this->Setting_model->getData();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('setting/index', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {   
        $this->Setting_model->update();
        $this->session->set_flashdata('info', 'Data Berhasil Diubah');
        redirect('setting');
    }

}