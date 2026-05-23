<?php
    include "php/kelasrawat.php";
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 mt-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>
    <form action="" method="post">
        <div class="row">
            <div class="col-lg-2">
                <label for="">Tgl SEP</label>
                <input type="text" class="form-control" id="tgl_sep" value="<?= $sep["tgl_sep"]?>" name="tgl_sep" readonly>
            </div>
            <div class="col-lg-3">
                <label for="">No SEP</label>
                <input type="text" class="form-control" id="nosep" value="<?= $sep["nosep"]?>" name="nosep" readonly>
            </div>
            <div class="col-lg-2">
                <label for="">Ruang Rawat</label>
                <input type="text" class="form-control" id="subbidang1" value="<?= $user["subbidang"]?>" name="subbidang1" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <label for="">No. MR</label>
                <input type="text" class="form-control" id="nomr" value="<?= $sep["nomr"]?>" name="nomr" readonly>
            </div>
            <div class="col-lg-3">
                <label for="">Nama Pasien</label>
                <input type="text" class="form-control" id="nama" value="<?= $sep["nama"]?>" name="nama" readonly>
            </div>
            <?php
                if ($sep["kelamin"] == "Perempuan" ){

                    $kode = "P";
                }else{
                    $kode = "L";
                }
            ?>
            <div class="col-lg-3">
                <label for="">Jenis Kelamin</label>
                <select name="jenkel1" id="jenkel1" class="form-control" readonly>
                    <option value="<?= $kode?>"><?= $sep["kelamin"]?></option>
                </select>
            </div>
            
        </div>
        <div class="row">
            <div class="col-lg-2">
                <label for="">Kelas</label>
                <select name="kelas" id="kelas1" class="form-control">
                    <option value="">-pilih-</option>
                    <?php
                        foreach ($tes["response"]["list"] as $t) :
                            ?>

                        <option value="<?= $t["kodekelas"]?>"><?= $t["namakelas"]?></option>
                            <?php
                        endforeach;
                    ?>
                </select>
                <?= form_error('kelas', ' <small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col-lg-3">
                <label for="">BED</label>
                <select name="bed" id="bed1" class="form-control">
                    <option value="">-pilih-</option>
                </select>
                <?= form_error('bed', ' <small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col-lg-5">
                <label for="">Diagnosa</label>
                <input type="text" class="form-control" id="diagnosa" value="<?= $sep["diagnosa"]?>" name="" readonly>
            </div>
            

        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Tipe Masuk</label>
                <select name="tipemasuk" id="tipemasuk" class="form-control">
                    <option value="">-pilih-</option>
                    <option value="1">BARU</option>
                    <option value="2">PINDAHAN</option>
                </select>
                <?= form_error('tipemasuk', ' <small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col-lg-4">
                <label for="">Dokter</label>
                <select name="dokter" id="dokter1" class="form-control">
                    <option value="">-pilih-</option>
                    <?php
                        foreach ($dokter as $d) :

                    ?>
                    <option value="<?= $d['id']?>"><?= $d['nm_dokter']?></option>

                    <?php
                        endforeach;
                    ?>
                </select>
                <?= form_error('dokter', ' <small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Keterangan</label>
                <select name="keterangan" id="keterangan" class="form-control">
                    <option value="">-pilih-</option>
                    <option value="1">UMUM</option>
                    <option value="2">BPJS</option>
                    <option value="3">ASURANSI</option>
                </select>
                <?= form_error('keterangan', ' <small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <input type="text" name="user_input" id="user_input" class="form-control" value="<?= $user['name']?>" hidden>
            </div>
            
        </div>
     
            <button class="btn btn-primary mt-3 mb-3">Simpan</button>
            <a href="<?= base_url("inap/sep_inap")?>" class="btn btn-danger">kembali</a>
    
    </form>
</div>