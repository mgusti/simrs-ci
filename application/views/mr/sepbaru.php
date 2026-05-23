<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    
<hr>
<h3> Data Pasien Database</h3>
<div class="row">
    <div class="col-lg-3">
        <label for="">No MR</label>
        <input type="text" name="nomr" id="nomr1" class="form-control" value="<?= $pasien['no_rekam_medis']?>" >
        
    </div>
    <div class="col-lg-5">
        <label for="">Nama Pasien</label>
        <input type="text" name="nama" id="nama" class="form-control" value="<?= $pasien['nama_pasien']?>" readonly>
    </div>
</div>
<hr>
<h3>Data BPJS</h3>
<?= $this->session->flashdata('messege'); ?>
    <form action="" method="get">
        <div class="row">
            <div class="col-lg-3">
                <label for="">Cari SEP BPJS</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="" name="mrnosep" id="mrnosep" autocomplete="off" minlength="19" maxlength="19" value="<?= set_value('mrnosep')?>" required>
                    <div class="input-group-append">
                        <button class="btn btn-danger" id="mrcarisep">cari</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php
    
    include "php/carisep2.php";
    
    ?>

    <form action="<?= base_url('mr/simpansep')?>" method="post" id="ourForm">   
        <div class="row">
            <div class="col-lg-3">
                <label for="">Tgl Masuk</label>
                <input type="text" class="form-control" name="tglmasuk" value="" data-provide="datepicker" data-date-format="yyyy-mm-dd">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">No. SEP</label>
                <input type="text" class="form-control" name="nosep" value="<?= $tes['response']['noSep']?>" readonly>
            </div>
            <div class="col-lg-3">
                <label for="">Peserta</label>
                <input type="text" class="form-control" name="jnspeserta" value="<?= $tes['response']['peserta']['jnsPeserta']?>"readonly>
            </div>
            <div class="col-lg-3">
                <label for="">Tgl. SEP</label>
                <input type="text" class="form-control" name="tgl_sep" value="<?= $tes['response']['tglSep']?>"readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">COB</label>
                <input type="text" class="form-control" name="cob" value="<?= $tes['response']['peserta']['asuransi']?>"readonly>
            </div>
            <div class="col-lg-3">
                <label for="">No. Kartu</label>
                <input type="text" class="form-control" name="nokartu" value="<?= $tes['response']['peserta']['noKartu']?>"readonly>
            </div>
            <div class="col-lg-3">
                <label for="">No. MR</label>
                <input type="text" class="form-control" name="nomr" id="nomr2" value="<?= $tes['response']['peserta']['noMr']?>"readonly>
                <?= form_error('nomr2', ' <small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Nama Peserta</label>
                <input type="text" class="form-control" name="nama" value="<?= $tes['response']['peserta']['nama']?>"readonly>
            </div>
            <div class="col-lg-3">
                <label for="">Jns. Rawat</label>
                <input type="text" class="form-control" name="jnspelayanan" value="<?= $tes['response']['jnsPelayanan']?>"readonly>
            </div>
            <div class="col-lg-3">
                <label for="">Tgl. Lahir</label>
                <input type="text" class="form-control" name="tgllahir" value="<?= $tes['response']['peserta']['tglLahir']?>"readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Kelas Rawat</label>
                <input type="text" class="form-control" name="kelas" value="<?= $tes['response']['peserta']['hakKelas']?>"readonly>
            </div>
                <div class="col-lg-3">
                <label for="">Sub/ Spesialis</label>
                <input type="text" class="form-control" name="poli" value="<?= $tes['response']['poli']?>"readonly>
            </div>
            <div class="col-lg-3">
                <label for="">Kelamin</label>
                <input type="text" class="form-control" name="sex" value="<?= $tes['response']['peserta']['kelamin']?>"readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">No Rujukan</label>
                <input type="text" class="form-control" name="norujukan" value="<?= $tes['response']['noRujukan']?>" readonly>
            </div>
            <div class="col-lg-3">
                <label for="">Penjamin</label>
                <input type="text" class="form-control" name="penjamin" value="<?= $tes['response']['penjamin']?>" readonly>
            </div>
            <div class="col-lg-3">
                <label for="">Catatan</label>
                <input type="text" class="form-control" name="catatan" value="<?= $tes['response']['catatan']?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="">Diagnosa Awal</label>
                <input type="text" class="form-control" name="diagnosa" value="<?= $tes['response']['diagnosa']?>" readonly>
            </div>
        </div>
        <button type="submit" class="btn btn-info mt-4">Simpan</button>
    </form> 
</div>