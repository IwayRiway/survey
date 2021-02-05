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

}