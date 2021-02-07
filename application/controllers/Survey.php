<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        $this->load->model('Survey_model');
        $this->load->model('Store_model');
        $this->load->model('Supervisor_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
      $data['judul'] = "Data Survey Store";
      $data['survey'] = $this->Survey_model->getDataSpv();

      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('survey/index', $data);
      $this->load->view('templates/footer');
    }

    public function create()
    {
      $data['judul'] = "Data Survey Store";
      // $data['setting'] = $this->db->get('setting')->row_array();
      $data['store'] = $this->Survey_model->getDataStore();
      // $data['supervisor'] = $this->Supervisor_model->getData();

      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('survey/create', $data);
      $this->load->view('templates/footer');
    }

    public function store()
    {
      $data['region'] = $this->Store_model->getDataById($this->input->post('id'));
      $data['tanggal'] = $this->Survey_model->getDataStoreSurvey($this->input->post('id'));
      $data['supervisor'] = $this->Survey_model->getDataSpvByRegion($data['region']['region_id']);
      echo json_encode($data);
    }

    public function saveStoreSurvey()
    {
      $data = $this->Survey_model->saveStoreSurvey();

      if($data == 200){
        $this->session->set_flashdata('sukses', 'Data Berhasil Disimpan');
        redirect('survey');
      } else {
          $this->session->set_flashdata('gagal', $data);
          redirect($_SERVER['HTTP_REFERER']);
      }
    }

    public function delete($id)
    {   
        $this->Survey_model->delete($id);
        $this->session->set_flashdata('warning', 'Data Berhasil Dihapus');
        redirect('survey');
    }

    
}