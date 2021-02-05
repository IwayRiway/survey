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

    public function detail($kategori_id)
    {
        $pertanyaan = $this->Kuesioner_model->getDataByKategori($kategori_id);
        $raw = [];
        foreach ($pertanyaan as $key => $db) {
            $pilihan = $this->Kuesioner_model->getPilihan($db['id']);
            $raw[$db['pertanyaan']] = $pilihan;
        }

        $data['data'] = $raw;
        $data['kategori'] = $this->Kategori_model->getDataById($kategori_id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kuesioner/detail', $data);
        $this->load->view('templates/footer');
    }

    public function edit($kategori_id)
    { 
        $pertanyaan = $this->Kuesioner_model->getDataByKategori($kategori_id);
        $raw = [];
        foreach ($pertanyaan as $key => $db) {
            $pilihan = $this->Kuesioner_model->getPilihan($db['id']);
            $raw[$db['pertanyaan']] = $pilihan;
        }

        $data['data'] = $raw;
        $data['id'] = $kategori_id;
        $data['kategori'] = $this->Kategori_model->getData();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kuesioner/edit', $data);
        $this->load->view('templates/footer');
    }

    
    public function update()
    {   
        $data = $this->Kuesioner_model->update();
        echo json_decode($data);
    }
    
    public function pilihan()
    {   
        $data = $this->Kuesioner_model->pilihan();
        echo json_decode($data);
    }
    
    public function hapusJawaban()
    {   
        $this->Kuesioner_model->hapusJawaban();
        echo json_decode(200);
    }
    
    public function delete()
    {   
        $this->Kuesioner_model->delete();
        echo json_decode(200);
    }

    public function deleteAll($id)
    {   
        $this->Kuesioner_model->deleteAll($id);
        $this->session->set_flashdata('warning', 'Data Berhasil Dihapus');
        redirect('kuesioner');
    }
}