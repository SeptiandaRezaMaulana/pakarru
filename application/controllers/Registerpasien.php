<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registerpasien extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username2')) {
            redirect('konsultasi');
        }
        $this->load->library('form_validation');
        $this->load->model('m_gejala', 'mega');
    }

    public function logoutpasien()
    {
		$this->session->sess_destroy();
        redirect('awal');
    }
    public function index()
    {
		$data['judul']      = 'Konsultasi';
        $data['sub_judul']  = 'Halaman Registrasi';
        $this->form_validation->set_rules('nama', 'Nama Pasien', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('umur_pasien', 'Umur', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');        

        if ($this->form_validation->run() == false ) {
			if(!empty($_REQUEST))
			{
                $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Anda gagal Register, Silahkan coba lagi!</div>');
			}
			$this->load->view('user/v_header', $data);
			$this->load->view('user/v_sidebar');
			$this->load->view('v_register', $data);
			$this->load->view('user/v_footer');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $umur_pasien  = $this->input->post('umur_pasien');
            $password  = $this->input->post('password');
           
			$exist= $this->db->query("select email from user where email = '".$email."'")->num_rows();
			if($exist > 0 )
			{
                $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Email anda sudah terdaftar, silahkan Login!</div>');
				redirect("Registerpasien");
			}

            $data = array(
                'nama'       		=> $nama,
                'umur_pasien'       => $umur_pasien,
                'email'             => $email,
				'role'				=> 2,
                'password'          => $password
            );

            $this->db->insert('user', $data);
			
                $data2 = [
                    'email' => $email, 'umur_pasien'=>$umur_pasien,'nama'=>$nama, 'role' => 2
                ];
                $this->session->set_userdata($data2);

            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Berhasil registrasi</div>');
            redirect('Konsultasi');
        }
    }

    public function loginpasien()
    {
		$data['judul']      = 'Konsultasi';
        $data['sub_judul']  = 'Halaman Login';
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false ) {
			if(!empty($_REQUEST))
			{
                $this->session->set_flashdata('info2', '<div class="alert alert-danger" role="alert">Masukkan email dan password anda!</div>');
			}
			$this->load->view('user/v_header', $data);
			$this->load->view('user/v_sidebar');
			$this->load->view('v_register', $data);
			$this->load->view('user/v_footer');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
      
			$exist= $this->db->query("select email, password from user where email = '".$email."' and password='".$password."'")->num_rows();
			if($exist > 0 )
			{
				$umur_pasien=1;
				$nama="";
				$query= $this->db->query("select email, password, nama, umur_pasien from user where email = '".$email."' and password='".$password."'");
				foreach($query->result() as $row)
				{
					$umur_pasien=$row->umur_pasien;
					$nama=$row->nama;
				}
                $datax = [
                    'email' => $email, 'umur_pasien'=>$umur_pasien, 'nama'=>$nama
                ];
                $this->session->set_userdata($datax);
				redirect("konsultasi");
			}
			else
			{
				$this->session->set_flashdata('info2', '<div class="alert alert-danger" role="alert">Email dan password salah, Coba login lagi dengan email dan password anda!</div>');
			}
        $this->load->view('user/v_header', $data);
        $this->load->view('user/v_sidebar');
        $this->load->view('v_register', $data);
        $this->load->view('user/v_footer');
        }
    }
}