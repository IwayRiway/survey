<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        // is_login();
        $this->load->model('Store_model');
        $this->load->model('Region_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Data Store";
        $data['store'] = $this->Store_model->getData();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('store/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['region'] = $this->Region_model->getData();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('store/create', $data);
        $this->load->view('templates/footer');
    }

    public function save()
    {   
        $data = $this->Store_model->save();
        $this->session->set_flashdata('sukses', 'Data Berhasil Simpan');
        redirect('store');
    }

    public function edit($id)
    { 
       $data['store'] = $this->Store_model->getDataById($id);
       $data['region'] = $this->Region_model->getData();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('store/edit', $data);
        $this->load->view('templates/footer');
    }

    
    public function update()
    {   
        $this->Store_model->update();
        $this->session->set_flashdata('info', 'Data Berhasil Diubah');
        redirect('store');
    }
    
    public function delete($id)
    {   
        $this->Store_model->delete($id);
        $this->session->set_flashdata('warning', 'Data Berhasil Dihapus');
        redirect('store');
    }

}