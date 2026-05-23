<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Billing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta'); // Set timezone ke Indonesia (WIB)

        $this->load->helper('mr_helper');
        $this->load->helper('date_helper');
        $this->load->model('m_billing');

        is_logged_in();
    }

    public function tagihanpoli()
    {

        $data['title'] = 'Tagihan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['poli'] = $this->db->get('poli')->result_array();

        $this->db->select('id, nm_dokter');
        $this->db->order_by('nm_dokter', 'ASC');
        $q = $this->db->get('dokter');
        $data['dktr'] = $q->result_array();

        //Mengambil tahun
        $data['tahun'] = date('Y');

        // Ambil data tagihan dari model
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $poli = $this->input->post('poli');

        $data['tagihan'] = $this->m_billing->get_tagihan_poli($bulan, $tahun, $poli);

        // Load views
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('billing/tagihanpoli', $data);
        $this->load->view('templates/footer');
    }

    public function simpantagihanpoli()
    {
        $data = [
            "tgl" => $this->input->post('tanggal'),
            "nama" => $this->input->post('nama'),
            "no_mr" => $this->input->post('nomr'),
            "poli" => $this->input->post('poli'),
            "kelas" => $this->input->post('kelas'),
            "petugas" => $this->input->post('pinput'),
            "dpjp" => $this->input->post('dok'),

        ];

        $this->db->insert('billing', $data);

        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data berhasil Disimpan </div>');
        redirect('billing/tagihanpoli');
    }

    public function tanggal_indo_helper()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (isset($data['tanggal'])) {
            $formatted_tanggal = tanggal_indo($data['tanggal']);
            echo json_encode(['formatted_tanggal' => $formatted_tanggal]);
        } else {
            echo json_encode(['error' => 'Invalid date']);
        }
    }

    public function editdpjp($kd)
    {
        $data = [
            "dpjp" => $this->input->post('dok'),
        ];
        $this->db->where('no', $kd);
        $this->db->update('billing', $data);

        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data DPJP berhasil diubah </div>');
        redirect('billing/tindakan/' . $kd);
    }

    public function editnamapasien($kd)
    {
        $data = [
            "nama" => $this->input->post('nama'),
        ];
        $this->db->where('no', $kd);
        $this->db->update('billing', $data);

        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data nama pasien berhasil diubah </div>');
        redirect('billing/tindakan/' . $kd);
    }

    public function tindakan($kd)
    {
        error_reporting(0);

        $data['title'] = 'Tindakan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bil'] = $this->db->get_where('billing', ['no' => $kd])->row_array();
        // Ambil data tindakan dari model
        $data['tindakan'] = $this->m_billing->get_tindakan_by_kode($kd);
        $data['kode'] = $kd;
        $data['poli'] = $this->db->get('poli')->result_array();

        // Ambil data DPJP dari model
        $data['dpjp'] = $this->m_billing->get_dpjp_by_kode($kd);

        // Ambil data dokter dari model
        $data['dktr'] = $this->m_billing->get_all_dokter();
        $data['verifikator'] = $this->db->get_where('user', ['id' => $data['dpjp']['petugas_verif']])->row_array();

        // Load views
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('billing/tindakan', $data);
        $this->load->view('templates/footer');
    }

    public function simpantindakan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tgl_input = date('Y-m-d H:i:s');
        $dbs = [
            "tgl_input" => $tgl_input,
            "jenis_tindakan" => $this->input->post('tindakan'),
            "biaya" => $this->input->post('biaya'),
            "keterangan" => $this->input->post('ket'),
            "no_bil" => $this->input->post('no_bil'),
            "petugas" => $data['user']['id'],
        ];

        $this->db->insert('detail_billing', $dbs);
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data berhasil Disimpan </div>');
        redirect('billing/tindakan/' . $this->input->post('no_bil'));
    }

    public function simpantindakanranap()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $no = $this->input->post('no_bil');
        $tgl_masuk = new DateTime($this->input->post('tanggal_masuk_ranap'));
        if ($this->input->post('tanggal_keluar_ranap') != "") {
            $tgl_keluar = new DateTime($this->input->post('tanggal_keluar_ranap'));
            $tgl_keluar_str = $tgl_keluar->format('Y-m-d');

        } else {
            $tgl_keluar_str = null;
        }

        // Konversi ke string dalam format yang sesuai untuk database, misalnya 'Y-m-d'
        $tgl_masuk_str = $tgl_masuk->format('Y-m-d');

        // Hitung durasi dalam hari
        $durasi = $tgl_masuk->diff($tgl_keluar)->days;
        $data = [
            "ruang_ranap" => $this->input->post('ruangrawat'),
            "tgl_masuk_ranap" => $tgl_masuk_str,
            "tgl_keluar_ranap" => $tgl_keluar_str,
            "durasi_ranap" => $durasi + 1,
            "ket_ranap" => $this->input->post('ket'),
            "is_intensive" => $this->input->post('rawat_intensive'),
            // "petugas" => $data['user']['id'],
        ];

        $this->db->where('no', $no);
        $this->db->update('billing', $data);
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data berhasil Disimpan </div>');
        redirect('billing/tindakan/' . $this->input->post('no_bil'));
    }

    public function hapusTindakanRanap($no = null)
    {
        // Menyiapkan data untuk di-update menjadi NULL
        $data = [
            "ruang_ranap" => null,
            "tgl_masuk_ranap" => null,
            "tgl_keluar_ranap" => null,
            "durasi_ranap" => null,
            "ket_ranap" => null,
            "is_intensive" => null,
            // "petugas" => null, // Jika ingin menghapus petugas juga
        ];

        // Melakukan query untuk meng-update data di tabel billing
        $this->db->where('no', $no);
        $this->db->update('billing', $data);

        // Set flashdata untuk memberi notifikasi
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data Rawat Inap berhasil dihapus</div>');

        // Redirect ke halaman yang diinginkan
        redirect('billing/tindakan/' . $no);
    }

    public function verifikasi($kd = null)
    {
        date_default_timezone_set("Asia/Jakarta");
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bil'] = $this->db->get_where('billing', ['no' => $kd])->row_array();

        $data = [
            "petugas_verif" => $data['user']['id'],
            "waktu_verif" => date('Y-m-d H:i:s'),
            "status_verif" => 1,
        ];
        $this->db->where('no', $kd);
        $this->db->update('billing', $data);

        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Berhasil Di Verifikasi </div>');
        redirect('billing/tindakan/' . $kd);
    }

    public function batalverifikasi($kd = null)
    {
        date_default_timezone_set("Asia/Jakarta");
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bil'] = $this->db->get_where('billing', ['no' => $kd])->row_array();

        $data = [
            "petugas_verif" => $data['user']['id'],
            "waktu_verif" => date('Y-m-d H:i:s'),
            "status_verif" => 0,
        ];
        $this->db->where('no', $kd);
        $this->db->update('billing', $data);

        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Verifikasi Berhasil Dibatalkan</div>');
        redirect('billing/tindakan/' . $kd);
    }

    public function cetaktagihanpoli($kd = null) // Default parameter null jika tidak ada

    {
        // Cek apakah parameter $kd ada atau tidak
        if ($kd === null) {
            // Jika parameter tidak ada, tampilkan pesan error atau redirect ke halaman lain
            $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Kode billing tidak ditemukan!</div>');
            redirect('billing/tindakan/' . $kd); // Redirect ke halaman lain
            return; // Menghentikan eksekusi lebih lanjut
        }

        // Ambil data user yang sedang login
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dpjp'] = $this->m_billing->get_dpjp_by_kode($kd);
        $data['verifikator'] = $this->db->get_where('user', ['id' => $data['dpjp']['petugas_verif']])->row_array();

        // Jika user dari subbidang Kasir, lanjutkan eksekusi
        $data['title'] = 'Tindakan';

        // Ambil data dari tabel billing
        $this->db->select('*');
        $this->db->from('billing');
        $this->db->where('no', $kd);
        $data['bil'] = $this->db->get()->row_array();

        $this->db->select('*');
        $this->db->from('detail_billing');
// Periksa apakah petugas NULL
        $this->db->where('no_bil', $kd);
        $detail_billing = $this->db->get()->row_array();

        if ($detail_billing['petugas'] != null) {
            // Jika petugas tidak null, lakukan join
            $this->db->select('*');
            $this->db->from('detail_billing');
            $this->db->join('user', 'detail_billing.petugas = user.id');
            $this->db->where('no_bil', $kd);
            $data['detail_bil'] = $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('detail_billing');
            $this->db->where('no_bil', $kd);
            $data['detail_bil'] = $this->db->get()->result_array();
        }

        // Hitung total biaya
        $this->db->select_sum('biaya');
        $this->db->from('detail_billing');
        $this->db->where('no_bil', $kd);
        $data['sum'] = $this->db->get()->row_array();

        // Load view untuk cetak tagihan poli
        $this->load->view('billing/cetaktagihanpoli', $data);
    }

    public function hapustindakan($kd, $id)
    {
        $this->db->where('no', $kd);
        $this->db->delete('detail_billing');

        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data berhasil Dihapus </div>');
        redirect('billing/tindakan/' . $id);
    }

    public function edittindakan($no, $kode)
    {
        $tgl_input = date('Y-m-d H:i:s');
        $data = [
            'tgl_input' => $tgl_input,
            'jenis_tindakan' => $this->input->post('tindakan'),
            'biaya' => $this->input->post('biaya'),
            'keterangan' => $this->input->post('keterangan'),
        ];

        $this->db->where('no', $no);
        $this->db->update('detail_billing', $data);
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data berhasil Diedit </div>');
        redirect('billing/tindakan/' . $kode);
    }

    public function delbilling($kd)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['billing'] = $this->db->get_where('billing', ['no' => $kd])->row_array();
        if ($data['billing']['petugas'] != $data['user']['id']) {
            $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Hanya Petugas Input Yang dapat Menghapus </div>');
            redirect('billing/tagihanpoli/' . $kd);
        }

        if ($this->db->get_where('detail_billing', ['no_bil' => $kd])->row_array() != null) {
            $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Data Telah Diinputkan Biaya Tindakan, Tidak Dapat Dihapus </div>');
            redirect('billing/tagihanpoli/' . $kd);
        } else {
            $this->db->where('no', $kd);
            $this->db->delete('billing');

            $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data berhasil Dihapus </div>');
            redirect('billing/tagihanpoli/' . $kd);
        }

        // $this->db->delete('detail_billing');
    }

    public function editbilling($kd)
    {
        $data['title'] = 'Edit Tagihan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bil'] = $this->db->get_where('billing', ['no' => $kd])->row_array();
        $data['poli'] = $this->db->get_where('poli')->result_array();
        $data['dpjp'] = $this->db->get_where('billing', ['no' => $kd])->row_array();
        //Ambil dokter
        $this->db->select('id, nm_dokter');
        $this->db->order_by('nm_dokter', 'ASC');
        $q = $this->db->get('dokter');
        $data['dktr'] = $q->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('billing/editbilling', $data);
        $this->load->view('templates/footer');
    }

    public function aksieditbilling($kd)
    {
        $data = [
            "tgl" => $this->input->post('tanggal'),
            "nama" => $this->input->post('nama'),
            "no_mr" => $this->input->post('nomr'),
            "poli" => $this->input->post('poli'),
            "kelas" => $this->input->post('kelas'),
            "dpjp" => $this->input->post('dok'),
        ];
        $this->db->where('no', $kd);
        $this->db->update('billing', $data);

        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data berhasil Diedit </div>');
        redirect('billing/tindakan/' . $kd);
    }

    public function rekaptagihan()
    {
        $data['title'] = 'Rekap Tagihan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->select('billing.poli as pol');
        $this->db->select_sum('detail_billing.biaya');
        $this->db->from('detail_billing');
        $this->db->join('billing', 'detail_billing.no_bil = billing.no', 'right');
        $this->db->group_by('poli');
        $this->db->where('month(tgl)', $this->input->post('bulan'));
        $this->db->where('year(tgl)', $this->input->post('tahun'));

        $data['billing'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('billing/rekaptagihan', $data);
        $this->load->view('templates/footer');
    }

    public function cetakrekaptagihanruangan()
    {
        // Sanitize and validate input
        $ruangan = $this->input->post('ruangan');
        $kelas = $this->input->post('kelas');
        $bulan = (int) $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $poli_masuk = $this->input->post('poli_masuk');
        $poli_ranap = $this->input->post('poli_ranap');
        $jenis_tindakan = $this->input->post('jenis_tindakan');
        // $order_by = $this->input->post('order_by');

        // Validate bulan input (ensure it's a valid month)
        if (!in_array($bulan, range(1, 12))) {
            return 'Bulan tidak valid.';
        }

        // Prepare the query to get the details
        $this->db->select('detail_billing.*,detail_billing.no AS primary_detail_billing, billing.*,billing.no AS primary_billing, user.*');
        $this->db->from('billing');
        $this->db->join('detail_billing', 'billing.no = detail_billing.no_bil');
        $this->db->join('user', 'detail_billing.petugas = user.id');
        $this->db->like('tgl', $tahun . '-' . str_pad($bulan, 2, '0', STR_PAD_LEFT));

        // Apply filters based on input
        if ($ruangan != 'semua') {
            $this->db->where_in('user.subbidang', $ruangan);
        }
        if ($kelas != '-') {
            $this->db->where_in('billing.kelas', $kelas);
        }
        if ($poli_masuk != '-') {
            $this->db->where_in('billing.poli', $poli_masuk);
        }
        if ($poli_ranap != '-') {
            $this->db->where_in('billing.ruang_ranap', $poli_ranap);
        }
        if ($jenis_tindakan != '-') {
            $this->db->where_in('detail_billing.jenis_tindakan', $jenis_tindakan);
        }
        // if ($order_by == 1) {
        //     $this->db->order_by('billing.tgl');
        // } else {
        //     $this->db->order_by('detail_billing.tgl_input');
        // }

        // Execute the query to get the details
        $query = $this->db->get();

        // Check for query execution errors
        if (!$query) {
            return 'Terjadi kesalahan dalam pengambilan data.';
        }

        // Get all results as an array
        $data['rekap_tagihan'] = $query->result_array();

        // Calculate total biaya
        $total_biaya = 0;
        foreach ($data['rekap_tagihan'] as $row) {
            $total_biaya += $row['biaya']; // Asumsikan 'biaya' adalah kolom yang menyimpan nilai biaya
        }

        // Prepare other data for the response
        $data['total_biaya'] = $total_biaya;
        $data['ruangan'] = $ruangan;
        $data['kelas'] = $kelas;
        // Array nama bulan dalam bahasa Indonesia
        $bulanIndo = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

// Mengubah bulan menjadi nama bulan dalam bahasa Indonesia
        $data['bulan'] = isset($bulanIndo[$bulan]) ? $bulanIndo[$bulan] : 'Bulan tidak valid';

        $data['poli_masuk'] = $poli_masuk;
        $data['poli_ranap'] = $poli_ranap;
        $data['jenis_tindakan'] = $jenis_tindakan;

        // // Return or display the data as needed
        // echo '<pre>' . var_export($data, true) . '</pre>';
        $this->load->view('billing/cetakrekaptagihanruangan', $data);

    }

}
