<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bpjs extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();

		is_logged_in();
		//$this->load->model('Pendaftaran_modal');
    }
    public function referensi(){
        $data['title'] = 'Referensi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('bpjs/referensi', $data);
		$this->load->view('templates/footer');    
    }

    public function monitoring(){
        $data['title'] = 'Monitoring';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('bpjs/monitoring', $data);
		$this->load->view('templates/footer');   
	}
	public function lpk(){
		$data['title'] = 'Lembar Pengajuan Klaim';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('bpjs/lpk', $data);
		$this->load->view('templates/footer'); 
	}
}