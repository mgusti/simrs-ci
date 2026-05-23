<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_obat extends CI_Model
{
    function search_blog($title){
        $this->db->like('nm_barang', $title , 'both');
        $this->db->order_by('kd_barang', 'ASC');
        $this->db->limit(10);
        return $this->db->get('barang')->result();
    }
   

}