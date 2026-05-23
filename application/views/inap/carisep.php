
<div class="container-fluid">
    <h1 class="h3 mb-4 mt-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <form action="<?= base_url('inap/carisep')?>" method="get">
        <div class="row">
            <div class="col-lg-3">
                <label for="">Cari SEP</label>
                <input type="text" name="nosep" id="nosep" class="form-control" placeholder="Masukan No SEP">
            </div>
        </div>
        <button class="btn btn-danger mt-3">Cari</button>
    </form>


    <?php
    $sep = $_GET['nosep'];
    if ($sep == ""){

    }else{
        include "php/carisep.php";
        if($tes == ""){

        }
        else{

    
        
    ?>

    <form action="<?= base_url('')?>" method="post">
        <div class="row">
            <div class="col-lg-3">
                <label for="">No SEP</label>
                <input type="text" name="nosep1" id="nosep1" class="form-control" value="<?= $tes['response']['noSep']?>">
            </div>
            <div class="col-lg-3">
                <label for="">Tgl SEP</label>
                <input type="text" name="tglsep" id="tglsep" class="form-control" value="<?= $tes['response']['tglSep']?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">No MR</label>
                <input type="text" name="nomr" id="nomr" class="form-control" value="<?= $tes['response']['peserta']['noMr']?>">
            </div>
            <div class="col-lg-3">
                <label for="">Nama </label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?= $tes['response']['peserta']['nama']?>">
            </div>
            <div class="col-lg-3">
                <label for="">Kelamin</label>
                <input type="text" name="kelamin" id="kelamin" class="form-control" value="<?= $tes['response']['peserta']['kelamin']?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Tgl Lahir</label>
                <input type="text" name="tgllahir" id="tgllahir" class="form-control" value="<?= $tes['response']['peserta']['tglLahir']?>">
            </div>
            <div class="col-lg-3">
                <label for="">Asuransi</label>
                <input type="text" name="asuransi" id="asuransi" class="form-control" value="<?= $tes['response']['peserta']['asuransi']?>">
            </div>
        </div>
    </form>
    <?php
        }
    }
    ?>
</div>