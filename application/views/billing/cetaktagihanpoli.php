<!doctype html>
<html lang="en">
<?php
error_reporting(0);
ini_set('display_errors', 0);
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>tagihan</title>
    <link href="<?=base_url('assets/');?>img/simrs.png" rel="icon">

    <style>
        img {
            width: 80px;
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

        @media screen and (max-width: 600px) {
            .column {
                width: 100px;
            }
        }

        /* CSS untuk menyembunyikan tombol print saat dicetak */
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body onload="window.print()">
    <div class="container mt-3">
        <div style="text-align: justify;" class="mt-2 mb-2">
            <img src="<?=base_url('assets/img/logo.png')?>" style="float: left; margin: 5px 9px 3px 50px;" />
            <h3 class="text-center">PEMERINTAH KOTA JAMBI</h3>
            <h2 class="text-center">RSUD H. ABDUL MANAP KOTA JAMBI</h2>
            <p class="text-center">Jl. Raden Syahbudin, Mayang Mangurai, Alam Barajo, Kota Jambi, Jambi 36129</p>

            <hr class="har">
        </div>

        <h3 class="text-center">RINCIAN BIAYA PENGOBATAN</h3>
        <h5 class="text-center">Nomor : <?=sprintf("%03d", $bil['no']);?></h5>

        <style>
            .atas {
                width: 500px;
            }

            .atas th,
            .atas td {
                padding: 4px 2px;
            }
        </style>

        <div class="container mt-4 ml-4">
            <table>
                <tr>
                    <td>
                        <table class="atas mt-4">
                            <tr>
                                <th>No M.R</th>
                                <th>:</th>
                                <td><?=format_mr($bil['no_mr'])?></td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <th>:</th>
                                <td><?=$bil['nama']?></td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <th>:</th>
                                <td><?=tanggal_indo($bil['tgl'])?></td>
                            </tr>
                            <tr>
                                <th>Ruang Masuk</th>
                                <th>:</th>
                                <td><?=$bil['poli']?></td>
                            </tr>
                            <tr>
                                <th>DPJP</th>
                                <th>:</th>
                                <td><?=$bil['dpjp'] != null ? $bil['dpjp'] : '-'?></td>
                            </tr>
                            <tr>
                                <th>Ruang Rawat</th>
                                <th>:</th>
                                <td><?=$bil['ruang_ranap'] != null ? $bil['ruang_ranap'] : '-'?></td>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <th>:</th>
                                <td><?=$bil['kelas']?></td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table class="atas">
                            <tr>
                                <th>Tanggal Masuk Ranap</th>
                                <th>:</th>
                                <td><?=$bil['tgl_masuk_ranap'] != null ? tanggal_indo($bil['tgl_masuk_ranap']) : '-'?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Keluar Ranap</th>
                                <th>:</th>
                                <td><?=$bil['tgl_keluar_ranap'] != null ? tanggal_indo($bil['tgl_keluar_ranap']) : '-'?></td>
                            </tr>
                            <tr>
                                <th>LOS</th>
                                <th>:</th>
                                <td><?=$bil['durasi_ranap'] != null ? $bil['durasi_ranap'] : '-'?> hari</td>
                            </tr>

                            <tr>
                                <th>Rawat Intensive</th>
                                <th>:</th>
                                <td><?=$bil['is_intensive'] == 1 ? 'Ya' : 'Tidak'?></td>
                            </tr>

                            <tr>
                                <th>Keterangan Ranap</th>
                                <th>:</th>
                                <td><?=$bil['ket_ranap'] != null ? $bil['ket_ranap'] : '-'?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

        </div>

        <div class="container mt-4">
            <style>
                .isi th,
                .isi td,
                .isi thead {
                    border: 2px solid;
                }
            </style>
            <table class="table mt-3 isi">
                <thead class="table-active text-center">
                    <tr>
                        <th>RUANGAN</th>
                        <th>JENIS TINDAKAN</th>
                        <th>BIAYA</th>
                        <th>KETERANGAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detail_bil as $db): ?>
                        <tr>
                            <td><?=empty($db['subbidang']) ? " " : $db['subbidang']?></td>
                            <td><?=$db['jenis_tindakan']?></td>
                            <td class="text-right"><?php
if ($db['biaya'] == null || $db['biaya'] == '') {
    echo '<b style="color: red">BIAYA BELUM DIISI</b>';
} else {
    echo "Rp. " . number_format($db['biaya'], 2, ',', '.');
}?>
                        </td>
                            <td><?=$db['keterangan']?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <th>Jumlah</th>
                        <th colspan="3" class="text-right"><?="Rp. " . number_format($sum['biaya'], 2, ',', '.');?></th>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="container">
            <div class="right float-right mt-3 mb-3">
                <p>Jambi, <?=tanggal_indo(date('Y-m-d'))?></p>
                <p style="font-weight: bold;">Petugas</p>
                <br>
                <br>
                <p>(<?php if (is_array($verifikator) && isset($verifikator['name']) && $verifikator['name'] != null) {
    echo $verifikator['name'];
} else {
    echo '...............................';
}?>
                    )</p>
            </div>
        </div>

        <!-- Tombol Print -->
        <div class="container text-center mt-4 mb-4 no-print">
            <button class="btn btn-primary" onclick="window.print()">Print</button>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>