<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surveyshp extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        is_login2();
        $this->load->model('Kuesioner_model');
        $this->load->model('Kategori_model');
        $this->load->model('Survey_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
      $data['judul'] = "Data Survey Store";
      $data['survey'] = $this->Survey_model->getDataSpvById();

      $this->load->view('templates/header2');
      $this->load->view('templates/sidebar2');
      $this->load->view('shp/survey/index', $data);
      $this->load->view('templates/footer');
    }

    public function create()
    {
      $data['store'] = $this->Survey_model->getDataStoreByRegion(); //karena masi supervisor aja

      $this->load->view('templates/header2');
      $this->load->view('templates/sidebar');
      $this->load->view('shp/survey/create', $data);
      $this->load->view('templates/footer');
    }

    public function saveStoreSurveyUser()
    {
      $data = $this->Survey_model->saveStoreSurveyUser();

      if($data == 200){
        $this->session->set_flashdata('sukses', 'Data Berhasil Disimpan');
        redirect('surveyshp');
      } else {
          $this->session->set_flashdata('gagal', $data);
          redirect($_SERVER['HTTP_REFERER']);
      }
    }

    public function survey($id)
    {
      // $id = id table store_survey
      $data['store'] = $this->Survey_model->getDataStoreByid($id);
      $data['id'] = $id;

      $this->load->view('templates/header2');
      $this->load->view('templates/sidebar2');
      $this->load->view('shp/survey/survey', $data);
      $this->load->view('templates/footer');
    }

    public function save()
    {
         $data = $this->Survey_model->save();
         $id = $this->input->post('id'); // id table store_survey

         if($data == 200){
            $this->session->set_flashdata('sukses', 'Data Berhasil Simpan');
            redirect('surveyshp/kuesioner/' . $id);
         } else {
            $this->session->set_flashdata('gagal', 'Lokasi anda Lebih Dari 500m dari store');
            redirect('surveyshp/survey/' . $id);
         }
    }

    public function kuesioner($id)
    {
      $data['store_survey'] = $id; //id dari table store_survey

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

      $this->load->view('templates/header2');
      $this->load->view('templates/sidebar2');
      $this->load->view('shp/survey/kuesioner', $data);
      $this->load->view('templates/footer');
    }

    public function saveKuesioner()
    {
        $id = $this->input->post('id'); //id dari table store_survey

        $this->Survey_model->saveKuesioner();
        $this->Survey_model->report($id);

        $survey = $this->Survey_model->getSurvey($id);
        $report = $this->Survey_model->getReport($id);

        // var_dump($survey);
        // var_dump($report);
        // die;

        $data['file'] = $report[0]['file'];
        $data['nama'] = $survey['nama'];
        $data['hp'] = $survey['hp'];;
        $data['email'] = $survey['email'];;
        $data['toko'] = $survey['toko'];
        $data['region'] = $survey['region'];
        $data['manager'] = $survey['manager'];
        $data['alamat'] = $survey['alamat'];
        $data['tgl_survey'] = $survey['tanggal_survey'];
        $data['persentase'] = $report[0]['persentase'];
        $data['detail'] = $report;

        $dataEmail['email'] = 'riway.restu@gmail.com';
        $dataEmail['nama'] = $data['toko'];
        $dataEmail['region'] = $data['region'];
        $dataEmail['manager'] = $data['manager'];
        $dataEmail['alamat'] = $data['alamat'];
        $dataEmail['tgl_survey'] = $data['tgl_survey'];
        $dataEmail['persentase'] = $data['persentase'];
        $dataEmail['file'] = $data['file'] . '.pdf';

        $this->_mypdf($data);
        send_mail($dataEmail);

        $this->session->set_flashdata('sukses', 'Data Berhasil Simpan');
        redirect('surveyshp');
    }

    private function _mypdf($data){
      $this->load->library('pdfgenerator');
      $file_pdf = $data['file'];
      $paper = 'A4';
      $orientation = "portrait";
      $html = $this->load->view('laporan_pdf',$data, true);	    
      $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
 }
}