<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sitb extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function datatb()
    {
        $data['title'] = 'SITB';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tb'] = $this->db->get('sitb')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sitb/datatb');
        $this->load->view('templates/footer');
    }

    public function forminputtb()
    {
        $data['title'] = 'Input Data TB';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pro'] = $this->db->get('provinsi')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sitb/forminputdatatb');
        $this->load->view('templates/footer');
    }

    public function carikab()
    {
        $idprov = $this->input->post('prov_id');

        $kab = $this->db->get_where('kabupaten', ['id_prov' => $idprov])->result_array();

        foreach ($kab as $k) {
            echo "<option value=" . $k['id_kab'] . ">" . $k['nama'] . "</option>";
        }
    }

    public function inputtb()
    {


        $kd_pasien = $this->input->post('nama');
        $nik = $this->input->post('nik');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $prop_fas = "15";
        $kab_fas = "1571";
        $alamat = $this->input->post('alamat_lengkap');
        $prop_pas = $this->input->post('id_propinsi_pasien');
        $kab_pas = $this->input->post('kd_kabupaten_pasien');
        $icdx = $this->input->post('kode_icd_x');
        $diagnosis = $this->input->post('tipe_diagnisis');
        $klasifikasi_anatomi = $this->input->post('klasifikasi_lokasi_anatomi');
        $klasifikasi_pengobatan = $this->input->post('klasifikasi_riwayat_pengobatan');
        $tgl_mulai = $this->input->post('tanggal_mulai_pengobatan');
        $paduan = $this->input->post('paduan_oat');
        $sebelum_mikroskopis = $this->input->post('sebelum_pengobatan_hasil_mikroskopis');
        $sebelum_tes_cepat = $this->input->post('sebelum_pengobatan_hasil_tes_cepat');
        $sebelum_biakan = $this->input->post('sebelum_pengobatan_hasil_biakan');
        $hasil_2 = $this->input->post('hasil_mikroskopis_bulan_2');
        $hasil_3 = $this->input->post('hasil_mikroskopis_bulan_3');
        $hasil_5 = $this->input->post('hasil_mikroskopis_bulan_5');
        $ahkir_mikroskopis = $this->input->post('akhir_pengobatan_hasil_mikroskopis');
        $tgl_akhir = $this->input->post('tanggal_hasil_akhir_pengobatan');
        $hasil_akhir = $this->input->post('hasil_akhir_pengobatan');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $foto_toraks = $this->input->post('foto_toraks');


        //konfersi tgl html5 ke format SITB
        $tgl_mulaitb = date("Ymd", strtotime($tgl_mulai));

        $tgl_lahirtb = date("Ymd", strtotime($tgl_lahir));

        if ($tgl_akhir == "") {
            $tgl_akhirtb = "";
        } else {
            $tgl_akhirtb = date("Ymd", strtotime($tgl_akhir));
        }


        //kode RS online dan password
        $cid = "1571158";
        $ckey = "tehkotak2020";
        //waktu 
        $timestamp = strtotime(date('Y/m/d H:i:s'));
        $curl = curl_init();
        $dtb = [

            "id_tb_03" => "",
            "kd_pasien" => $kd_pasien,
            "nik" => $nik,
            "jenis_kelamin" => $jenis_kelamin,
            "alamat_lengkap" => $alamat,
            "id_propinsi_faskes" => $prop_fas,
            "kd_kabupaten_faskes" => $kab_fas,
            "id_propinsi_pasien" => $prop_pas,
            "kd_kabupaten_pasien" => $kab_pas,
            "kd_fasyankes" => $cid,
            "kode_icd_x" => $icdx,
            "tipe_diagnosis" => $diagnosis,
            "klasifikasi_lokasi_anatomi" => $klasifikasi_anatomi,
            "klasifikasi_riwayat_pengobatan" => $klasifikasi_pengobatan,
            "tanggal_mulai_pengobatan" =>  $tgl_mulaitb,
            "paduan_oat" => $paduan,
            "sebelum_pengobatan_hasil_mikroskopis" => $sebelum_mikroskopis,
            "sebelum_pengobatan_hasil_tes_cepat" => $sebelum_tes_cepat,
            "sebelum_pengobatan_hasil_biakan" => $sebelum_biakan,
            "hasil_mikroskopis_bulan_2" => $hasil_2,
            "hasil_mikroskopis_bulan_3" => $hasil_3,
            "hasil_mikroskopis_bulan_5" => $hasil_5,
            "akhir_pengobatan_hasil_mikroskopis" => $ahkir_mikroskopis,
            "tanggal_hasil_akhir_pengobatan" => $tgl_akhirtb,
            "hasil_akhir_pengobatan" => $hasil_akhir,
            "tgl_lahir" => $tgl_lahirtb,
            "foto_toraks" => $foto_toraks,



        ];



        $json = json_encode($dtb);

        curl_setopt_array($curl, array(

            CURLOPT_URL => "http://sirs.yankes.kemkes.go.id/sirsservice/sitb/sitb/senddata",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $json,
            CURLOPT_HTTPHEADER => array(
                "X-rs-id:" . $cid,
                "X-Timestamp:" . $timestamp,
                "X-pass:" . $ckey,
                'Accept: application/json',
                'Content-Type: application/json'
            ),


        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        //echo $response;
        //echo $err;

        $tr = json_decode($response, true);

        if ($tr["status"] == "berhasil") {
            $this->db->insert('sitb', $dtb);
        }



        $this->session->set_flashdata('messege', "<div class='alert alert-success' role='alert'>" . $response . "</div>");
        redirect('sitb/datatb');
    }

    public function inpidtb03($kd)
    {

        $data['title'] = 'Input ID TB 03';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tb'] = $this->db->get_where('sitb', ['kd_sitb' => $kd])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sitb/inpidtb03', $data);
        $this->load->view('templates/footer');


        // $this->db->where('kd_sitb', $kd);
        // $this->db->update('sitb');
        // $this->session->set_flashdata('messege', "<div class='alert alert-success' role='alert'></div>");
        // redirect('sitb/datatb');
    }

    public function aksiinp03()
    {
        $this->db->set('id_tb_03', $this->input->post('idtb03'));
        $this->db->where('kd_sitb', $this->input->post('kd_sitb'));
        $this->db->update('sitb');
        $this->session->set_flashdata('messege', "<div class='alert alert-success' role='alert'>Kode id tb 03 berhasil di masukan</div>");
        redirect('sitb/datatb');
    }

    public function editsitb($kd)
    {
        $data['title'] = 'Edit Data TB 03';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tb'] = $this->db->get_where('sitb', ['kd_sitb' => $kd])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sitb/editsitb');
        $this->load->view('templates/footer');
    }

    public function aksieditsitb($kd)
    {
        $id_tb_03 = $this->input->post('id_tb_03');
        $kd_pasien = $this->input->post('nama');
        $nik = $this->input->post('nik');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $prop_fas = "15";
        $kab_fas = "1571";
        $alamat = $this->input->post('alamat_lengkap');
        $prop_pas = $this->input->post('id_propinsi_pasien');
        $kab_pas = $this->input->post('kd_kabupaten_pasien');
        $icdx = $this->input->post('kode_icd_x');
        $diagnosis = $this->input->post('tipe_diagnisis');
        $klasifikasi_anatomi = $this->input->post('klasifikasi_lokasi_anatomi');
        $klasifikasi_pengobatan = $this->input->post('klasifikasi_riwayat_pengobatan');
        $tgl_mulai = $this->input->post('tanggal_mulai_pengobatan');
        $paduan = $this->input->post('paduan_oat');
        $sebelum_mikroskopis = $this->input->post('sebelum_pengobatan_hasil_mikroskopis');
        $sebelum_tes_cepat = $this->input->post('sebelum_pengobatan_hasil_tes_cepat');
        $sebelum_biakan = $this->input->post('sebelum_pengobatan_hasil_biakan');
        $hasil_2 = $this->input->post('hasil_mikroskopis_bulan_2');
        $hasil_3 = $this->input->post('hasil_mikroskopis_bulan_3');
        $hasil_5 = $this->input->post('hasil_mikroskopis_bulan_5');
        $ahkir_mikroskopis = $this->input->post('akhir_pengobatan_hasil_mikroskopis');
        $tgl_akhir = $this->input->post('tanggal_hasil_akhir_pengobatan');
        $hasil_akhir = $this->input->post('hasil_akhir_pengobatan');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $foto_toraks = $this->input->post('foto_toraks');


        //konfersi tgl html5 ke format SITB
        $tgl_mulaitb = date("Ymd", strtotime($tgl_mulai));

        $tgl_lahirtb = date("Ymd", strtotime($tgl_lahir));

        if ($tgl_akhir == "") {
            $tgl_akhirtb = "";
        } else {
            $tgl_akhirtb = date("Ymd", strtotime($tgl_akhir));
        }


        //kode RS online dan password
        $cid = "1571158";
        $ckey = "tehkotak2020";
        //waktu 
        $timestamp = strtotime(date('Y/m/d H:i:s'));
        $curl = curl_init();
        $dtb = [

            "id_tb_03" => $id_tb_03,
            "kd_pasien" => $kd_pasien,
            "nik" => $nik,
            "jenis_kelamin" => $jenis_kelamin,
            "alamat_lengkap" => $alamat,
            "id_propinsi_faskes" => $prop_fas,
            "kd_kabupaten_faskes" => $kab_fas,
            "id_propinsi_pasien" => $prop_pas,
            "kd_kabupaten_pasien" => $kab_pas,
            "kd_fasyankes" => $cid,
            "kode_icd_x" => $icdx,
            "tipe_diagnosis" => $diagnosis,
            "klasifikasi_lokasi_anatomi" => $klasifikasi_anatomi,
            "klasifikasi_riwayat_pengobatan" => $klasifikasi_pengobatan,
            "tanggal_mulai_pengobatan" =>  $tgl_mulaitb,
            "paduan_oat" => $paduan,
            "sebelum_pengobatan_hasil_mikroskopis" => $sebelum_mikroskopis,
            "sebelum_pengobatan_hasil_tes_cepat" => $sebelum_tes_cepat,
            "sebelum_pengobatan_hasil_biakan" => $sebelum_biakan,
            "hasil_mikroskopis_bulan_2" => $hasil_2,
            "hasil_mikroskopis_bulan_3" => $hasil_3,
            "hasil_mikroskopis_bulan_5" => $hasil_5,
            "akhir_pengobatan_hasil_mikroskopis" => $ahkir_mikroskopis,
            "tanggal_hasil_akhir_pengobatan" => $tgl_akhirtb,
            "hasil_akhir_pengobatan" => $hasil_akhir,
            "tgl_lahir" => $tgl_lahirtb,
            "foto_toraks" => $foto_toraks,



        ];



        $json = json_encode($dtb);

        curl_setopt_array($curl, array(

            CURLOPT_URL => "http://sirs.yankes.kemkes.go.id/sirsservice/sitb/sitb/senddata",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $json,
            CURLOPT_HTTPHEADER => array(
                "X-rs-id:" . $cid,
                "X-Timestamp:" . $timestamp,
                "X-pass:" . $ckey,
                'Accept: application/json',
                'Content-Type: application/json'
            ),


        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        //echo $response;
        //echo $err;

        $tr = json_decode($response, true);

        if ($tr["status"] == "update berhasil") {
            $this->db->where('kd_sitb', $kd);
            $this->db->update('sitb', $dtb);
        }



        $this->session->set_flashdata('messege', "<div class='alert alert-success' role='alert'>" . $response . "</div>");
        redirect('sitb/datatb');
    }
}
