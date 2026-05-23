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
        <center><h1>REKAP PASIEN MASUK RAWAT INAP</h1>

        <p>TGL : <?= $_POST['tgl_mulai3']?> s/d TGL: <?= $_POST['tgl_akhir3']?></p></center>
        <br>
        <p>Ruang Rawat : <?= $user['subbidang']?></p>

            <table border='1'>
                <thead>
                    <tr>
                        
                        <th scope="col" rowspan='2'>Jumlah Pasien Pulang</th>
                        <th scope="col" colspan='5'>Pasca Pulang</th>
                        <th scope="col" colspan='5'>Cara Pulang</th>
                        <th scope="col" rowspan='2'>Keluar Hidup</th>
                        <th scope="col" colspan='2'>Keluar Mati</th>
                        <th scope="col" rowspan='2'>Jumlah Lama Rawat</th>
                    </tr>
                    <tr>
                    <th scope="col" rowspan="1" >Sembuh</th>
                        <th scope="col" rowspan="1" >Dirujuk</th>
                        <th scope="col" rowspan="1" >Pulang Paksa</th>
                        <th scope="col" rowspan="1" >Meninggal</th>
                        <th scope="col" rowspan="1" >Lain-Lain</th>
                        <th scope="col" rowspan="1" >Atas Persetujuan Dokter</th>
                        <th scope="col" rowspan="1" >Atas Permintaan Sendri</th>
                        <th scope="col" rowspan="1" >Dirujuk</th>
                        <th scope="col" rowspan="1" >Meninggal</th>
                        <th scope="col" rowspan="1" >Lain-lain</th>
                        <th scope="col" rowspan="1" >(> 48) </th>
                        <th scope="col" rowspan="1" >(< 48)</th>
                    </tr>

                </thead>
                <tbody>
                <?php
                    
                   

                ?>
                
                    <tr>
                        <td><?= $plg['jumlah']?></td>
                        <td><?= $plg['sembuh']?></td>
                        <td><?= $plg['dirujuk']?></td>
                        <td><?= $plg['pulpak']?></td>
                        <td><?= $plg['mati']?></td>
                        <td><?= $plg['lain']?></td>
                        <td><?= $plg['perdok']?></td>
                        <td><?= $plg['persen']?></td>
                        <td><?= $plg['dirujuk2']?></td>
                        <td><?= $plg['mati2']?></td>
                        <td><?= $plg['lain2']?></td>
                        <td><?= $plg['hidup']?></td>
                        <td><?= $plg['besar']?></td>
                        <td><?= $plg['kecil']?></td>
                        <td><?= $plg['lama']?></td>

                    </tr>
                    
                </tbody>
                <?php
                    
                ?>
            </table>
    </body>
</html>