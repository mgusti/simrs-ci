<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tampilan_model extends CI_Model
{
    public function getBangsal()
    {
        $_sql = "Select * From bangsal where status='1' and kd_bangsal in(select kd_bangsal from kamar)";
        return $this->db->query($_sql)->result_array();
    }
}
