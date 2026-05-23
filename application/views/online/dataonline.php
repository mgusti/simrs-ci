<div class="container-fluid">
    <h1 class="h3 mb-4 mt-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <table id="example" class="table table-responsive-sm">
        <thead>
            <tr>
            <th scope="col">NO</th>
            <th scope="col">No MR</th>
            <th scope="col">No Telp</th>
            <th scope="col">Tgl Kunjungan</th>
            <th scope="col">Tgl registrasi</th>
            <th scope="col">Poli</th>
            <th scope="col">Statustanggap</th>
            <th scope="col">No Rujukan</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
            foreach ($online as $o):
        ?>
            <tr>
                <td><?= $i++?></td>
                <td><a href="<?= base_url('online/detailpasien/') . $o['nomr'] ?>" class="badge badge-primary"><?= $o['nomr']?></a></td>
                <td><?= $o['notelp']?></td>
                <td><?= $o['tglkunjungan']?></td>
                <td><?= $o['tglreq']?></td>
                <td><?= $o['poli']?></td>
                <td><?= $o['statustanggap']?></td>
                <td><?= $o['norujukan']?></td>
                <td><?= $o['keterangan']?></td>
                <td>
                    <a href="<?= base_url('online/prosessdataonline/') . $o['no'] ?>" class="badge badge-info">prosess</a>
                </td>
            </tr>
        </tbody>
        <?php
            endforeach;
        ?>
    </table>
</div>