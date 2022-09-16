<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_konsultasi', 'konsul');
        $this->load->model('M_gejala', 'gejala');
    }

    public function index()
    {
        $data['ciri']       = $this->db->get('tb_gejala')->result_array();
        $data['judul']      = 'Konsultasi';
        $data['sub_judul']  = 'Halaman Konsultasi';
        $this->load->view('user/v_header', $data);
        $this->load->view('user/v_sidebar');
        $this->load->view('v_konsultasi', $data);
        $this->load->view('user/v_footer');
    }

    public function proses()
    {
        // Make Validation URL
        if (!$this->input->post('ciri', true)) {
			$this->session->set_flashdata('error', 'Pilih Gejala Terlebih Dahulu!');
            redirect('konsultasi');
		}else {
			$dataPenyakit = $this->input->post('ciri');
			$jmlPenyakit = count($dataPenyakit);
			
			if($jmlPenyakit < 3){
				$this->session->set_flashdata('error', 'Pilih Gejala Minimal 3!');
				redirect('konsultasi');
				
			}else{
				
				$data2   = $this->konsul->getpenyakit();

				// Mulai Perhitungan Metode CBR
				$i = 0;
				$array_gejala = [];
	
				foreach ($data2 as $row) {
					$jml        = 0;
					$nilai      = 0;
					$penyakit      = $row['id_penyakit'];
					$kasus      = $this->konsul->getStatus($penyakit);
					$status   = $kasus['nama_penyakit'];
					$dipilih    = count($this->input->post('ciri', true));
	
					// Perulangan perhitungan metode CBR
					foreach ($this->input->post('ciri', true) as $selected) {
						$ciri   = $selected;
						$row    = $this->konsul->getCiri($ciri);
	
						if (!in_array($row['kode'], $array_gejala)) {
							array_push($array_gejala, $row['kode']);
						}
	
						$get    = $this->konsul->getSama($penyakit, $ciri);
						if (isset($get)) {
							$jml += 1;
							$nilai += (1 * $get['bobot']);
						} else {
							$jml += 0;
						}
					}
	
					$pembagi    = $this->konsul->getPembagi($penyakit);
					$jml_ciri   = $this->konsul->getJmlCiri($penyakit);
					$hasil = $nilai / "$pembagi";
	
					$final[$i] = array(
						'id_penyakit'           => $penyakit,
						'nama_penyakit'         => $status,
						'jml_cocok'             => $jml,
						'jml_gejala'            => $jml_ciri,
						'jml_dipilih'           => $dipilih,
						'bobot_sama'            => $nilai,
						'total_bobot'           => $pembagi,
						'hasil'                 => $hasil
					);
	
					$i++;
				}
	
				// Mengurutkan array hasil descending
				$this->array_sort_by_column($final, 'hasil');
	
				$nama = $this->session->userdata("nama");
				$gejala = implode(', ', $array_gejala);
	
				$data = array(
					'nama'      => $nama,
					'kode'      => $gejala,
					'hasil'     => $final[0]['hasil'],
					'penyakit'     => $final[0]['id_penyakit'],
				);
	
				$this->db->insert('tb_hasil_konsultasi', $data);
	
				// Passing data ke Views
				$data['judul']      = 'Hasil Perhitungan Metode CBR';
				$data['sub_judul']  = 'Hasil Analisa Dengan Metode CBR';
				$data['final']      = $final;
				$data['klas']       = $this->konsul->getData();
				$data['ciri']       = $this->input->post('ciri', true);
				$this->load->view('user/v_header', $data);
				$this->load->view('user/v_sidebar');
				$this->load->view('v_perhitungan', $data);
				$this->load->view('user/v_footer');
			}
		}
        
    }

    // Fungsi Descending Array
    function array_sort_by_column(&$arr, $col, $dir = SORT_DESC)
    {
        $sort_col = array();
        foreach ($arr as $key => $row) {
            $sort_col[$key] = $row[$col];
        }
        array_multisort($sort_col, $dir, $arr);
    }

    // Fungsi Hasil Konsultasi
    function hasil_konsultasi()
    {
        $data['hasil_konsultasi'] = $this->konsul->getHasilKonsultasi();
        $data['judul']      = 'Hasil Konsultasi';
        $data['sub_judul']  = 'Halaman Hasil Konsultasi';
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_sidebar');
        $this->load->view('konsultasi/v_konsultasi', $data);
        $this->load->view('template/v_footer');
    }

    // Fungsi Verifikasi dengan id
    function verifikasi($id)
    {
        $data = $this->konsul->getHasilKonsultasiById($id);
        $kode_gejala = $data['kode'];
        $penyakit = $data['penyakit'];

        $arr_kode_gejala = explode(', ', $kode_gejala);

        // Memasukkan data gejala ke database satu per satu
        foreach ($arr_kode_gejala as $gejala) {
            $id_gejala = $this->gejala->getDataByKode($gejala);

            $data = array(
                'id_penyakit'  => $penyakit,
                'id_ciri'      => $id_gejala['id_ciri'],
            );

            $this->db->insert('tb_klasifikasi', $data);

            $this->db->where('id', $id);
            $this->db->delete('tb_hasil_konsultasi');
        }
        redirect('konsultasi/hasil_konsultasi');
    }
    // detail
    function hasil_konsultasi_detail()
    {
        $data['judul']      = 'Detail Hasil Konsultasi';
        $data['sub_judul']  = 'Halaman Detail Hasil Konsultasi';
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_sidebar');
        $this->load->view('konsultasi/v_konsultasi_detail', $data);
        $this->load->view('template/v_footer');
    }

    // mengubah
    public function edit($id)
    {
        $data['judul']      = 'Edit Hasil Konsultasi';
        $data['sub_judul']  = 'Edit Halaman Hasil Konsultasi';
        $data['ciri']       = $this->db->get('tb_gejala')->result_array();
        $data['id_hasil_konsultasi'] = $id;

        $konsultasi = $this->konsul->getHasilKonsultasiById($id);
        $arr_kode = explode(', ', $konsultasi['kode']);
        $id_ciri = "";

        foreach ($arr_kode as $gejala) {
            $id_gejala = $this->gejala->getDataByKode($gejala);
            $id = $id_gejala['id_ciri'];
            $id_ciri .= "$id,";
        }

        $data['id_ciri'] = $id_ciri;
        $data['konsultasi'] = $konsultasi;

        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_sidebar');
        $this->load->view('konsultasi/V_editkonsultasi', $data);
        $this->load->view('template/v_footer');
    }


    public function prosesEdit()
    {
        $id_data = $this->input->post('id', true);

        $data2   = $this->konsul->getpenyakit();
        // Mulai Perhitungan Metode CBR
        $i = 0;
        $array_gejala = [];

        foreach ($data2 as $row) {
            $jml        = 0;
            $nilai      = 0;
            $penyakit      = $row['id_penyakit'];
            $kasus      = $this->konsul->getStatus($penyakit);
            $status   = $kasus['nama_penyakit'];
            $dipilih    = count($this->input->post('ciri', true));

            // Perulangan perhitungan metode CBR
            foreach ($this->input->post('ciri', true) as $selected) {
                $ciri   = $selected;
                $row    = $this->konsul->getCiri($ciri);

                if (!in_array($row['kode'], $array_gejala)) {
                    array_push($array_gejala, $row['kode']);
                }

                $get    = $this->konsul->getSama($penyakit, $ciri);
                if (isset($get)) {
                    $jml += 1;
                    $nilai += (1 * $get['bobot']);
                } else {
                    $jml += 0;
                }
            }

            $pembagi    = $this->konsul->getPembagi($penyakit);
            $jml_ciri   = $this->konsul->getJmlCiri($penyakit);
            $hasil = $nilai / "$pembagi";

            $final[$i] = array(
                'id_penyakit'           => $penyakit,
                'nama_penyakit'         => $status,
                'jml_cocok'             => $jml,
                'jml_gejala'            => $jml_ciri,
                'jml_dipilih'           => $dipilih,
                'bobot_sama'            => $nilai,
                'total_bobot'           => $pembagi,
                'hasil'                 => $hasil
            );

            $i++;
        }

        // Mengurutkan array hasil descending
        $this->array_sort_by_column($final, 'hasil');

        $nama = $this->session->userdata("nama");
        $gejala = implode(', ', $array_gejala);

        $data = array(
            
            'kode'      => $gejala,
            'hasil'     => $final[0]['hasil'],
            'penyakit'  => $final[0]['id_penyakit'],
        );

        $this->konsul->editHasilKonsultasi($data, $id_data);

        redirect('konsultasi/hasil_konsultasi');
    }

    // menghapus
    public function hapus($id_konsultasi)
    {
        $this->db->where('id', $id_konsultasi);
        $this->db->delete('tb_hasil_konsultasi');
        $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Data Hasil Konsultasi Berhasil di Hapus</div>');
        redirect('konsultasi/hasil_konsultasi');
    }
}