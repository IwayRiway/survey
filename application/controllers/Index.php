<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
    }

	public function index()
	{
		$this->load->view('auth/index');
    }

    public function login(){

        $username = $this->input->post('username');

        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $user = $this->db->get_where('supervisor', ['email'=>$this->input->post('username')])->row_array();
        } else {
            // $user = $this->db->get_where('karyawan', ['username'=>$this->input->post('username')])->row_array();
        }

        if($user){
            if(password_verify($this->input->post('password'), $user['password'])){
                $data =  [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'nama' => $user['nama'],
                    'is_spv' => 1,
                ];
                $this->session->set_userdata($data);
                redirect('surveyshp');
            } else {
                $this->session->set_flashdata('gagal', 'Password Anda Salah');
                redirect('index');
            }
            
        } else {
            $this->session->set_flashdata('warning', 'Username Tidak Ditemukan');
            redirect('index');
        }

        
    }

        public function logout(){
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('nama');
            $this->session->unset_userdata('is_spv');
        
            redirect('index');
        }
}

