<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('messege'); ?>
</div>

<div class="container shadow-lg p-3 mb-5 bg-white rounded ">

    <a href="<?= base_url('ambulan/formjalan') ?>" class="btn btn-primary mt-3 mb-3"><i class="fa fa-plus"></i> Tambah</a>

    <table class="table table-striped" id="example">
        <thead>
            <tr>
                <th>Nomor Surat</th>
                <th>Tanggal Jalan</th>
                <th>Jam Jalan</th>
                <th>Tujuan</th>
                <th>KM mobil</th>
                <th>Tanggal Pulang</th>
                <th>Jam Pulang</th>
                <th>KM mobil pulang</th>
                <th>Jarak Tempuh</th>
                <th>Cetak</th>
                <th>Pulang</th>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($jalan as $j) :
            ?>
                <tr>
                    <td><?= $j['nomor'] ?></td>
                    <td><?= $j['tgl_jalan'] ?></td>
                    <td><?= $j['jam'] ?></td>
                    <td><?= $j['tujuan'] ?></td>
                    <td><?= $j['km_mobil'] ?> KM</td>
                    <td><?= $j['tgl_pulang'] ?></td>
                    <td><?= $j['jam_pulang'] ?></td>
                    <td><?= $j['km_pulang'] ?> KM</td>
                    <td><?= $j['jarak_tempuh'] ?> KM</td>
                    <td>
                        <a href="<?= base_url('ambulan/cetaksurat/') . $j['nomor'] ?>" class="btn btn-danger mt-2" target="_bank"><i class="fa fa-print"></i></a>
                    </td>
                    <td>
                        <a href="<?= base_url('ambulan/pulang/') . $j['nomor'] ?>" class="btn btn-success mt-2"><i class="fa fa-check"></i></a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>