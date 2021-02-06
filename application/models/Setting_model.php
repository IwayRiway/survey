<?php

class Setting_model extends CI_model
{

    public function getData()
    {
        return $this->db->get('setting')->row_array();
    }

    public function update()
    {
        $data = [
            'maks_perhari' => $this->input->post('maks_perhari'),
            'maks_perbulan' => $this->input->post('maks_perbulan'),
            'maks_survey' => $this->input->post('maks_survey'),
        ];

        $this->db->update('setting', $data, ['id'=>$this->input->post('id')]);
    }
}