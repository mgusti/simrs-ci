<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //is_logged_in();
        $this->load->model('M_obat');
        $this->load->model('Lap_model');
    }

    public function sep_inap()
    {
        $data['title'] = 'Sep R. Inap';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $this->db->select('*');
        $this->db->from('sep');
        $this->db->where('jnspelayanan', 'R. Inap');
        $this->db->where('status_sep', '0');
        $data['sep'] = $this->db->get()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('inap/sep_inap', $data);
        $this->load->view('templates/footer');

    }

    public function data_inap()
    {
        $data['title'] = 'Data Inap';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $bidang = $data['user']['subbidang'];
        $this->db->select('rawat_inap.tgl_sep, rawat_inap.nosep, rawat_inap.nomr, pasien.nama_pasien, kelas.nm_kls, rawat_inap.bed, rawat_inap.ruang_rawat, tipe_masuk.nm_tipe, dokter.nm_dokter, ket_inap.nm_ket');
        $this->db->from('rawat_inap');
        $this->db->where('rawat_inap.status', '1');
        $this->db->where('rawat_inap.ruang_rawat', $bidang);
        $this->db->where('rawat_inap.status_inap', '0');
        $this->db->join('pasien', 'pasien.no_rekam_medis = rawat_inap.nomr');
        $this->db->join('kelas', 'kelas.kdkls_bpjs = rawat_inap.kelas');
        $this->db->join('tipe_masuk', 'tipe_masuk.kd_tipe = rawat_inap.tipe_masuk');
        $this->db->join('dokter', 'dokter.id = rawat_inap.dokter');
        $this->db->join('ket_inap', 'ket_inap.kd_ket = rawat_inap.keterangan');

        $data['inap'] = $this->db->get()->result_array();

        $data['d_inap'] = $this->db->get('rawat_inap')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('inap/data_inap', $data);
        $this->load->view('templates/footer');
    }

    public function input_inap($sep)
    {
        $data['title'] = 'Input R. Inap';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

        $data['sep'] = $this->db->get_where('sep', ['nosep' => $sep])->row_array();
        $data['dokter'] = $this->db->get('dokter')->result_array();

        $this->form_validation->set_rules('kelas', 'kelas', 'required', [
            'required' => 'kelas harus dipilih',

        ]);

        $this->form_validation->set_rules('bed', 'bed', 'required', [
            'required' => 'bed harus dipilih',

        ]);

        $this->form_validation->set_rules('tipemasuk', 'tipemasuk', 'required', [
            'required' => 'tipe masuk harus dipilih',

        ]);

        $this->form_validation->set_rules('dokter', 'dokter', 'required', [
            'required' => 'dokter harus dipilih',

        ]);
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required', [
            'required' => 'keterangan harus di pilih',

        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('inap/input_inap', $data);
            $this->load->view('templates/footer');
        } else {

            $rinap = $this->db->get_where('rawat_inap', ['nosep' => $sep])->row_array();
            if ($rinap > 0) {
                $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">No Sep Sudah Ada</div>');
                redirect('inap/sep_inap');
            } else {

                $data = [
                    'tgl_sep' => $this->input->post('tgl_sep'),
                    'nosep' => $this->input->post('nosep'),
                    'ruang_rawat' => $this->input->post('subbidang1'),
                    'nomr' => $this->input->post('nomr'),
                    'kelas' => $this->input->post('kelas'),
                    'bed' => $this->input->post('bed'),
                    'tipe_masuk' => $this->input->post('tipemasuk'),
                    'dokter' => $this->input->post('dokter'),
                    'status' => '1',
                    'keterangan' => $this->input->post('keterangan'),
                    'user_input' => $this->input->post('user_input'),
                    'tgl_input' => date('Y-m-d'),
                    'jam_input' => date('h:m:s'),

                ];

                $i = 1;
                $this->db->set('status_sep', $i);

                $this->db->where("nosep", $this->input->post('nosep'));
                $this->db->update('sep');
                $this->db->insert('rawat_inap', $data);

                $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Pasien Rawat Inap Berhasil di tambahkan!</div>');
                redirect('inap/data_inap');
            }
        }
    }

    public function caribed()
    {
        $jenkel1 = $_POST['jenkel1'];
        $kelas1 = $_POST['kelas1'];
        $sub = $_POST['subbidang1'];

        $this->db->select('*');
        $this->db->from('bed');
        $this->db->where('tipe_bed', $jenkel1);
        $this->db->where('kelas', $kelas1);
        $this->db->where('status', 'KOSONG');
        $this->db->where('statusdata', '1');

        $this->db->where('subbidang', $sub);
        //$this->db->where('subbidang', $subbidang1);

        $sep = $this->db->get()->result_array();
        foreach ($sep as $s):
            echo "<option value='" . $s['kd_bed'] . "' >" . $s['kd_bed'] . "</option>";
        endforeach;

    }

    public function hapusinap($sep)
    {

        $this->db->delete('rawat_inap', ['nosep' => $sep]);
        $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Data Berhasil Dihapus!</div>');
        redirect('inap/data_inap');

    }

    public function tindakan($sep)
    {
        $data['title'] = 'Tindakan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $data['sep'] = $sep;
        $this->db->select('*, dokter.nm_dokter, tindakan.jenis_pelayanan, jenis_tindakan.nama_tindakan');
        $this->db->from('aksi_tindakan');
        $this->db->where('nosep', $sep);
        $this->db->join('jenis_tindakan', 'jenis_tindakan.id_tindakan = aksi_tindakan.id_jns_tindakan');
        $this->db->join('tindakan', 'tindakan.id = aksi_tindakan.id_tindakan');
        $this->db->join('dokter', 'dokter.id = aksi_tindakan.dokter');
        $data['tindakan'] = $this->db->get()->result_array();

        $this->db->select('*, pasien.nama_pasien, pelayanan_penunjang.nama_pelayanan, status_request.nama');
        $this->db->from('aksi_penunjang');
        $this->db->where('nosep', $sep);
        $this->db->join('pasien', 'pasien.no_rekam_medis = aksi_penunjang.nomr');
        $this->db->join('pelayanan_penunjang', 'pelayanan_penunjang.id = aksi_penunjang.kd_pelayanan');
        $this->db->join('penunjang_medis', 'penunjang_medis.id = aksi_penunjang.kd_jenispelayanan');
        $this->db->join('status_request', 'status_request.kode = aksi_penunjang.status');
        $data['penunjang'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('inap/tindakan', $data);
        $this->load->view('templates/footer');
    }

    public function obat($sep)
    {
        $data['title'] = 'Tindakan Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $this->db->select('*');
        $this->db->from('tindakan_obat');
        $this->db->where('nosep', $sep);
        $this->db->join('obat', 'obat.kode_brng = tindakan_obat.kd_obat');
        $this->db->join('pasien', 'pasien.no_rekam_medis = tindakan_obat.nomr');
        $data['obat'] = $this->db->get()->result_array();
        $data['sep'] = $this->db->get_where('sep', ['nosep' => $sep])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('inap/obat', $data);
        $this->load->view('templates/footer');

    }

    public function bed()
    {
        $data['title'] = 'Bed';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $this->db->select('*, kelas.nm_kls');
        $this->db->from('bed');
        $this->db->join('kelas', 'kelas.kdkls_BPJS = bed.kelas');
        $this->db->where('subbidang', $data['user']['subbidang']);

        $data['bed'] = $this->db->get()->result_array();
        //$data['bed'] = $this->db->get('bed')->result_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('inap/bed', $data);
        $this->load->view('templates/footer');
    }

    public function inputbed()
    {
        $ikd = $_POST["kd_bed"];
        $validbed = $this->db->get_where('bed', ['kd_bed' => $ikd])->row_array();
        if ($validbed > 0) {
            $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Kode Bed Sudah terdaftar</div>');
            redirect('inap/bed');
        } else {
            $data = [
                'kd_bed' => $this->input->post('kd_bed'),
                'tipe_bed' => $this->input->post('tipe_bed'),
                'subbidang' => $this->input->post('subbidang'),
                'tarif' => $this->input->post('tarif'),
                'status' => 'KOSONG',
                'kelas' => $this->input->post('kelas'),
                'statusdata' => $this->input->post('status_data'),
            ];

            $this->db->insert('bed', $data);

            $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Bed Berhasil Ditambahkan</div>');
            redirect('inap/bed');

        }
    }

    public function hapusbed($kd)
    {
        $bed = $this->db->get_where('rawat_inap', ['bed' => $kd])->row_array();
        if ($bed > 0) {
            $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Pasien Masih di rawat di bed</div>');
            redirect('inap/bed');
        } else {
            $this->db->delete('bed', ['kd_bed' => $kd]);
            $this->session->set_flashdata('messege', '<div class="alert alert-warning" role="alert">Data Berhasil Dihapus!</div>');
            redirect('inap/bed');
        }

    }

    public function cariobat()
    {
        $kdobat = $_POST['kode_obat'];
        $this->db->select('*');
        $this->db->from('obat');
        $this->db->where('kode_brng', $kdobat);
        //$this->db->limit(10, 20);
        $obat = $this->db->get()->row_array();

        $obat1 = json_encode($obat, true);
        echo $obat1;
    }

    public function tobat()
    {
        //$total =
        $data['title'] = 'Tabel Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

        $data['tbat'] = $this->db->query("SELECT * FROM obat WHERE kapasitas>=1 ")->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('inap/tobat', $data);
        $this->load->view('templates/footer');
    }

    public function inputobat()
    {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = [
            'nomr' => $this->input->post('nomr'),
            'nosep' => $this->input->post('nosep'),
            'kd_obat' => $this->input->post('kode_obat'),
            'waktu_obat' => $this->input->post('waktu_obat'),
            'jumlah_obat' => $this->input->post('jumlah_obat'),
            'satuan' => $this->input->post('satuan'),
            'pemberi_obat' => $this->input->post('pemberi_obat'),
            'tgl_pemberian' => $this->input->post('tgl_obat'),
            'user_input' => $data['user']['name'],
            'tgl_input' => date('Y-m-d'),
            'jam_input' => date('h:m:s'),

        ];

        $this->db->insert('tindakan_obat', $data);

        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Tindakan Obat berhasil ditambahkan</div>');
        redirect('inap/data_inap');

    }

    public function hapusobat($no)
    {

        $this->db->delete('tindakan_obat', ['no' => $no]);
        $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Data Berhasil Dihapus!</div>');
        redirect('inap/data_inap');
    }

    public function pulang($sep)
    {
        $data['title'] = 'Input Pulang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $data['sep'] = $this->db->get_where('sep', ['nosep' => $sep])->row_array();
        $data['cara'] = $this->db->get('carapulang')->result_array();
        $data['pasca'] = $this->db->get('pascapulang')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('inap/pulang', $data);
        $this->load->view('templates/footer');
    }

    public function inputpulang()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $sep = $this->db->get_where('pulang', ['nosep' => $this->input->post('nosep')])->row_array();
        if ($sep > 1) {
            $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Sep Sudah Pernah Dipakai</div>');
            redirect('inap/data_inap');
        } else {
            $tgl = $this->input->post('tgl_pulang');
            $jam = $this->input->post('jam');
            $menit = $this->input->post('menit');
            $detik = $this->input->post('detik');
            $tgl_sep = $this->input->post('tgl_sep');

            $gabung = "$tgl $jam:$menit:$detik";
            $lama = ((abs(strtotime($tgl_sep) - strtotime($tgl))) / (60 * 60 * 24));

            $data = [
                'subbidang' => $this->input->post('subbidang'),
                'nosep' => $this->input->post('nosep'),
                'nomr' => $this->input->post('nomr'),
                'nama' => $this->input->post('nama'),
                'tgl_pulang' => $tgl,
                'jam_pulang' => "$jam:$menit:$detik",
                'carakluar' => $this->input->post('carakluar'),
                'pascapulang' => $this->input->post('pascapulang'),
                'lama_rawat' => $lama,
                'user_input' => $data['user']['name'],
                'tgl_input' => date('Y-m-d'),
                'jam_input' => date('h:m:s'),
                'meninggal' => $this->input->post('meninggal'),

            ];
            $i = 2;
            $this->db->set('status_sep', $i);
            $this->db->set('tgl_pulang', $gabung);
            $this->db->where("nosep", $this->input->post('nosep'));
            $this->db->update('sep');
            $this->db->insert('pulang', $data);
            $tglm = $this->input->post('tglm');
            $jam1 = $this->input->post('jam1');
            $menit1 = $this->input->post('menit1');
            $detik1 = $this->input->post('detik1');
            $gabung1 = "$jam1:$menit1:$detik1";
            $plg = [
                'nosep' => $this->input->post('nosep'),
                'nomr' => $this->input->post('nomr'),
                'tgl_m' => $tglm,
                'jam_m' => $gabung1,
                'meninggal' => $this->input->post('meninggal'),
            ];
            $this->db->insert('plg_meninggal', $plg);
            $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">pasien berhasil dipulangkan</div>');
            redirect('inap/datapulang');
        }

    }

    public function datapulang()
    {
        $data['title'] = 'Data Pulang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        //$data['pulang'] = $this->db->get_where('pulang', ['subbidang'])->result_array();
        $this->db->select('*, carapulang.nm_pulang, pascapulang.nm_pasca, sep.tgl_sep');
        $this->db->from('pulang');
        $this->db->join('carapulang', 'carapulang.kd_pulang = pulang.carakluar');
        $this->db->join('pascapulang', 'pascapulang.kd_pasca = pulang.pascapulang');
        $this->db->join('sep', 'sep.nosep = pulang.nosep');
        $this->db->where('subbidang', $data['user']['subbidang']);

        $data['pulang'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('inap/datapulang', $data);
        $this->load->view('templates/footer');
    }

    public function aplicare()
    {
        $data['title'] = 'Data Aplicare';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $data['aplicare'] = $this->db->get('aplicare_sws')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('inap/aplicare', $data);
        $this->load->view('templates/footer');
    }

    public function hapusaplicare()
    {

        //if(!isset($_POST["keyword"])){
        //$tes= 0;
        //}else{

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
            "Content-Type: application/json",
        );

        $kls = $_GET['kls'];
        $ruang = $_GET['ruang'];

        $arr = array(
            "kodekelas" => "$kls",
            "koderuang" => "$ruang",
        );

        $json = json_encode($arr);
        curl_setopt($ch, CURLOPT_URL, "https://dvlp.bpjs-kesehatan.go.id:8888/aplicaresws/rest/bed/delete/0082R003");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //json_decode($ch);
        $content = curl_exec($ch);
        $err = curl_error($ch);

        //echo $err;

        echo $content;

        $tes = json_decode($content, true);
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data Bed Berhasil Dihapus</div>');
        redirect('inap/aplicare');
        //}

    }
    public function inputaplicare()
    {
        $data['title'] = 'Input Aplicare';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

        $this->db->select('*, nm_kls, nmsub');
        $this->db->from('aplicare_sws1');
        $this->db->join('kelas', 'kelas.kdkls_bpjs = aplicare_sws1.kelas');
        $this->db->join('subbidang', 'subbidang.kdsub = aplicare_sws1.subbidang');
        $this->db->where('subbidang', $data["user"]["subbidang"]);
        //$this->db->limit(10, 20);
        $data['aplicare'] = $this->db->get()->result_array();

        //$data['aplicare'] = $this->db->get('aplicare_sws1')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('inap/inputaplicare', $data);
        $this->load->view('templates/footer');
    }

    public function insertapp()
    {
        $data = "6810";
        $secretKey = "1tP2B745C1";
        date_default_timezone_set('UTC');
        $tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
        $signature = hash_hmac('sha256', $data . "&" . $tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);

        $ch = curl_init();
        $headers = array(
            "X-cons-id:" . $data,
            "X-timestamp: " . $tStamp,
            "X-signature: " . $encodedSignature,
            "Content-Type: application/json",
        );
        $kelas = $_GET["kelas"];
        $ruang = $_GET["ruang"];
        $nmruang = $_GET["nmruang"];
        $tersedia = $_GET["tersedia"];
        $total = $_GET["total"];
        $laki = $_GET["laki"];
        $wanita = $_GET["wanita"];
        $lp = $_GET["lp"];

        $arr = array(
            "kodekelas" => "$kelas",
            "koderuang" => "$ruang",
            "namaruang" => "$nmruang",
            "kapasitas" => "$total",
            "tersedia" => "$tersedia",
            "tersediapria" => "$laki",
            "tersediawanita" => "$wanita",
            "tersediapriawanita" => "$lp",
        );
        $json = json_encode($arr);
        curl_setopt($ch, CURLOPT_URL, "https://dvlp.bpjs-kesehatan.go.id:8888/aplicaresws/rest/bed/create/0082R003");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //json_decode($ch);
        $content = curl_exec($ch);
        $err = curl_error($ch);

        //echo $err;

        //echo $content;

        $tes = json_decode($content, true);

        $this->session->set_flashdata('messege', '<div class="alert alert-warning" role="alert">' . $content . '</div>');
        redirect('inap/inputaplicare');

    }
    public function inputaksitindakan($sep)
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data = [
            'nosep' => $this->input->post('nosep2'),
            'tglsep' => $this->input->post('tglsep5'),
            'nomr' => $this->input->post('nomr2'),
            'id_jns_tindakan' => $this->input->post('idtindakan2'),
            'id_tindakan' => $this->input->post('jnspelayanan2'),
            'tgl_tindakan' => $this->input->post('tgltindakan2'),
            'dokter' => $this->input->post('dokter2'),
            'petugas' => $this->input->post('petugas2'),
            'subbidang' => $user['subbidang'],
            'tgl_input' => date('Y-m-d'),
            'jam_input' => date('h:m:s'),
            'user_input' => $user['name'],

        ];

        $this->db->insert('aksi_tindakan', $data);

        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Tindakan Berhasil Ditambahkan</div>');
        redirect('inap/tindakan/' . $sep);
    }

    public function inputtindakan($sep)
    {
        $data['title'] = 'Input Tindakan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $data['sep'] = $this->db->get_where('sep', ['nosep' => $sep])->row_array();
        $data['dokter'] = $this->db->get('dokter')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('inap/inputtindakan', $data);
        $this->load->view('templates/footer');
    }

    public function caritindakan()
    {
        $id = $_GET['idtindakan1'];

        $this->db->select('*');
        $this->db->from('tindakan');
        $this->db->where('kode_tindakan', $id);

        $query = $this->db->get()->result_array();
        //$hasil = json_encode($query,true);

        foreach ($query as $h):

            echo "<option value='" . $h['id'] . "'>" . $h['jenis_pelayanan'] . "</option>";

        endforeach;

    }

    public function caritindakan1()
    {
        $id = $_GET['idtindakan1'];

        $this->db->select('*');
        $this->db->from('jenis_tindakan');
        $this->db->where('id_tindakan', $id);

        $query = $this->db->get()->row_array();
        //echo $query;
        $hasil = json_encode($query, true);
        echo $hasil;
    }

    public function ttindakan()
    {
        $data['title'] = 'Tabel Tindakan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $data['tindakan'] = $this->db->get('jenis_tindakan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('inap/ttindakan', $data);
        $this->load->view('templates/footer');
    }

    public function visiter()
    {
        $data['title'] = 'Visiter Dokter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $data['visit'] = $this->db->get('aksi_visiter')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('inap/visiter', $data);
        $this->load->view('templates/footer');
    }

    public function laporan()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $data['tgl'] = $this->input->post('tgl_mulai');
        $tgl = $this->input->post('tgl_mulai');

        $this->db->select('*,rawat_inap.tgl_sep, pasien.nama_pasien, pasien.jenkel, tipe_masuk.nm_tipe, sep.diagnosa, ket_inap.nm_ket, dokter.nm_dokter');
        $this->db->from('rawat_inap');
        $this->db->where('ruang_rawat', $data['user']['subbidang']);
        $this->db->where('rawat_inap.tgl_sep', $data['tgl']);
        $this->db->join('pasien', 'pasien.no_rekam_medis = rawat_inap.nomr');
        $this->db->join('tipe_masuk', 'tipe_masuk.kd_tipe = rawat_inap.tipe_masuk');
        $this->db->join('sep', 'sep.nosep = rawat_inap.nosep');
        $this->db->join('ket_inap', 'ket_inap.kd_ket = rawat_inap.keterangan');
        $this->db->join('dokter', 'dokter.id = rawat_inap.dokter');
        $data['inap'] = $this->db->get()->result_array();

        $this->db->select('*, sep.kelamin, pulang.tgl_pulang, carapulang.nm_pulang, pascapulang.nm_pasca');
        $this->db->from('pulang');
        $this->db->where('subbidang', $data['user']['subbidang']);
        $this->db->where("pulang.tgl_pulang", $tgl);
        $this->db->join('sep', 'sep.nosep = pulang.nosep');
        $this->db->join('carapulang', 'carapulang.kd_pulang = pulang.carakluar');
        $this->db->join('pascapulang', 'pascapulang.kd_pasca = pulang.pascapulang');

        $data['pulang'] = $this->db->get()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('inap/laporan', $data);
        $this->load->view('templates/footer');
    }

    public function lapkeadaanpasien($tgl)
    {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

        $data['tgl'] = $tgl;
        $this->db->select('*,rawat_inap.tgl_sep, pasien.nama_pasien, pasien.jenkel, tipe_masuk.nm_tipe, sep.diagnosa, ket_inap.nm_ket, dokter.nm_dokter');
        $this->db->from('rawat_inap');
        $this->db->where('ruang_rawat', $data['user']['subbidang']);
        $this->db->where('rawat_inap.tgl_sep', $tgl);
        $this->db->join('pasien', 'pasien.no_rekam_medis = rawat_inap.nomr');
        $this->db->join('tipe_masuk', 'tipe_masuk.kd_tipe = rawat_inap.tipe_masuk');
        $this->db->join('sep', 'sep.nosep = rawat_inap.nosep');
        $this->db->join('ket_inap', 'ket_inap.kd_ket = rawat_inap.keterangan');
        $this->db->join('dokter', 'dokter.id = rawat_inap.dokter');

        $data['inap'] = $this->db->get()->result_array();

        $this->db->select('*, sep.kelamin, pulang.tgl_pulang, carapulang.nm_pulang, pascapulang.nm_pasca');
        $this->db->from('pulang');
        $this->db->where('subbidang', $data['user']['subbidang']);
        $this->db->where("pulang.tgl_pulang", $tgl);
        $this->db->join('sep', 'sep.nosep = pulang.nosep');
        $this->db->join('carapulang', 'carapulang.kd_pulang = pulang.carakluar');
        $this->db->join('pascapulang', 'pascapulang.kd_pasca = pulang.pascapulang');

        $data['pulang'] = $this->db->get()->result_array();

        $this->load->view('laporan/keadaanpasien', $data);
    }

    public function laprekapinap()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $this->load->model('lap_model', 'lap');
        $bidang = $data['user']['subbidang'];
        $tgl = $this->input->post('tgl_mulai2');
        $tgl2 = $this->input->post('tgl_akhir2');
        $data['kelamin'] = $this->lap->getkelamin($bidang, $tgl, $tgl2);

        $this->load->view('laporan/laprekapinap', $data);

    }

    public function laprekappulang()
    {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $this->load->model('lap_model', 'lap');
        $bidang = $data['user']['subbidang'];
        $tgl = $this->input->post('tgl_mulai3');
        $tgl2 = $this->input->post('tgl_akhir3');
        $data['plg'] = $this->lap->getpulang($bidang, $tgl, $tgl2);

        $this->load->view('laporan/laprekappulang', $data);
    }

    public function laptindakan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

        $tgl1 = $this->input->post('tgl_mulai4');
        $tgl2 = $this->input->post('tgl_akhir4');
        $this->db->select('*, jenis_tindakan.nama_tindakan, tindakan.jenis_pelayanan, dokter.nm_dokter');
        $this->db->from('aksi_tindakan');
        $this->db->join('jenis_tindakan', 'jenis_tindakan.id_tindakan = aksi_tindakan.id_jns_tindakan');
        $this->db->join('tindakan', 'tindakan.id = aksi_tindakan.id_tindakan');
        $this->db->join('dokter', 'dokter.id = aksi_tindakan.dokter');
        $this->db->where('subbidang', $data['user']['subbidang']);
        $this->db->where('tglsep BETWEEN "' . date('Y-m-d', strtotime($tgl1)) . '" and "' . date('Y-m-d', strtotime($tgl2)) . '"');
        $data['tindakan'] = $this->db->get()->result_array();
        $this->load->view('laporan/laptindakan', $data);
    }

    public function inputaksipenunjang($sep)
    {
        $data['title'] = 'Input Penunjang Pasien';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $this->db->select('*');
        $this->db->from('sep');
        $this->db->where('nosep', $sep);
        $data['pasien'] = $this->db->get()->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('inap/inputaksipenunjang', $data);
        $this->load->view('templates/footer');

    }

    public function caripelpenunjang()
    {
        $id = $_GET['jenispen'];

        $this->db->select('*');
        $this->db->from('pelayanan_penunjang');
        $this->db->where('id', $id);

        $query = $this->db->get()->row_array();
        $hasil = json_encode($query, true);

        echo $hasil;

    }
    public function caripenunjangmedis()
    {
        $id = $_GET['jenispen'];

        $this->db->select('*');
        $this->db->from('penunjang_medis');
        $this->db->where('kode_pelayanan_penunjang', $id);

        $query = $this->db->get()->result_array();
        //$hasil = json_encode($query,true);

        foreach ($query as $h):

            echo "<option value='" . $h['id'] . "'>" . $h['jenis_pelayanan'] . "</option>";

        endforeach;

    }

    public function inputpenunjangm()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sep = $this->input->post('nosep');
        $data = [

            'kd_pelayanan' => $this->input->post('jenispen'),
            'kd_jenispelayanan' => $this->input->post('penunjang_medis'),
            'tgl_reg' => $this->input->post('tgl'),
            'nosep' => $this->input->post('nosep'),
            'nomr' => $this->input->post('nomr'),
            'status' => '1',
            'subbidang' => $user['subbidang'],
            'tgl_input' => date('Y-m-d'),
            'user_input' => $user['name'],

        ];

        $this->db->insert('aksi_penunjang', $data);

        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Tindakan Berhasil Ditambahkan</div>');
        redirect('inap/tindakan/' . $sep);

    }

    public function lapdiag()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $tgl1 = $this->input->post('tgl_mulai5');
        $tgl2 = $this->input->post('tgl_akhir5');
        $this->db->select('count(sep.diagnosa) as total, sep.diagnosa');
        $this->db->from('sep');
        $this->db->where('sep.tgl_sep BETWEEN "' . $tgl1 . '" and "' . $tgl2 . '"');
        $this->db->group_by('sep.diagnosa');
        $this->db->order_by('total', 'DESC');
        $data["diag"] = $this->db->get()->result_array();
        $this->load->view('laporan/lapdiag', $data);
    }

    public function carisep()
    {
        $data['title'] = 'Cari SEP';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('inap/carisep', $data);
        $this->load->view('templates/footer');
    }

    public function datakamar()
    {
        $data['title'] = 'Data Kamar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

        $data['kmr'] = $this->db->order_by('kode_ruang', 'ASC')->get('new_tt')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('inap/datakamar', $data);
        $this->load->view('templates/footer');
    }

    public function updkmr($id)
    {
        date_default_timezone_set('Asia/Jakarta');

        $this->db->where('id', $id);

        $data = [
            "kodekelas" => $this->input->post('kodekelas'),
            "kode_ruang" => $this->input->post('koderuang'),
            "ruang" => $this->input->post('ruangan'),
            "kapasitas" => $this->input->post('kapasitas'),
            "tersedia" => $this->input->post('tersedia'),
            "tersediapria" => $this->input->post('tersediapria'),
            "tersediawanita" => $this->input->post('tersediawanita'),
        ];

        $this->db->set('ts', date('Y-m-d H:i:s'));
        $this->db->update('new_tt', $data);
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Kamar berhasil Diupdate</div>');
        redirect('inap/datakamar');
    }

}
