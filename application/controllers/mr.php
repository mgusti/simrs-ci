<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mr extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();

		//is_logged_in();
		
    }

    public function datapasien(){
		$data['title'] = 'Data Pasien';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		
		$key = $this->input->post('key');
	
			$this->db->select('*');
			$this->db->from('pasien');
			$this->db->like('no_rekam_medis', $key);
			$this->db->or_like('no_ktp', $key);
			$this->db->or_like('nokartu', $key);
			$this->db->or_like('nama_pasien', $key);
			$this->db->limit(50);
			$data['pasien'] = $this->db->get()->result_array();
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('mr/datapasien', $data);
		$this->load->view('templates/footer');
	}

	public function detailpasien($mr){
		$data['title'] = 'Detail Pasien';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$data['pasien'] = $this->db->get_where('pasien',['no_rekam_medis' => $mr])->row_array();
		$data['provinsi'] = $this->db->get('provinsi')->result_array();
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('mr/detailpasien', $data);
		$this->load->view('templates/footer');
	}

	public function editpasien()
	{
		$data = [
			
			'nokartu' =>  $this->input->post('nokartu'),
			'nama_pasien' =>  $this->input->post('nama_pasien'),
			'no_ktp' =>  $this->input->post('no_ktp'),
			'tgl_lahir' =>  $this->input->post('tgl_lahir'),
			'jenkel' =>  $this->input->post('jenkel'),
			'alamat' =>  $this->input->post('alamat'),
			'kode_kecamatan' =>  $this->input->post('kode_kecamatan'),
			'nama_kecamatan' =>  $this->input->post('nama_kecamatan'),
			'kode_provinsi' =>  $this->input->post('kode_provinsi'),
			'nama_provinsi' =>  $this->input->post('nama_provinsi'),
			'no_hp' =>  $this->input->post('no_hp'),
			'kode_kabupaten' =>  $this->input->post('kode_kabupaten'),
			'nama_kabupaten' =>  $this->input->post('nama_kabupaten'),
			'gol_darah' =>  $this->input->post('gol_darah')
		];

		$this->db->where('no_rekam_medis', $this->input->post('nomr'));
		$this->db->update('pasien', $data);
		$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data Berhasil dirobah</div>');
		redirect('mr/datapasien');
	}

	public function hapus($mr){
	
		$this->db->delete('pasien', ['no_rekam_medis' => $mr]);
		$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
		redirect('mr/datapasien');
		
	}
	
	public function riwayat($mr){
		$data['title'] = 'RIWAYAT PASIEN';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$data['sep'] = $this->db->get_where('sep', ['nomr' => $mr])->result_array();
		$data['obat'] = $this->db->get_where('tindakan_obat', ['nomr' => $mr])->result_array();
		$data["nomr"] = $mr;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pendaftaran/riwayat', $data);
		$this->load->view('templates/footer');
	}

	public function sep_bpjs($mr){
		$data['title'] = 'SEP BPJS';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		
		$data['sep'] = $this->db->get_where('sep',['nomr' => $mr])->result_array();
		$data['pasien'] = $this->db->get_where('pasien', ['no_rekam_medis' => $mr])->row_array();
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('mr/sep_bpjs', $data);
		$this->load->view('templates/footer');
	}

	public function sepbaru($mr){
		$data['title'] = 'SEP Baru';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		
		//$data['sep'] = $this->db->get_where('sep',['nomr' => $mr])->result_array();
		$data['pasien'] = $this->db->get_where('pasien', ['no_rekam_medis' => $mr])->row_array();
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('mr/sepbaru', $data);
		$this->load->view('templates/footer');
	}

	public function simpansep(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$nose = $this->input->post('nosep');
		$sep = $this->db->get_where('sep',['nosep' => $nose]);
		$cek = $sep->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">No SEP Sudah Ada</div>');
			redirect('mr/datapasien');

		}else{
			$data = [
				'tgl_masuk' => $this->input->post('tglmasuk'),
				'nosep' => $this->input->post('nosep'),
				'tgl_sep' => $this->input->post('tgl_sep'),
				'nokartu' => $this->input->post('nokartu'),
				'nomr' => $this->input->post('nomr'),
				'cob' => $this->input->post('cob'),
				'jnspelayanan' => $this->input->post('jnspelayanan'),
				'poli' => $this->input->post('poli'),
				'norujukan' => $this->input->post('norujukan'),
				'kelas' => $this->input->post('kelas'),
				'diagnosa' => $this->input->post('diagnosa'),
				'jnspeserta' => $this->input->post('jnspeserta'),
				'catatan' => $this->input->post('catatan'),
				'penjamin' => $this->input->post('penjamin'),
				'nama' => $this->input->post('nama'),
				'tgllahir' => $this->input->post('tgllahir'),
				'kelamin' => $this->input->post('sex'),
				'tgl_input' => date('Y-m-d'),
				'jam_input' => date('h:m:s'),
				'user_input' => $data['user']['name'],
				'status_sep' => 0
			];
	
			$this->db->insert('sep', $data);
	
			$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
			redirect('mr/datapasien');
		}
		
	}

	public function pasienbaru(){
		$data['title'] = 'Pasien Baru';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$data['provinsi'] = $this->db->get('provinsi')->result_array();
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('mr/pasienbaru', $data);
		$this->load->view('templates/footer');
	}

	public function simpanpasien(){
		$no_rekam_medis = $this->input->post('nomr');
		$nik = $this->input->post('no_ktp');
		$sql = $this->db->query("SELECT no_rekam_medis FROM pasien where no_rekam_medis='$no_rekam_medis'");
		$cek_rm = $sql->num_rows();

		if ($cek_rm > 0) {
			$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">No RM sudah Terdaftar</div>');
			redirect('mr/pasienbaru');
		}else{
			$sql2 = $this->db->query("SELECT no_ktp FROM pasien where no_ktp='$nik'");
			$cek_nik = $sql2->num_rows();
			if($cek_nik > 0){
				$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">No KTP sudah Terdaftar</div>');
				redirect('mr/pasienbaru');
			}else{
					$data = [
						'no_rekam_medis' =>  $this->input->post('nomr'),
						'nokartu' =>  $this->input->post('nokartu'),
						'nama_pasien' =>  $this->input->post('nama_pasien'),
						'no_ktp' =>  $this->input->post('no_ktp'),
						'tgl_lahir' =>  $this->input->post('tgl_lahir'),
						'jenkel' =>  $this->input->post('jenkel'),
						'alamat' =>  $this->input->post('alamat'),
						'kode_kecamatan' =>  $this->input->post('kode_kecamatan'),
						'nama_kecamatan' =>  $this->input->post('nama_kecamatan'),
						'kode_provinsi' =>  $this->input->post('kode_provinsi'),
						'nama_provinsi' =>  $this->input->post('nama_provinsi'),
						'no_hp' =>  $this->input->post('no_hp'),
						'kode_kabupaten' =>  $this->input->post('kode_kabupaten'),
						'nama_kabupaten' =>  $this->input->post('nama_kabupaten'),
						'gol_darah' =>  $this->input->post('gol_darah')	
					];
					$this->db->insert('pasien', $data);

					$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data berhasil Disimpan </div>');
					redirect('mr/datapasien');
			}
		}
	}

		

	
}