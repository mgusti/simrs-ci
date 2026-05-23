        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <div class="row">
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                <?= $this->session->flashdata('message'); ?>

                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPasienModal">Add New Pasien</a>
                <?php
                $p = 'ANAK';
                if ($user['role_id'] == 2) {
                    echo $p;
                }
                ?>
                <input type="text" class="form-control" placeholder="cari data berdasarkan No" name="role_id" id="role_id" value="<?= $p ?>">
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <form action="<?= base_url('user/cari'); ?>" method="post">
                        <div class="input-group-append mb-3">
                            <input type="text" class="form-control" placeholder="cari data berdasarkan No" autocomplete="off" name="keyword" id="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-lg">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Pasien</th>
                                <th scope="col">Kode Kamar</th>
                                <th scope="col">Status Kamar</th>
                                <th scope="col">Status Data</th>
                                <th scope="col">Status Pasien</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pasien as $p) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $p['nama_pasien']; ?></td>
                                    <td><?= $p['kd_kamar']; ?></td>
                                    <td><?= $p['status']; ?></td>
                                    <td><?= $p['statusdata']; ?></td>
                                    <td><?= $p['stts_pulang']; ?></td>
                                    <td>
                                        <a href="<?= base_url(); ?>user/ubahstatus/<?= $p['no_rawat']; ?>" class="badge badge-success">Ubah Status</a>
                                        <a href="<?= base_url(); ?>user/hapuspsn/<?= $p['nama_pasien']; ?>" class="badge badge-danger">Pulang</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Modal  -->

        <!-- Modal -->
        <div class="modal fade" id="newPasienModal" tabindex="-1" role="dialog" aria-labelledby="newPasienModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newPasienModal">Add New Pasien</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('user/pasien') ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="namapasien" name="namapasien" placeholder="Nama Pasien">
                            </div>
                            <div class="form-group">
                                <select name="kdkamar" id="kdkamar" class="form-control">

                                    <option value="">Select Kamar</option>
                                    <?php foreach ($pas as $ps) : ?>
                                        <option value="<?= $ps['kd_kamar'] ?>"><?= $ps['kd_kamar'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="form-row align-items-center">
                                    <div class="col-auto my-1">
                                        <select class="custom-select mr-sm-2" id="status" name="status">
                                            <option selected>Status Kamar</option>
                                            <option value="ISI">ISI</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row align-items-center">
                                    <div class="col-auto my-1">
                                        <select class="custom-select mr-sm-2" id="statusdata" name="statusdata">
                                            <option selected>Status Data</option>
                                            <option value="1">1</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Masuk" name="statuspulang" id="statuspulang" checked>
                                    <label class="form-check-label" for="statuspulang">
                                        Masuk
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>