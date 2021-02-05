<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('Department_model');
        $this->load->library('form_validation');
    }

	public function index()
	{
		$this->load->view('auth/index');
    }

    public function login(){

        $username = $this->input->post('username');

        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $user = $this->db->get_where('karyawan', ['email'=>$this->input->post('username')])->row_array();
        } else {
            $user = $this->db->get_where('karyawan', ['username'=>$this->input->post('username')])->row_array();
        }

        if($user){
            if(password_verify($this->input->post('password'), $user['password'])){
                $data =  [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'username' => $user['username'],
                    'nama' => $user['nama'],
                    'jabatan_id' => $user['jabatan_id'],
                    'department_id' => $user['department_id'],
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('gagal', 'Password Anda Salah');
                redirect('auth');
            }
            
        } else {
            $this->session->set_flashdata('warning', 'Username Tidak Ditemukan');
            redirect('auth');
        }

        
    }

        public function logout(){
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('nama');
            $this->session->unset_userdata('jabatan_id');
            $this->session->unset_userdata('department_id');
        
            redirect('auth');
        }

        public function signup()
        {
            $data['department'] = $this->Department_model->getDepartment();

            $this->load->view('auth/signup', $data);
        }

        public function save()
        {
            $this->Auth_model->save();
            $this->session->set_flashdata('sukses', 'Data Berhasil Simpan');
            redirect('auth');
        }

        public function send_mail()
{
    $this->load->view('templates/thank');
}
    }

