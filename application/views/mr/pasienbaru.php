<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cari Berdasarkan NIK</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Cari Berdasarkan No.kartu BPJS</a>
        </li>
        
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="container-fluid">
            <?= $this->session->flashdata('messege'); ?>
            <div class="alert alert-warning mt-3" role="alert" id="alaram">
            Code: <small id="alert2"></small> Message :<small id="alert1"></small>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <label for="">Cari NIK</label>
                    <input type="number" class=form-control name="cari1" id="cari1" value="">
                </div><br>
            
            </div>
            <button type="submit" class="btn btn-danger mt-2 mb-3" id="btncari1"> Cari</button><br>
            <small>* cari data pasien digunakan apabila pasien tersebut terdaftar di bpjs</small><br>
            <small>* untuk pasien umum tidak dapat menggunakan pencarian</small><br>
            <small>* cocokan data dengan KTP Pasien</small>
            <style>
                small{
                    color : red;
                }
            </style>
            <hr>
            <form action="<?= base_url('mr/simpanpasien')?>" method="post">
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="">No. Rekam Medis</label>
                            <input type="text" name="nomr" id="nomr1" class="form-control" placeholder="No rekam Medis"  autocomplete="off" value="<?= set_value('nomr')?>" required >
                        </div>
                        <div class="col-lg-3">
                            <label for="no_ktp">NIK</label>
                            <input type="text" name="no_ktp" id="nik1"  class="form-control" autocomplete="off" minlength="16" maxlength="16" required pattern="[0-9]+" title="hanya berupa angka" value="<?= set_value('no_ktp')?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="nokartu">No BPJS</label>
                            <input type="text" name="nokartu" id="nokartu1" class="form-control" placeholder=""  minlegth="13" maxlength="13" autocomplete="off" value="">
                        </div>
                        <div class="col-lg-3">
                            <label for="nama_pasien">Nama</label>
                            <input type="text" name="nama_pasien" id="nama1"  class="form-control" required value="<?= set_value('nama_pasien')?>">
                        </div>
                        <div class="col-lg-3">
                                <label for="Jenkel">Jenis Kelamin</label>
                            <select name="jenkel" id="jenkel1" class="form-control" required value="<?= set_value('jenkel')?>">
                                <option value="">-pilih-</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-lg-3">
                            <label for="tgl_lahir">Tgl Lahir</label>
                            <input type="text" class="form-control" id="tgllahir1" name="tgl_lahir" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="<?= set_value('tgl_lahir')?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat"  class="form-control" value="<?= set_value('alamat')?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="provinsi">provinsi</label>
                            <select name="provinsi" id="provinsi" class="form-control" onchange="kode()" value="<?= set_value('provinsi')?>">
                            <option value="">-pilih-</option>
                            <?php
                                foreach($provinsi as $p) :
                            ?>
                            <option value="<?= $p['kode']?>"><?= $p['nama']?></option>
                            <?php
                                endforeach;
                            ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="kota_kab">Kabupaten/Kota</label>
                            <select name="kabupaten" id="kabupaten" class="form-control" onchange="kode2()" value="<?= set_value('kabupaten')?>">
                                <option value="">-pilih-</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="kecamatan">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan" class="form-control" onchange="kode3()" value="<?= set_value('kecamatan')?>">
                                <option value="">-pilih-</option>
                            </select>
                        </div>
                        
                    </div>
                
                    <div class="row">
                        
                        <div class="col-lg-4">
                            <label for="no_hp">HP</label>
                            <input type="text" name="no_hp" id="no_hp1"  class="form-control" required minlength="8" pattern="[0-9]+" title="hanya berupa angka">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="gol_darah">Golongan Darah</label>
                            <select name="gol_darah" id="gol_darah" class="form-control">
                                <option value="">-pilih-</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                                <option value="GAK TAU">GAK TAU</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Status Peserta BPJS</label>
                            <input type="text" class="form-control" name="status" id="status1" value="" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="">Dinsos</label>
                            <input type="text" class="form-control" name="dinsos" id="dinsos1" value="" >
                        </div>
                        <div class="col-lg-3">
                            <label for="">No. SKTM</label>
                            <input type="text" class="form-control" name="nosktm" id="nosktm1" value="" >
                        </div>
                        <div class="col-lg-3">
                            <label for="">Prolanis PRB</label>
                            <input type="text" class="form-control" name="prolanisPRB" id="prolanisprb1" value="" >
                        </div>
                    </div>
            <input type="text" name="kode_provinsi" id="kode_provinsi" value="" hidden>
            <input type="text" name="nama_provinsi" id="nama_provinsi" value="" hidden>

            <input type="text" name="kode_kabupaten" id="kode_kabupaten" value="" hidden>
            <input type="text" name="nama_kabupaten" id="nama_kabupaten" value="" hidden>

            <input type="text" name="kode_kecamatan" id="kode_kecamatan" value="" hidden>
            <input type="text" name="nama_kecamatan" id="nama_kecamatan" value="" hidden>
                <button type="submit" class="btn btn-info mt-3">simpan</button>   
                </form>         
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="container-fluid">
            <?= $this->session->flashdata('messege'); ?>
            <div class="alert alert-warning mt-3" role="alert" id="alaram">
            Code: <small id="alert22"></small> Message :<small id="alert11"></small>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <label for="">Cari No. Kartu BPJS</label>
                    <input type="number" class=form-control name="cari2" id="cari2" value="">
                </div><br>
            
            </div>
            <button type="submit" class="btn btn-danger mt-2 mb-3" id="btncari2"> Cari</button><br>
            <small>* cari data pasien digunakan apabila pasien tersebut terdaftar di bpjs</small><br>
            <small>* untuk pasien umum tidak dapat menggunakan pencarian</small><br>
            <small>* cocokan data dengan KTP Pasien</small>
            <style>
                small{
                    color : red;
                }
            </style>
            <hr>
            <form action="<?= base_url('mr/simpanpasien')?>" method="post">
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="">No. Rekam Medis</label>
                            <input type="text" name="nomr" id="nomr2" class="form-control" placeholder="No rekam Medis"  autocomplete="off" value="<?= set_value('nomr')?>" required >
                        </div>
                        <div class="col-lg-3">
                            <label for="no_ktp">NIK</label>
                            <input type="text" name="no_ktp" id="nik2"  class="form-control" required minlength="16" maxlength="16" pattern="[0-9]+" title="hanya berupa angka" autocomplete="off" value="<?= set_value('no_ktp')?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="nokartu">No BPJS</label>
                            <input type="text" name="nokartu" id="nokartu2" class="form-control" placeholder=""  autocomplete="off" value="">
                        </div>
                        <div class="col-lg-3">
                            <label for="nama_pasien">Nama</label>
                            <input type="text" name="nama_pasien" id="nama2"  class="form-control" required value="<?= set_value('nama_pasien')?>">
                        </div>
                        <div class="col-lg-3">
                                <label for="Jenkel">Jenis Kelamin</label>
                            <select name="jenkel" id="jenkel2" class="form-control" required value="<?= set_value('jenkel')?>">
                                <option value="">-pilih-</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-lg-3">
                            <label for="tgl_lahir">Tgl Lahir</label>
                            <input type="text" class="form-control" id="tgllahir2" name="tgl_lahir" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="<?= set_value('tgl_lahir')?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat"  class="form-control" value="<?= set_value('alamat')?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="provinsi">provinsi</label>
                            <select name="provinsi" id="provinsi1" class="form-control" onchange="kode()" value="<?= set_value('provinsi')?>">
                            <option value="">-pilih-</option>
                            <?php
                                foreach($provinsi as $p) :
                            ?>
                            <option value="<?= $p['kode']?>"><?= $p['nama']?></option>
                            <?php
                                endforeach;
                            ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="kota_kab">Kabupaten/Kota</label>
                            <select name="kabupaten" id="kabupaten1" class="form-control" onchange="kode2()" value="<?= set_value('kabupaten')?>">
                                <option value="">-pilih-</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="kecamatan">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan1" class="form-control" onchange="kode3()" value="<?= set_value('kecamatan')?>">
                                <option value="">-pilih-</option>
                            </select>
                        </div>
                        
                    </div>
                
                    <div class="row">
                        
                        <div class="col-lg-4">
                            <label for="no_hp">HP</label>
                            <input type="text" name="no_hp" id="no_hp2"  class="form-control" required minlength="8" pattern="[0-9]+" title="hanya berupa angka">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="gol_darah">Golongan Darah</label>
                            <select name="gol_darah" id="gol_darah" class="form-control">
                                <option value="">-pilih-</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                                <option value="GAK TAU">GAK TAU</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Status Peserta BPJS</label>
                            <input type="text" class="form-control" name="status" id="status2" value="" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="">Dinsos</label>
                            <input type="text" class="form-control" name="dinsos" id="dinsos2" value="" >
                        </div>
                        <div class="col-lg-3">
                            <label for="">No. SKTM</label>
                            <input type="text" class="form-control" name="nosktm" id="nosktm2" value="" >
                        </div>
                        <div class="col-lg-3">
                            <label for="">Prolanis PRB</label>
                            <input type="text" class="form-control" name="prolanisPRB" id="prolanisprb2" value="" >
                        </div>
                    </div>
            <input type="text" name="kode_provinsi" id="kode_provinsi1" value="" hidden>
            <input type="text" name="nama_provinsi" id="nama_provinsi1" value="" hidden>

            <input type="text" name="kode_kabupaten" id="kode_kabupaten1" value="" hidden>
            <input type="text" name="nama_kabupaten" id="nama_kabupaten1" value="" hidden>

            <input type="text" name="kode_kecamatan" id="kode_kecamatan1" value="" hidden>
            <input type="text" name="nama_kecamatan" id="nama_kecamatan1" value="" hidden>
                <button type="submit" class="btn btn-info mt-3">simpan</button>   
                </form>         
            </div>
        </div>
        
    </div>
</div>



