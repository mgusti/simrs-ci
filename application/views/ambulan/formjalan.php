<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('messege'); ?>
</div>

<div class="container shadow-lg p-3 mb-5 bg-white rounded ">
    <form action="<?= base_url('ambulan/inputjalan') ?>" method="post">
        <div class="row">
            <div class="col-lg-6">
                <label for="">Nomor Surat</label>
                <input type="text" name="nomor" id="nomor" class="form-control" value="<?= $hasil ?>" readonly>
            </div>
            <div class="col-lg-6">
                <label for="">Tanggal Jalan</label>
                <input type="date" name="tgl" id="tgl" class="form-control" value="<?= date('Y-m-d') ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <label for="">Supir</label>
                <select name="supir" id="supir" class="form-control" required>
                    <option value="">-pilih-</option>
                    <?php
                    foreach ($supir as $s) :
                    ?>
                        <option value="<?= $s['id_supir'] ?>"><?= $s['nama_supir'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>
            <div class="col-lg-4">
                <label for="">Mobil Ambulan</label>
                <select name="ambulan" id="ambulan" class="form-control" required>
                    <option value="">-pilih-</option>
                    <?php
                    foreach ($amb as $s) :
                    ?>
                        <option value="<?= $s['kd_mobil'] ?>"><?= $s['no_polisi'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Jam Jalan</label>
                <input type="time" name="jam" id="jam" class="form-control" required>
            </div>
            <div class="col-lg-3">
                <label for="">KM mobil Saat Ini</label>
                <input type="number" name="km" id="km" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="">Tujuan</label>
                <input type="text" name="tujuan" id="tujuan" class="form-control" required>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-6">
                <label for="">Nama Pengguna</label>
                <input type="text" name="pengguna" id="pengguna" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="">Keperluan</label>
                <textarea name="keperluan" id="keperluan" cols="12" rows="5" class="form-control" required></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="">Kode Pembayaran</label>
                <input name="pembayaran" id="pembayaran" cols="12" rows="5" class="form-control" type="text">
            </div>
        </div>
        <button class="btn btn-primary mt-3">Simpan</button>
        <a href="<?= base_url('ambulan/suratjalan') ?>" class="btn btn-danger mt-3">Kembali</a>
    </form>
</div>