<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('messege'); ?>
    <div class="card mb-3">
        <div class="card-body">
            <form action="<?= base_url('sitb/aksiinp03') ?>" method="post">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="">kode SITB RS</label>
                        <input type="text" name="kd_sitb" id="kd_sitb" class="form-control" required readonly value="<?= $tb['kd_sitb'] ?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Nama Pasien</label>
                        <input type="text" name="nama" id="nama" class="form-control" required readonly value="<?= $tb['kd_pasien'] ?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="">ID TB 03</label>
                        <input type="text" name="idtb03" id="idtb03" class="form-control">
                    </div>
                </div>
                <button class="btn btn-primary mt-3" type="submit">Simpan</button>
            </form>

        </div>
    </div>
</div>