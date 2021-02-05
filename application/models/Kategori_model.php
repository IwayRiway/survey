<?php

class Kategori_model extends CI_model
{

    public function getData()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function save()
    {
        $data = [
            'nama' => $this->input->post('nama'),
        ];

        $this->db->insert('kategori', $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('kategori', ['id'=>$id])->row_array();
    }

    public function update()
    {
        $data = [
            'nama' => $this->input->post('nama'),
        ];

        $this->db->update('kategori', $data, ['id'=>$this->input->post('id')]);
    }

    public function delete($id)
    {
        $kategori = $this->db->get_where('kategori', ['id'=>$id])->row_array();
        $this->db->delete('kategori',['id'=>$id]);
    }
}