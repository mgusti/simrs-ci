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

        <p>TGL : <?= $_POST['tgl_mulai2']?> s/d TGL: <?= $_POST['tgl_akhir2']?></p></center>
        <br>
        <p>Ruang Rawat : <?= $user['subbidang']?></p>

            <table border='1'>
                <thead>
                    <tr>
                        
                        <th scope="col" colspan='2'>Pasien Berdasarkan Jenis Kelamin</th>
                        <th scope="col" colspan='2'>Cara Masuk</th>
                        <th scope="col" colspan='7'>Kelas</th>
                        <th scope="col" colspan='3'>Keterangan</th>
                        <th scope="col" colspan='7'>Golongan Umur</th>
                        <th scope="col" rowspan='2'>Jumlah Pasien</th>
                    </tr>
                    <tr>
                        <th scope="col" rowspan="1" >Laki- Laki</th>
                        <th scope="col" rowspan="1" >Perempuan</th>
                        <th scope="col" rowspan="1" >Baru </th>
                        <th scope="col" rowspan="1" >Pindahan</th>
                        <th scope="col" rowspan="1" >ICU</th>
                        <th scope="col" rowspan="1" >ISOLASI</th>
                        <th scope="col" rowspan="1" >VIP</th>
                        <th scope="col" rowspan="1" >KLS I</th>
                        <th scope="col" rowspan="1" >KLS II</th>
                        <th scope="col" rowspan="1" >KLS III</th>
                        <th scope="col" rowspan="1" >BERSALIN</th>
                        <th scope="col" rowspan="1" >BPJS</th>
                        <th scope="col" rowspan="1" >UMUM</th>
                        <th scope="col" rowspan="1" >ASURANSI</th>
                        <th scope="col" rowspan="1" > (< 1) </th>
                        <th scope="col" rowspan="1" > (1-4)</th>
                        <th scope="col" rowspan="1" >(5-14)</th>
                        <th scope="col" rowspan="1" >(15-24)</th>
                        <th scope="col" rowspan="1" >(25-44)</th>
                        <th scope="col" rowspan="1" >(45-64)</th>
                        <th scope="col" rowspan="1" >(>65)</th>
                    </tr>

                </thead>
                <tbody>
                <?php
                    
                    foreach ($kelamin as $k):

                ?>
                
                    <tr>
                        <th><?= $k['jkel']?></th>
                        <th><?= $k['jkel2']?></th>
                        <td><?= $k['baru']?></td>
                        <td><?= $k['pindahan']?></td>
                        <td><?= $k['icu']?></td>
                        <td><?= $k['iso']?></td>
                        <td><?= $k['vip']?></td>
                        <td><?= $k['kl1']?></td>
                        <td><?= $k['kl2']?></td>
                        <td><?= $k['kl3']?></td>
                        <td><?= $k['sal']?></td>
                        <td><?= $k['umum']?></td>
                        <td><?= $k['bpjs']?></td>
                        <td><?= $k['asu']?></td>
                        <td><?= $k['kcil1']?></td>
                        <td><?= $k['kcil2']?></td>
                        <td><?= $k['kcil3']?></td>
                        <td><?= $k['kcil4']?></td>
                        <td><?= $k['kcil5']?></td>
                        <td><?= $k['kcil6']?></td>
                        <td><?= $k['kcil7']?></td>
                        <td><?= $k['total']?></td>
                    </tr>
                    
                </tbody>
                <?php
                    endforeach;
                ?>
            </table>
    </body>
</html>