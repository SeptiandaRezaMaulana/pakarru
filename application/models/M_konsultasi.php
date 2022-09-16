<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_konsultasi extends CI_Model
{

    public function getData()
    {
        $query = "SELECT A.*, (SELECT COUNT(id_penyakit) FROM tb_klasifikasi WHERE id_penyakit = A.id_penyakit) AS jumlah, tb_penyakit.nama_penyakit, tb_gejala.kode, tb_gejala.nama_ciri, tb_gejala.bobot
        FROM tb_klasifikasi A
        JOIN tb_penyakit ON tb_penyakit.id_penyakit = A.id_penyakit
        JOIN tb_gejala ON tb_gejala.id_ciri = A.id_ciri";

        return $this->db->query($query)->result_array();
    }

    public function getPenyakit()
    {
        $query = "SELECT tb_klasifikasi.* FROM tb_klasifikasi GROUP BY id_penyakit";
        return $this->db->query($query)->result_array();
    }

    public function getStatus($penyakit)
    {
        $query = "SELECT tb_penyakit.* FROM tb_penyakit WHERE id_penyakit ='$penyakit'";
        return $this->db->query($query)->row_array();
    }

    public function getCiri($ciri)
    {
        $query = "SELECT tb_gejala.* FROM tb_gejala WHERE id_ciri ='$ciri'";
        return $this->db->query($query)->row_array();
    }

    public function getSama($penyakit, $ciri)
    {
        $query = "SELECT tb_klasifikasi.*, tb_gejala.bobot 
        FROM tb_klasifikasi
        JOIN tb_gejala ON tb_gejala.id_ciri = tb_klasifikasi.id_ciri  
        WHERE tb_klasifikasi.id_penyakit='$penyakit' AND tb_klasifikasi.id_ciri='$ciri'";

        return $this->db->query($query)->row_array();
    }

    public function getJmlCiri($penyakit)
    {

        $this->db->from('tb_klasifikasi');
        $this->db->where('id_penyakit', $penyakit);
        return $this->db->count_all_results();
    }

    public function getPembagi($penyakit)
    {
        $query = "SELECT SUM(tb_gejala.bobot) AS TOTAL
                FROM tb_klasifikasi 
                JOIN tb_gejala ON tb_gejala.id_ciri = tb_klasifikasi.id_ciri
                WHERE id_penyakit='$penyakit'";
        $bagi = $this->db->query($query)->row_array();
        return $bagi['TOTAL'];
    }

    public function getHasilKonsultasi()
    {
        $query = "SELECT * 
                    FROM tb_hasil_konsultasi
                    JOIN tb_penyakit
                    on tb_penyakit.id_penyakit = tb_hasil_konsultasi.penyakit";

        return $this->db->query($query)->result_array();
    }

    public function getHasilKonsultasiById($id)
    {
        $query = "SELECT * FROM tb_hasil_konsultasi JOIN tb_penyakit on tb_penyakit.id_penyakit = tb_hasil_konsultasi.penyakit WHERE tb_hasil_konsultasi.id = $id";
        return $this->db->query($query)->row_array();
    }

    public function editHasilKonsultasi($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_hasil_konsultasi', $data);
    }
}
