<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }
    public function umum()
    {

        $data['title'] = 'Pasien Baru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $data['provinsi'] = $this->db->get('provinsi')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/umum', $data);
        $this->load->view('templates/footer');
    }

    public function caripasien($nomr)
    {

        $pasien = $this->db->get_where('pasien', ['no_rekam_medis' => $nomr])->row_array();

        echo json_encode($pasien);

    }
    public function simpanpasien()
    {
        $no_rekam_medis = $this->input->post('nomr');
        $nik = $this->input->post('no_ktp');
        $sql = $this->db->query("SELECT no_rekam_medis FROM pasien where no_rekam_medis='$no_rekam_medis'");
        $cek_rm = $sql->num_rows();

        if ($cek_rm > 0) {
            $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">No RM sudah Terdaftar</div>');
            redirect('pendaftaran/umum');
        } else {
            $sql2 = $this->db->query("SELECT no_ktp FROM pasien where no_ktp='$nik'");
            $cek_nik = $sql2->num_rows();
            if ($cek_nik > 0) {
                $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">No KTP sudah Terdaftar</div>');
                redirect('pendaftaran/umum');
            } else {
                $data = [
                    'no_rekam_medis' => $this->input->post('nomr'),
                    'nokartu' => $this->input->post('nokartu'),
                    'nama_pasien' => $this->input->post('nama_pasien'),
                    'no_ktp' => $this->input->post('no_ktp'),
                    'tgl_lahir' => $this->input->post('tgl_lahir'),
                    'jenkel' => $this->input->post('jenkel'),
                    'alamat' => $this->input->post('alamat'),
                    'kode_kecamatan' => $this->input->post('kode_kecamatan'),
                    'nama_kecamatan' => $this->input->post('nama_kecamatan'),
                    'kode_provinsi' => $this->input->post('kode_provinsi'),
                    'nama_provinsi' => $this->input->post('nama_provinsi'),
                    'no_hp' => $this->input->post('no_hp'),
                    'kode_kabupaten' => $this->input->post('kode_kabupaten'),
                    'nama_kabupaten' => $this->input->post('nama_kabupaten'),
                    'gol_darah' => $this->input->post('gol_darah'),
                ];
                $this->db->insert('pasien', $data);

                $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data berhasil Disimpan </div>');
                redirect('pendaftaran/datapasien');
            }
        }
    }

    public function datapasien()
    {
        $data['title'] = 'Data Pasien';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

        $key = $this->input->post('key');

        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->like('no_rekam_medis', $key);
        $this->db->or_like('no_ktp', $key);
        $this->db->or_like('nokartu', $key);
        $this->db->or_like('nama_pasien', $key);
        $this->db->limit(50);
        $data['pasien'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/datapasien', $data);
        $this->load->view('templates/footer');
    }

    public function detailpasien($mr)
    {
        $data['title'] = 'Detail Pasien';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $data['pasien'] = $this->db->get_where('pasien', ['no_rekam_medis' => $mr])->row_array();
        $data['provinsi'] = $this->db->get('provinsi')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/detailpasien', $data);
        $this->load->view('templates/footer');
    }

    public function editpasien()
    {
        $data = [

            'nokartu' => $this->input->post('nokartu'),
            'nama_pasien' => $this->input->post('nama_pasien'),
            'no_ktp' => $this->input->post('no_ktp'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'jenkel' => $this->input->post('jenkel'),
            'alamat' => $this->input->post('alamat'),
            'kode_kecamatan' => $this->input->post('kode_kecamatan'),
            'nama_kecamatan' => $this->input->post('nama_kecamatan'),
            'kode_provinsi' => $this->input->post('kode_provinsi'),
            'nama_provinsi' => $this->input->post('nama_provinsi'),
            'no_hp' => $this->input->post('no_hp'),
            'kode_kabupaten' => $this->input->post('kode_kabupaten'),
            'nama_kabupaten' => $this->input->post('nama_kabupaten'),
            'gol_darah' => $this->input->post('gol_darah'),
        ];

        $this->db->where('no_rekam_medis', $this->input->post('nomr'));
        $this->db->update('pasien', $data);
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data Berhasil dirobah</div>');
        redirect('pendaftaran/datapasien');
    }
    public function sep_umum()
    {
        $data['title'] = 'Sep UMUM';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/sep_umum', $data);
        $this->load->view('templates/footer');
    }

    public function sep_bpjs($mr)
    {
        $data['title'] = 'SEP BPJS';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

        $data['sep'] = $this->db->get_where('sep', ['nokartu' => $mr])->result_array();
        $data['pasien'] = $this->db->get_where('pasien', ['nokartu' => $mr])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/sep_bpjs', $data);
        $this->load->view('templates/footer');
    }

    public function sepbaru()
    {

        $data['title'] = 'SEP BARU';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $nokartu = $_GET["nokartu"];
        $data['pasien'] = $this->db->get_where('pasien', ['nokartu' => $nokartu])->row_array();
        $data['provinsi'] = $this->db->get('provinsi')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/sepbaru', $data);
        $this->load->view('templates/footer');
    }

    public function sepbarurujukan()
    {
        $data['title'] = 'SEP BARU RUJUKAN';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/sepbarurujukan', $data);
        $this->load->view('templates/footer');
    }

    public function sepbarurujukan1()
    {
        $data['title'] = 'SEP BARU RUJUKAN';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/sepbarurujukan1', $data);
        $this->load->view('templates/footer');
    }

    public function simpansep()
    {
        $data = [
            'noKartu' => $this->input->post('noKartu'),
            'tglSep' => $this->input->post('tglSep'),
            'ppkPelayanan' => '0082R003',
            'jnsPelayanan' => $this->input->post('jnspelayanan'),
            'klsRawat' => $this->input->post('klsRawat'),
            'noMR' => $this->input->post('noMR'),
            'asalRujukan' => $this->input->post('asalRujukan'),
            'noRujukan' => $this->input->post('norujukan'),
            'tglRujukan' => $this->input->post('tglrujukan'),
            'ppkRujukan' => $this->input->post('ppkasal'),
            'catatan' => $this->input->post('catatan'),
            'diagAwal' => $this->input->post('diagAwal'),
            'tujuan' => $this->input->post('poli'),
            'eksekutif' => '0',
            'cob' => '0',
            'katarak' => $this->input->post('katarak'),
            'lakaLantas' => '0',
            'penjamin' => '',
            'tglKejadian' => '',
            'keterangan' => '',
            'suplesi' => '',
            'noSepSuplesi' => '',
            'kdProvinsi' => '',
            'kdKabupaten' => '',
            'kdKecamatan' => '',
            'noSurat' => $this->input->post('noskdp'),
            'kodeDPJP' => $this->input->post('kodeDPJP'),
            'noTelp' => $this->input->post('noTelp'),
            'user' => $this->input->post('user'),

        ];
        $this->db->insert('sepbaru', $data);

        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data berhasil Disimpan </div>');
        redirect('pendaftaran/datapasien');
    }

    public function cetakseprujukan()
    {
        $data['title'] = 'SEP BARU RUJUKAN';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/cetakseprujukan', $data);
        $this->load->view('templates/footer');
    }

    public function cetaksepigd()
    {
        $data['title'] = 'SEP BARU IGD';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/cetaksepigd', $data);
        $this->load->view('templates/footer');
    }

    public function simpansepcetak()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $sep = $this->input->post('nosep');

        $cek = $this->db->get_where('sep', ['nosep' => $sep])->row_array();

        if ($cek >= 1) {
            $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">No Sep telah didaftarkan di RSUD H abdul manap</div>');
            redirect('bpjs/sep?nosep=' . $sep);
        } else {
            $data = [
                'nosep' => $this->input->post('nosep'),
                'jnspeserta' => $this->input->post('jnspeserta'),
                'tgl_sep' => $this->input->post('tgl_sep'),
                'cob' => $this->input->post('cob'),
                'nokartu' => $this->input->post('nokartu'),
                'nomr' => $this->input->post('nomr'),
                'nama' => $this->input->post('nama'),
                'jnspelayanan' => $this->input->post('jnspelayanan'),
                'tgllahir' => $this->input->post('tgllahir'),
                'kelas' => $this->input->post('kelas'),
                'poli' => $this->input->post('poli'),
                'kelamin' => $this->input->post('kelamin'),
                'penjamin' => $this->input->post('penjamin'),
                'diagnosa' => $this->input->post('diagnosa'),
                'catatan' => $this->input->post('catatan'),
                'tgl_masuk' => date('Y-m-d'),
                'antrian' => $this->input->post('antrian'),
                'dinsos' => $this->input->post('dinsos'),
                'porlanisprb' => $this->input->post('porlanisprb'),
                'nosktm' => $this->input->post('nosktm'),
                'user_input' => $data['user']['name'],
                'tgl_input' => date('Y-m-d'),
                'jam_input' => date('h:m:s'),

            ];
            $this->db->insert('sep', $data);
            redirect('pendaftaran/printsep/' . $sep);
        }
    }

    public function printsep($sep)
    {

        $data['sep1'] = $this->db->get_where('sep', ['nosep' => $sep])->row_array();

        $this->load->view('pendaftaran/cetaksep', $data);

    }

    public function hapussep($sep)
    {
        $data1 = "29409";
        $secretKey = "1iQ5B4702D";
        date_default_timezone_set('UTC');
        $tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
        $signature = hash_hmac('sha256', $data1 . "&" . $tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);

        $ch = curl_init();
        $headers = array(
            "X-cons-id:" . $data1,
            "X-timestamp: " . $tStamp,
            "X-signature: " . $encodedSignature,
            "Content-Type: Application/x-www-form-urlencoded",
        );

        $arr =

        array(
            'request' => array(
                't_sep' => array(
                    'noSep' => $sep,
                    'user' => 'Coba Ws',
                ),
            ),
        );

        $json = json_encode($arr);
        //$parameter = $_POST["coba"];
        curl_setopt($ch, CURLOPT_URL, "https://dvlp.bpjs-kesehatan.go.id/VClaim-rest/SEP/Delete");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //json_decode($ch);
        $content = curl_exec($ch);
        $err = curl_error($ch);

        echo $err;

        //print_r($content);

        $this->db->delete('sep', ['nosep' => $sep]);
        $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">' . $content . '</div>');
        redirect('pendaftaran/datapasien');
    }

    public function hapus($mr)
    {

        $this->db->delete('pasien', ['no_rekam_medis' => $mr]);
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        redirect('pendaftaran/datapasien');

    }

    public function sepsementara($mr)
    {
        $data['title'] = 'SEP';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $data['pasien'] = $this->db->get_where('pasien', ['no_rekam_medis' => $mr])->row_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['tujuan'] = $this->db->get('subbidang')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/sepsementara', $data);
        $this->load->view('templates/footer');
    }

    public function semsimsep()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $sep = $this->input->post('nosep');
        $mr = $this->input->post('nomr');
        $cek = $this->db->get_where('sep', ['nosep' => $sep])->row_array();

        if ($cek >= 1) {
            $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">No Sep telah didaftarkan di RSUD H abdul manap</div>');
            redirect('pendaftaran/sepsementara/' . $mr);
        } else {
            $data = [
                'nosep' => $this->input->post('nosep'),
                'jnspeserta' => "",
                'tgl_sep' => $this->input->post('tglsep'),
                'cob' => $this->input->post('cob'),
                'nokartu' => $this->input->post('nobpjs'),
                'nomr' => $this->input->post('nomr'),
                'nama' => $this->input->post('nama'),
                'jnspelayanan' => $this->input->post('jnspelayanan'),
                'tgllahir' => $this->input->post('tgl_lahir'),
                'kelas' => $this->input->post('kelas'),
                'poli' => $this->input->post('tujuan'),
                'kelamin' => $this->input->post('jenkel'),
                'penjamin' => $this->input->post('penjamin'),
                'diagnosa' => $this->input->post('diagnosa'),
                'catatan' => $this->input->post('catatan'),
                'tgl_masuk' => date('Y-m-d'),
                'antrian' => "",
                'tgl_input' => date('Y-m-d'),
                'jam_input' => date('h:m:s'),
                'user_input' => $data['user']['name'],

            ];
            $this->db->insert('sep', $data);
            $this->session->set_flashdata('messege', '<div class="alert alert-primary" role="alert">Sep Berhasil Ditambahkan</div>');
            redirect('pendaftaran/riwayat/' . $mr);
        }
    }

    public function riwayat($mr)
    {
        $data['title'] = 'RIWAYAT PASIEN';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $data['sep'] = $this->db->get_where('sep', ['nomr' => $mr])->result_array();
        $data['obat'] = $this->db->get_where('tindakan_obat', ['nomr' => $mr])->result_array();
        $data["nomr"] = $mr;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/riwayat', $data);
        $this->load->view('templates/footer');
    }

    public function rujuk()
    {
        $data['title'] = 'RUJUK PASIEN';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/rujuk', $data);
        $this->load->view('templates/footer');
    }

    public function simpanrujukan()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $nosep = $this->input->post('nosep');
        $tglrujuk = $this->input->post('tglrujuk');
        $jnsfaskes = $this->input->post('jnsfaskes');
        $kdfaskes = $this->input->post('kdfaskes');
        $jnspel = $this->input->post('jnspel');
        $ctt = $this->input->post('catatan');
        $diag = $this->input->post('diagnosa2');
        $tiperujukan = $this->input->post('tiperujukan');
        $poli = $this->input->post('poli');
        $user1 = $user['name'];

        $data = "29409";
        $secretKey = "1iQ5B4702D";
        date_default_timezone_set('UTC');
        $tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
        $signature = hash_hmac('sha256', $data . "&" . $tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);

        $ch = curl_init();
        $headers = array(
            "X-cons-id:" . $data,
            "X-timestamp: " . $tStamp,
            "X-signature: " . $encodedSignature,
            "Content-Type: Application/x-www-form-urlencoded",
        );

        $arr = [
            "request" => [
                "t_rujukan" => [
                    "noSep" => "$nosep",
                    "tglRujukan" => "$tglrujuk",
                    "ppkDirujuk" => "$kdfaskes",
                    "jnsPelayanan" => "$jnspel",
                    "catatan" => "$ctt",
                    "diagRujukan" => "$diag",
                    "tipeRujukan" => "$tiperujukan",
                    "poliRujukan" => "$poli",
                    "user" => "$user1",
                ],
            ],
        ];

        $json = json_encode($arr);
        //$parameter = $_POST["coba"];
        curl_setopt($ch, CURLOPT_URL, "https://dvlp.bpjs-kesehatan.go.id/VClaim-rest/Rujukan/insert");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //json_decode($ch);
        $content = curl_exec($ch);
        $err = curl_error($ch);

        echo $err;

        print_r($content);

        $hasil = json_decode($content, true);
        $this->session->set_flashdata('messege', '<div class="alert alert-warning" role="alert">' . $hasil["metaData"]["code"] . '-' . $hasil["metaData"]["message"] . '</div>');
        redirect('pendaftaran/datarujukan');

        $ins = [

        ];
    }

    public function datarujukan()
    {
        $data['title'] = 'DATA RUJUKAN';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/datarujukan', $data);
        $this->load->view('templates/footer');
    }

    public function lappasien($mr)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->where('no_rekam_medis', $mr);

        $data['pasien'] = $this->db->get()->row_array();

        $this->db->select('*, pulang.tgl_pulang, pulang.lama_rawat, rawat_inap.ruang_rawat, pascapulang.nm_pasca, pulang.carakluar, dokter.nm_dokter, tipe_masuk.nm_tipe, ket_inap.nm_ket');
        $this->db->from('sep');
        $this->db->where('sep.nomr', $mr);
        $this->db->where('sep.jnspelayanan', 'R. Inap');
        $this->db->join('rawat_inap', 'rawat_inap.nosep = sep.nosep');
        $this->db->join('pulang', 'pulang.nosep = sep.nosep');
        $this->db->join('pascapulang', 'pascapulang.kd_pasca = pulang.pascapulang');
        $this->db->join('carapulang', 'carapulang.kd_pulang = pulang.carakluar');
        $this->db->join('dokter', 'dokter.id = rawat_inap.dokter');
        $this->db->join('tipe_masuk', 'tipe_masuk.kd_tipe = rawat_inap.tipe_masuk');
        $this->db->join('ket_inap', 'ket_inap.kd_ket = rawat_inap.keterangan');

        $data['inap'] = $this->db->get()->result_array();

        $this->db->select('count(sep.nosep) as total');
        $this->db->from('sep');
        $this->db->where('sep.nomr', $mr);
        $this->db->where('sep.jnspelayanan', 'R. Inap');
        $this->db->join('rawat_inap', 'rawat_inap.nosep = sep.nosep');
        $this->db->join('pulang', 'pulang.nosep = sep.nosep');
        $data['tot'] = $this->db->get()->row_array();
        $this->load->view('laporan/riwayat', $data);
    }

    public function datapendaftar()
    {
        $data['title'] = 'Data Pendaftar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $tgl = $this->input->get('tgl');

        $data['kuota'] = $this->db->get_where('simanap_kuota', ['kd_kuota' => 1])->row_array();
        $this->db->select('*, poli.nama_poli as nmp');
        $this->db->from('simanap_pendaftaran');
        $this->db->join('poli', 'poli.id = simanap_pendaftaran.poli');
        $this->db->where('simanap_pendaftaran.tgl_kunjungan', $tgl);
        $this->db->order_by('simanap_pendaftaran.antrian', 'ASC');

        $data['pend'] = $this->db->get()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/datapendaftar', $data);
        $this->load->view('templates/footer');
    }

    public function updatekuota()
    {
        $this->db->set('kuota', $this->input->post('kuota'));
        $this->db->where('kd_kuota', 1);
        $this->db->update('simanap_kuota');
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">kuota berhasil diupdate</div>');
        redirect('pendaftaran/datapendaftar');
    }

    public function jadwaldokter()
    {
        $data['title'] = 'Jadwal Dokter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

        $this->db->select('id, nm_dokter');
        $this->db->order_by('nm_dokter', 'ASC');
        $q = $this->db->get('dokter');
        $data['dktr'] = $q->result_array();

        $data['poli'] = $this->db->select('*')->from('ruangan')->where('grup', '1')->get()->result_array();

        $this->db->select('*, dokter.nm_dokter as nmd, ruangan.nama_ruangan as nmp, jadwal_dokter.id as ids');
        $this->db->from('jadwal_dokter');
        $this->db->join('ruangan', 'ruangan.kd_ruangan = jadwal_dokter.kd_poli');
        $this->db->join('dokter', 'dokter.id = jadwal_dokter.kd_dokter');
        $data['jadwal'] = $this->db->get()->result_array();

        $this->db->select('*');
        $this->db->from('tutup_poli');
        $this->db->order_by('tanggal_tutup', 'DESC'); // urutkan dari yang terbaru
        $this->db->limit(10); // batasi hanya 10 data
        $data['tutup_poli'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/jadwaldokter', $data);
        $this->load->view('templates/footer');
    }

    public function hapusjadwal($kd)
    {
        $this->db->where('id', $kd);
        $this->db->delete('jadwal_dokter');
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Jadwal Dokter Berhasil Dihapus</div>');
        redirect('pendaftaran/jadwaldokter');
    }

    public function inputjadwaldokter()
    {
        $data = [
            'kd_dokter' => $this->input->post('dok'),
            'kd_ruangan' => $this->input->post('poli'),
            'hari_kerja' => $this->input->post('hari'),
            'jam_mulai' => $this->input->post('mulai'),
            'jam_selesai' => $this->input->post('tutup'),
            'aktivasi' => $this->input->post('aktivasi'),
        ];

        // Load database simanap
        $db2 = $this->load->database('db2', true);

        $db2->insert('jadwal_dokter', $data);
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Jadwal Dokter Berhasil Ditambahkan</div>');
        redirect('pendaftaran/jadwaldokter');
    }

    public function editjadwaldokter($id)
    {

        $data['title'] = 'Edit Jadwal Dokter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->select('id, nm_dokter');
        $this->db->order_by('nm_dokter', 'ASC');
        $q = $this->db->get('dokter');
        $data['dktr'] = $q->result_array();

        $data['poli'] = $this->db->select('*')->from('ruangan')->where('grup', '1')->get()->result_array();
        $this->db->select('*, dokter.nm_dokter as nmd, ruangan.nama_ruangan as nmp, jadwal_dokter.id as ids');
        $this->db->from('jadwal_dokter');
        $this->db->join('ruangan', 'ruangan.kd_ruangan = jadwal_dokter.kd_poli');
        $this->db->join('dokter', 'dokter.id = jadwal_dokter.kd_dokter');
        $this->db->where('jadwal_dokter.id', $id);
        $data['jadwal'] = $this->db->get()->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/editjadwaldokter', $data);
        $this->load->view('templates/footer');
    }

    public function editjadwaldokteraksi()
    {
        $id = $this->input->post('id_jadwal_dokter');

        // Load database simanap
        $db2 = $this->load->database('db2', true);

        $db2->set('kd_dokter', $this->input->post('kd_dokter'));
        $db2->set('kd_ruangan', $this->input->post('kd_poli'));
        $db2->set('hari_kerja', $this->input->post('hari_kerja'));
        $db2->set('jam_mulai', $this->input->post('jam_mulai'));
        $db2->set('jam_selesai', $this->input->post('jam_tutup'));
        $db2->set('aktivasi', $this->input->post('aktivasi'));
        $db2->where('id', $id);
        $db2->update('jadwal_dokter');
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Jadwal Dokter Berhasil Diedit</div>');
        redirect('pendaftaran/jadwaldokter');
    }

    public function bukajadwaldokter()
    {
        $this->db->select('*');
        $this->db->from('jadwal_dokter');
        $this->db->where('aktivasi', 'T');
        $data['jadwal'] = $this->db->get()->result_array();

        foreach ($data['jadwal'] as $jadwal) {
            $this->db->set('kd_dokter', $jadwal['kd_dokter']);
            $this->db->set('kd_poli', $jadwal['kd_poli']);
            $this->db->set('hari_kerja', $jadwal['hari_kerja']);
            $this->db->set('jam_mulai', $jadwal['jam_mulai']);
            $this->db->set('jam_selesai', $jadwal['jam_selesai']);
            $this->db->set('aktivasi', 'B');
            $this->db->where('id', $jadwal['id']);
            $this->db->update('jadwal_dokter');
        }
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Seluruh Jadwal Berhasi Dibuka</div>');
        redirect('pendaftaran/jadwaldokter');

    }

    public function tutupjadwaldokter()
    {
        $this->db->select('*');
        $this->db->from('jadwal_dokter');
        $this->db->where('aktivasi', 'B');
        $data['jadwal'] = $this->db->get()->result_array();

        foreach ($data['jadwal'] as $jadwal) {
            $this->db->set('kd_dokter', $jadwal['kd_dokter']);
            $this->db->set('kd_poli', $jadwal['kd_poli']);
            $this->db->set('hari_kerja', $jadwal['hari_kerja']);
            $this->db->set('jam_mulai', $jadwal['jam_mulai']);
            $this->db->set('jam_selesai', $jadwal['jam_selesai']);
            $this->db->set('aktivasi', 'T');
            $this->db->where('id', $jadwal['id']);
            $this->db->update('jadwal_dokter');
        }
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Seluruh Jadwal Berhasi Dibuka</div>');
        redirect('pendaftaran/jadwaldokter');

    }

    public function tutupJadwalPendaftaran()
    {
        $data = [
            'tanggal_tutup' => $this->input->post('tanggal_tutup'),
            'keterangan' => $this->input->post('keterangan'),
        ];

        $this->db->insert('tutup_poli', $data);
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Jadwal Berhasil Ditutup</div>');
        redirect('pendaftaran/jadwaldokter');

    }

    public function batalTutupJadwal($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tutup_poli');
        $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Penutupan Berhasil dibatalkan</div>');

        redirect('pendaftaran/jadwaldokter');
    }

    public function pengaduan()
    {
        $data['title'] = 'Pengaduan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->order_by('created_at', 'DESC');
        $data['pengaduan'] = $this->db->get()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/pengaduan', $data);
        $this->load->view('templates/footer');
    }

    public function konfirmasi($kd, $tgl)
    {
        $t = $tgl;
        $this->db->set('status', '1');
        $this->db->where('no_reg', $kd);
        $this->db->update('simanap_pendaftaran');
        $this->session->set_flashdata('messege', '<div class="alert alert-primary" role="alert">Data Berhasil Dikonfirmasi</div>');
        redirect('pendaftaran/datapendaftar?tgl=' . $t);
    }

}
