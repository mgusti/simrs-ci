<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <form action="<?= base_url('manajemen/edita/')?><?= $agenda['no']?>" method="post">
        <div class="row">
            <div class="col-lg-3">
                <label for="">Tanggal Agenda</label>
                <input type="text" name="tgl" id="tgl" class="form-control" value="<?= $agenda['tgl']?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="">Agenda</label>
                <input type="text" name="agenda" id="agenda" class="form-control" value="<?= $agenda['agenda']?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Lokasi</label>
                <input type="text" name="lokasi" id="lokasi" class="form-control" value="<?= $agenda['lokasi']?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Jam Mulai</label>
                <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" value="<?= $agenda['jam_mulai']?>">
            </div>
            <div class="col-lg-3">
                <label for="">Jam Selesai</label>
                <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" value="<?= $agenda['jam_selesai']?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">status</label>
                <select name="status" id="status" class="form-control">
                    <option value="<?= $agenda['status']?>"><?= $agenda['status']?></option>
                    <option value="TUNGGU">TUNGGU</option>
                    <option value="TUNDA">TUNDA</option>
                    <option value="BATAL">BATAL</option>
                    <option value="SELESAI">SELESAI</option>
                </select>
            </div>
        </div>
        <button class="btn btn-warning mt-3">Edit</button>
        <a href="<?= base_url('manajemen/dataagenda')?>" class="btn btn-danger mt-3">Kembali</a>
    </form>
</div>