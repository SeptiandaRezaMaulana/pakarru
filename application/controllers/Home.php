<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama')) {
            redirect('awal');
        }
    }

    public function index()
    {
		if($this->session->userdata('role') == 1){
			$data['ciri']       = $this->db->get('tb_gejala')->result_array();
			$data['judul']      = 'Admin';
			$data['sub_judul']  = 'Halaman Beranda';
			$this->load->view('template/v_header', $data);
			$this->load->view('template/v_sidebar');
			$this->load->view('V_home', $data);
			$this->load->view('template/v_footer');
		}else{
			redirect('Awal');
		}
        
    }
}