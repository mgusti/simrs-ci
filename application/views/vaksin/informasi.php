<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>
    <?= $this->session->flashdata('messege'); ?>


    <div class="card">
        <div class="card-header">
            Judul Informasi

        </div>
        <div class="card-body">
            <button class="btn btn-primary mt-3 mb-3" data-toggle="modal" data-target="#exampleModal">Tambah</button>
            <table class="table table-responsive-md table-striped table-bordered mt-3" id="example">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Judul</th>
                        <th>urutan</th>
                        <th>Sub Judul</th>
                        <th>Edit</th>
                        <th>Hapus</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($info as $v) :

                    ?>
                        <tr>
                            <th><?= $i++ ?></th>
                            <td><?= $v['judul'] ?></td>
                            <td class="text-center"><?= $v['urutan'] ?></td>
                            <td class="text-center"><a href="<?= base_url('vaksin/subjudul/') . $v['kd_judul_info'] ?>" class="btn btn-info">Sub Judul</a></td>
                            <td class="text-center"><a href="" class="btn btn-warning"><i class="fa fa-edit"></i></a></td>
                            <td class="text-center"><a href="<?= base_url('vaksin/deletejudul/') . $v['kd_judul_info'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>


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
                <h5 class="modal-title" id="exampleModalLabel">JUDUL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('vaksin/inputjudul') ?>" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Urutan</label>
                            <input type="number" name="urut" id="urut" class="form-control">
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