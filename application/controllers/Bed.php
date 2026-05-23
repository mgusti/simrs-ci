<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bed extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bed_model');

        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Input Bangsal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['bed'] =  $this->db->get('bangsal')->result_array();

        $this->form_validation->set_rules('kdbangsal', 'Kode Bangsal', 'required');
        $this->form_validation->set_rules('nmbangsal', 'Nama Bangsal', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('bed/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_bangsal' =>  $this->input->post('kdbangsal'),
                'nm_bangsal' =>  $this->input->post('nmbangsal'),
                'status' =>  $this->input->post('status')
            ];
            $this->db->insert('bangsal', $data);
            $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">New Bangsal Has Been Added!</div>');
            redirect('bed');
        }
    }

    public function kamar()
    {

        $data['title'] = 'Input Kamar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data['kamar'] = $this->db->get('kamar')->result_array();
        $data['bangsal'] = $this->db->get('bangsal')->result_array();

        $this->form_validation->set_rules('kdkamar', 'Kode Kamar', 'required');
        $this->form_validation->set_rules('kdbangsal', 'Kode Bangsal', 'required');
        $this->form_validation->set_rules('tarif', 'Tarif Kamar', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('bed/kamar', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_kamar' =>  $this->input->post('kdkamar'),
                'kd_bangsal' =>  $this->input->post('kdbangsal'),
                'trf_kamar' =>  $this->input->post('tarif'),
                'status' =>  $this->input->post('status'),
                'kelas' =>  $this->input->post('kelas'),
                'statusdata' =>  $this->input->post('statusdata')
            ];
            $this->db->insert('kamar', $data);
            $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">New Kamar Has Been Added!</div>');
            redirect('bed/kamar');
        }
    }

    public function aplicare()
    {
        $data['title'] = 'Input Aplicares';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['aplicare'] = $this->db->get('aplicare_ketersediaan_kamar')->result_array();
        $data['bangsal'] = $this->db->get('bangsal')->result_array();

        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required');
        $this->form_validation->set_rules('tersedia', 'Tersedia', 'required');
        $this->form_validation->set_rules('tersediapria', 'Tersedia Pria', 'required');
        $this->form_validation->set_rules('tersediawanita', 'Tersedia Wanita', 'required');
        $this->form_validation->set_rules('tersediapriawanita', 'Tersedia Pria Wanita', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('bed/aplicare', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_kelas_aplicare' =>  $this->input->post('kodekelasaplicare'),
                'kd_bangsal' =>  $this->input->post('kdbangsal'),
                'kelas' =>  $this->input->post('kelas'),
                'kapasitas' =>  $this->input->post('kapasitas'),
                'tersedia' =>  $this->input->post('tersedia'),
                'tersediapria' =>  $this->input->post('tersediapria'),
                'tersediawanita' =>  $this->input->post('tersediawanita'),
                'tersediapriawanita' =>  $this->input->post('tersediapriawanita')
            ];
            $this->db->insert('aplicare_ketersediaan_kamar', $data);
            $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">New Aplicare Has Been Added!</div>');
            redirect('bed/aplicare');
        }
    }

    public function ubahBed($kd_bangsal)
    {
        $data['title'] = 'Form Ubah Data Bangsal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bed'] = $this->Bed_model->getBedByKd($kd_bangsal);

        $this->form_validation->set_rules('nama_bangsal', 'Nama Bangsal', 'required');
        $this->form_validation->set_rules('status', 'Status Bangsal', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('bed/ubahbed', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Bed_model->ubahDataBangsal();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('bed');
        }
    }
    public function ubahKamar($kd_bangsal)
    {
        $data['title'] = 'Form Ubah Data Kamar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kamar'] = $this->Bed_model->getKamarByKd($kd_bangsal);

        $this->form_validation->set_rules('kdbangsal', 'Kode Bangsal', 'required');
        $this->form_validation->set_rules('tarif', 'Tarif', 'required|numeric');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('statusdata', 'Status Data', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('bed/ubahkamar', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Bed_model->ubahDataKamar();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('bed/kamar');
        }
    }

    public function hapusKamar($kd_kamar)
    {
        $this->Bed_model->hapusDataKamar($kd_kamar);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('bed/kamar');
    }

    public function hapusBed($kd_bangsal)
    {
        $this->Bed_model->hapusDataBangsal($kd_bangsal);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('bed');
    }
}
