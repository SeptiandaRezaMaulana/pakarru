<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_status extends CI_Model
{

    public function kode()
    {
        $this->db->select('RIGHT(tb_penyakit.id_penyakit,2) as id_penyakit', FALSE);
        $this->db->order_by('id_penyakit', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_penyakit');
        //cek dulu apakah ada sudah ada kode di tabel. 

        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->id_penyakit) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }

        $batas = str_pad($kode, 2, "0", STR_PAD_LEFT);
        $kodetampil = "A" . $batas;  //format kode
        return $kodetampil;
    }

    public function getData($id_penyakit)
    {
        $query = "SELECT * FROM tb_penyakit WHERE id_penyakit = '$id_penyakit'";
        return $this->db->query($query)->row_array();
    }

    public function editData($id_penyakit, $data)
    {
        $this->db->where('id_penyakit', $id_penyakit);
        $this->db->update('tb_penyakit', $data);
    }
}
