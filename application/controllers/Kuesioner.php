<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuesioner extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        // is_login();
        $this->load->model('Kuesioner_model');
        $this->load->model('Kategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Data Kuesioner";
        $data['kuesioner'] = $this->Kuesioner_model->getData();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kuesioner/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['kategori'] = $this->Kategori_model->getData();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kuesioner/create', $data);
        $this->load->view('templates/footer');
    }

    public function save()
    {   
        $data = $this->Kuesioner_model->save();
        $this->session->set_flashdata('sukses', 'Data Berhasil Simpan');
        redirect('kuesioner');
    }

    public function edit($id)
    { 
       $data['kuesioner'] = $this->Kuesioner_model->getDataById($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kuesioner/edit', $data);
        $this->load->view('templates/footer');
    }

    
    public function update()
    {   
        $this->Kuesioner_model->update();
        $this->session->set_flashdata('info', 'Data Berhasil Diubah');
        redirect('kuesioner');
    }
    
    public function delete($id)
    {   
        $this->Kuesioner_model->delete($id);
        $this->session->set_flashdata('warning', 'Data Berhasil Dihapus');
        redirect('kuesioner');
    }

}