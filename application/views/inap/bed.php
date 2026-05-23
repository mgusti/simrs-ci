
<div class="container-fluid">
    <h1 class="h3 mb-4 mt-4 text-gray-800"><?= $title; ?> <?= $user['subbidang']?></h1>
    <?= $this->session->flashdata('messege'); ?>
    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newKamarModal">Bed Baru</a>
    <table class="table" id="example">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Kode Bed</th>
                <th scope="col">Tipe Bed</th>
                <th scope="col">Ruang Inap</th>
                <th scope="col">Tarif</th>
                <th scope="col">Status</th>
                <th scope="col">Kelas</th>
                <th scope="col">Status Data</th>
                <th scope="col">Action</th>

            </tr>
        </thead>

        <tbody>
            <?php
                $i = 1;
                foreach ($bed as $b):    
            ?>
            <tr>
                <th scope="row"><?= $i++?></th>
                <td><?= $b['kd_bed']?></td>
                <td><?= $b['tipe_bed']?></td>
                <td><?= $b['subbidang']?></td>
                <td><?= $b['tarif']?></td>
                <td><?= $b['status']?></td>
                <td><?= $b['nm_kls']?></td>
                <td><?= $b['statusdata']?></td>
                <td>
                    <a href="<?= base_url('inap/hapusbed/')?><?= $b['kd_bed']?>" class="badge badge-danger">Hapus</a>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="newKamarModal" tabindex="-1" role="dialog" aria-labelledby="newKamarModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newKamarModalLabel">Add New Kamar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <form action="<?= base_url('inap/inputbed')?>" method="post">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-10">
                                <label for="">Kode Bed</label>
                                <input type="text" name="kd_bed" id="kd_bed" class="form-control" required onkeyup="myFunction()">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Tipe Bed</label>
                                <select name="tipe_bed" id="tipe_bed" class="form-control">
                                    <option value=""></option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                    <option value="LP">Laki & Perempuan</option>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <label for="">Ruang Inap</label>
                                <input type="text" name="subbidang" id="subbidang" class="form-control" value="<?= $user["subbidang"]?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Tarif</label>
                                <input type="number" name="tarif" id="tarif" class="form-control" value=""  required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-5">
                                <label for="">Kelas</label>
                                <select name="kelas" id="kelas" class="form-control" required>
                                    <option value=""></option>
                                    <?php
                                        foreach ($kelas as $k) :
                                   ?>
                                    <option value="<?= $k["kdkls_bpjs"]?>"><?= $k["nm_kls"]?></option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="">Status Data</label>
                                <select name="status_data" id="status_data" class="form-control" required>
                                    <option value=""></option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Rusak</option>
                                </select>
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