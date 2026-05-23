<?php
defined('BASEPATH') or exit('No direct script access allowed');

class manajemen extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function datapegawai()
	{
		$data['title'] = 'Data Pegawai';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$data['puser'] = $this->db->get('pegawai')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('manajemen/datapegawai', $data);
		$this->load->view('templates/footer');
	}

	public function inputpeg()
	{
		$data['title'] = 'Input Pegawai';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('manajemen/inputpeg', $data);
		$this->load->view('templates/footer');
	}

	public function dataagenda()
	{
		$data['title'] = 'Data Agenda';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

		$this->db->select('*');
		$this->db->from('agenda');
		$data['agenda'] = $this->db->get()->result_array();
		$this->db->order_by('tgl', 'DESC');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('manajemen/dataagenda', $data);
		$this->load->view('templates/footer');
	}

	public function inputagenda()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$data = [
			'tgl' => $this->input->post('tgl'),
			'agenda' => $this->input->post('agenda'),
			'lokasi' => $this->input->post('lokasi'),
			'jam_mulai' => $this->input->post('mulai'),
			'jam_selesai' => $this->input->post('selesai'),
			'status' => 'TUNGGU',
			'user' => $data['user']['name'],
			'tgl_input' => date('Y-m-d')
		];

		$this->db->insert('agenda', $data);
		$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">agenda berhasil disimpan</div>');
		redirect('manajemen/dataagenda');
	}

	public function hapusagenda($no)
	{
		$this->db->delete('agenda', ['no' => $no]);
		$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Data Berhasil Dihapus</div>');
		redirect('manajemen/dataagenda');
	}

	public function editagenda($no)
	{
		$data['title'] = 'Edit Agenda';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$data['agenda'] = $this->db->get_where('agenda', ['no' => $no])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('manajemen/editagenda', $data);
		$this->load->view('templates/footer');
	}

	public function edita($no)
	{
		$data = [
			'tgl' => $this->input->post('tgl'),
			'agenda' => $this->input->post('agenda'),
			'lokasi' => $this->input->post('lokasi'),
			'jam_mulai' => $this->input->post('jam_mulai'),
			'jam_selesai' => $this->input->post('jam_selesai'),
			'status' => $this->input->post('status')


		];

		$this->db->where('no', $no);
		$this->db->update('agenda', $data);
		$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data Berhasil dirubah</div>');
		redirect('manajemen/dataagenda');
	}


	public function datapengadaan()
	{
		$data['title'] = 'Data Pengadaan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		//$data['pengadaan'] = $this->db->get('pengadaan')->result_array();
		$this->db->select('*');
		$this->db->from('pengadaan');
		$this->db->where('YEAR(pengadaan.tgl)', date('Y'));
		$data['pengadaan'] = $this->db->get()->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('manajemen/datapengadaan', $data);
		$this->load->view('templates/footer');
	}

	public function inputpengadaan()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$data = [
			'tgl' => $this->input->post('tgl'),
			'paket' => $this->input->post('paket'),
			'vendor' => $this->input->post('vendor'),
			'nilai' => $this->input->post('nilai'),
			'status' => 'TUNGGU',
			'user_input' => $data['user']['name'],
			'tgl_input' => date('Y-m-d')
		];

		$this->db->insert('pengadaan', $data);
		$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">agenda berhasil disimpan</div>');
		redirect('manajemen/datapengadaan');
	}

	public function runagenda()
	{
		$data['title'] = 'Data Running Text';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['te'] = $this->db->get('textagenda')->result_array();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('manajemen/runagenda', $data);
		$this->load->view('templates/footer');
	}

	public function inptext()
	{
		$data = [
			'text' => $this->input->post('text')
		];

		$this->db->insert('textagenda', $data);
		$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">text berhasil disimpan</div>');
		redirect('manajemen/runagenda');
	}

	public function hapustext($kd)
	{
		$this->db->delete('textagenda', ['kd' => $kd]);
		$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Data Berhasil Dihapus</div>');
		redirect('manajemen/runagenda');
	}
}
