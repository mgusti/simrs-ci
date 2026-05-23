<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <form action="" method="POST">
        
        <div class="row">
            <div class="col-lg-3">
                <label for="">No Sep</label>
                <input type="text" class="form-control" value="<?= $sep['nosep']?>" id="nosep1" name="nosep1" readonly>
            </div>
            <div class="col-lg-3">
                <label for="">No MR</label>
                <input type="text" class="form-control" value="<?= $sep['nomr']?>" id="nomr1" name="nomr1" readonly>
            </div>
            <div class="col-lg-3">
                <label for="">Tgl SEP</label>
                <input type="text" class="form-control" value="<?= $sep['tgl_sep']?>" id="tglsep4" name="tglsep4" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <label for="">ID Jenis Tindakan</label>
                <input type="number" class="form-control" value="" id="idtindakan1" name="idtindakan1">
            </div>
            <div class="col-lg-3">
                <label for="">Nama Jenis Tindakan</label>
                <input type="text" class="form-control" value="" id="namatindakan1" name="namatindakan1" readonly>
            </div>
            <div class="col-lg-3">
                <label for="">Jenis Pelayanan</label>
                <select name="jnspelayanan1" id="jnspelayanan1" class="form-control">
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <label for="">Tgl Tindakan</label>
                <input type="text" class="form-control" value="" id="tgltindakan1" name="tgltindakan1" data-provide="datepicker" data-date-format="yyyy-mm-dd">
            </div>
            <div class="col-lg-3">
                <label for="">Dokter</label>
                <select name="dokter1" id="dokter1" class="form-control">
                    <option value="">-pilih-</option>
                    <option value="38">non</option>
                    <?php
                        foreach ($dokter as $d):
                    ?>
                    <option value="<?= $d['id']?>"><?= $d['nm_dokter']?></option>
                    <?php
                        endforeach;
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Petugas</label>
                <input type="text" class="form-control" value="" id="petugas1" name="petugas1">
            </div>
        </div>
    </form>

    <form action="<?= base_url('inap/inputaksitindakan/')?><?=$sep["nosep"]?>" method="post">
    <div class="container" hidden>
        <input type="text" name="nosep2" id="nosep2">
        <input type="text" name="tglsep5" id="tglsep5">
        <input type="text" name="nomr2" id="nomr2" value="<?= $sep['nomr']?>">
        <input type="text" name="idtindakan2" id="idtindakan2">
        <input type="text" name="jnspelayanan2" id="jnspelayanan2">
        <input type="text" name="tgltindakan2" id="tgltindakan2">
        <input type="text" name="dokter2" id="dokter2">
        <input type="text" name="petugas2" id="petugas2">
    </div>
    <div class="container-fluid">
        <button class="btn btn-primary mt-3" id="but">Simpan</button>
        <a href="<?= base_url('inap/ttindakan')?>" class="btn btn-warning mt-3" id="but" target="_blank">Tabel Tindakan</a>
        <a href="<?= base_url('inap/tindakan/')?><?= $sep["nosep"]?>" class="btn btn-danger mt-3">Kembali</a>
    </div>
    
    </form>

</div>