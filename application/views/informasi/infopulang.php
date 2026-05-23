<div class="container-fluid">
    <h1 class="h3 mb-4 mt-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <table class="table" id="example">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">No. SEP</th>
                <th scope="col">No. MR</th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Tgl Masuk</th>
                <th scope="col">Tgl Pulang</th>
                <th scope="col">Lama Rawat</th>
                <th scope="col">Cara Keluar</th>
                <th scope="col">Pasca Pulang</th>
                <th scope="col">Ruang Rawat</th>
                


            </tr>
        </thead>
        <tbody>
        <?php
            $i = 1;
            foreach ($pulang as $pul):
        ?>
            <tr>
                <th scope="row"><?= $i++?></th>
                <td><?= $pul["nosep"]?></td> 
                <td><?= $pul["nomr"]?></td>
                <td><?= $pul["nama"]?></td>
                <td><?= $pul["tgl_sep"]?></td>
                <td><?= $pul["tgl_pulang"]?></td>
                <td><?= $pul["lama_rawat"]?> Hari</td> 
                <td><?= $pul["nm_pulang"]?></td>  
                <td><?= $pul["nm_pasca"]?></td>
                <td><?= $pul["subbidang"]?></td>
                 
                    

            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
</div>