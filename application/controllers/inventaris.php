<?php
defined('BASEPATH') or exit('No direct script access allowed');

class inventaris extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
       

    }
    public function kir(){
        $data['title'] = 'Kartu Inventaris Ruangan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->db->get('assets_barang')->result_array();
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('inventaris/kir', $data);
		$this->load->view('templates/footer');
    }
}