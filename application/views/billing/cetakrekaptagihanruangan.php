<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>tagihan</title>
    <link href="<?=base_url('assets/');?>img/simrs.png" rel="icon">

    <style>
        * {
        box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .columnleft {
        float: left;
        width: 20%;
        padding: 10px;
        }

        .columnright {
        float: left;
        width: 70%;
        padding: 10px;
        }

        /* Clear floats after the columns */
        .row:after {
        content: "";
        display: table;
        clear: both;
        }

        @page {
            size: A4 landscape; /* Set ukuran halaman A4 landscape */
            margin: 20mm; /* Margin untuk halaman */
        }

        body {
            font-family: Arial, sans-serif;
            background: white;
            color: black;
        }

        img {
            width: 120px;
        }

        hr {
            border: 3px solid;
            border-radius: 5px;
        }

        .kolom {
            float: left;
            width: 50%;
            padding: 10px;
            height: auto;
        }

        .rows:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Atur margin kiri pada container */
        .container {
            margin-left: 10mm; /* Ubah nilai ini sesuai kebutuhan */
        }

        /* Rata kiri untuk tabel */
        .atas, .isi {
            margin-left: 0; /* Menghilangkan margin kiri untuk tabel */
            width: 100%; /* Mengatur lebar tabel agar memenuhi ruang */
        }

        .atas th,
        .atas td,
        .isi th,
        .isi td {
            padding: 4px 2px;
            text-align: left; /* Rata kiri untuk teks di dalam tabel */
        }

        @media screen and (max-width: 600px) {
            .kolom {
                width: 100%; /* Ubah ke 100% pada layar kecil */
            }
        }

        /* CSS untuk menyembunyikan tombol print saat dicetak */
        @media print {
            .no-print {
                display: none;
            }
        }

        .text-limited {
    max-width: 100px; /* Atur lebar maksimum */
    overflow: hidden;
    text-overflow: ellipsis; /* Tampilkan titik-titik jika teks terpotong */
    white-space: wrap; /* Jangan biarkan teks membungkus ke baris baru */
}

    </style>
</head>

<body onload="window.print()">
    <div style="text-align: justify;" class="mt-2 mb-2">
            <img src="<?=base_url('assets/img/logo.png')?>" style="float: left; margin: 5px 9px 3px 50px;" />
            <h3 class="text-center">PEMERINTAH KOTA JAMBI</h3>
            <h3 class="text-center">DINAS KESEHATAN</h3>
            <h2 class="text-center">RUMAH SAKIT UMUM DAERAH H. ABDUL MANAP</h2>
            <p class="text-center">Jl. Sk. Rd. Syahbuddin Kel. Mayang Mangurai Kec. Alam Barajo Kota Jambi 36129 Tel (0741) 5910180 ext 161, email : rsud_ham.jambi@yahoo.co.id, rsudjambikota@gmail.com, website : simanap.rsudkotajambi.id</p>
            <hr class="har">
        </div>

    <h3 class="text-center">REKAP TAGIHAN RUANG <?=$ruangan;?></h3>
    <div class="container font-weight-bold"><p>DETAIL REKAP TAGIHAN</p></div>
        <div class="row container">
            <div class="columnleft">
                <p class="font-weight-bold">Bulan</p>
                <p class="font-weight-bold">Ruang Tindakan</p>
                <!-- <p class="font-weight-bold">Kelas</p> -->
                <!-- <p class="font-weight-bold">Ruang Masuk</p>
                <p class="font-weight-bold">Ruang Rawat</p> -->
                <!-- <p class="font-weight-bold">Jenis Tindakan</p> -->
                <p class="font-weight-bold">Total Tagihan</p>
                <p class="font-weight-bold">Dicetak Pada</p>
            </div>
            <div class="columnright">
                <p>: <?=$bulan?></p>
                <p>: <?=$ruangan?></p>
                <!-- <p>: <?=$kelas != '-' ? $kelas : 'SEMUA KELAS'?></p>
                <p>: <?=$poli_masuk != '-' ? $poli_masuk : ''?></p>
                <p>: <?=$poli_ranap != '-' ? $poli_ranap : ''?></p>
                <p>: <?=$jenis_tindakan != '-' ? $jenis_tindakan : 'SEMUA JENIS TINDAKAN'?></p> -->
                <p>: <?="Rp. " . number_format($total_biaya, 2, ',', '.');?></p>
                <p>: <?=tanggal_indo(date('Y-m-d'))?></p>
            </div>
        </div>

    <div class="container mt-4">
          <table class="table table-bordered" style="table-layout: fixed; width:100%; font-size:11px;">
    <thead>
        <tr>
            <th style="width:40px;">No.</th>
            <th style="width:100px;">RUANG TINDAKAN</th>
            <th style="width:90px;">TGL INPUT PASIEN</th>
            <th style="width:90px;">TGL INPUT TINDAKAN</th>
            <th style="width:120px;">NAMA PASIEN</th>
            <th style="width:80px;">NO MR</th>
            <th style="width:60px;">KELAS</th>
            <th style="width:130px;">JENIS TINDAKAN</th>
            <th style="width:90px;">BIAYA</th>
            <th style="width:100px;">KETERANGAN</th>
            <th style="width:100px;">RUANG MASUK</th>
            <th style="width:100px;">RUANG RAWAT</th>
            <th style="width:130px;">PETUGAS INPUT</th>
        </tr>
    </thead>
    <tbody>
        <?php
$no = 1;
foreach ($rekap_tagihan as $db): ?>
            <tr>
                <td><?=$no++;?></td>
                <td><?=$db['subbidang']?></td>
                <td><?=$db['tgl']?></td>
                <td><?=$db['tgl_input'];?></td>
                <td><?=$db['nama']?></td>
                <td><?=format_mr($db['no_mr'])?></td>
                <td><?=$db['kelas']?></td>
                <td><?=$db['jenis_tindakan']?></td>
                <td><?="Rp. " . number_format($db['biaya'], 2, ',', '.');?></td>
                <td style="word-wrap:break-word; white-space:normal;"><?=$db['keterangan']?></td>
                <td><?=$db['poli']?></td>
                <td><?=$db['ruang_ranap']?></td>
                <td style="word-wrap:break-word; white-space:normal;"><?=$db['name']?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


        </div>

        <!-- Tombol Print -->
        <div class="container text-center mt-4 mb-4 no-print">
            <button class="btn btn-primary" onclick="window.print()">Print</button>
        </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
