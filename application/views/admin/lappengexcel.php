<?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Laporan Pengadaan.xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Pengadaan</title>
</head>
<body>

    <center><H1>DATA PENGADAAN</H1></center>

    <center><?= $_POST['dari'];?> s/d <?= $_POST['sampai'];?></center>
    <br>
    <br>
    <center><table border='1'>
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Tgl Pengadaan</th>
                    <th scope="col">Nama Kegiatan</th>
                    <th scope="col">Vendor</th>
                    <th scope="col">No Pengadaan</th>
                    <th scope="col">Nilai</th>
                  
                    
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i = 1;

                    foreach ($peng as $p):
                ?>
                    <tr>
                        <th scope="row"><?= $i++?></th>
                        <td><?= $p['tgl']?></td>
                        <td><?= $p['paket']?></td>
                        <td><?= $p['vendor']?></td>
                        <td><?= $p['no_pengadaan']?></td>
                        <td> Rp. <?= $p['nilai']?></td>
                       
                    </tr>
                <?php
                    endforeach;
                ?>
                </tbody>

                
                <tr>
                    <td colspan='5'>Total Nilai Pengadaan :</td>
                    <td>Rp. <?= $total['t_nilai']?></td>
                </tr>
                
            </table></center>

            <br>

            
</body>
</html>