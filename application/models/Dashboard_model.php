<?php

class Dashboard_model extends CI_model
{

    public function getAllData()
    {
        $mont = date('m');
        return $this->db->query("SELECT * FROM store_survey WHERE MONTH(batas_waktu) = $mont")->num_rows();
    }

    public function getAllDataSelesai()
    {
        $mont = date('m');
        return $this->db->query("SELECT * FROM store_survey WHERE MONTH(batas_waktu) = $mont AND surveyed=1 AND kuesioner=1")->num_rows();
    }

    public function getAllDataSurvey1()
    {
        $mont = date('m');
        $selesai = $this->db->query("SELECT * FROM store_survey WHERE MONTH(batas_waktu) = $mont AND surveyed=1 AND kuesioner=1 AND survey = 1")->num_rows();
        $total = $this->db->query("SELECT * FROM store_survey WHERE MONTH(batas_waktu) = $mont AND survey = 1")->num_rows();

        return ['selesai'=>$selesai, 'total'=>$total];
    }

    public function getAllDataSurvey2()
    {
        $mont = date('m');
        $selesai = $this->db->query("SELECT * FROM store_survey WHERE MONTH(batas_waktu) = $mont AND surveyed=1 AND kuesioner=1 AND survey = 2")->num_rows();
        $total = $this->db->query("SELECT * FROM store_survey WHERE MONTH(batas_waktu) = $mont AND survey = 2")->num_rows();

        return ['selesai'=>$selesai, 'total'=>$total];
    }

    public function getStore()
    {
        $mont = date('m');
        return $this->db->query("SELECT 
                                    a.*, 
                                    c.id as store_id, 
                                    c.persentase 
                                FROM 
                                    store a 
                                    JOIN store_survey b ON a.id = b.store_id 
                                    JOIN report c ON b.id = c.store_survey_id 
                                WHERE 
                                    MONTH(b.batas_waktu) = $mont 
                                    AND c.persentase < 80")->result_array();
    }

    public function reportDetail($id)
    {
        return $this->db->query("SELECT 
                                    a.*, 
                                    b.nama
                                FROM 
                                    report_detail a 
                                    JOIN kategori b ON b.id = a.kategori_id 
                                WHERE 
                                    a.report_id = $id")->result_array();
    }

    public function getDataStore()
    {
        $mont = date('m');
        return $this->db->query("SELECT 
                                    a.*, 
                                    c.id as store_id, 
                                    c.persentase 
                                FROM 
                                    store a 
                                    JOIN store_survey b ON a.id = b.store_id 
                                    JOIN report c ON b.id = c.store_survey_id 
                                WHERE 
                                    MONTH(b.batas_waktu) = $mont")->result_array();
    }

    public function getDataRegion()
    {
        $mont = date('m');
        return $this->db->query("SELECT 
                                    d.*, 
                                    c.id as store_id, 
                                    AVG(
                                    REPLACE(c.persentase, ',', '.')
                                    ) as persentase 
                                FROM 
                                    store a 
                                    JOIN store_survey b ON a.id = b.store_id 
                                    JOIN report c ON b.id = c.store_survey_id 
                                    JOIN region d ON a.region_id = d.id 
                                WHERE 
                                    MONTH(b.batas_waktu) = $mont 
                                GROUP BY 
                                    a.region_id
                                ")->result_array();
    }
}