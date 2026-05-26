        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="row">
                <div class="col-lg">
                    <?= $this->session->flashdata('messege'); ?>
                    <table class="table table-responsive" id="example">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Image</th>
                                <th scope="col">Role ID</th>
                                <th scope="col">Active</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($iuser as $is) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $is['name']; ?></td>
                                    <td><?= $is['email']; ?></td>
                                    <td><?= $is['image']; ?></td>
                                    <td><?= $is['role_id']; ?></td>
                                    <td><?= $is['is_active']; ?></td>
                                    <td><?= $is['date_created']; ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/edituser/') . $is['id']?>" class="badge badge-success">Edit</a>
                                        <a href="<?= base_url('admin/deleteuser/') . $is['id']?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin?')">Delete</a>
                                        <a href="<?= base_url('admin/resetpass/')?><?= $is['id']?>" class="badge badge-info" onclick="return confirm('Apakah anda yakin?')">Reset Password</a>
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