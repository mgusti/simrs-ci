<?php
    include "php/kelas.php";
    include "php/carisep.php";
    
    
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 mt-4 text-gray-800"><?= $title; ?></h1>
    
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Cari SEP</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Rujukan</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Rujukan Manual/IGD</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <form action="">
        <div class="row mt-3">
          <div class="col-lg-12">
              <?= $this->session->flashdata('messege'); ?>
          </div>
        </div>
    
            <div class="row mt-3">
                <div class="col-lg-3">
                    <label for="<?= base_url("php/carisep")?>">cari SEP</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="" name="nosep" autocomplete="off">
                        <div class="input-group-append">
                            <button class="btn btn-danger" tipe="submit" id="cari">cari</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                <label for="">No. Kartu</label>
                <input type="text" class="form-control" id="nokartu3" name="nokartu" value="<?= $_GET["nokartu"]?>" readonly>
              </div>
              <div class="col-lg-2">
                <label for="">Nama Pasien</label>
                <input type="text" class="form-control" id="nama3" name="nama" value="<?= $pasien["nama_pasien"]?>" readonly>
              </div>
            </div>
        </form>
        <form action="">   
          <div class="row">
            <div class="col-lg-3">
                <label for="">No. SEP</label>
                <input type="text" class="form-control" name="nosep" value="<?= $tes["response"]["noSep"]?>" readonly>
            </div>
            <div class="col-lg-3">
                <label for="">Peserta</label>
                <input type="text" class="form-control" name="jnspeserta" value="<?= $tes["response"]["peserta"]["jnsPeserta"]?>"readonly>
            </div>
            <div class="col-lg-3">
                <label for="">Tgl. SEP</label>
                <input type="text" class="form-control" name="tgl_sep" value="<?= $tes["response"]["tglSep"]?>"readonly>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
                <label for="">COB</label>
                <input type="text" class="form-control" name="cob" value="<?= $tes["response"]["peserta"]["asuransi"]?>"readonly>
            </div>
            <div class="col-lg-3">
                <label for="">No. Kartu</label>
                <input type="text" class="form-control" name="nokartu" value="<?= $tes["response"]["peserta"]["noKartu"]?>"readonly>
            </div>
            <div class="col-lg-3">
                <label for="">No. MR</label>
                <input type="text" class="form-control" name="nomr" value="<?= $tes["response"]["peserta"]["noMr"]?>"readonly>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
                <label for="">Nama Peserta</label>
                <input type="text" class="form-control" name="nama" value="<?= $tes["response"]["peserta"]["nama"]?>"readonly>
            </div>
            <div class="col-lg-3">
                <label for="">Jns. Rawat</label>
                <input type="text" class="form-control" name="jnspelayanan" value="<?= $tes["response"]["jnsPelayanan"]?>"readonly>
            </div>
            <div class="col-lg-3">
                <label for="">Tgl. Lahir</label>
                <input type="text" class="form-control" name="tgllahir" value="<?= $tes["response"]["peserta"]["tglLahir"]?>"readonly>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
                <label for="">Kelas Rawat</label>
                <input type="text" class="form-control" name="kelas" value="<?= $tes["response"]["peserta"]["hakKelas"]?>"readonly>
            </div>
              <div class="col-lg-3">
                <label for="">Sub/ Spesialis</label>
                <input type="text" class="form-control" name="poli" value="<?= $tes["response"]["poli"]?>"readonly>
            </div>
            <div class="col-lg-3">
                <label for="">Kelamin</label>
                <input type="text" class="form-control" name="sex" value="<?= $tes["response"]["peserta"]["kelamin"]?>"readonly>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
                <label for="">No Rujukan</label>
                <input type="text" class="form-control" name="norujukan" value="<?= $tes["response"]["noRujukan"]?>" readonly>
            </div>
            <div class="col-lg-3">
                <label for="">Penjamin</label>
                <input type="text" class="form-control" name="penjamin" value="<?= $tes["response"]["penjamin"]?>" readonly>
            </div>
            <div class="col-lg-3">
                <label for="">Catatan</label>
                <input type="text" class="form-control" name="catatan" value="<?= $tes["response"]["catatan"]?>" readonly>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
                <label for="">Diagnosa Awal</label>
                <input type="text" class="form-control" name="diagnosa" value="<?= $tes["response"]["diagnosa"]?>" readonly>
            </div>
          </div>
          <button type="submit" class="btn btn-info mt-4">Simpan</button>
        </form> 
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <div class="container-fluid mt-3">
      
      <div class="row">
        <div class="col-lg-2">
          <label for="">No. Kartu</label>
          <input type="text" class="form-control" id="nokartu" name="nokartu" value="<?= $_GET["nokartu"]?>" readonly>
        </div>
        <div class="col-lg-2">
          <label for="">Nama Pasien</label>
          <input type="text" class="form-control" id="" name="nama" value="<?= $pasien["nama_pasien"]?>" readonly>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-lg-3">
          <label for="">Faskes</label>
          <select name="faskes" id="pilihfaskes" class="form-control">
            <option value="">-pilih-</option>
            <option value="1">Faskes Tingkat 1</option>
            <option value="2">Faskes Tingkat 2</option>
          </select>
        </div>
      </div>
      <button Class="btn btn-danger" id="carifaskes">Cari</button>
      <div class="container-fluid mt-3" id="isi">

      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
  <div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="alert alert-warning" role="alert">
        Code :  Message : 
    </div>
    <?php
        include "php/caripasiennokartu.php";
    ?>
    <form action="<?= base_url('pendaftaran/cetaksepigd?nokartu=')?><?= $pasien["nokartu"]?>" method="post">
    <div class="row">
        <div class="col-lg-3">
            <label for="">Tanggal SEP</label>
            <input type="text" class="form-control" name="tglSep" id="tglsep" value="<?=date('Y-m-d')?>" readonly>
        </div>
    </div>
    <hr>
    <h4>Data Pasien</h4><br>
    <div class="row">
        <div class="col-lg-3">
            <label for="">No.Kartu BPJS</label>
            <input type="text" class="form-control" name="noKartu" id="nokartu1" value="<?= $pasien["nokartu"]?>" readonly>
        </div>
        <div class="col-lg-3">
            <label for="">No. MR</label>
            <input type="text" class="form-control" name="noMR" id="nomr1" value="<?= $pasien["no_rekam_medis"]?>" readonly>
        </div>
        <div class="col-lg-3">
            <label for="">No. Telp</label>
            <input type="text" class="form-control" name="noTelp" id="notelp1" value="<?= $pasien["no_hp"]?>" readonly>
        </div>
        <div class="col-lg-3">
            <label for="">NIK</label>
            <input type="text" class="form-control" name="nik" id="nik1" value="<?= $pasien["no_ktp"]?>" readonly>
        </div>
    </div>
    <div class="row">
         <div class="col-lg-3">
            <label for="">Nama Pasien</label>
            <input type="text" class="form-control" name="nama" id="nama1" value="<?= $pasien["nama_pasien"]?>" readonly>
        </div>
        <div class="col-lg-3">
            <label for="">Kelamin</label>
            <input type="text" class="form-control" name="sex" id="sex1" value="<?= $pasien["jenkel"]?>" readonly>
        </div>
        <div class="col-lg-3">
            <label for="">Kelas Rawat</label>
            <select name="klsRawat" id="klsRawat" class="form-control" required>
                <option value="<?= $faskesigd["response"]["peserta"]["hakKelas"]["kode"]?>"><?= $faskesigd["response"]["peserta"]["hakKelas"]["keterangan"]?></option>
                
                <option value="1">KELAS I</option>
                <option value="2">KELAS II</option>
                <option value="3">KELAS III</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <label for="">Asal Faskes</label>
            <input type="text" class="form-control" name="asalfaskes12" id="asalfaskes12" value="<?= $faskesigd["response"]["peserta"]["provUmum"]["kdProvider"]?>-<?= $faskesigd["response"]["peserta"]["provUmum"]["nmProvider"]?>" readonly>
        </div>
    </div>
    <hr>
    <h4>Rujukan</h4><br>
  
    <div class="row">
        <div class="col-lg-3">
            <label for="">Asal Rujukan</label>
            <select name="asalRujukan" id="asalrujukan" class="form-control">
                <option value=""></option>
                <option value="1">Faskes Tingkat 1</option>
                <option value="2">Faskes Tingkat 2</option>
            </select>
        </div>
        <div class="col-lg-3">
            <label for="">Tgl Rujukan</label>
            <input type="text" class="form-control" name="tglrujukan" id="tglrujukan" value="<?= date('Y-m-d')?>" data-provide="datepicker" data-date-format="yyyy-mm-dd">
        </div>
        <div class="col-lg-3">
            <label for="">No. Rujukan</label>
            <input type="text" class="form-control" name="norujukan" id="norujukan" value="">
        </div>
        <div class="col-lg-3">
            <label for="">PPK Asal Rujukan</label>
            <input type="text" class="form-control" name="ppkasal" id="ppkasal">
           
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <label for=""> Kode Diagnosa</label>
            <input name="diagAwal" id="diagawal1" class="form-control" value="" required>
            
        </div>
        <div class="col-lg-6">
            <label for="">Nama Diagnosa</label>
            <select name="namadiagnosa" id="list" class="form-control">
                <option value=""></option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <label for="">Spesialis/Subspesiali</label>
            <select name="poli" id="poli" class="form-control">
                
                <option value="IGD">IGD</option>
            </select>
        </div>
        <div class="col-lg-3">
            <label for="">Jenis Pelayanan</label>
            <select name="jnspelayanan" id="jnspelayanan" class="form-control">
                <option value=""></option>
                <option value="1">R.Inap</option>
                <option value="2">R.Jalan</option>
            </select>
        </div>  
    </div>
    <hr>
    <h4>SKDP</h4><br>
    <div class="row">
        <div class="col-lg-3">
            <label for="">No. Surat Kontrol/ SKDP </label>
            <input type="text" class="form-control" name="noskdp" id="noskdp1" value="">
        </div>
        <div class="col-lg-6">
            <label for="">DPJP Pemberi Surat SKDP/SPRI</label>
            <select name="kodeDPJP" id="kodedpjp1" class="form-control">
              <option value=""></option>
            </select>
            
        </div>
    </div>
    <hr>
    
    <div class="row">
        <div class="col-lg-3">
            <div class="form-check">
              <label for="cob1">Cob</label>
              <select name="cob" id="cob" class="form-control">
                <option value="0">Tidak</option>
                <option value="1">YA</option>
              </select>
                
                
            </div>
        </div>
    </div>
    <hr>
    <h4>Kecelakaan</h4><br>
    <div class="row">
        <div class="col-lg-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="lakalantas" value="" id="laka1" onclick="myFunction()">
                <label class="form-check-label" for="cob1">* Ceklis bila Ya</label>
            </div>
        </div>
    </div>
    <div class="row" id="kecelakaan" style="display:none">
        <div class="col-lg-3">
            <label for="">Laka Lantas</label>
            <select name="lakalantas" id="lakalantas1" class="form-control">
                <option value="0">-pilih-</option>
                <option value="0">Tidak</option>
                <option value="1">Ya</option>
            </select>
        </div>
        <div class="col-lg-3">
            <label for="">Penjamin</label>
            <select name="penjamin" id="penjamin1" class="form-control">
                <option value="">-pilih-</option>
                <option value="1">Jasa Raharja</option>
                <option value="2">BPJS Ketenagakerjaan</option>
                <option value="3">TASPEN</option>
                <option value="4">ASABRI</option>
            </select>
            
        </div>
        <div class="col-lg-3">
            <label for="">Tanggal Kejadian</label>
            <input type="text" class="form-control" name="tglKejadian" id="tglkejadian1" value="" data-provide="datepicker" data-date-format="yyyy-mm-dd">
        </div>
        <div class="col-lg-6">
            <label for="">Keterangan</label>
            <input type="text" class="form-control" name="keterangan" id="keterangan1" value="">
        </div>
        <div class="col-lg-3">
            <label for="">Suplesi</label>
            <select name="suplesi" id="suplesi1" class="form-control">
                <option value="0">Tidak</option>
                <option value="1">Ya</option>
            </select>
            
        </div>
        <div class="col-lg-3">
            <label for="">No. SEP Suplesi</label>
            <input type="text" class="form-control" name="noSepSuplesi" id="nosepsuplesi1" value="">
        </div>
        <div class="col-lg-3">
            <label for="">Kode Provinsi</label>
            <select name="provinsi" id="provinsi" class="form-control">
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
            <label for="">Kode Kabupaten</label>
            <select name="kota_kab" id="kabupaten" class="form-control" onchange="kode2()">
                <option value="">-pilih-</option>
                
                
                            
            </select>
        </div>
        <div class="col-lg-3">
            <label for="">Kode Kecamatan</label>
            <select name="kecamatan" id="kecamatan" class="form-control" onchange="kode3()">
                <option value="">-pilih-</option>
                
                
                
            </select>
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
    
    </form>
</div>
  </div>
</div>
 
</div>