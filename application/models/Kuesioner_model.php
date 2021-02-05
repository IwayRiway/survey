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
        
        $insertPilihan = [];
        for ($i=0; $i < count($id); $i++) { 
            $jawaban = $this->input->post("row_$id[$i]_jawaban");
            $skor = $this->input->post("row_$id[$i]_skor");

            $insert = [
                'pertanyaan' => $this->input->post("pertanyaan_$id[$i]"),
                'kategori_id' => $kategori_id,
            ];
            $this->db->insert('kuesioner', $insert);
            $last_id = $this->db->insert_id();
            for ($j=0; $j < count($jawaban); $j++) { 
                $data = [
                    'jawaban' => $jawaban[$j],
                    'skor' => $skor[$j],
                    'pertanyaan_id' => $last_id,
                ];
                array_push($insertPilihan, $data);
            }

        }
        $this->db->insert_batch('pilihan', $insertPilihan);
    }

    public function getDataByKategori($kategori_id)
    {
        return $this->db->get_where('kuesioner', ['kategori_id'=>$kategori_id])->result_array();
    }

    public function getPilihan($id)
    {
        return $this->db->get_where('pilihan', ['pertanyaan_id'=>$id])->result_array();
    }

    // public function getDataById($id)
    // {
    //     return $this->db->get_where('kuesioner', ['id'=>$id])->row_array();
    // }

    public function update()
    {
        if ($this->input->post('tipe')==1){
            $data = [
                'pertanyaan' => $this->input->post('pertanyaan'),
            ];

            $this->db->update('kuesioner', $data, ['id'=>$this->input->post('id')]);
        } else {
            $data = [
                'jawaban' => $this->input->post('jawaban'),
                'skor' => $this->input->post('skor'),
            ];

            $this->db->update('pilihan', $data, ['id'=>$this->input->post('id')]);
        }
        
        return 200;
    }

    public function pilihan()
    {
        if($this->input->post('jawaban')!=null AND $this->input->post('skor')!=null){
            $data = [
                'jawaban' => $this->input->post('jawaban'),
                'skor' => $this->input->post('skor'),
                'pertanyaan_id' => $this->input->post('id'),
            ];
    
            $this->db->insert('pilihan', $data);
        }
        
        return 200;
    }

    public function hapusJawaban()
    {
        $this->db->delete('pilihan',['id'=>$this->input->post('id')]);
    }

    public function delete()
    {
        $this->db->delete('pilihan',['pertanyaan_id'=>$this->input->post('id')]);
        $this->db->delete('kuesioner',['id'=>$this->input->post('id')]);
    }

    public function deleteAll($id)
    {
        $pertanyaan = $this->db->get_where('kuesioner',['kategori_id'=>$id])->result_array();
        foreach ($pertanyaan as $key => $db) {
            $this->db->delete('pilihan',['pertanyaan_id'=>$db['id']]);
        }
        $this->db->delete('kuesioner',['kategori_id'=>$id]);
    }
}