<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <form action="<?= base_url('admin/edituseraksi/') . $iuser['id']?>" method="post">
    <input type="text" name="id" id="id" value="<?= $iuser['id']?>" hidden>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Nama User</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?= $iuser['name']?>">
            </div>
            <div class="col-lg-3">
                <label for="">email</label>
                <input type="text" name="email" id="email" class="form-control" value="<?= $iuser['email']?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">NIK</label>
                <input type="text" name="nik" id="nik" class="form-control" value="<?= $iuser['nik']?>">
            </div>
            <div class="col-lg-3">
                <label for="">Jabatan</label>
                <select name="jabatan" id="jabatan" class="form-control">
                    <option value="<?= $iuser['jabatan']?>"><?= $iuser['jabatan']?></option>
                    <?php
                        foreach($jabatan as $jab):
                    ?>
                        <option value="<?= $jab['nmjab']?>"><?= $jab['nmjab']?></option>
                    <?php
                        endforeach;
                    ?>
                </select>
            </div>
            <?php
                if($iuser['jenkel'] =='L'){
                    $jen='Laki-Laki';
                }else if($iuser['jenkel'] =='P'){
                    $jen='Perempuan';
                }else{
                    $jen='';
                }
            ?>
                <div class="col-lg-3">
                    <label for="">Jenis Kelamin</label>
                    <select name="jenkel" id="jenkel" class="form-control">
                        <option value="<?= $iuser['jenkel']?>"><?= $jen?></option>
                        <option value="P">Perempuan</option>
                        <option value="L">Laki-Laki</option>
                    </select>
                </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Pendidikan</label>
                <input type="text" name="pendidikan" id="pendidikan" class="form-control" value="<?= $iuser['pendidikan']?>">
            </div>
            <div class="col-lg-3">
                <label for="">tgl lahir (yyyy-mm-dd)</label>
                <input type="text" name="tgllahir" id="tgllahir" class="form-control" value="<?= $iuser['tgllahir']?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Role Aksess</label>
                <select name="role" id="role" class="form-control">
                <option value="<?= $jrole['id']?>"><?= $jrole['role']?></option>
                
                <?php
                    foreach($role as $r):
                ?>
                    
                    <option value="<?= $r['id']?>"><?= $r['role']?></option>
                    <?php
                        endforeach;
                    ?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <label for="">Subbidang</label>
                <select name="subbidang" id="subbidang" class="form-control">
                    <option value="<?= $isub['kdsub']?>"><?= $isub['nmsub']?></option>
                    <?php foreach($sub as $s): ?>
                    <option value="<?= $s['kdsub']?>"><?= $s['nmsub']?></option>
                    <?php endforeach; ?>
                </select>
            </div>         
        </div>
        <div class="row">
            <div class="col-lg-1">
                <label for="">Aktifasi</label>
                <select name="aktifasi" id="aktifasi" class="form-control">
                        <option value="<?= $iuser['is_active']?>"><?= $iuser['is_active']?></option>
                        <option value="1">1</option>
                        <option value="0">0</option>
                </select>
            </div>
        </div>
        <button class="btn btn-warning mt-3">Edit</button>
        <a href="<?= base_url('admin/inputuser')?>" class="btn btn-danger mt-3">Kembali</a>
    </form>
</div>