<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JadwalDokter extends CI_Controller
{

    public function index()
    {
        $data['judul'] = 'Spesialis';
        $data['klinik'] = $this->db->select('*')->from('ruangan')->where('grup', '1')->get()->result_array();
        if (isset($_GET['hari_kerja']) && isset($_GET['pilih_poli'])) {
            $this->db->select('ruangan.nama_ruangan, dokter.nm_dokter, TIME_FORMAT(jadwal_dokter.jam_mulai, "%h:%i") as jam_mulai, TIME_FORMAT(jadwal_dokter.jam_selesai, "%h:%i") as jam_selesai');
            $this->db->from('ruangan');
            $this->db->join('jadwal_dokter', 'ruangan.kd_ruangan = jadwal_dokter.kd_poli');
            $this->db->join('dokter', 'dokter.id = jadwal_dokter.kd_dokter');
            $this->db->where('jadwal_dokter.hari_kerja', $_GET['hari_kerja']);
            $this->db->where('ruangan.nama_ruangan', $_GET['pilih_poli']);
            $this->db->where('ruangan.grup', '1');
            $data['haripoli'] = $this->db->get()->result_array();
        } else if (isset($_GET['hari_kerja'])) {
            $this->db->select('ruangan.nama_ruangan, dokter.nm_dokter, TIME_FORMAT(jadwal_dokter.jam_mulai, "%h:%i") as jam_mulai, TIME_FORMAT(jadwal_dokter.jam_selesai, "%h:%i") as jam_selesai');
            $this->db->from('ruangan');
            $this->db->join('jadwal_dokter', 'ruangan.kd_ruangan = jadwal_dokter.kd_poli');
            $this->db->join('dokter', 'dokter.id = jadwal_dokter.kd_dokter');
            $this->db->where('jadwal_dokter.hari_kerja', $_GET['hari_kerja']);
            $this->db->where('ruangan.grup', '1');
            $this->db->order_by('ruangan.nama_ruangan');
            $data['haripoli'] = $this->db->get()->result_array();
        } else {
            $data['haripoli'] = [];
        }

        $this->load->view('jdok/index', $data);
    }

    public function telemedic()
    {
        $data['judul'] = 'Konsultasi';
        $data['klinik'] = $this->db->select('poli_telemedic.nama_poli as nama_ruangan')->from('poli_telemedic')->get()->result_array();
        if (isset($_GET['hari_kerja']) && isset($_GET['pilih_poli'])) {
            $this->db->select('poli_telemedic.nama_poli as nama_ruangan, dokter.nm_dokter, TIME_FORMAT(jadwal_dokter.jam_mulai, "%h:%i") as jam_mulai, TIME_FORMAT(jadwal_dokter.jam_selesai, "%h:%i") as jam_selesai');
            $this->db->from('poli_telemedic');
            $this->db->join('jadwal_dokter', 'poli_telemedic.id = jadwal_dokter.kd_poli');
            $this->db->join('dokter', 'dokter.id = jadwal_dokter.kd_dokter');
            $this->db->where('jadwal_dokter.hari_kerja', $_GET['hari_kerja']);
            $this->db->where('poli_telemedic.nama_poli', $_GET['pilih_poli']);
            $data['haripoli'] = $this->db->get()->result_array();
        } else if (isset($_GET['hari_kerja'])) {
            $this->db->select('poli_telemedic.nama_poli as nama_ruangan, dokter.nm_dokter, TIME_FORMAT(jadwal_dokter.jam_mulai, "%h:%i") as jam_mulai, TIME_FORMAT(jadwal_dokter.jam_selesai, "%h:%i") as jam_selesai');
            $this->db->from('poli_telemedic');
            $this->db->join('jadwal_dokter', 'poli_telemedic.id = jadwal_dokter.kd_poli');
            $this->db->join('dokter', 'dokter.id = jadwal_dokter.kd_dokter');
            $this->db->where('jadwal_dokter.hari_kerja', $_GET['hari_kerja']);
            $this->db->order_by('poli_telemedic.nama_poli');
            $data['haripoli'] = $this->db->get()->result_array();
        } else {
            $data['haripoli'] = [];
        }
        $this->load->view('jdok/index', $data);
    }
}
