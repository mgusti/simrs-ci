<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('tanggal_indo')) {
    function tanggal_indo($tanggal, $format = 'd F Y H:i', $time_zone = 'WIB')
    {
        $bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        );

        // Pisahkan tanggal dengan format Y-m-d H:i:s jika ada waktu
        $split = explode(' ', $tanggal); // Pisahkan tanggal dan waktu
        $tgl_bln_thn = explode('-', $split[0]); // Pisahkan tanggal Y-m-d
        $tgl = $tgl_bln_thn[2];
        $bln = (int) $tgl_bln_thn[1];
        $thn = $tgl_bln_thn[0];

        $jam_menit = isset($split[1]) ? $split[1] : ''; // Ambil waktu jika ada

        // Cek format dan terapkan bulan Indonesia jika format 'd F Y'
        if ($format == 'd F Y H:i') {
            $tanggal_indo = $tgl . ' ' . $bulan[$bln] . ' ' . $thn;
            if (!empty($jam_menit)) {
                // Tambahkan waktu dan zona waktu jika ada
                $tanggal_indo .= ' ' . $jam_menit . ' ' . $time_zone;
            }
            return $tanggal_indo;
        } else {
            // Jika format lain, gunakan format date biasa
            return date($format, strtotime($tanggal));
        }
    }
}
