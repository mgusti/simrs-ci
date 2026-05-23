<?php
    include "php/carinorujukan1.php";
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="alert alert-warning" role="alert">
        Code : <?= $norujukan["metaData"]["code"]?> Message : <?= $norujukan["metaData"]["message"]?>
    </div>
    <form action="<?= base_url('pendaftaran/cetakseprujukan')?>" method="post">
    <div class="row">
        <div class="col-lg-3">
            <label for="">Tanggal SEP</label>
            <input type="text" class="form-control" name="tglSep" id="" value="<?=date('Y-m-d')?>" readonly>
        </div>
    </div>
    <hr>
    <h4>Data Pasien</h4><br>
    <div class="row">
        <div class="col-lg-3">
            <label for="">No.Kartu BPJS</label>
            <input type="text" class="form-control" name="noKartu" id="nokartu1" value="<?= $norujukan["response"]["rujukan"]["peserta"]["noKartu"]?>" readonly>
        </div>
        <div class="col-lg-3">
            <label for="">No. MR</label>
            <input type="text" class="form-control" name="noMR" id="nomr1" value="<?= $norujukan["response"]["rujukan"]["peserta"]["mr"]["noMR"]?>">
        </div>
        <div class="col-lg-3">
            <label for="">No. Telp</label>
            <input type="text" class="form-control" name="noTelp" id="notelp1" value="<?= $norujukan["response"]["rujukan"]["peserta"]["mr"]["noTelepon"]?>">
        </div>
        <div class="col-lg-3">
            <label for="">NIK</label>
            <input type="text" class="form-control" name="nik" id="nik1" value="<?= $norujukan["response"]["rujukan"]["peserta"]["nik"]?>">
        </div>
    </div>
    <div class="row">
         <div class="col-lg-3">
            <label for="">Nama Pasien</label>
            <input type="text" class="form-control" name="nama" id="nama1" value="<?= $norujukan["response"]["rujukan"]["peserta"]["nama"]?>">
        </div>
        <div class="col-lg-3">
            <label for="">Kelamin</label>
            <input type="text" class="form-control" name="sex" id="sex1" value="<?= $norujukan["response"]["rujukan"]["peserta"]["sex"]?>">
        </div>
        <div class="col-lg-3">
            <label for="">Kelas Rawat</label>
            <select name="klsRawat" id="klsRawat" class="form-control">
                <option value="<?=$norujukan["response"]["rujukan"]["peserta"]["hakKelas"]["kode"]?>"><?=$norujukan["response"]["rujukan"]["peserta"]["hakKelas"]["keterangan"]?></option>
                <option value="1">KELAS 1</option>
                <option value="2">KELAS 2</option>
                <option value="3">KELAS 3</option>
            </select>
        </div>
    </div>
    <hr>
    <h4>Rujukan</h4><br>
    <?php
            if($norujukan["response"]["asalFaskes"] == "1" ){
                $faskes= "Faskes Tingkat 1";
            }else{
                $faskes= "Faskes Tingkat 2(RS)";
            }
        ?>
    <div class="row">
        <div class="col-lg-3">
            <label for="">Asal Rujukan</label>
            <select name="asalRujukan" id="asalrujukan" class="form-control" readonly>
                <option value="<?= $norujukan["response"]["asalFaskes"]?>"><?= $faskes?></option>
            </select>
        </div>
        <div class="col-lg-3">
            <label for="">Tgl Rujukan</label>
            <input type="text" class="form-control" name="tglrujukan" id="tglrujukan" value="<?= $norujukan["response"]["rujukan"]["tglKunjungan"]?>" readonly>
        </div>
        <div class="col-lg-3">
            <label for="">No. Rujukan</label>
            <input type="text" class="form-control" name="norujukan" id="norujukan" value="<?= $norujukan["response"]["rujukan"]["noKunjungan"]?>" readonly>
        </div>
        <div class="col-lg-3">
            <label for="">PPK Asal Rujukan</label>
            <select name="ppkasal" id="ppkasal" class="form-control" readonly>
                <option value="<?= $norujukan["response"]["rujukan"]["provPerujuk"]["kode"]?>"><?= $norujukan["response"]["rujukan"]["provPerujuk"]["nama"]?></option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <label for="">Diagnosa</label>
            <select name="diagAwal" id="diagawal" class="form-control" readonly>
                <option value="<?= $norujukan["response"]["rujukan"]["diagnosa"]["kode"]?>"><?= $norujukan["response"]["rujukan"]["diagnosa"]["nama"]?></option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <label for="">Spesialis/Subspesiali</label>
            <select name="poli" id="poli" class="form-control" readonly>
                <option value="<?= $norujukan["response"]["rujukan"]["poliRujukan"]["kode"]?>"><?= $norujukan["response"]["rujukan"]["poliRujukan"]["nama"]?></option>
            </select>
        </div>
        <div class="col-lg-3">
            <label for="">Jenis Pelayanan</label>
            <select name="jnspelayanan" id="jnspelayanan" class="form-control" readonly>
                <option value="<?= $norujukan["response"]["rujukan"]["pelayanan"]["kode"]?>"><?= $norujukan["response"]["rujukan"]["pelayanan"]["nama"]?></option>
            </select>
        </div>  
    </div>
    <hr>
    <h4>SKDP</h4><br>
    <div class="row">
        <div class="col-lg-3">
            <label for="">No. Surat Kontrol/ SKDP </label>
            <input type="text" class="form-control" name="noskdp" id="noskdp1" value="000000">
        </div>
        <div class="col-lg-3">
            <label for="">DPJP Pemberi Surat SKDP/SPRI</label>
            <input type="text" class="form-control" name="kodeDPJP" id="kodedpjp1" value="">
        </div>
    </div>
    <hr>
    <h4>COB</h4>
    <div class="row">
        <div class="col-lg-3">
            <div class="form-check">
                <input class="form-check-input" name="cob" type="checkbox" value="" id="cob1" onclick="myFunction()" disabled>
                <label class="form-check-label" for="cob1">* Ceklis bila Ya</label>
            </div>
        </div>
    </div>
    <div class="row" id="asuransi" style="display:none">
        <div class="col-lg-3">
            <label for="">Nama Asuranasi</label>
            <input type="text" class="form-control" name="nmAsuransi" id="nmasuransi1" value="">
        </div>
        <div class="col-lg-3">
            <label for="">No Asuransi</label>
            <input type="text" class="form-control" name="noAsuransi" id="noasuransi1" value="">
        </div>
    </div>
    <div class="row" id="asuransi1" style="display:none">
        <div class="col-lg-3">
            <label for="">Tgl TAT</label>
            <input type="text" class="form-control" name="tglTAT" id="tgltat1" value="">
        </div>
        <div class="col-lg-3">
            <label for="">Tgl TMT</label>
            <input type="text" class="form-control" name="tglTMT" id="tgltmt1" value="">
        </div>
    </div>
   
    
   
    <hr>
    <h4>Kecelakaan</h4><br>
    <div class="row">
        <div class="col-lg-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="lakalantas" value="" id="laka1" onclick="myFunction()" disabled>
                <label class="form-check-label" for="cob1">* Ceklis bila Ya</label>
            </div>
        </div>
    </div>
    <div class="row" id="kecelakaan" style="display:none">
        <div class="col-lg-3">
            <label for="">Penjamin</label>
            <input type="text" class="form-control" name="penjamin" id="penjamin1" value="">
        </div>
        <div class="col-lg-3">
            <label for="">Tanggal Kejadian</label>
            <input type="text" class="form-control" name="tglKejadian" id="tglkejadian1" value="">
        </div>
        <div class="col-lg-6">
            <label for="">Keterangan</label>
            <input type="text" class="form-control" name="keterangan" id="keterangan1" value="">
        </div>
        <div class="col-lg-3">
            <label for="">Suplesi</label>
            <input type="text" class="form-control" name="suplesi" id="suplesi1" value="">
        </div>
        <div class="col-lg-3">
            <label for="">No. SEP Suplesi</label>
            <input type="text" class="form-control" name="noSepSuplesi" id="nosepsuplesi1" value="">
        </div>
        <div class="col-lg-3">
            <label for="">Kode Provinsi</label>
            <input type="text" class="form-control" name="kdProvinsi" id="kdprovinsi1" value="">
        </div>
        <div class="col-lg-3">
            <label for="">Kode Kabupaten</label>
            <input type="text" class="form-control" name="kdKabupaten" id="kdkabupaten1" value="">
        </div>
        <div class="col-lg-3">
            <label for="">Kode Kecamatan</label>
            <input type="text" class="form-control" name="kdKecamatan" id="kdkecamatan1" value="">
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-3">
            <label for="">Katarak</label>
            <select name="katarak" id="katarak1" class="form-control">
                <option value="0">Tidak</option>
                <option value="1">YA</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <label for="">Catatan</label>
            <input type="text" class="form-control" name="catatan" id="catatan1" value="">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <label for="">Petugas</label>
            <input type="text" class="form-control" name="user" id="user1" value="<?= $user["name"]?>" readonly>
        </div>
    </div>
    <button class="btn btn-info mt-4">Buat SEP</button>
    <a class="btn btn-primary mt-4" href="<?= base_url("pendaftaran/sepbaru?nokartu=")?><?= $norujukan["response"]["rujukan"]["peserta"]["noKartu"]?>&nosep=">Kembali</a>
    </form>
</div>