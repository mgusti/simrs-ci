<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ambulan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Ambulan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ambulan'] = $this->db->get('tb_ambulan')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ambulan/index', $data);
        $this->load->view('templates/footer');
    }

    public function aksiambulan()
    {
        $data = [
            'no_polisi' => $this->input->post('nopol'),
            'tahun_mobil' => $this->input->post('tahun'),
            'status' => '1'
        ];
        $this->db->insert('tb_ambulan', $data);
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data Berhasil ditambah</div>');
        redirect('ambulan/index');
    }

    public function hapusambulan($kd)
    {
        $this->db->where('kd_mobil', $kd);
        $this->db->delete('tb_ambulan');

        $this->session->set_flashdata('messege', '<div class="alert alert-warning" role="alert">Data Berhasil dihapus</div>');
        redirect('ambulan/index');
    }

    public function supir()
    {
        $data['title'] = 'Supir';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['supir'] = $this->db->get('tb_supir')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ambulan/supir', $data);
        $this->load->view('templates/footer');
    }

    public function aksisupir()
    {
        $data = [
            'nama_supir' => $this->input->post('nama'),
            'nik' => $this->input->post('nik'),
            'no_sim' => $this->input->post('sim'),
            'tmt_sim' => $this->input->post('tmt'),
            'status' => '0'
        ];

        $this->db->insert('tb_supir', $data);
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data Berhasil ditambah</div>');
        redirect('ambulan/supir');
    }

    public function hapussupir($id)
    {
        $this->db->where('id_supir', $id);
        $this->db->delete('tb_supir');

        $this->session->set_flashdata('messege', '<div class="alert alert-warning" role="alert">Data Berhasil dihapus</div>');
        redirect('ambulan/supir');
    }

    public function suratjalan()
    {
        $data['title'] = 'Surat Jalan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->select('*');
        $this->db->from('tb_suratjalan');
        $this->db->order_by('tgl_jalan', 'ASC');
        $this->db->where('status', '1');
        $data['jalan'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ambulan/suratjalan', $data);
        $this->load->view('templates/footer');
    }

    public function formjalan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->select_max('nomor');
        $this->db->from('tb_suratjalan');
        $data['nmr'] = $this->db->get()->row_array();
        $bokingan = $data['nmr']['nomor'];
        $urutan = (int) substr($bokingan, 1, 3);
        $urutan++;
        $kode = sprintf("%03s", $urutan);
        $data['hasil'] =  $kode . '-' . 'HAM' . '-' . date('Y');

        $data['title'] = 'Surat Jalan Ambulan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['suratjalan'] = $this->db->get('tb_suratjalan')->result_array();
        $data['supir'] = $this->db->get_where('tb_supir', ['status' => '0'])->result_array();
        $data['amb'] = $this->db->get_where('tb_ambulan', ['status' => '1'])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ambulan/formjalan', $data);
        $this->load->view('templates/footer');
    }

    public function inputjalan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $nomor = $this->input->post('nomor');
        $tgl = $this->input->post('tgl');
        $supir = $this->input->post('supir');
        $ambulan = $this->input->post('ambulan');
        $jam = $this->input->post('jam');
        $km = $this->input->post('km');
        $tujuan = $this->input->post('tujuan');

        $nmpasien = $this->input->post('pengguna');
        $keperluan = $this->input->post('keperluan');
        $pembayaran = $this->input->post('pembayaran');

        $data = [
            'nomor' => $nomor,
            'id_supir' => $supir,
            'kd_mobil' => $ambulan,
            'tujuan' => $tujuan,
            'status' => '1',
            'tgl_jalan' => $tgl,
            'jam' => $jam,
            'km_mobil' => $km,
            'pengguna' => $nmpasien,
            'keperluan' => $keperluan,
            'kd_pembayaran' => $pembayaran,
            'petugas' => $data['user']['name']
        ];
        //ambulan

        $this->db->insert('tb_suratjalan', $data);

        $this->db->set('status', '2');
        $this->db->where('kd_mobil', $ambulan);
        $this->db->update('tb_ambulan');


        //supir

        $this->db->set('status', '1');
        $this->db->where('id_supir', $supir);
        $this->db->update('tb_supir');

        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data Berhasil ditambah</div>');
        redirect('ambulan/suratjalan');
    }

    public function cetaksurat($nomor)
    {
        $this->db->select('*, tb_supir.nama_supir as supir, tb_ambulan.no_polisi as nopol');
        $this->db->from('tb_suratjalan');
        $this->db->join('tb_supir', 'tb_supir.id_supir = tb_suratjalan.id_supir');
        $this->db->join('tb_ambulan', 'tb_ambulan.kd_mobil = tb_suratjalan.kd_mobil');
        $this->db->where('nomor', $nomor);
        $data['surat'] = $this->db->get()->row_array();

        $this->load->view('ambulan/cetaksurat', $data);
    }

    public function pulang($nomor)
    {
        $this->db->select('*, tb_supir.nama_supir as supir, tb_ambulan.no_polisi as nopol');
        $this->db->from('tb_suratjalan');
        $this->db->join('tb_supir', 'tb_supir.id_supir = tb_suratjalan.id_supir');
        $this->db->join('tb_ambulan', 'tb_ambulan.kd_mobil = tb_suratjalan.kd_mobil');
        $this->db->where('nomor', $nomor);
        $data['jln'] = $this->db->get()->row_array();

        $data['title'] = 'Ambulan Pulang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['suratjalan'] = $this->db->get_where('tb_suratjalan', ['nomor' => $nomor])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ambulan/pulang', $data);
        $this->load->view('templates/footer');
    }

    public function aksipulang()
    {
        $this->db->set('tgl_pulang', $this->input->post('tgl'));
        $this->db->set('jam_pulang', $this->input->post('jam'));
        $this->db->set('km_pulang', $this->input->post('pulang'));
        $this->db->set('jarak_tempuh', $this->input->post('jarak'));
        $this->db->set('status', '2');
        $this->db->where('nomor', $this->input->post('nomor'));
        $this->db->update('tb_suratjalan');


        $this->db->set('status', '1');
        $this->db->where('kd_mobil', $this->input->post('kd_mobil'));
        $this->db->update('tb_ambulan');


        $this->db->set('status', '0');
        $this->db->where('id_supir', $this->input->post('id_supir'));
        $this->db->update('tb_supir');


        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data Berhasil</div>');

        redirect('ambulan/suratjalan');
    }
}
