        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <?= validation_errors(); ?>

            <div class="row">

                <div class="col-lg">

                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newKamarModal">Add New Kamar</a>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Kamar</th>
                                <th scope="col">Kode Bangsal</th>
                                <th scope="col">Tarif</th>
                                <th scope="col">Status</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Status Data</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($kamar as $k) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $k['kd_kamar']; ?></td>
                                    <td><?= $k['kd_bangsal']; ?></td>
                                    <td><?= $k['trf_kamar']; ?></td>
                                    <td><?= $k['status']; ?></td>
                                    <td><?= $k['kelas']; ?></td>
                                    <td><?= $k['statusdata']; ?></td>
                                    <td>
                                        <a href="<?= base_url(); ?>bed/ubahKamar/<?= $k['kd_bangsal']; ?>" class="badge badge-success">Edit</a>
                                        <a href="<?= base_url(); ?>bed/hapusKamar/<?= $k['kd_kamar']; ?>" class="badge badge-danger">Delete</a>
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

        <!-- Modal -->
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="newKamarModal" tabindex="-1" role="dialog" aria-labelledby="newKamarModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newKamarModalLabel">Add New Kamar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('bed/kamar'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="kdkamar" name="kdkamar" placeholder="Kode Kamar">
                            </div>
                            <div class="form-group">
                                <select name="kdbangsal" id="kdbangsal" class="form-control">

                                    <option value="">Select Bangsal</option>
                                    <?php foreach ($bangsal as $bg) : ?>
                                        <option value="<?= $bg['kd_bangsal'] ?>"><?= $bg['kd_bangsal'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="tarif" name="tarif" placeholder="Tarif Kamar">
                            </div>
                            <div class="form-group">
                                <div class="form-row align-items-center">
                                    <div class="col-auto my-1">
                                        <select class="custom-select mr-sm-2" id="status" name="status">
                                            <option selected>Status</option>
                                            <option value="KOSONG">KOSONG</option>
                                            <option value="ISI">ISI</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row align-items-center">
                                    <div class="col-auto my-1">
                                        <select class="custom-select mr-sm-2" id="kelas" name="kelas">
                                            <option selected>Kelas</option>
                                            <option value="Kelas 1">Kelas 1</option>
                                            <option value="Kelas 2">Kelas 2</option>
                                            <option value="Kelas 3">Kelas 3</option>
                                            <option value="Kelas Utama">Kelas Utama</option>
                                            <option value="Kelas VIP">Kelas VIP</option>
                                            <option value="Kelas VVIP">Kelas VVIP</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row align-items-center">
                                    <div class="col-auto my-1">
                                        <select class="custom-select mr-sm-2" id="statusdata" name="statusdata">
                                            <option selected>Status Data</option>
                                            <option value="0">Inactive</option>
                                            <option value="1">Active</option>
                                        </select>
                                    </div>
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