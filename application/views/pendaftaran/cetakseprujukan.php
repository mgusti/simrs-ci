<?php
    include "php/insert_sep.php";
?>
<div class="container-fluid">
<div class="alert alert-warning" role="alert">
  Code : <?= $tes["metaData"]["code"]?> Message : <?= $tes["metaData"]["message"]?>
</div>
<form action="<?= base_url('pendaftaran/simpansepcetak')?>" method="post">
    <div class="row">
        <div class="col-lg-3">
            <label for="">No. SEP</label>
            <input type="text" class="form-control" id="nosep" name="nosep" value="<?= $tes["response"]['sep']["noSep"]?>" readonly>
        </div>
        <div class="col-lg-3">
            <label for="">Peserta</label>
            <input type="text" class="form-control" name="jnspeserta" value="<?= $tes["response"]['sep']["peserta"]["jnsPeserta"]?>"readonly>
        </div>
        <div class="col-lg-3">
            <label for="">Tgl. SEP</label>
            <input type="text" class="form-control" name="tgl_sep" value="<?= $tes["response"]['sep']["tglSep"]?>"readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <label for="">COB</label>
            <input type="text" class="form-control" name="cob" value="<?= $tes["response"]['sep']["peserta"]["asuransi"]?>"readonly>
        </div>
        <div class="col-lg-3">
            <label for="">No. Kartu</label>
            <input type="text" class="form-control" name="nokartu" value="<?= $tes["response"]['sep']["peserta"]["noKartu"]?>"readonly>
        </div>
        <div class="col-lg-3">
            <label for="">No. MR</label>
            <input type="text" class="form-control" name="nomr" value="<?= $tes["response"]['sep']["peserta"]["noMr"]?>"readonly>
        </div>
    </div>
    <div class="row">
         <div class="col-lg-3">
            <label for="">Nama Peserta</label>
            <input type="text" class="form-control" name="nama" value="<?= $tes["response"]['sep']["peserta"]["nama"]?>"readonly>
        </div>
        <div class="col-lg-3">
            <label for="">Jns. Rawat</label>
            <input type="text" class="form-control" name="jnspelayanan" value="<?= $tes["response"]['sep']["jnsPelayanan"]?>"readonly>
        </div>
        <div class="col-lg-3">
            <label for="">Tgl. Lahir</label>
            <input type="text" class="form-control" name="tgllahir" value="<?= $tes["response"]['sep']["peserta"]["tglLahir"]?>"readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <label for="">Kelas Rawat</label>
            <input type="text" class="form-control" name="kelas" value="<?= $tes["response"]['sep']['peserta']["hakKelas"]?>"readonly>
        </div>
         <div class="col-lg-3">
            <label for="">Sub/ Spesialis</label>
            <input type="text" class="form-control" name="poli" id="poli" value="<?= $tes["response"]['sep']["poli"]?>"readonly>
        </div>
        <?php
        
        if ($tes["response"]['sep']["peserta"]["kelamin"]== "P"){
            $kelamin = "Perempuan";
        }else{
            $kelamin = "Laki - Laki";
        }
        ?>
        <div class="col-lg-3">
            <label for="">Kelamin</label>
            <select name="kelamin" id="kelamin" class="form-control" readonly>
                <option value="<?= $tes["response"]['sep']["peserta"]["kelamin"]?>"><?= $kelamin?></option>
            </select>
        </div>
    </div>
    <div class="row">
         
        <div class="col-lg-3">
            <label for="">Penjamin</label>
            <input type="text" class="form-control" name="penjamin" value="<?= $tes["response"]['sep']["penjamin"]?>" readonly>
        </div>
        <div class="col-lg-3">
            <label for="">Catatan</label>
            <input type="text" class="form-control" name="catatan" value="<?= $tes["response"]['sep']["catatan"]?>" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <label for="">Diagnosa Awal</label>
            <input type="text" class="form-control" name="diagnosa" value="<?= $tes["response"]['sep']["diagnosa"]?>" readonly>
        </div>
        
    </div>
    <div class="row">
        <div class="col-lg-3">
            <label for="">Antrian Ke:</label>
            <input type="text" class="form-control" name="antrian" value="" id="antrian" readonly>
        </div>
    </div>
    <button class="btn btn-info mt-3">Cetak SEP</button>
</form>
</div>