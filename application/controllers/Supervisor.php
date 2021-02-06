<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        // is_login();
        $this->load->model('Supervisor_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Data Supervisor";
        $data['supervisor'] = $this->Supervisor_model->getData();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/create');
        $this->load->view('templates/footer');
    }

    public function save()
    {   
        $data = $this->Supervisor_model->save();
        $this->session->set_flashdata('sukses', 'Data Berhasil Simpan');
        redirect('supervisor');
    }

    public function edit($id)
    { 
       $data['supervisor'] = $this->Supervisor_model->getDataById($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/edit', $data);
        $this->load->view('templates/footer');
    }

    
    public function update()
    {   
        $this->Supervisor_model->update();
        $this->session->set_flashdata('info', 'Data Berhasil Diubah');
        redirect('supervisor');
    }
    
    public function delete($id)
    {   
        $this->Supervisor_model->delete($id);
        $this->session->set_flashdata('warning', 'Data Berhasil Dihapus');
        redirect('supervisor');
    }

}