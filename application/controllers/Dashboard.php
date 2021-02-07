<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Dashboard_model');
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data['judul'] = "Dashboard";

        $data['total'] = $this->Dashboard_model->getAllData();
        $data['selesai'] = $this->Dashboard_model->getAllDataSelesai();
        $data['satu'] = $this->Dashboard_model->getAllDataSurvey1();
        $data['dua'] = $this->Dashboard_model->getAllDataSurvey2();

        $data['setting'] = $this->db->get('setting')->row_array();

        $store = $this->Dashboard_model->getStore();
        $raw = [];
        foreach ($store as $key => $db) {
            $persentase = $db['persentase'];
            $nama = $db['nama'];
            $detail = $this->Dashboard_model->reportDetail($db['store_id']);

            $array = ['persentase' => $persentase, 'nama' => $nama, 'detail' => $detail];
            array_push($raw, $array);
        }

        $data['store'] = $raw;
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }

    public function getDataStore()
    {
        $data = $this->Dashboard_model->getDataStore();
        $store = [];
        $persentase = [];

        foreach ($data as $key => $db) {
            array_push($store, $db['nama']);
            array_push($persentase, str_replace(",",".",$db['persentase']));
        }

        $json = ['persentase'=>$persentase,'store'=>$store];
        echo json_encode($json);
    }

    public function getDataRegion()
    {
        $data = $this->Dashboard_model->getDataRegion();
        $store = [];
        $persentase = [];

        foreach ($data as $key => $db) {
            array_push($store, $db['nama']);
            array_push($persentase, $db['persentase']);
        }

        $json = ['persentase'=>$persentase,'region'=>$store];
        echo json_encode($json);
    }
}

