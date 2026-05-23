<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lap_model extends CI_Model{
    public function getkelamin($bidang,$tgl, $tgl2){
        $query = "SELECT sum(sep.kelamin='L') as jkel, sum(sep.kelamin='P') as jkel2, sum(rawat_inap.tipe_masuk='1') as baru, sum(rawat_inap.tipe_masuk='2') as pindahan, sum(rawat_inap.kelas='ICU') as icu, sum(rawat_inap.kelas='VIP') as vip,
        sum(rawat_inap.kelas='ISO') as iso, sum(rawat_inap.kelas='KL1') as kl1, sum(rawat_inap.kelas='KL2') as kl2, sum(rawat_inap.kelas='KL3') as kl3, sum(rawat_inap.kelas='SAL') as sal,
        sum(rawat_inap.keterangan='1') as umum, sum(rawat_inap.keterangan='2') as bpjs, sum(rawat_inap.keterangan='3') as asu,
        count(rawat_inap.nosep) as total,
        sum(year(CURRENT_DATE)-year(sep.tgllahir)<1) as kcil1,
        sum(year(CURRENT_DATE)-year(sep.tgllahir) between 1 and 4) as kcil2,
        sum(year(CURRENT_DATE)-year(sep.tgllahir) between 5 and 14) as kcil3,
        sum(year(CURRENT_DATE)-year(sep.tgllahir) between 15 and 24) as kcil4,
        sum(year(CURRENT_DATE)-year(sep.tgllahir) between 25 and 44) as kcil5,
        sum(year(CURRENT_DATE)-year(sep.tgllahir) between 45 and 64) as kcil6,
        sum(year(CURRENT_DATE)-year(sep.tgllahir) >=65) as kcil7
        FROM rawat_inap inner join sep on sep.nosep = rawat_inap.nosep 
        where rawat_inap.ruang_rawat='$bidang' and rawat_inap.tgl_sep between '$tgl' and '$tgl2'";
        return $this->db->query($query)->result_array();
    }

    public function getpulang($bidang,$tgl, $tgl2){
        $query = "SELECT count(pulang.nosep) as jumlah, 
        sum(pascapulang='1') as sembuh, sum(pascapulang='2') as dirujuk, 
        sum(pascapulang='3') as pulpak, sum(pascapulang='4') as mati, sum(pascapulang='5') as lain,
        sum(carakluar='1') as perdok, sum(carakluar='2') as dirujuk2,
        sum(carakluar='3') as persen, sum(carakluar='4') as mati2, sum(carakluar='5') as lain2,
        sum(not carakluar='4') as hidup, sum(meninggal='1') as besar, sum(meninggal='2') as kecil,
        sum(lama_rawat) as lama
        FROM pulang 
        where pulang.subbidang='$bidang' and pulang.tgl_pulang between '$tgl' and '$tgl2'";
        return $this->db->query($query)->row_array();
    }

    
}