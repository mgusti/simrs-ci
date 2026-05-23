<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Bangsal
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="kd_bangsal" value="<?= $bed['kd_bangsal']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama Bangsal</label>
                            <input type="text" name="nama_bangsal" class="form-control" id="nama_bangsal" value="<?= $bed['nm_bangsal']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama_bangsal'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nrp">Status Bangsal</label>
                            <input type="text" name="status" class="form-control" id="status" value="<?= $bed['status']; ?>">
                            <small class="form-text text-danger"><?= form_error('status'); ?></small>
                        </div>

                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>