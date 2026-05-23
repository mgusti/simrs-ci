<?php
defined('BASEPATH') or exit('No direct script access allowed');

class online extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();

		
		//$this->load->model('Pendaftaran_modal');
    }

    public function dataonline(){
        $data['title'] = 'Data Pendaftar';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $data['online'] = $this->db->get('daftaronline')->result_array();
        
        
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('online/dataonline', $data);
		$this->load->view('templates/footer'); 
    }

    public function prosessdataonline($no){
        $data['title'] = 'Prosess Data Pendaftar';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $data['online'] = $this->db->get_where('daftaronline', ['no' => $no])->row_array();
        $data['poli'] = $this->db->get_where('poli', ['id' => $data['online']['poli']])->row_array();
        $data['poli1'] = $this->db->get('poli')->result_array();
        $data['tanggap'] = $this->db->get('statustanggap')->result_array();
        
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('online/prosessonline', $data);
		$this->load->view('templates/footer'); 
        
    }

    public function updateonline(){
        $this->db->set('tglkunjungan', $this->input->post('tglkunjungan'));
        $this->db->set('poli', $this->input->post('poli'));
        $this->db->set('statustanggap', $this->input->post('statustanggap'));
        
        $this->db->set('keterangan', $this->input->post('keterangan'));

        $this->db->where('no', $this->input->post('no'));
        $this->db->update('daftaronline');
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data Berhasil di update</div>');
        redirect('online/dataonline');
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
		$this->load->view('online/detailpasien', $data);
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
		redirect('online/dataonline');
	}

	public function jadwaldokter(){
		$data['title'] = 'Jadwal Dokter';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$this->db->select('*, dokter.nm_dokter, poli.nama_poli');
		$this->db->from('jadwal_dokter');
		$this->db->join('dokter', 'dokter.id = jadwal_dokter.kd_dokter');
		$this->db->join('poli', 'poli.id = jadwal_dokter.kd_poli');

		$data['jadwal'] = $this->db->get()->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('online/jadwaldokter', $data);
		$this->load->view('templates/footer');

	}

	public function pasienbaru(){
		$data['title'] = 'Pasien Baru';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('online/pasienbaru', $data);
		$this->load->view('templates/footer');
	}
   
}