<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>
    <div class="card mb-3">
        <div class="card-body">
            <form action="<?= base_url('pendaftaran/updatekuota') ?>" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="">Kuota</label>
                        <input type="text" name="kuota" id="kuota" class="form-control" value="<?= $kuota['kuota'] ?>">
                    </div>
                    <div class="col-lg-12 mt-3">
                        <button class="btn btn-warning" type="submit">Update</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <form action="" method="get">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="">Tgl Pendaftaran</label>
                        <input type="date" name="tgl" id="tgl" class="form-control">
                    </div>
                    <div class="col-lg-12">
                        <button class="btn btn-danger mt-3"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-bordered table-striped table-responsive-sm ">
        <thead>
            <tr>
                <th>NO.</th>
                <th>NO. REG</th>
                <th>ANTRIAN</th>
                <th>NIK</th>
                <th>NAMA</th>
                <th>HP</th>
                <th>KLINIK</th>
                <th>KATEGORI</th>
                <th>JENIS BAYAR</th>
                <th>NOMOR BPJS</th>
                <th>STATUS</th>
                <th>KONFIRMASI</th>

            </tr>
        </thead>
        <thead>
            <?php
            $i = 1;
            foreach ($pend as $p) :
                if ($p['kategori'] == 1) {
                    $kat = "Pasien Lama";
                } else {
                    $kat = "Pasien Baru";
                }

                if ($p['jenis_bayar'] == 1) {
                    $byr = "BPJS";
                } else {
                    $byr = "UMUM";
                }

                if ($p['status'] == 0) {
                    $st = 'tunggu';
                    $tx = 'warning';
                } else if ($p['status'] == 1) {
                    $st = 'Hadir';
                    $tx = 'success';
                } else {
                    $st = 'Batal';
                    $tx = 'danger';
                }

            ?>
                <tr>
                    <th><?= $i++ ?></th>
                    <td><?= $p['no_reg'] ?></td>
                    <td><?= $p['antrian'] ?></td>
                    <td><?= $p['nik'] ?></td>
                    <td><?= $p['nama'] ?></td>
                    <td><?= $p['hp'] ?></td>
                    <td><?= $p['nmp'] ?></td>
                    <td><?= $kat ?></td>
                    <td><?= $byr ?></td>
                    <td><?= $p['rujukan'] ?></td>
                    <td class="text-<?= $tx ?>"><?= $st ?></td>

                    <td><a href="<?= base_url('pendaftaran/konfirmasi/') . $p['no_reg'] . '/' . $p['tgl_kunjungan'] ?>" class="btn btn-success">KONFIRM</a></td>

                </tr>
            <?php
            endforeach;
            ?>
        </thead>
    </table>
</div>