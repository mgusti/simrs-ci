<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
    <body>
        <center><h1>DATA PENYAKIT TERBANYAK</h1>

        <p>TGL : <?= $_POST['tgl_mulai5']?> s/d TGL: <?= $_POST['tgl_akhir5']?></p></center>
        <br>
     

            <table border='1'>
                <thead>
                    <tr>
                        <th scope="col" >No</th>
                        <th scope="col" >Diagnosa</th>
                        <th scope="col" >Total Penderita</th>
                       
                        
                    </tr>
                    

                </thead>
                <tbody>
                <?php

                
                    $i = 1;
                    foreach ($diag as $d):
                    
                ?>
                
                    <tr>
                        <td><?= $i++?></td>
                        <td><?= $d['diagnosa']?></td>
                        
                        <td><?= $d['total']?></td>
                 
                       

                    </tr>
                    
                </tbody>
                <?php
                    
                    endforeach;
                ?>
            </table>
    </body>
</html>