<?php

class Store_model extends CI_model
{

    public function getData()
    {
        return $this->db->query("SELECT a.*, b.nama as region FROM store a JOIN region b ON a.region_id=b.id")->result_array();
    }

    public function save()
    {
        $config['upload_path']          = './assets/image/store';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;

        $img1 = $_FILES['file']['name'];
        if($img1){
            $this->load->library('upload', $config);
            if($this->upload->do_upload('file')) {
                $poto = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }

        $files = $_FILES;
        $cpt = count($_FILES['file_multiple']['name']);
        // var_dump($_FILES['file_multiple']); die;
        $dataInfo = [];
        if($cpt != 0){
            $this->load->library('upload');
            $config['max_size'] = 0;
            for($i=0; $i<$cpt; $i++)
            {           
                $_FILES['file_multiple']['name']= $files['file_multiple']['name'][$i];
                $_FILES['file_multiple']['type']= $files['file_multiple']['type'][$i];
                $_FILES['file_multiple']['tmp_name']= $files['file_multiple']['tmp_name'][$i];
                $_FILES['file_multiple']['error']= $files['file_multiple']['error'][$i];
                $_FILES['file_multiple']['size']= $files['file_multiple']['size'][$i];    

                $this->upload->initialize($config);
                $this->upload->do_upload('file_multiple');
                if($this->upload->data('file_name') != ""){
                    array_push($dataInfo, 'image/store/'.$this->upload->data('file_name'));
                }
            }
        }

        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'lokasi' => $this->input->post('latitude') . ',' . $this->input->post('longitude'),
            'region_id' => $this->input->post('region_id'),
            'manager' => $this->input->post('manager'),
            'poto' => 'image/store/'.$poto,
            'poto_sekitar' => count($dataInfo) > 0 ? implode("|", $dataInfo) : null,
        ];

        $this->db->insert('store', $data);
    }

    public function getDataById($id)
    {
        return $this->db->query("SELECT a.*, b.nama as region FROM store a JOIN region b ON a.region_id=b.id WHERE a.id=$id")->row_array();
    }

    public function update()
    {
        $store = $this->getDataById($this->input->post('id'));
        $poto = '';

        $config['upload_path']          = './assets/image/store';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;

        $img1 = $_FILES['file']['name'];
        if($img1){
            $this->load->library('upload', $config);
            if($this->upload->do_upload('file')) {
                $poto = $this->upload->data('file_name');
                unlink(FCPATH . 'assets/' . $store['poto']);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $files = $_FILES;
        $cpt = count($_FILES['file_multiple']['name']);
        $dataInfo = [];
        if($cpt != 0){
            $this->load->library('upload');
            $config['max_size'] = 0;
            for($i=0; $i<$cpt; $i++)
            {           
                $_FILES['file_multiple']['name']= $files['file_multiple']['name'][$i];
                $_FILES['file_multiple']['type']= $files['file_multiple']['type'][$i];
                $_FILES['file_multiple']['tmp_name']= $files['file_multiple']['tmp_name'][$i];
                $_FILES['file_multiple']['error']= $files['file_multiple']['error'][$i];
                $_FILES['file_multiple']['size']= $files['file_multiple']['size'][$i];    

                $this->upload->initialize($config);
                $this->upload->do_upload('file_multiple');
                if($this->upload->data('file_name') != ""){
                    array_push($dataInfo, 'image/store/'.$this->upload->data('file_name'));
                }
            }
        }

        if(count($dataInfo) > 0){
            $potos = explode("|", $store['poto_sekitar']);
            for ($i=0; $i < count($potos); $i++) { 
                unlink(FCPATH . 'assets/' . $potos[$i]);
            }
        }

        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'lokasi' => $this->input->post('latitude') . ',' . $this->input->post('longitude'),
            'region_id' => $this->input->post('region_id'),
            'manager' => $this->input->post('manager'),
        ];

        $poto != '' ? $data['poto'] = 'image/store/'.$poto : null;
        count($dataInfo) > 0 ? $data['poto_sekitar'] = implode("|", $dataInfo) : null;

        $this->db->update('store', $data, ['id'=>$this->input->post('id')]);
    }

    public function delete($id)
    {
        $store = $this->db->get_where('store', ['id'=>$id])->row_array();
        unlink(FCPATH . 'assets/' . $store['poto']);
        if($store['poto_sekitar'] != null){
            $potos = explode("|", $store['poto_sekitar']);
            for ($i=0; $i < count($potos); $i++) { 
                unlink(FCPATH . 'assets/' . $potos[$i]);
            }
        }
        $this->db->delete('store',['id'=>$id]);
    }
}