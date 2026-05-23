<?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data keadaan pasien.xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <center><h1>KEADAAN PASIEN RAWAT INAP</h1></center>

    <li class="mb-3">Pasien Masuk</li>
    <p>TGL : <?= $tgl?> Ruang : <?= $user['subbidang']?></p>
            <table border='1'>
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">No MR</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Cara Masuk</th>
                    <th scope="col">Diagnosa</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Dokter</th>
                    
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i = 1;

                    foreach ($inap as $nap):
                ?>
                    <tr>
                        <th scope="row"><?= $i++?></th>
                        <td><?= $nap['nomr']?></td>
                        <td><?= $nap['nama_pasien']?></td>
                        <td><?= $nap['jenkel']?></td>
                        <td><?= $nap['nm_tipe']?></td>
                        <td><?= $nap['diagnosa']?></td>
                        <td><?= $nap['nm_ket']?></td>
                        <td><?= $nap['nm_dokter']?></td>
                    </tr>
                </tbody>
                <?php
                    endforeach;
                ?>
            </table>

<hr>

    <li class="mb-3">Pasien Pulang</li>
    <p>TGL : <?= $tgl?> Ruang : <?= $user['subbidang']?></p>
            <table border='1'>
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">No MR</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Cara Keluar</th>
                    <th scope="col">Pasca Pulang</th>
                    <th scope="col">Lama Rawat</th>
                    
                    
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i = 1;

                    foreach ($pulang as $nap):
                ?>
                    <tr>
                        <th scope="row"><?= $i++?></th>
                        <td><?= $nap['nomr']?></td>
                        <td><?= $nap['nama']?></td>
                        <td><?= $nap['kelamin']?></td>
                        <td><?= $nap['nm_pulang']?></td>
                        <td><?= $nap['nm_pasca']?></td>
                        <td><?= $nap['lama_rawat']?> Hari</td>
                    </tr>
                </tbody>
                <?php
                    endforeach;
                ?>
            </table>
</body>
</html>