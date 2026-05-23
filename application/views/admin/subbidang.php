        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <?= $this->session->flashdata('message'); ?>

            <div class="row">
                <div class="col-lg-6">

                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Add New Sub</a>

                    <table class="table table-hover" id="example">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Subbidang</th>
                                <th scope="col">Subbidang</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($subbidang as $sub) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $sub['kdsub']; ?></td>
                                <td><?= $sub['nmsub']; ?></td>
                                <td><?= $sub['rolea']; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/delsub/') . $sub['kdsub']?>" class="badge badge-danger">Hapus</a>
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
        <div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newRoleModal">Add New Role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('admin/insertsub') ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="kodesub" name="kodesub" placeholder="kode subbidang" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subbidang" name="subbidang" placeholder="subbidang" required>
                            </div>
                            <div class="form-group">
                               
                                <select name="userrole" id="userrole" class="form-control" required>
                                    <option value="">-pilih-</option>
                                    <?php
                                        foreach($role as $r):
                                    ?>
                                    <option value="<?=$r['id']?>"><?= $r['role']?></option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
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