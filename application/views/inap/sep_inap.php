<div class="container-fluid">
    <h1 class="h3 mb-4 mt-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('messege'); ?>

    <table class="table mt-3" id="example">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">No. SEP</th>
                <th scope="col">Tgl. SEP</th>
                <th scope="col">No. MR</th>
                <th scope="col">No. Kartu</th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Jns Pelayanan</th>
                <th scope="col">Action</th>

                
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
                foreach ($sep as $p) :
            ?>

            <tr>
                <th scope="row"><?= $i++?></th>
                <td><?= $p["nosep"]?></td>
                <td><?= $p["tgl_sep"]?></td>
                <td><?= $p["nomr"]?></td>
                <td><?= $p["nokartu"]?></td>
                <td><?= $p["nama"]?></td>
                <td><?= $p["jnspelayanan"]?></td>
                <td><a href="<?= base_url('inap/input_inap/')?><?= $p["nosep"]?>" class="badge badge-info">R. Inap</a></td>
                
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    
    </table>
    
</div>