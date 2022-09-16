<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Awal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        
    }

    public function index()
    {
        $data['judul']      = 'Sistem Pakar Penyakit Paru-Paru Metode CBR';
        $data['sub_judul']  = 'Halaman Beranda';
		$data['cekSession'] = $this->session->userdata('nama');
        $this->load->view('user/v_header', $data);
        $this->load->view('user/v_sidebar');
        $this->load->view('v_awal', $data);
        $this->load->view('user/v_footer');
    }
}
