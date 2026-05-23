<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>
    <?= $this->session->flashdata('messege'); ?>
    <a href="<?= base_url('manajemen/inputpeg')?>" class="btn btn-primary mt-2 mb-3">Tambah</a>
    <table class="table" id="example">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">ID</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama</th>
                <th scope="col">bidang</th>
                <th scope="col">subbidang</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
            foreach ($puser as $p):
        ?>
            <tr>
                <td><?= $i++?></td>
                <td><?= $p['id_peg']?></td>
                <td><?= $p['nik']?></td>
                <td><?= $p['name']?></td>
                <td><?= $p['bidang']?></td>
                <td><?= $p['subbidang']?></td>
                <td>
                    <a href="<?= base_url()?>" class="badge badge-info">Detail</a>
                    <a href="<?= base_url()?>" class="badge badge-danger">Hapus</a>
                </td>

            </tr>

            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>