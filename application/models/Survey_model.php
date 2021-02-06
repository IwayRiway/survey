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
        // $id = id table store_survey
        // JOIN dengan table store

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
                'poto' => $img,
                'tanggal_survey' => date('Y-m-d')
            ];
    
            $this->db->update('store_survey', $data, ['id' => $this->input->post('id')]);
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

        $update = ['kuesioner' => 1];
        $this->db->update('store_survey', $update, ['id' => $this->input->post('id')]);
    }

    public function report($id)
    {
        $total = $this->db->query("SELECT SUM(skor) AS total FROM (SELECT MAX(skor) as skor FROM pilihan GROUP BY pertanyaan_id) t")->row_array();

        $skor = $this->db->query("SELECT SUM(skor) AS skor FROM jawaban WHERE store_survey_id = 1")->row_array();
        
        $data = [
            'store_survey_id' => $id,
            'skor' => $skor['skor'],
            'total' => $total['total'],
            'persentase' => number_format((($skor['skor'] / $total['total'])*100), 2, ",", ""),
            'file' => date('YmdHis') . '_Laporan_Survey_Lapangan',
        ];
        $this->db->insert('report', $data);

        $last_id = $this->db->insert_id();
        $this->_reportDetail($last_id, $id);
    }

    private function _reportDetail($report_id, $store_survey_id){
        
        $jawaban = $this->db->query("SELECT 
                                        a.*, 
                                        b.pertanyaan_id, 
                                        c.kategori_id, 
                                        SUM(a.skor) as skor 
                                    FROM 
                                        jawaban a 
                                        JOIN pilihan b ON a.pilihan_id = b.id 
                                        JOIN kuesioner c ON b.pertanyaan_id = c.id
                                    WHERE
                                        a.id = $store_survey_id 
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
                'report_id' => $report_id,
                'kategori_id' => $db['kategori_id'],
                'skor' => $db['skor'],
                'total' => $total['total'],
                'persentase' => number_format((($db['skor'] / $total['total'])*100), 2, ",", ""),
            ];

            array_push($insert, $data);
        }
        $this->db->insert_batch('report_detail', $insert);
    }

    public function getSurvey($id)
    {
        //id dari table store_survey

        if($this->session->get('is_spv')==1){
            return $this->db->query("SELECT 
                                            a.*, 
                                            b.nama, 
                                            b.hp, 
                                            b.email, 
                                            c.*,
                                            d.nama as region  
                                        FROM 
                                            store_survey a 
                                            JOIN spv b ON a.surveyor_id = b.id 
                                            JOIN store c ON a.store_id = c.id 
                                            JOIN region d ON c.region_id = d.id
                                        WHERE
                                            a.id = $id 
                                            AND a.surveyed = 1 
                                            AND a.kuesioner = 1
                                        ")->row_array();
        } else {
            return $this->db->query("SELECT 
                                        a.*, 
                                        b.nama, 
                                        b.hp, 
                                        b.email, 
                                        c.*,
                                        d.nama as region 
                                    FROM 
                                        store_survey a 
                                        JOIN surveyor b ON a.surveyor_id = b.id 
                                        JOIN store c ON a.store_id = c.id 
                                        JOIN region d ON c.region_id = d.id 
                                    WHERE
                                        a.id = $id 
                                        AND a.surveyed = 1 
                                        AND a.kuesioner = 1
                                    ")->row_array();
        }
    }

    public function getReport($id)
    {
        //id dari table store_survey

        return $this->db->query("SELECT 
                                    a.*, 
                                    b.*, 
                                    c.* 
                                FROM 
                                    report a 
                                    JOIN report_detail b ON a.id = b.report_id 
                                    JOIN kategori c ON b.kategori_id = c.id 
                                WHERE 
                                    a.store_survey_id = $id
                                ")->result_array();
    }

}