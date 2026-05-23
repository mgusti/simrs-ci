<?php
defined('BASEPATH') or exit('No direct script access allowed');

class vaksin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function pendaftaran()
    {
        error_reporting(0);
        $data['title'] = 'Data Pendaftaran Vaksin';

        $this->db->select('*');
        $this->db->from('daftarvaksin');
        $this->db->where('tgl_daftar', $this->input->get('tgl'));
        $this->db->order_by('timestamp', 'ASC');
        $data['vaksin'] = $this->db->get()->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('vaksin/pendaftaran', $data);
        $this->load->view('templates/footer');
    }

    public function hapusdaftar($kd)
    {
        $this->db->where('kd_vaksin', $kd);
        $this->db->delete('daftarvaksin');
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">data berhasil dihapus</div>');
        redirect('vaksin/pendaftaran');
    }

    public function datakuota()
    {
        $data['title'] = 'Data Kuota';

        $this->db->select('*');
        $this->db->from('kuota_vaksin');
        $this->db->order_by('tgl', 'ASC');

        $data['kuota'] = $this->db->get()->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('vaksin/kuotavaksin', $data);
        $this->load->view('templates/footer');
    }

    public function inputquota()
    {
        $tg = $this->input->post('tgl');
        $ku = $this->db->query("SELECT * FROM kuota_vaksin WHERE tgl='$tg'");
        if ($ku->num_rows() >= 1) {
            $this->session->set_flashdata('messege', '<div class="alert alert-warning" role="alert">tanggal tersebut sudah ada kuota</div>');
            redirect('vaksin/datakuota');
        }
        $data = [
            'tgl' => $this->input->post('tgl'),
            'kuota' => $this->input->post('kuota')
        ];
        $this->db->insert('kuota_vaksin', $data);
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">data berhasil disimpan</div>');
        redirect('vaksin/datakuota');
    }

    public function hapuskuota($kd)
    {
        $this->db->where('kd_kuota', $kd);
        $this->db->delete('kuota_vaksin');
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">data berhasil dihapus</div>');
        redirect('vaksin/datakuota');
    }

    public function cetakdaftar()
    {

        $tgl = $this->input->get('tgl');
        $this->db->select('*');
        $this->db->from('daftarvaksin');
        $this->db->where('tgl_daftar', $tgl);
        $data['vaksin'] = $this->db->get()->result_array();


        $this->load->view('vaksin/cetak', $data);
    }

    public function editquota($kd)
    {
        $this->db->where('kd_kuota', $kd);
        $this->db->set('kuota', $this->input->post('kuota2'));
        $this->db->update('kuota_vaksin');

        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">data berhasil diedit</div>');
        redirect('vaksin/datakuota');
    }

    public function informasi()
    {
        $data['title'] = 'Informasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['info'] = $this->db->get('informasi_vaksin')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('vaksin/informasi', $data);
        $this->load->view('templates/footer');
    }

    public function subjudul($kd)
    {
        $data['title'] = 'Sub Judul';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = $this->db->get('informasi_vaksin_detail', ['kd_judul_info' => $kd])->row_array();
        $this->db->select('*, informasi_vaksin_detail.urutan as urut');
        $this->db->from('informasi_vaksin_detail');
        $this->db->join('informasi_vaksin', 'informasi_vaksin.kd_judul_info = informasi_vaksin_detail.kd_judul_info');
        $this->db->where('informasi_vaksin.kd_judul_info', $kd);
        $data['info'] = $this->db->get()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('vaksin/subjudul', $data);
        $this->load->view('templates/footer');
    }

    public function inputsubjudul()
    {
        $data = [
            'detail' => $this->input->post('subjudul'),
            'kd_judul_info' => $this->input->post('kdjudul'),
            'urutan' => $this->input->post('urutan'),
        ];
        $this->db->insert('informasi_vaksin_detail', $data);

        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">data berhasil ditambah</div>');
        redirect('vaksin/informasi');
    }

    public function deletesubjudul($kd)
    {
        $this->db->where('kd_info_detail', $kd);
        $this->db->delete('informasi_vaksin_detail');
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">data berhasil dihapus</div>');
        redirect('vaksin/informasi');
    }

    public function inputpendaftaran()
    {
        $data = [
            'tgl_daftar' => $this->input->post('tgl'),
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'no_register' => $this->input->post('register'),
            'hp' => $this->input->post('hp'),
        ];
        $this->db->insert('daftarvaksin', $data);
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">data berhasil ditambah</div>');
        redirect('vaksin/pendaftaran');
    }

    public function inputjudul()
    {
        $data = [
            'judul' => $this->input->post('judul'),
            'urutan' => $this->input->post('urut')

        ];
        $this->db->insert('informasi_vaksin', $data);
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">data berhasil ditambah</div>');
        redirect('vaksin/informasi');
    }

    public function deletejudul($kd)

    {
        $this->db->where('kd_judul_info', $kd);
        $this->db->delete('informasi_vaksin');

        $this->db->where('kd_judul_info', $kd);
        $this->db->delete('informasi_Vaksin_detail');
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">data berhasil dihapus</div>');
        redirect('vaksin/informasi');
    }
}
