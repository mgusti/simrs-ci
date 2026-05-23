<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Kamar
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="kdbangsal" value="<?= $kamar['kd_bangsal']; ?>">
                        <div class="form-group">
                            <label for="kd_bangsal">Kode Kamar</label>
                            <input type="text" name="kdkamar" class="form-control" id="kdkamar" value="<?= $kamar['kd_bangsal']; ?>">
                            <small class="form-text text-danger"><?= form_error('kdkamar'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tarif">Tarif</label>
                            <input type="text" name="tarif" class="form-control" id="tarif" value="<?= $kamar['trf_kamar']; ?>">
                            <small class="form-text text-danger"><?= form_error('tarif'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" name="status" class="form-control" id="status" value="<?= $kamar['status']; ?>">
                            <small class="form-text text-danger"><?= form_error('status'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" name="kelas" class="form-control" id="kelas" value="<?= $kamar['kelas']; ?>">
                            <small class="form-text text-danger"><?= form_error('kelas'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="statusdata">Status Data</label>
                            <input type="text" name="statusdata" class="form-control" id="statusdata" value="<?= $kamar['statusdata']; ?>">
                            <small class="form-text text-danger"><?= form_error('statusdata'); ?></small>
                        </div>

                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>