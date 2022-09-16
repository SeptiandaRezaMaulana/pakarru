<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama')) {
            redirect('awal');
        }
        $this->load->library('form_validation');
        $this->load->model('m_gejala', 'mega');
    }

    public function index()
    {
        $data['ciri']       = $this->db->get('tb_gejala')->result_array();
        $data['judul']      = 'Gejala';
        $data['sub_judul']  = 'Tabel Gejala';
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_sidebar');
        $this->load->view('gejala/v_gejala', $data);
        $this->load->view('template/v_footer');
    }
    // menambahkan 
    public function tambah()
    {
        $data['judul']      = 'Gejala';
        $data['sub_judul']  = 'Tambah Data Gejala';

        // aturan validasi
        $this->form_validation->set_rules('kode', 'Kode', 'trim|required');
        $this->form_validation->set_rules('gejala', 'Gejala', 'trim|required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'trim|required');
        

        if ($this->form_validation->run() == false) {
            $this->load->view('template/v_header', $data);
            $this->load->view('template/v_sidebar');
            $this->load->view('gejala/v_addgejala', $data);
            $this->load->view('template/v_footer');
        } else {
            $kode = $this->input->post('kode');
            $gejala = $this->input->post('gejala');
            $bobot  = $this->input->post('bobot');

            $data = array(
                'kode' => $kode,
                'nama_ciri' => $gejala,
                'bobot'     => $bobot
            );

            $this->db->insert('tb_gejala', $data);

            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Data Gejala Berhasil di Tambahkan</div>');
            redirect('gejala');
        }
    }
    // mengubah
    public function edit($id_ciri)
    {
        $data['judul']      = 'Gejala';
        $data['sub_judul']  = 'Edit Data Gejala';
        $data['gejala']     = $this->mega->getData($id_ciri);

        // aturan validasi
        $this->form_validation->set_rules('kode', 'Kode', 'trim|required');
        $this->form_validation->set_rules('gejala', 'Gejala', 'trim|required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/v_header', $data);
            $this->load->view('template/v_sidebar');
            $this->load->view('gejala/v_editgejala', $data);
        } else {
            
            $id_ciri    = $this->input->post('id_ciri');
            $kode    = $this->input->post('kode');
            $gejala     = $this->input->post('gejala');
            $bobot      = $this->input->post('bobot');

            $data = array(
                'kode'      => $kode,
                'nama_ciri' => $gejala,
                'bobot'     => $bobot
            );

            $this->mega->editData($data, $id_ciri);
			$this->session->set_flashdata('success', 'Data Gejala Berhasil di Ubah');
			$this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Data Gejala Berhasil di Ubah</div>');
            redirect('gejala');
        }
    }
    // menghapus
    public function hapus($id_ciri)
    {
        $this->db->where('id_ciri', $id_ciri);
        $this->db->delete('tb_gejala');
        $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Data Gejala Berhasil di Hapus</div>');
        redirect('gejala');
    }
}