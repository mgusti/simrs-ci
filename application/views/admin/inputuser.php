        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="row">
                <div class="col-lg">
                    <?= $this->session->flashdata('messege'); ?>
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newUserModal">Tambah User</a>
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

<!-- Modal Tambah User -->
<div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="newUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newUserModalLabel">Tambah User Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/insertuseraksi'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                            <label for="nama">Nama User</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" id="nik" class="form-control" required>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="jabatan">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-control" required>
                                <option value="">- Pilih Jabatan -</option>
                                <?php foreach($jabatan as $jab): ?>
                                    <option value="<?= $jab['nmjab']?>"><?= $jab['nmjab']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="jenkel">Jenis Kelamin</label>
                            <select name="jenkel" id="jenkel" class="form-control" required>
                                <option value="">- Pilih Jenis Kelamin -</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="pendidikan">Pendidikan</label>
                            <input type="text" name="pendidikan" id="pendidikan" class="form-control" required>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="tgllahir">Tgl Lahir (yyyy-mm-dd)</label>
                            <input type="text" name="tgllahir" id="tgllahir" class="form-control" placeholder="YYYY-MM-DD" required>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="role">Role Akses</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="">- Pilih Role -</option>
                                <?php foreach($role as $r): ?>
                                    <option value="<?= $r['id']?>"><?= $r['role']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="subbidang">Subbidang</label>
                            <select name="subbidang" id="subbidang" class="form-control" required>
                                <option value="">- Pilih Subbidang -</option>
                                <?php foreach($sub as $s): ?>
                                    <option value="<?= $s['kdsub']?>"><?= $s['nmsub']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

        </div>
        <!-- End of Main Content -->