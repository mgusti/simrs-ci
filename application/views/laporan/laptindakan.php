<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
    <body>
        <center><h1>Data Tindakan Petugas Rawat Inap</h1>

        <p>TGL : <?= $_POST['tgl_mulai4']?> s/d TGL: <?= $_POST['tgl_akhir4']?></p></center>
        <br>
        <p>Ruang Rawat : <?= $user['subbidang']?></p>

            <table border='1'>
                <thead>
                    <tr>
                        <th scope="col" >No</th>
                        <th scope="col" >No Sep</th>
                        <th scope="col" >Tgl SEP</th>
                        <th scope="col" >No MR</th>
                        <th scope="col" >Jenis Tindakan</th>
                        <th scope="col" >Tindakan</th>
                        <th scope="col" >Tgl Tindakan</th>
                        <th scope="col" >Dokter</th>
                        <th scope="col" >Petugas</th>
                        
                    </tr>
                    

                </thead>
                <tbody>
                <?php
                    $i = 1;
                    foreach ($tindakan as $t):

                ?>
                
                    <tr>
                        <td><?= $i++?></td>
                        <td><?= $t['nosep']?></td>
                        <td><?= $t['tglsep']?></td>
                        <td><?= $t['nomr']?></td>
                        <td><?= $t['nama_tindakan']?></td>
                        <td><?= $t['jenis_pelayanan']?></td>
                        <td><?= $t['tgl_tindakan']?></td>
                        <td><?= $t['nm_dokter']?></td>
                        <td><?= $t['petugas']?></td>
                       

                    </tr>
                    
                </tbody>
                <?php
                    endforeach;
                ?>
            </table>
    </body>
</html>