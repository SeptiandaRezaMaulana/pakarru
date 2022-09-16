<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
		$data['judul']      = 'Login Admin';
        $data['sub_judul']  = 'Halaman Login';
        $this->load->view('template/v_header', $data);
        $this->load->view('v_login', $data);
    }

    public function auth()
    {
        $nama = $this->input->post('nama', true);
        $password = $this->input->post('password', true);

        $user = $this->db->get_where('user', ['nama' => $nama])->row_array();

        if ($user) {
            //Jika user ada
            if ($password == $user['password']) {

                if($user['role'] == 1){
					$data = [
						'id' => $user['id'],
						'nama' => $user['nama'],
						'role' => $user['role']
					];
	
					$this->session->set_userdata($data);
					
					redirect('Home');
				}else {
					$data = [
						'id' => $user['id'],
						'nama' => $user['nama'],
						'role' => $user['role']
					];
	
					$this->session->set_userdata($data);
					redirect('Konsultasi');
				}
				//masukkan session
                
            } else {
                $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Maaf password salah. Periksa kembali !</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Maaf nama salah. Periksa kembali !</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nama');
        $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Anda Berhasil Logout !</div>');
		$this->session->sess_destroy();
        redirect('awal');
    }
}