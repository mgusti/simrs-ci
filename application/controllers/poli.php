<?php
defined('BASEPATH') or exit('No direct script access allowed');

class poli extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();

		//is_logged_in();
		//$this->load->model('Pendaftaran_modal');
    }

    public function poli_masuk(){
        $data['title'] = 'Pasein Masuk';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$this->db->order_by('antrian', 'ASC');
		$data['sep'] = $this->db->get_where('sep', ['poli' => $data['user']['subbidang']])->result_array();
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('poli/poli_masuk', $data);
		$this->load->view('templates/footer');
    }
}