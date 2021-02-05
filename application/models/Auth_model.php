<?php

class Auth_model extends CI_model
{

    public function save()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'department_id' => $this->input->post('department_id'),
            'jabatan_id' => null,
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'),PASSWORD_BCRYPT)
        ];

        $this->db->insert('karyawan', $data);

    }
}