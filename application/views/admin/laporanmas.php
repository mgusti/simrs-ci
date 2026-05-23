<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <form action="<?= base_url('informasi/inputlapmas')?>" method="post">
        <div class="row">
            <div class="col-lg-2">
                <label for="">Tipe Laporan</label>
                <select name="tipe_laporan" id="" class="form-control" required>
                    <option value="">-pilih-</option>
                    <option value="1">Request</option>
                    <option value="2">bug/error</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <label for="">Laporkan</label>
                <textarea name="laporkan" id="laporkan" cols="30" rows="10" class="form-control" maxlength="100" required></textarea>
            </div>
        </div>
        <button class="btn btn-primary mt-3">Lapor</button>
    </form>
</div>