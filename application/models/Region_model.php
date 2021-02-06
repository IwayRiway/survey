<?php

class Region_model extends CI_model
{

    public function getData()
    {
        return $this->db->query("SELECT a.*, b.nama as supervisor FROM region a LEFT JOIN supervisor b ON a.supervisor_id = b.id")->result_array();
    }

    public function getDataSupervisor()
    {
        return $this->db->query("SELECT 
                                    * 
                                FROM 
                                    supervisor 
                                WHERE 
                                    NOT EXISTS (
                                    SELECT 
                                        1 
                                    FROM 
                                        region 
                                    WHERE 
                                        region.supervisor_id = supervisor.id
                                    )")->result_array();
    }

    public function save()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'supervisor_id' => $this->input->post('supervisor_id'),
        ];

        $this->db->insert('region', $data);
    }

    public function getDataById($id)
    {
        return $this->db->query("SELECT a.*, b.nama as supervisor FROM region a LEFT JOIN supervisor b ON a.supervisor_id = b.id WHERE a.id = $id")->row_array();
    }

    public function update()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'supervisor_id' => $this->input->post('supervisor_id'),
        ];

        $this->db->update('region', $data, ['id'=>$this->input->post('id')]);
    }

    public function delete($id)
    {
        $region = $this->db->get_where('region', ['id'=>$id])->row_array();
        $this->db->delete('region',['id'=>$id]);
    }
}