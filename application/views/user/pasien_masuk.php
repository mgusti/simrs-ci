        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <div class="row">
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                <?= $this->session->flashdata('message'); ?>

                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPasienModal">Add New Pasien</a>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <form action="<?= base_url('user/carimasuk'); ?>" method="post">
                        <div class="input-group-append mb-3">
                            <input type="text" class="form-control" placeholder="cari data berdasarkan No" name="keywords" id="keywords">
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
                                <th scope="col">No_mr</th>
                                <th scope="col">nama</th>
                                <th scope="col">divisi</th>
                                <th scope="col">jenkel</th>

                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pasien_masuk as $pa) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $pa['no_mr']; ?></td>
                                    <td><?= $pa['nama']; ?></td>
                                    <td><?= $pa['divisi']; ?></td>
                                    <td><?= $pa['jenkel']; ?></td>

                                    <td>
                                        <a href="<?= base_url(); ?>user/ubahstatus/<?= $pa['no_mr']; ?>" class="badge badge-success">Ubah Status</a>
                                        <a href="<?= base_url(); ?>user/hapuspsn/<?= $pa['no_mr']; ?>" class="badge badge-danger">Pulang</a>
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