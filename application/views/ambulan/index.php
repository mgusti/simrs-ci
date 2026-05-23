    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <?= $this->session->flashdata('messege'); ?>
    </div>

    <div class="container shadow-lg p-3 mb-5 bg-white rounded ">

        <button class="btn btn-primary mt-3 mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah</button>

        <table class="table table-striped table-bordered" id="example">
            <thead>
                <tr>
                    <th>Kode Ambulan</th>
                    <th>No Polisi</th>
                    <th>tahun Mobil</th>

                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($ambulan as $am) :
                ?>
                    <tr>
                        <th><?= $am['kd_mobil'] ?></th>
                        <td><?= $am['no_polisi'] ?></td>
                        <td><?= $am['tahun_mobil'] ?></td>

                        <td><a href="<?= base_url('ambulan/hapusambulan/') . $am['kd_mobil'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>

                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data Mobil Ambulan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('ambulan/aksiambulan') ?>" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" name="nopol" id="nopol" class="form-control" placeholder="No Polisi" required onkeyup="this.value = this.value.toUpperCase()">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <input type="number" name="tahun" id="tahun" class="form-control" placeholder="Tahun Mobil" required>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>

            </div>
        </div>
    </div>