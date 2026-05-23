<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
    <body>
        <center><h1>Data Riwayat Pasien</h1></center>

        
        <br>
        <table class="table">
            <tr>
                <th>No MR</th>
                <td>:</td>
                <td><?= $pasien['no_rekam_medis']?></td>
                <th>Nama</th>
                <td>:</td>
                <td><?= $pasien['nama_pasien']?></td>
            </tr>
            <tr>
                <th>No BPJS</th>
                <td>:</td>
                <td><?= $pasien['nokartu']?></td>
                <th>Tgl Lahir</th>
                <td>:</td>
                <td><?= $pasien['tgl_lahir']?></td>
            </tr>
            <tr>
                <th>NIK</th>
                <td>:</td>
                <td><?= $pasien['no_ktp']?></td>
                <th>Jenis Kelamin</th>
                <td>:</td>
                <td><?= $pasien['jenkel']?></td>
            </tr>
            <tr>
                <th>Golongan Darah</th>
                <td>:</td>
                <td><?= $pasien['gol_darah']?></td>

                <th>Alamat</th>
                <td>:</td>
                <td><?= $pasien['alamat']?></td>
            </tr>
            <tr>
                <th>No HP</th>
                <td>:</td>
                <td><?= $pasien['no_hp']?></td>
            </tr>
        </table>
        <hr>
       <br>
        <h3>Riwayat Kunjungan Rawat Inap</h3>
        <p>Total Kunjungan R. inap :  <?= $tot['total']?></p>
        

            <table border='1'>
                <thead>
                    <tr>
                        <th scope="col" >No</th>
                        <th scope="col" >No SEP</th>
                        <th scope="col" >Tgl SEP</th>
                        <th scope="col" >Tgl Pulang</th>
                        <th scope="col" >Lama Rawat</th>
                        <th scope="col" >Ruang Rawat</th>
                        <th scope="col" >Pasca Pulang</th>
                        <th scope="col" >Cara Pulang</th>
                        <th scope="col" >Diagnosa Awal</th>
                        <th scope="col" >Dokter</th>
                        <th scope="col" >Tipe Masuk</th>
                        <th scope="col" >Keterangan Masuk</th>
                        
                        
                    </tr>
                    

                </thead>
                <tbody>
                <?php
                    $i = 1;
                    
                    foreach ($inap as $nap):
                ?>
                <tr>
                    <td><?= $i?></td>
                    <td><?= $nap['nosep']?></td>
                    <td><?= $nap['tgl_sep']?></td>
                    <td><?= $nap['tgl_pulang']?></td>
                    <td><?= $nap['lama_rawat']?> hari</td>
                    <td><?= $nap['ruang_rawat']?></td>
                    <td><?= $nap['nm_pasca']?></td>
                    <td><?= $nap['nm_pulang']?></td>
                    <td><?= $nap['diagnosa']?></td>
                    <td><?= $nap['nm_dokter']?></td>
                    <td><?= $nap['nm_tipe']?></td>
                    <td><?= $nap['nm_ket']?></td>

                
                </tr>
                    
                </tbody>
               <?php
                    endforeach;
               ?>
            </table>
    </body>
</html>