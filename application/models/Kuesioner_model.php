<?php

class Kuesioner_model extends CI_model
{

    public function getData()
    {
        return $this->db->query("SELECT 
                                    a.*, 
                                    COUNT(b.kategori_id) as jumlah 
                                FROM 
                                    kategori a 
                                    LEFT JOIN `kuesioner` b ON a.id = b.kategori_id 
                                GROUP BY 
                                    a.id
                                ")->result_array();
    }

    public function save()
    {
        $kategori_id = $this->input->post('kategori_id');
        $id = $this->input->post('id');
        
        $insert = [];
        for ($i=0; $i < count($id); $i++) { 
            $jawaban = $this->input->post("row_$id[$i]_jawaban");
            $skor = $this->input->post("row_$id[$i]_skor");

            $data = [
                'pertanyaan' => $this->input->post("pertanyaan_$id[$i]"),
                'jawaban' => implode(",",$jawaban),
                'skor' => implode(",",$skor),
                'kategori_id' => $kategori_id,
            ];

            array_push($insert, $data);
        }
        $this->db->insert_batch('kuesioner', $insert);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('kuesioner', ['id'=>$id])->row_array();
    }

    public function update()
    {
        $data = [
            'nama' => $this->input->post('nama'),
        ];

        $this->db->update('kuesioner', $data, ['id'=>$this->input->post('id')]);
    }

    public function delete($id)
    {
        $kuesioner = $this->db->get_where('kuesioner', ['id'=>$id])->row_array();
        $this->db->delete('kuesioner',['id'=>$id]);
    }
}