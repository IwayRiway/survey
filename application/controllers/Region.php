<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Region extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Region_model');
        $this->load->model('Supervisor_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Data Region";
        $data['region'] = $this->Region_model->getData();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('region/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        // $data['supervisor'] = $this->Supervisor_model->getData();
        $data['supervisor'] = $this->Region_model->getDataSupervisor();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('region/create', $data);
        $this->load->view('templates/footer');
    }

    public function save()
    {   
        $data = $this->Region_model->save();
        $this->session->set_flashdata('sukses', 'Data Berhasil Simpan');
        redirect('region');
    }

    public function edit($id)
    { 
       $data['region'] = $this->Region_model->getDataById($id);
       // $data['supervisor'] = $this->Supervisor_model->getData();
       $data['supervisor'] = $this->Region_model->getDataSupervisor();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('region/edit', $data);
        $this->load->view('templates/footer');
    }

    
    public function update()
    {   
        $this->Region_model->update();
        $this->session->set_flashdata('info', 'Data Berhasil Diubah');
        redirect('region');
    }
    
    public function delete($id)
    {   
        $this->Region_model->delete($id);
        $this->session->set_flashdata('warning', 'Data Berhasil Dihapus');
        redirect('region');
    }

}