<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?=$title;?></h1>


    <table class="table table-bordered table-striped table-responsive-sm" id="example">
        <thead>
            <tr>
                <th>NO.</th>
                <th>EMAIL</th>
                <th>ADUAN</th>
                <th>NAMA</th>
                <th>ALAMAT</th>
                <th>NO. HP</th>
                <th>WAKTU</th>


            </tr>
        </thead>
        <tbody>
            <?php
$i = 1;
foreach ($pengaduan as $p):

?>
                <tr>
                    <th><?=$i++?></th>
                    <td><?=$p['email']?></td>
                    <td><?=$p['pengaduan']?></td>
                    <td><?=$p['nama']?></td>
                    <td><?=$p['alamat']?></td>
                    <td><?=$p['hp']?></td>
                    <td><?=$p['created_at']?></td>


                </tr>
            <?php
endforeach;
?>
        </tbody>
    </table>
</div>