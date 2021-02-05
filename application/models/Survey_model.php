<?php

class Survey_model extends CI_model
{

    private function _getDistanceBetweenPoints($lat1, $lon1, $lat2, $lon2) {
        $theta = $lon1 - $lon2;
        $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);
        $miles = $miles * 60 * 1.1515;
        $feet = $miles * 5280;
        $yards = $feet / 3;
        $kilometers = $miles * 1.609344;
        $meters = $kilometers * 1000;
        // return compact('miles','feet','yards','kilometers','meters'); 
        return $meters;
    }

    public function save()
    {
        // GET LOT LAIN STORE

        $meter = $this->_getDistanceBetweenPoints($data[0], $data[1], $this->input->post('latitude'), $this->input->post('longitude'));

        if($meter <= 20){
            $img1 = $_FILES['file']['name'];
            if($img1){
                $config['upload_path']          = './assets/image/survey';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload', $config);
                if($this->upload->do_upload('file')) {
                    $img = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            
            $data = [
                'lokasi' => $this->input->post('latitude') . ',' . $this->input->post('longitude'),
                'surveyed' => 1,
                'kuesioner' => 0,
                'poto' => $img,
                'tanggal_survey' => date('Y-m-d')
            ];
    
            $this->db->insert('kategori', $data);
            return 200;
        } else {
            return 400;
        }
    }

    public function saveKuesioner()
    {
        $id = $this->input->post('pertanyaan_id');

        $insert = [];
        for ($i=0; $i < count($id); $i++) { 
            $jawaban = explode("|", $this->input->post("value$id[$i]"));

            $data = [
                'pilihan_id' => $jawaban[0],
                'skor' => $jawaban[1],
                'store_survey_id' =>$this->input->post("id"),
            ];

            array_push($insert, $data);
        }

        $this->db->insert_batch('jawaban',$insert);
    }

    public function report($id)
    {
        $total = $this->db->query("SELECT SUM(skor) AS total FROM (SELECT MAX(skor) as skor FROM pilihan GROUP BY pertanyaan_id) t")->row_array();

        $skor = $this->db->query("SELECT SUM(skor) AS skor FROM jawaban WHERE store_survey_id = 1")->row_array();
        
        $data = [
            'survey_store_id' => $id,
            'skor' => $skor['skor'],
            'total' => $total['total'],
            'persentase' => number_format((($skor['skor'] / $total['total'])*100), 2, ",", ""),
        ];
        $this->db->insert('report', $data);

        $last_id = $this->db->insert_id();
        $this->_reportDetail($last_id);
    }

    private function _reportDetail($id){
        
        $jawaban = $this->db->query("SELECT 
                                        a.*, 
                                        b.pertanyaan_id, 
                                        c.kategori_id, 
                                        SUM(a.skor) as skor 
                                    FROM 
                                        jawaban a 
                                        JOIN pilihan b ON a.pilihan_id = b.id 
                                        JOIN kuesioner c ON b.pertanyaan_id = c.id 
                                    GROUP BY 
                                        c.kategori_id
                                    ")->result_array();
        
        $insert = [];
        foreach ($jawaban as $key => $db) {
            $total = $this->db->query("SELECT 
                                            *, 
                                            SUM(skor) as total 
                                        FROM 
                                            (
                                            SELECT 
                                                a.*, 
                                                MAX(b.skor) as skor 
                                            FROM 
                                                kuesioner a 
                                                JOIN pilihan b ON a.id = b.pertanyaan_id 
                                            GROUP BY 
                                                a.id
                                            ) t 
                                        WHERE 
                                            kategori_id = $db[kategori_id]
                                        GROUP BY 
                                            kategori_id
                                        ")->row_array();
            
            $data = [
                'report_id' => $id,
                'kategori_id' => $db['kategori_id'],
                'skor' => $db['skor'],
                'total' => $total['total'],
                'persentase' => number_format((($db['skor'] / $total['total'])*100), 2, ",", ""),
            ];

            array_push($insert, $data);
        }
        $this->db->insert_batch('report_detail', $insert);
    }

}