<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pertumbuhan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama')) {
            redirect('awal');
        }
        $this->load->library('form_validation');
        $this->load->model('m_status');
    }

    public function index()
    {
        $data['macam']      = $this->db->get('tb_penyakit')->result_array();
        $data['judul']      = 'Penyakit';
        $data['sub_judul']  = 'Tabel Penyakit';
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_sidebar');
        $this->load->view('status/v_pertumbuhan', $data);
        $this->load->view('template/v_footer');
    }
    // menambahkan
    public function tambah()
    {
        $data['id_penyakit']   = $this->m_status->kode();
        $data['judul']      = 'Penyakit';
        $data['sub_judul']  = 'Tambah Data Penyakit';

        // aturan validasi
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('solusi', 'Solusi Penyakit', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/v_header', $data);
            $this->load->view('template/v_sidebar');
            $this->load->view('status/v_addpertumbuhan', $data);
            $this->load->view('template/v_footer');
        } else {
            $id_penyakit   = $this->input->post('id_penyakit', true);
            $status   = $this->input->post('status', true);
            $solusi     = $this->input->post('solusi', true);

            $data = array(
                'id_penyakit'   => $id_penyakit,
                'nama_penyakit' => $status,
                'solusi'        => $solusi
            );

            $this->db->insert('tb_penyakit', $data);

            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Data Penyakit Berhasil di Tambahkan</div>');
            redirect('pertumbuhan');
        }
    }
    //mengubah
    public function edit($id_penyakit)
    {
        $data['judul']      = 'Penyakit';
        $data['sub_judul']  = 'Edit Data Penyakit';
        $data['status']   = $this->m_status->getData($id_penyakit);

        // aturan validasi
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('solusi', 'Solusi Penyakit', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/v_header', $data);
            $this->load->view('template/v_sidebar');
            $this->load->view('status/v_editpertumbuhan', $data);
            $this->load->view('template/v_footer');
        } else {
            $id_penyakit   = $this->input->post('id_penyakit', true);
            $status   = $this->input->post('status', true);
            $detail     = $this->input->post('detail', true);
            $solusi     = $this->input->post('solusi', true);

            $data = array(
                'nama_penyakit'       => $status,
                'solusi'     => $solusi
            );

            $this->m_status->editData($id_penyakit, $data);

            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Data Penyakit Berhasil di Ubah</div>');
            redirect('pertumbuhan');
        }
    }
    //menghapus
    public function hapus($id_penyakit)
    {
        $this->db->where('id_penyakit', $id_penyakit);
        $this->db->delete('tb_penyakit');
        $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Data Penyakit Berhasil di Hapus</div>');
        redirect('pertumbuhan');
    }
}
