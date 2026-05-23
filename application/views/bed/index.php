        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <?= validation_errors(); ?>

            <div class="row">

                <div class="col-lg">

                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newBangsalModal">Add New Bangsal</a>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Bangsal</th>
                                <th scope="col">Nama Bangsal</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($bed as $b) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $b['kd_bangsal']; ?></td>
                                    <td><?= $b['nm_bangsal']; ?></td>
                                    <td><?= $b['status']; ?></td>
                                    <td>
                                        <a href="<?= base_url(); ?>bed/ubahBed/<?= $b['kd_bangsal']; ?>" class="badge badge-success">Edit</a>
                                        <a href="<?= base_url(); ?>bed/hapusBed/<?= $b['kd_bangsal']; ?>" class="badge badge-danger">Delete</a>
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
        <div class="modal fade" id="newBangsalModal" tabindex="-1" role="dialog" aria-labelledby="newBangsalModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newBangsalModalLabel">Add New Bangsal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('bed'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="kdbangsal" name="kdbangsal" placeholder="Kode Bangsal">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nmbangsal" name="nmbangsal" placeholder="Nama Bangsal">
                            </div>
                            <div class="form-group">
                                <div class="form-row align-items-center">
                                    <div class="col-auto my-1">
                                        <select class="custom-select mr-sm-2" id="status" name="status">
                                            <option selected>Status</option>
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