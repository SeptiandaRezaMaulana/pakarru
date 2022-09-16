<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_klasifikasi extends CI_Model
{

    public function getData()
    {
        $query = "SELECT tb_klasifikasi.*, tb_gejala.kode,tb_penyakit.nama_penyakit, tb_gejala.kode ,tb_gejala.nama_ciri , tb_gejala.bobot
                    FROM tb_klasifikasi  
                    JOIN tb_penyakit ON tb_klasifikasi.id_penyakit = tb_penyakit.id_penyakit 
                    JOIN tb_gejala ON tb_klasifikasi.id_ciri = tb_gejala.id_ciri
                    GROUP BY id_penyakit
                ";

        return $this->db->query($query)->result_array();
    }

    public function getStatus()
    {
        $query = "SELECT * FROM tb_penyakit";
        return $this->db->query($query)->result_array();
    }

    public function getStatusById($id_penyakit)
    {
        $query = "SELECT * FROM tb_penyakit WHERE id_penyakit='$id_penyakit' ";
        return $this->db->query($query)->row_array();
    }

    public function getGejala()
    {
        $query = "SELECT * FROM tb_gejala";
        return $this->db->query($query)->result_array();
    }

    public function getById($id_penyakit)
    {
        $query = "SELECT tb_klasifikasi.*, tb_klasifikasi.id_penyakit, tb_gejala.kode, tb_penyakit.nama_penyakit,tb_gejala.kode , tb_gejala.nama_ciri, tb_gejala.bobot
                    FROM tb_klasifikasi  
                    JOIN tb_penyakit ON tb_klasifikasi.id_penyakit = tb_penyakit.id_penyakit 
                    JOIN tb_gejala ON tb_klasifikasi.id_ciri = tb_gejala.id_ciri
                    WHERE tb_klasifikasi.id_penyakit = '$id_penyakit'
                ";

        return $this->db->query($query)->result_array();
    }

    public function cekGejala($status, $gejala)
    {
        $query = "SELECT * FROM tb_klasifikasi WHERE id_penyakit='$status' AND id_ciri='$gejala'";
        return $this->db->query($query)->row_array();
    }

    public function getOption($id_penyakit)
    {
        $query = " SELECT tb_gejala.id_ciri, nama_ciri, bobot FROM tb_gejala LEFT JOIN tb_klasifikasi ON tb_gejala.id_ciri = tb_klasifikasi.id_ciri 
                   EXCEPT 
                   SELECT tb_gejala.id_ciri, nama_ciri, bobot FROM tb_gejala RIGHT JOIN tb_klasifikasi ON tb_gejala.id_ciri = tb_klasifikasi.id_ciri WHERE tb_klasifikasi.id_penyakit = '$id_penyakit'
                ";
        return $this->db->query($query)->result_array();
    }
}
