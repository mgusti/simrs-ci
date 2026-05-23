<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <form action="<?= base_url('inap/inputpenunjangm')?>" method="post">
        <div class="row">
            <div class="col-lg-2">
                <label for="">No SEP</label>
                <input type="text" name="nosep" id="nosep" class="form-control" value="<?= $pasien["nosep"]?>" readonly>
            </div>
            <div class="col-lg-2">
                <label for="">No MR</label>
                <input type="text" name="nomr" id="nomr" class="form-control" value="<?= $pasien["nomr"]?>" readonly>
            </div>
            <div class="col-lg-2">
                <label for="">Nama Pasien</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?= $pasien["nama"]?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <label for="">Tgl</label>
                <input type="text" name="tgl" id="tgl" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" autocomplete="off">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <label for="">kode jenis Pelayanan Penunjang</label>
                <input type="number" name="jenispen" id="jenispen" class="form-control">
            </div>
            <div class="col-lg-3">
                <label for="">Nama jenis Pelayanan Penunjang</label>
                <input type="text" name="nmjenispen" id="nmjenispen" class="form-control" readonly>
            </div>
            <div class="col-lg-3">
                <label for="">Penunjang Medis</label>
                <select name="penunjang_medis" id="penunjang_medis" class="form-control">
                    <option value=""></option>
                </select>
            </div>
        </div>
        

        <button class="btn btn-primary mt-3">Request</button>
        <button class="btn btn-warning mt-3">Tabel Jenis Pelayanan Tindakan</button>
        <button class="btn btn-danger mt-3">Kembali</button>
    </form>
</div>