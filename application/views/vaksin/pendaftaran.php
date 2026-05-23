<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <div class="card mb-3">
        <div class="card-body">
            <h4>Pencarian Data</h4>
            <form action="" method="get">
                <div class="row">
                    <div class="col-lg-5">
                        <label for="">Tanggal</label>
                        <input type="date" name="tgl" id="tgl" class="form-control">
                    </div>
                </div>
                <button class="btn btn-danger mt-3"><i class="fa fa-search"></i></button>
                <a href="<?= base_url('vaksin/cetakdaftar/?tgl=') . $_GET['tgl'] ?>" target="_blank" class="btn btn-info mt-3"><i class="fa fa-print"></i></a>
            </form>
            <small class="text-danger mt-3">data di urutkan berdasarkan timestamp terdahulu daftar</small>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah</button>

        </div>
        <div class="card-body">
            <table class="table table-responsive-md table-striped table-bordered mt-3" id="example">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>No. Registrasi</th>
                        <th>No. Urut</th>
                        <th>Tgl Kunjungan</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Hp</th>
                        <th>timestamp</th>
                        <th>hapus</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($vaksin as $v) :

                    ?>
                        <tr>
                            <th><?= $i++ ?></th>
                            <td><?= $v['kd_vaksin'] ?></td>
                            <td><?= $v['no_register'] ?></td>
                            <td><?= $v['tgl_daftar'] ?></td>
                            <td><?= $v['nik'] ?></td>
                            <td><?= $v['nama'] ?></td>
                            <td><?= $v['hp'] ?></td>
                            <td><?= $v['timestamp'] ?></td>
                            <td><a href="<?= base_url('vaksin/hapusdaftar/') . $v['kd_vaksin'] ?>" class="btn btn-danger hapus"><i class="fa fa-trash"></i></a></td>

                        <?php
                    endforeach;
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">PENDAFTARAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('vaksin/inputpendaftaran') ?>" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">No. Urut</label>
                            <input type="text" name="register" id="register" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Tanggal Kunjungan</label>
                            <input type="date" name="tgl" id="tgl" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">NIK</label>
                            <input type="number" name="nik" id="nik" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">HP</label>
                            <input type="text" name="hp" id="hp" class="form-control">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>