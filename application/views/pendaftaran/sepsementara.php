<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <form action="<?= base_url('pendaftaran/semsimsep')?>" method="post">
        <div class="row">
            <div class="col-lg-3">
                <label for="">No MR</label>
                <input type="text" class="form-control" value="<?= $pasien['no_rekam_medis'] ?>" name="nomr" id="nomr" required readonly>
            </div>
            <div class="col-lg-3">
                <label for="">NIK</label>
                <input type="text" class="form-control" value="<?= $pasien['no_ktp'] ?>" name="nik" id="nik" required readonly>
            </div>
            <div class="col-lg-3">
                <label for="">No BPJS</label>
                <input type="text" class="form-control" value="<?= $pasien['nokartu'] ?>" name="nobpjs" id="nobpjs" required readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Nama Pasien</label>
                <input type="text" class="form-control" value="<?= $pasien['nama_pasien'] ?>" name="nama" id="namap" required readonly>
            </div>
            <div class="col-lg-3">
                <label for="">Jenis Kelamin</label>
                <input type="text" class="form-control" value="<?= $pasien['jenkel'] ?>" name="jenkel" id="jenkel" required readonly>
            </div>
            <div class="col-lg-3">
                <label for="">Tgl Lahir</label>
                <input type="text" class="form-control" value="<?= $pasien['tgl_lahir'] ?>" name="tgl_lahir" id="tgl_lahir" required readonly>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">No SEP</label>
                <input type="text" class="form-control" value="" name="nosep" id="nosep" required>
            </div>
            <div class="col-lg-3">
                <label for="">Tgl SEP</label>
                <input type="text" class="form-control" value="" name="tglsep" id="tglsep" data-provide="datepicker" data-date-format="yyyy-mm-dd" required>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <label for="">Jenis Pelayanan</label>
                <select name="jnspelayanan" id="jnspelayanan" class="form-control">
                    <option value="">-pilih-</option>
                    <option value="R. Inap">R. Inap</option>
                    <option value="R. Jalan">R. Jalan</option>
                </select>
            </div>
            <div class="col-lg-3">
                <label for="">No Rujukan</label>
                <input type="text" class="form-control" value="" name="norujukan" id="norujukan" required>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <label for="">Kelas</label>
                <select name="kelas" id="kelas" class="form-control">
                    <option value="">-pilih-</option>
                    <?php
                        foreach($kelas as $k):
                    ?>
                    <option value="<?= $k["kd_kls"]?>"><?= $k["nm_kls"]?></option>
                    <?php
                        endforeach;
                    ?>
                </select>
            </div>
            <div class="col-lg-2">
                <label for="">Tujuan</label>
                <select name="tujuan" id="tujuan" class="form-control">
                    <option value="">-pilih-</option>
                    <?php
                        foreach($tujuan as $t):
                    ?>
                    <option value="<?=$t["kdsub"]?>"><?= $t["nmsub"]?></option>
                    <?php
                        endforeach;
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <label for="">Kode Diagnosa</label>
                <input type="text" class="form-control" value="" name="diagnosa" id="diagnosa" required>
            </div>
            <div class="col-lg-2">
                <label for="">COB</label>
                <select name="cob" id="cob" class="form-control">
                        <option value="">-pilih-</option>
                        <option value="1">Ya</option>
                        <option value="2">Tidak</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <label for="">Catatan</label>
                <input type="text" class="form-control" value="" name="catatan" id="catatan">
            </div>
            <div class="col-lg-3">
                <label for="">Penjamin</label>
                <input type="text" class="form-control" value="" name="penjamin" id="penjamin">
            </div>
        </div>
        <button class="btn btn-primary mt-3">Simpan</button>
        <a href="<?= base_url('pendaftaran/datapasien')?>" class="btn btn-danger mt-3">Kembali</a>
    </form>
</div>