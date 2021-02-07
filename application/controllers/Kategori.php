<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Kategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Data Kategori";
        $data['kategori'] = $this->Kategori_model->getData();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kategori/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kategori/create');
        $this->load->view('templates/footer');
    }

    public function save()
    {   
        $data = $this->Kategori_model->save();
        $this->session->set_flashdata('sukses', 'Data Berhasil Simpan');
        redirect('kategori');
    }

    public function edit($id)
    { 
       $data['kategori'] = $this->Kategori_model->getDataById($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kategori/edit', $data);
        $this->load->view('templates/footer');
    }

    
    public function update()
    {   
        $this->Kategori_model->update();
        $this->session->set_flashdata('info', 'Data Berhasil Diubah');
        redirect('kategori');
    }
    
    public function delete($id)
    {   
        $this->Kategori_model->delete($id);
        $this->session->set_flashdata('warning', 'Data Berhasil Dihapus');
        redirect('kategori');
    }

}