<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_billing extends CI_Model
{
    // public function get_tagihan_poli($bulan, $tahun, $poli)
    // {
    //     $this->db->select('billing.*, user.name as petugas_nama, user.subbidang as subbidang'); // Ambil kolom billing dan nama user
    //     $this->db->from('billing');
    //     $this->db->join('user', 'billing.petugas = user.id', 'left'); // Join berdasarkan id petugas
    //     $this->db->where('month(tgl)', $bulan);
    //     $this->db->where('year(tgl)', $tahun);
    //     $this->db->like('poli', $poli);
    //     $this->db->order_by('tgl', 'DESC');

    //     return $this->db->get()->result_array(); // Mengembalikan hasil query dalam bentuk array
    // }

    public function get_tagihan_poli($bulan, $tahun, $poli)
    {
        $this->db->select('billing.*, user.name as petugas_nama, user.subbidang as subbidang');
        $this->db->from('billing');
        $this->db->join('user', 'billing.petugas = user.id', 'left');
        $this->db->where('MONTH(tgl)', $bulan);
        $this->db->where('YEAR(tgl)', $tahun);

        if (!empty($poli)) {
            // Gunakan instance DB baru agar tidak mengganggu query utama
            $cek = $this->db->query(
                "SELECT * FROM poli WHERE nama_poli = ?",
                [str_replace('Poli ', '', $poli)]
            )->row_array();

            if ($cek) {
                // Kalau ketemu → filter billing.poli
                $this->db->like('billing.poli', $cek['nama_poli']);

            } else {
                // Kalau tidak ketemu → filter billing.ruang_ranap
                $this->db->like('billing.ruang_ranap', $poli);
            }
        }

        $this->db->order_by('tgl', 'DESC');
        return $this->db->get()->result_array();
    }

    // Fungsi untuk mengambil tindakan berdasarkan no_bil dan join dengan tabel user
    public function get_tindakan_by_kode($kd)
    {
        $this->db->select('detail_billing.*, user.name as petugas_nama, user.subbidang as subbidang'); // Ambil semua kolom dari detail_billing dan nama dari tabel user
        $this->db->from('detail_billing');
        $this->db->join('user', 'detail_billing.petugas = user.id', 'left'); // Join tabel user berdasarkan id petugas
        $this->db->where('detail_billing.no_bil', $kd); // Ambil data berdasarkan no_bil
        return $this->db->get()->result_array(); // Kembalikan hasil query dalam bentuk array
    }

    // Fungsi untuk mengambil DPJP (dokter penanggung jawab pasien) berdasarkan kode billing
    public function get_dpjp_by_kode($kd)
    {
        return $this->db->get_where('billing', ['no' => $kd])->row_array(); // Kembalikan 1 row dari tabel billing
    }

    // Fungsi untuk mengambil daftar dokter
    public function get_all_dokter()
    {
        $this->db->select('id, nm_dokter');
        $this->db->order_by('nm_dokter', 'ASC');
        return $this->db->get('dokter')->result_array(); // Kembalikan daftar dokter dalam bentuk array
    }
}
