<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bed_model extends CI_Model
{
    public function getBedByKd($kd_bangsal)
    {
        return $this->db->get_where('bangsal', ['kd_bangsal' => $kd_bangsal])->row_array();
    }

    public function ubahDataBangsal()
    {
        $data = [
            "nm_bangsal" => $this->input->post('nama_bangsal', true),
            "status" => $this->input->post('status', true)
        ];

        $this->db->where('kd_bangsal', $this->input->post('kd_bangsal'));
        $this->db->update('bangsal', $data);
    }

    public function getKamarByKd($kd_bangsal)
    {
        return $this->db->get_where('kamar', ['kd_bangsal' => $kd_bangsal])->row_array();
    }

    public function ubahDataKamar()
    {
        $data = [
            "kd_kamar" => $this->input->post('kdkamar', true),
            "trf_kamar" => $this->input->post('tarif', true),
            "status" => $this->input->post('status', true),
            "kelas" => $this->input->post('kelas', true),
            "statusdata" => $this->input->post('statusdata', true)
        ];

        $this->db->where('kd_bangsal', $this->input->post('kdbangsal'));
        $this->db->update('kamar', $data);
    }

    public function hapusDataKamar($kd_kamar)
    {
        $this->db->delete('kamar', ['kd_kamar' => $kd_kamar]);
    }

    public function hapusDataBangsal($kd_bangsal)
    {
        $this->db->delete('bangsal', ['kd_bangsal' => $kd_bangsal]);
    }
}
