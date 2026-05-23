<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <form action="<?= base_url('admin/editpeng/')?><?= $pengadaan['no']?>" method="post" autocomplete="off">
        <div class="row">
            <div class="col-lg-3">
                <label for="">Tgl Pengadaan</label>
                <input type="text" name="tgl" id="tgl" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="<?= $pengadaan['tgl']?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <label for="">Nama Paket</label>
                <input type="text" name="paket" id="paket" class="form-control" value="<?= $pengadaan['paket']?>" onkeyup="this.value = this.value.toUpperCase()">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="">Vendor</label>
                <input type="text" name="vendor" id="vendor" class="form-control" value="<?= $pengadaan['vendor']?>" onkeyup="this.value = this.value.toUpperCase()">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Nilai</label>
                <input type="number" name="nilai" id="nilai" class="form-control" value="<?= $pengadaan['nilai']?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <label for="">No Pengadaan</label>
                <input type="number" name="no_pengadaan" id="no_pengadaan" class="form-control" value="<?= $pengadaan['no_pengadaan']?>">
            </div>
            <div class="col-lg-3">
                <label for="">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="<?= $pengadaan['status']?>"><?= $pengadaan['status']?></option>
                    <option value="OK">OK</option>
                    <option value="BATAL">BATAL</option>
                    <option value="TUNGGU">TUNGGU</option>
                </select>
            </div>
        </div>
        <button class="btn btn-warning mt-3">Edit</button>
        <a target="_blank" href="<?= base_url('')?>" class="btn btn-info mt-3">Tabel Data</a>
        <a class="btn btn-danger mt-3" href="<?= base_url('admin/datapengadaan')?>">Kembali</a>
    </form>
</div>