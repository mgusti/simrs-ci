
<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800"><?=$title;?></h1>
<div class="row">
    <div class="col-lg-6">
        <div class="card mb-3">
            <form action="<?=base_url('pendaftaran/editpasien')?>" method="post">
                <table class="table">
                    <tr>
                        <td class="tebal">No MR</td>
                        <td><input type="text" class="form-control" name="nomr" id="no_rekam_medis" value="<?=$pasien['no_rekam_medis'];?>" readonly></td>
                    </tr>
                    <tr>
                        <td class="tebal">No Bpjs</td>
                        <td><input type="text" class="form-control" name="nokartu" id="nokartu" value="<?=$pasien['nokartu'];?>" ></td>
                    </tr>
                    <tr>
                        <td class="tebal">Nama Pasien</td>
                        <td><input type="text" class="form-control" name="nama_pasien" id="nama_pasien" value="<?=$pasien['nama_pasien'];?>"></td>
                    </tr>
                    <tr>
                        <td class="tebal">NIK KTP</td>
                        <td><input type="text" class="form-control" name="no_ktp" id="no_ktp" value="<?=$pasien['no_ktp'];?>"></td>
                    </tr>
                    <tr>
                        <td class="tebal">Tgl Lahir</td>
                        <td><input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?=$pasien['tgl_lahir']?>" data-provide="datepicker" data-date-format="dd-mm-yyyy"></td>
                    </tr>
                    <tr>
                        <td class="tebal">Jenis Kelamin</td>
                        <?php

if ($pasien['jenkel'] == 'L') {
    $p = 'Laki-Laki';
} else if ($pasien['jenkel'] == 'P') {
    $p = 'Perempuan';
} else {
    $p = '';
}

?>
                        <td><select name="jenkel" id="jenkel" class="form-control">
                                <option value="<?=$pasien['jenkel'];?>"><?=$p?></option>
                                <option value="L">laki-laki</option>
                                <option value="P">Perempuan</option>

                            </select></td>
                    </tr>
                    <tr>
                        <td class="tebal">No HP</td>
                        <td><input type="text" class="form-control" name="no_hp" id="no_hp" value="<?=$pasien['no_hp']?>"></td>
                    </tr>
                    <tr>
                        <td class="tebal">Alamat</td>
                        <td><input type="text" class="form-control" name="alamat" id="alamat" value="<?=$pasien['alamat']?>"></td>
                    </tr>




                </table>


        </div>
    </div>
    <div class="col-lg-6">
        <div class="card mb-3">
            <table class="table">
                <tr>
                    <td class="tebal">Provinsi</td>
                    <td><select name="provinsi" id="provinsi" class="form-control" onchange="kodea()">
                    <option value="<?=$pasien['kode_provinsi']?>"><?=$pasien['nama_provinsi']?></option>
                        <?php
foreach ($provinsi as $p):
?>
                        <option value="<?=$p['kode']?>"><?=$p['nama']?></option>
                        <?php
endforeach;
?>
                    </select></td>

                </tr>
                <tr>
                    <td class="tebal">Kab/Kota</td>
                    <td>
                        <select name="kota_kab" id="kabupaten" class="form-control" onchange="kode2b()">
                            <option value="<?=$pasien['kode_kabupaten']?>"><?=$pasien['nama_kabupaten']?></option>

                            <option value=""></option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="tebal">Kecamatan</td>
                    <td>
                        <select name="kecamatan" id="kecamatan" class="form-control" onchange="kode3c()">
                            <option value="<?=$pasien['kode_kecamatan']?>"><?=$pasien['nama_kecamatan']?></option>

                            <option value=""></option>

                        </select>
                    </td>

                </tr>

                <tr>
                    <td class="tebal">Gol Darah</td>
                    <td><select name="gol_darah" id="gol_darah" class="form-control">
                            <option value="<?=$pasien['gol_darah']?>"><?=$pasien["gol_darah"]?></option>
                            <option value="">-pilih-</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                            <option value="GAK TAU">GAK TAU</option>
                        </select></td>
                </tr>

                <tr>
                    <td class="tebal"> NO KK</td>
                    <td><input type="text" class="form-control" id="nokk" value="" name="nokk"></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<input type="text" name="kode_provinsi" id="kode_provinsi" value="<?=$pasien['kode_provinsi']?>" hidden>
<input type="text" name="nama_provinsi" id="nama_provinsi" value="<?=$pasien['nama_provinsi']?>" hidden>

<input type="text" name="kode_kabupaten" id="kode_kabupaten" value="<?=$pasien['kode_kabupaten']?>" hidden >
<input type="text" name="nama_kabupaten" id="nama_kabupaten" value="<?=$pasien['nama_kabupaten']?>" hidden>

<input type="text" name="kode_kecamatan" id="kode_kecamatan" value="<?=$pasien['kode_kecamatan']?>" hidden>
<input type="text" name="nama_kecamatan" id="nama_kecamatan" value="<?=$pasien['nama_kecamatan']?>" hidden><br>
<a href="<?=base_url();?>pendaftaran/datapasien" class="btn btn-primary mt-3 mb-3"> KEMBALI</a>
                <button type="submit" class="btn btn-warning mt-3 mb-3">EDIT</button>
            </form>
</div>

<style>
.tebal {
    font-weight: bold;
}
</style>