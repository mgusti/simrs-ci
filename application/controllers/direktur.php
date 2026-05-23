<?php
defined('BASEPATH') or exit('No direct script access allowed');

class direktur extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();

		//is_logged_in();
		//$this->load->model('Pendaftaran_modal');
    }

    public function dashboard(){
        $data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$this->db->select('count(no_rekam_medis) as total');
        $this->db->from('pasien');
        $data['pasien'] = $this->db->get()->row_array();
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('direktur/dashboard', $data);
		$this->load->view('templates/footer'); 
    }
}