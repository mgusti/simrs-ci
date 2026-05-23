<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>
    <?= $this->session->flashdata('messege'); ?>
    <button type="button" class="btn btn-primary mt-3 mb-3" data-toggle="modal" data-target="#exampleModal">
        Tambah
    </button>

    <table class="table table-responsive-md table-md table-striped table-bordered" id="example">
        <thead class="text-xenter">
            <tr class="text-center">
                <th>#</th>
                <th>Tgl</th>
                <th>Kuota</th>
               

                <th>Edit</th>
                <th>Hapus</th>


            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($kuota as $k) :

            ?>
                <tr class="text-center">
                    <th><?= $i++ ?></th>
                    <td><?= $k['tgl'] ?></td>
                    <td><?= $k['kuota'] ?></td>
                    <td class="text-center"><a href="#" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $k['kd_kuota'] ?>"><i class="fa fa-edit"></i></a></td>
                    <td class="text-center"><a href="<?= base_url('vaksin/hapuskuota/') . $k['kd_kuota'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>

                </tr>
                <div class="modal fade" id="edit<?= $k['kd_kuota'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Kuota</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php
                                $this->db->select('*');
                                $this->db->from('kuota_vaksin');
                                $this->db->where('kd_kuota', $k['kd_kuota']);
                                $query = $this->db->get()->row_array();
                                ?>
                                <form action="<?= base_url('vaksin/editquota/') . $k['kd_kuota'] ?>" method="post">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="">Tanggal</label>
                                            <input type="date" name="tgl2" id="tgl2" class="form-control" value="<?= $query['tgl'] ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="">kuota</label>
                                            <input type="number" name="kuota2" id="kuota2" class="form-control" value="<?= $query['kuota'] ?>" required>
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
            <?php
            endforeach;
            ?>
        </tbody>
    </table>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('vaksin/inputquota') ?>" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Tanggal</label>
                            <input type="date" name="tgl" id="tgl" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">kuota</label>
                            <input type="number" name="kuota" id="kuota" class="form-control" required>
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