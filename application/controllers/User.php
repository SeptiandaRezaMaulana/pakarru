<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama')) {
            redirect('awal');
        }
        $this->load->model('m_user', 'user');
    }

    public function index()
    {
        $data['user']       = $this->user->getData();
        $data['judul']      = 'Pasien';
        $data['sub_judul']  = 'Tabel Pasien';
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_sidebar');
        $this->load->view('pasien/v_user', $data);
        $this->load->view('template/v_footer');
    }
    public function changepassword($id_user)
    {
        $data['detail']     = $this->user->getById($id_user);
        $data['judul']      = 'Pasien';
        $data['sub_judul']  = 'Ubah Password';
		
        $this->form_validation->set_rules('password', 'Password Baru', 'trim|required');
		$this->form_validation->set_rules('confirmpassword', 'Konfirmasi Password', 'required|matches[password]');        

        if ($this->form_validation->run() == false ) {
			if(!empty($_REQUEST))
			{
                $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Anda gagal Ubah Password, Silahkan coba lagi!</div>');
			}
			$this->load->view('template/v_header', $data);
			$this->load->view('template/v_sidebar');
			$this->load->view('pasien/v_changepassword', $data);
			$this->load->view('template/v_footer');
        } else {
            $password  = $this->input->post('password');
      

            $datax = array(
                'password' => $password            );

            $this->db->where('id',$id_user);
			$this->db->update('user',$datax);
            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Berhasil Ganti Password</div>');
			$this->load->view('template/v_header', $data);
			$this->load->view('template/v_sidebar');
			$this->load->view('pasien/v_changepassword', $data);
			$this->load->view('template/v_footer');
		}
    }

    public function detail($id_user)
    {
        $data['detail']     = $this->user->getById($id_user);
        $data['judul']      = 'Pasien';
        $data['sub_judul']  = 'Tabel Detail Pasien';
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_sidebar');
        $this->load->view('pasien/v_detailuser', $data);
        $this->load->view('template/v_footer');
    }

    //Hapus relasi
    public function hapus($id_user)
    {
        $this->db->where('id', $id_user);
        $this->db->delete('user');
        $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Data Pasien Berhasil di Hapus</div>');
        redirect('user');
    }
}