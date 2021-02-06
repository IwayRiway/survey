<?php

class Supervisor_model extends CI_model
{

    public function getData()
    {
        return $this->db->get('supervisor')->result_array();
    }

    public function save()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'hp' => $this->input->post('hp'),
            'password' => password_hash($this->input->post('hp'),PASSWORD_BCRYPT)
        ];

        $this->db->insert('supervisor', $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('supervisor', ['id'=>$id])->row_array();
    }

    public function update()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'hp' => $this->input->post('hp'),
        ];

        $this->db->update('supervisor', $data, ['id'=>$this->input->post('id')]);
    }

    public function delete($id)
    {
        $supervisor = $this->db->get_where('supervisor', ['id'=>$id])->row_array();
        $this->db->delete('supervisor',['id'=>$id]);
    }
}