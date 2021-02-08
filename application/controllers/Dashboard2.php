<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard2 extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        is_login2();
        $this->load->model('Dashboard_model');
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data['judul'] = "Dashboard";

        $region_id = $this->db->get_where('region', ['supervisor_id' => $this->session->userdata('id')])->row_array();
        
        $data['total'] = $this->Dashboard_model->getAllDataByRegion($region_id['id']);
        $data['selesai'] = $this->Dashboard_model->getAllDataSelesaiByRegion($region_id['id']);
        $data['satu'] = $this->Dashboard_model->getAllDataSurvey1ByRegion($region_id['id']);
        $data['dua'] = $this->Dashboard_model->getAllDataSurvey2ByRegion($region_id['id']);

        $data['setting'] = $this->db->get('setting')->row_array();

        $store = $this->Dashboard_model->getStoreByRegion($region_id['id']);
        $raw = [];
        foreach ($store as $key => $db) {
            $persentase = $db['persentase'];
            $nama = $db['nama'];
            $detail = $this->Dashboard_model->reportDetail($db['store_id']);

            $array = ['persentase' => $persentase, 'nama' => $nama, 'detail' => $detail];
            array_push($raw, $array);
        }

        $data['store'] = $raw;
        
        $this->load->view('templates/header2');
        $this->load->view('templates/sidebar2');
        $this->load->view('shp/dashboard/index', $data);
        $this->load->view('templates/footer');
    }

    public function getDataStoreByRegion()
    {
        $region_id = $this->db->get_where('region', ['supervisor_id' => $this->session->userdata('id')])->row_array();

        $data = $this->Dashboard_model->getDataStoreByRegion($region_id['id']);
        $store = [];
        $persentase = [];

        foreach ($data as $key => $db) {
            array_push($store, $db['nama']);
            array_push($persentase, str_replace(",",".",$db['persentase']));
        }

        $json = ['persentase'=>$persentase,'store'=>$store];
        echo json_encode($json);
    }
}

