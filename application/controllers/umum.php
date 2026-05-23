<?php
defined('BASEPATH') or exit('No direct script access allowed');

class umum extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
       

    }

    

    public function barang(){
        $data['title'] = 'Assets';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->db->get('assets_barang')->result_array();
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('umum/barang', $data);
		$this->load->view('templates/footer');
    }

    public function simpanbarang(){
        $data =[
            'kd_barang' => $this->input->post('kodebarang'),
            'nama_barang' => $this->input->post('namabarang'),
            'merk' => $this->input->post('merk'),
            'ukuran' => $this->input->post('ukuran'),
            'jenisanggaran' => $this->input->post('jenis'),
            'thnanggaran' => $this->input->post('tahun'),
            'jumlah' => $this->input->post('jumlah'),
            'nilai' => $this->input->post('nilai'),
            'total' => $this->input->post('total')
        ];
        $this->db->insert('assets_barang', $data);
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data berhasil Disimpan </div>');
		redirect('umum/barang');
    }

    public function ruangan(){
        $data['title'] = 'Ruangan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ruang'] = $this->db->get('ruangan')->result_array();
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('umum/ruangan', $data);
        $this->load->view('templates/footer');
        
    
    }

    public function simpanruang(){
        $data =[
            'nama_ruangan' => $this->input->post('nama'),
            'lokasi' => $this->input->post('lokasi'),
            'penanggung' => $this->input->post('penanggung'),
            
        ];
        $this->db->insert('ruangan', $data);
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data berhasil Disimpan </div>');
		redirect('umum/ruangan');
    }

    public function inputbarang(){
        $data['title'] = 'Input Assets';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ruang'] = $this->db->get('ruangan')->result_array();
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('umum/inputbarang', $data);
        $this->load->view('templates/footer');
    }
}
