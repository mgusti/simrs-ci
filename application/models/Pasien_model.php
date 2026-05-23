<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien_model extends CI_Model
{
    public function getKamar()
    {
        $user = $this->session->userdata('role_id');
        if ($user == 2) {
            $user = 'ANAK';
        } else {
            $user = '';
        }
        $query = "SELECT kd_kamar FROM kamar WHERE status = 'KOSONG' AND statusdata = '0' AND divisi= '$user'";
        return $this->db->query($query)->result_array();
    }

    public function hapusDataPasien($p)
    {
        $this->db->delete('kamar_inap1', ['nama_pasien' => $p]);
    }

    public function getPasienByNo($kk)
    {
        return $this->db->get_where('kamar_inap1', ['no_rawat' => $kk])->row_array();
    }
    public function ubahStatusPasien()
    {
        $data = [
            'status' =>  $this->input->post('status', true),
            'statusdata' =>  $this->input->post('statusdata', true),
            'stts_pulang' =>  $this->input->post('statuspulang', true)
        ];

        $this->db->where('no_rawat', $this->input->post('norawat'));
        $this->db->update('kamar_inap1', $data);
    }
    public function getAllPasien()
    {
        return $this->db->get('kamar_inap1')->result_array();
    }

    public function getpasien()
    {
        $keyword = $this->input->post('keyword');
        $query = "SELECT * FROM kamar_inap1 WHERE no_rawat LIKE '%$keyword%'";

        return $this->db->query($query)->result_array();
    }

    public function getpasien_masuk()
    {
        $keywords = $this->input->post('keyword');
        $query = "SELECT * FROM pasien_masuk WHERE no_mr LIKE '%$keywords%'";

        return $this->db->query($query)->result_array();
    }
}
