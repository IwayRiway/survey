<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        $this->load->model('Kuesioner_model');
        $this->load->model('Kategori_model');
        $this->load->model('Survey_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
      $data['judul'] = "Data Survey Store";

      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('survey/index', $data);
      $this->load->view('templates/footer');
    }

    public function survey($id)
    {
      $data['store'] = 1;

      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('survey/survey', $data);
      $this->load->view('templates/footer');
    }

    public function save()
    {
         $data = $this->Survey_model->save();
         $id = $this->input->post('id');

         if($data == 200){
            $this->session->set_flashdata('sukses', 'Data Berhasil Simpan');
            redirect('shp/survey/kuesioner/' . $id);
         } else {
            $this->session->set_flashdata('gagal', 'Lokasi anda Lebih dari 20m dari store');
            redirect('shp/survey/survey/' . $id);
         }
    }

    public function kuesioner($id)
    {
      $data['store_survey'] = $id;

      $kategori = $this->Kategori_model->getData();
      $raw = [];
        foreach ($kategori as $key => $kt) {
            $kuesioner = [];
            $pertanyaan = $this->Kuesioner_model->getDataByKategori($kt['id']);

            foreach ($pertanyaan as $key => $db) {
               $pilihan = $this->Kuesioner_model->getPilihan($db['id']);
               $kuesioner[$db['pertanyaan']] = $pilihan;
            }

            $raw[$kt['nama']] = $kuesioner;
        }

        $data['data'] = $raw;

      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('survey/kuesioner', $data);
      $this->load->view('templates/footer');
    }
}