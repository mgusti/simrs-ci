<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_info extends CI_Model
{
    public function getvip(){
        $query = "SELECT count(kd_bed) as kapasitas, sum(status = 'KOSONG') as tersedia FROM bed WHERE subbidang= 'VIP'";
        return $this->db->query($query)->row_array();
    }



    public function geticu(){
        $query = "SELECT count(kd_bed) as kapasitas, sum(status = 'KOSONG') as tersedia FROM bed WHERE subbidang= 'ICU'";
        return $this->db->query($query)->row_array();
    }



    public function getprt(){
        $query = "SELECT count(kd_bed) as kapasitas, sum(status = 'KOSONG') as tersedia FROM bed WHERE subbidang= 'PRT'";
        return $this->db->query($query)->row_array();
    }



    public function getvk(){
        $query = "SELECT count(kd_bed) as kapasitas, sum(status = 'KOSONG') as tersedia FROM bed WHERE subbidang= 'VK'";
        return $this->db->query($query)->row_array();
    }



    public function getknak1(){
        $query = "SELECT count(kd_bed) as kapasitas FROM bed WHERE subbidang= 'ANAK' AND kelas='KL1'";
        return $this->db->query($query)->row_array();
    }
    public function gettnak1(){
        $query = "SELECT sum(tipe_bed = 'L') as pria, sum(tipe_bed = 'P') as wanita FROM bed WHERE subbidang= 'ANAK' AND kelas='KL1' and status='KOSONG'";
        return $this->db->query($query)->row_array();
    }




    public function getknak2(){
        $query = "SELECT count(kd_bed) as kapasitas FROM bed WHERE subbidang= 'ANAK' AND kelas='KL2'";
        return $this->db->query($query)->row_array();
    }
    public function gettnak2(){
        $query = "SELECT sum(tipe_bed = 'L') as pria, sum(tipe_bed = 'P') as wanita FROM bed WHERE subbidang= 'ANAK' AND kelas='KL2' and status='KOSONG'";
        return $this->db->query($query)->row_array();
    }




    public function getknak3(){
        $query = "SELECT count(kd_bed) as kapasitas FROM bed WHERE subbidang= 'ANAK' AND kelas='KL3'";
        return $this->db->query($query)->row_array();
    }
    public function gettnak3(){
        $query = "SELECT sum(tipe_bed = 'L') as pria, sum(tipe_bed = 'P') as wanita FROM bed WHERE subbidang= 'ANAK' AND kelas='KL3' and status='KOSONG'";
        return $this->db->query($query)->row_array();
    }




    public function getkdah1(){
        $query = "SELECT count(kd_bed) as kapasitas FROM bed WHERE subbidang= 'BEDAH' AND kelas='KL1'";
        return $this->db->query($query)->row_array();
    }
    public function gettdah1(){
        $query = "SELECT sum(tipe_bed = 'L') as pria, sum(tipe_bed = 'P') as wanita FROM bed WHERE subbidang= 'BEDAH' AND kelas='KL1' and status='KOSONG'";
        return $this->db->query($query)->row_array();
    }




    public function getkdah2(){
        $query = "SELECT count(kd_bed) as kapasitas FROM bed WHERE subbidang= 'BEDAH' AND kelas='KL2'";
        return $this->db->query($query)->row_array();
    }
    public function gettdah2(){
        $query = "SELECT sum(tipe_bed = 'L') as pria, sum(tipe_bed = 'P') as wanita FROM bed WHERE subbidang= 'BEDAH' AND kelas='KL2' and status='KOSONG'";
        return $this->db->query($query)->row_array();
    }




    public function getkdah3(){
        $query = "SELECT count(kd_bed) as kapasitas FROM bed WHERE subbidang= 'BEDAH' AND kelas='KL3'";
        return $this->db->query($query)->row_array();
    }
    public function gettdah3(){
        $query = "SELECT sum(tipe_bed = 'L') as pria, sum(tipe_bed = 'P') as wanita FROM bed WHERE subbidang= 'BEDAH' AND kelas='KL3' and status='KOSONG'";
        return $this->db->query($query)->row_array();
    }




    public function getkjan1(){
        $query = "SELECT count(kd_bed) as kapasitas FROM bed WHERE subbidang= 'JANTUNG' AND kelas='KL1'";
        return $this->db->query($query)->row_array();
    }
    public function gettjan1(){
        $query = "SELECT sum(tipe_bed = 'L') as pria, sum(tipe_bed = 'P') as wanita FROM bed WHERE subbidang= 'JANTUNG' AND kelas='KL1' and status='KOSONG'";
        return $this->db->query($query)->row_array();
    }




    public function getkjan2(){
        $query = "SELECT count(kd_bed) as kapasitas FROM bed WHERE subbidang= 'JANTUNG' AND kelas='KL2'";
        return $this->db->query($query)->row_array();
    }
    public function gettjan2(){
        $query = "SELECT sum(tipe_bed = 'L') as pria, sum(tipe_bed = 'P') as wanita FROM bed WHERE subbidang= 'JANTUNG' AND kelas='KL2' and status='KOSONG'";
        return $this->db->query($query)->row_array();
    }



    public function getkjan3(){
        $query = "SELECT count(kd_bed) as kapasitas FROM bed WHERE subbidang= 'JANTUNG' AND kelas='KL3'";
        return $this->db->query($query)->row_array();
    }
    public function gettjan3(){
        $query = "SELECT sum(tipe_bed = 'L') as pria, sum(tipe_bed = 'P') as wanita FROM bed WHERE subbidang= 'JANTUNG' AND kelas='KL3' and status='KOSONG'";
        return $this->db->query($query)->row_array();
    }



    
    public function getkparu1(){
        $query = "SELECT count(kd_bed) as kapasitas FROM bed WHERE subbidang= 'PARU' AND kelas='ISO'";
        return $this->db->query($query)->row_array();
    }
    public function gettparu1(){
        $query = "SELECT sum(tipe_bed = 'L') as pria, sum(tipe_bed = 'P') as wanita FROM bed WHERE subbidang= 'PARU' AND kelas='ISO' and status='KOSONG'";
        return $this->db->query($query)->row_array();
    }





    public function getkparu2(){
        $query = "SELECT count(kd_bed) as kapasitas FROM bed WHERE subbidang= 'PARU' AND kelas='KL2'";
        return $this->db->query($query)->row_array();
    }
    public function gettparu2(){
        $query = "SELECT sum(tipe_bed = 'L') as pria, sum(tipe_bed = 'P') as wanita FROM bed WHERE subbidang= 'PARU' AND kelas='KL2' and status='KOSONG'";
        return $this->db->query($query)->row_array();
    }




    public function getkparu3(){
        $query = "SELECT count(kd_bed) as kapasitas FROM bed WHERE subbidang= 'PARU' AND kelas='KL3'";
        return $this->db->query($query)->row_array();
    }
    public function gettparu3(){
        $query = "SELECT sum(tipe_bed = 'L') as pria, sum(tipe_bed = 'P') as wanita FROM bed WHERE subbidang= 'PARU' AND kelas='KL3' and status='KOSONG'";
        return $this->db->query($query)->row_array();
    }



    public function getkint1(){
        $query = "SELECT count(kd_bed) as kapasitas FROM bed WHERE subbidang= 'INTERNE' AND kelas='KL1'";
        return $this->db->query($query)->row_array();
    }
    public function gettint1(){
        $query = "SELECT sum(tipe_bed = 'L') as pria, sum(tipe_bed = 'P') as wanita FROM bed WHERE subbidang= 'INTERNE' AND kelas='KL1' and status='KOSONG'";
        return $this->db->query($query)->row_array();
    }


    public function getkint2(){
        $query = "SELECT count(kd_bed) as kapasitas FROM bed WHERE subbidang= 'INTERNE' AND kelas='KL2'";
        return $this->db->query($query)->row_array();
    }
    public function gettint2(){
        $query = "SELECT sum(tipe_bed = 'L') as pria, sum(tipe_bed = 'P') as wanita FROM bed WHERE subbidang= 'INTERNE' AND kelas='KL2' and status='KOSONG'";
        return $this->db->query($query)->row_array();
    }


    public function getkint3(){
        $query = "SELECT count(kd_bed) as kapasitas FROM bed WHERE subbidang= 'INTERNE' AND kelas='KL3'";
        return $this->db->query($query)->row_array();
    }
    public function gettint3(){
        $query = "SELECT sum(tipe_bed = 'L') as pria, sum(tipe_bed = 'P') as wanita FROM bed WHERE subbidang= 'INTERNE' AND kelas='KL3' and status='KOSONG'";
        return $this->db->query($query)->row_array();
    }



    public function getkmtk1(){
        $query = "SELECT count(kd_bed) as kapasitas FROM bed WHERE subbidang= 'MTK' AND kelas='KL1'";
        return $this->db->query($query)->row_array();
    }
    public function gettmtk1(){
        $query = "SELECT sum(tipe_bed = 'L') as pria, sum(tipe_bed = 'P') as wanita FROM bed WHERE subbidang= 'MTK' AND kelas='KL1' and status='KOSONG'";
        return $this->db->query($query)->row_array();
    }


    public function getkmtk2(){
        $query = "SELECT count(kd_bed) as kapasitas FROM bed WHERE subbidang= 'MTK' AND kelas='KL2'";
        return $this->db->query($query)->row_array();
    }
    public function gettmtk2(){
        $query = "SELECT sum(tipe_bed = 'L') as pria, sum(tipe_bed = 'P') as wanita FROM bed WHERE subbidang= 'MTK' AND kelas='KL2' and status='KOSONG'";
        return $this->db->query($query)->row_array();
    }


    public function getkmtk3(){
        $query = "SELECT count(kd_bed) as kapasitas FROM bed WHERE subbidang= 'MTK' AND kelas='KL3'";
        return $this->db->query($query)->row_array();
    }
    public function gettmtk3(){
        $query = "SELECT sum(tipe_bed = 'L') as pria, sum(tipe_bed = 'P') as wanita FROM bed WHERE subbidang= 'MTK' AND kelas='KL3' and status='KOSONG'";
        return $this->db->query($query)->row_array();
    }



    public function getkrg1(){
        $query = "SELECT count(kd_bed) as kapasitas FROM bed WHERE subbidang= 'RAGAB' AND kelas='KL1'";
        return $this->db->query($query)->row_array();
    }
    public function gettrg1(){
        $query = "SELECT sum(tipe_bed = 'L') as pria, sum(tipe_bed = 'P') as wanita FROM bed WHERE subbidang= 'RAGAB' AND kelas='KL1' and status='KOSONG'";
        return $this->db->query($query)->row_array();
    }

    public function getkrg2(){
        $query = "SELECT count(kd_bed) as kapasitas FROM bed WHERE subbidang= 'RAGAB' AND kelas='KL2'";
        return $this->db->query($query)->row_array();
    }
    public function gettrg2(){
        $query = "SELECT sum(tipe_bed = 'L') as pria, sum(tipe_bed = 'P') as wanita FROM bed WHERE subbidang= 'RAGAB' AND kelas='KL2' and status='KOSONG'";
        return $this->db->query($query)->row_array();
    }

    public function getkrg3(){
        $query = "SELECT count(kd_bed) as kapasitas FROM bed WHERE subbidang= 'RAGAB' AND kelas='KL3'";
        return $this->db->query($query)->row_array();
    }
    public function gettrg3(){
        $query = "SELECT sum(tipe_bed = 'L') as pria, sum(tipe_bed = 'P') as wanita FROM bed WHERE subbidang= 'RAGAB' AND kelas='KL3' and status='KOSONG'";
        return $this->db->query($query)->row_array();
    }
}