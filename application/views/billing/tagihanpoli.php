<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?=$title;?></h1>
    <?=$this->session->flashdata('messege');?>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mt-3 mb-3" data-toggle="modal" data-target="#exampleModal">
        Tambah
    </button>

     <button type="button" class="btn btn-warning mt-3 mb-3" style="color: white;" data-toggle="modal" data-target="#CetakRekapModal">
        Cetak Rekap
    </button>

    <div class="card mb-3">
        <div class="card-body">
            <p>Pencarian Data</p>
            <form action="" method="post">
                <div class="row">
                    <div class="col-lg-4">
                        <label for="">Bulan</label>
                        <select name="bulan" id="bulan" class="form-control" required>
                            <option value="">-Pilih-</option>
                            <option value="01" <?=isset($_POST['bulan']) && $_POST['bulan'] == "01" ? "selected" : ""?>>Januari</option>
                            <option value="02" <?=isset($_POST['bulan']) && $_POST['bulan'] == "02" ? "selected" : ""?>>Februari</option>
                            <option value="03" <?=isset($_POST['bulan']) && $_POST['bulan'] == "03" ? "selected" : ""?>>Maret</option>
                            <option value="04" <?=isset($_POST['bulan']) && $_POST['bulan'] == "04" ? "selected" : ""?>>April</option>
                            <option value="05" <?=isset($_POST['bulan']) && $_POST['bulan'] == "05" ? "selected" : ""?>>Mei</option>
                            <option value="06" <?=isset($_POST['bulan']) && $_POST['bulan'] == "06" ? "selected" : ""?>>Juni</option>
                            <option value="07" <?=isset($_POST['bulan']) && $_POST['bulan'] == "07" ? "selected" : ""?>>Juli</option>
                            <option value="08" <?=isset($_POST['bulan']) && $_POST['bulan'] == "08" ? "selected" : ""?>>Agustus</option>
                            <option value="09" <?=isset($_POST['bulan']) && $_POST['bulan'] == "09" ? "selected" : ""?>>September</option>
                            <option value="10" <?=isset($_POST['bulan']) && $_POST['bulan'] == "10" ? "selected" : ""?>>Oktober</option>
                            <option value="11" <?=isset($_POST['bulan']) && $_POST['bulan'] == "11" ? "selected" : ""?>>November</option>
                            <option value="12" <?=isset($_POST['bulan']) && $_POST['bulan'] == "12" ? "selected" : ""?>>Desember</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label for="">Tahun</label>
                        <input type="number" name="tahun" id="tahun" class="form-control" value="<?=isset($_POST['tahun']) ? $_POST['tahun'] : $tahun?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="">Ruangan</label>
                        <select name="poli" id="poli" class="form-control">
                            <option value="">-Pilih-</option>
      <?php foreach ($poli as $p): ?>
    <?php
if ($p['nama_poli'] === 'IGD') {
    $nama = 'IGD';
} elseif ($p['nama_poli'] === 'Rawat Inap Perinatologi') {
    $nama = 'Rawat Inap Perinatologi';
} else {
    $nama = 'Poli ' . $p['nama_poli'];
}
?>
    <option value="<?=$nama?>" <?=isset($_POST['poli']) && $_POST['poli'] == $nama ? "selected" : ""?>><?=$nama?></option>
<?php endforeach; ?>


                            <?php
$rawat_inap_list = [
    'Rawat Inap Bedah',
    'Rawat Inap Anak',
    'Rawat Inap Gabung',
    'Rawat Inap Penyakit Dalam',
    'Rawat Inap Syaraf',
    'Rawat Inap Jantung',
    'Rawat Inap Mata',
    'Rawat Inap THT',
    'Rawat Inap Kulit',
    'Rawat Inap Paru',
    'Rawat Inap VK',
    'Rawat Inap ICU',
    'Rawat Inap VIP',
    'Rawat Inap Fisioterapi',
];
?>

<?php foreach ($rawat_inap_list as $ri): ?>
    <option value="<?=$ri?>" <?=isset($_POST['poli']) && $_POST['poli'] == $ri ? 'selected' : ''?>>
        <?=$ri?>
    </option>
<?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <button class="btn btn-info mt-3 mb-3"><i class="fa fa-search"></i> Cari</button>
            </form>
        </div>
    </div>

    <table id="example1" class="table table-striped table-bordered " style="width: 100%; text-align: center; vertical-align: middle;">
        <thead>
            <tr>
                <td style="font-weight: bold;">No.</td>
                <td style="font-weight: bold;">Tanggal</td>
                <td style="font-weight: bold;">No R.M</td>
                <td style="font-weight: bold;">Nama Pasien</td>
                <td style="font-weight: bold;">Asal Ruangan</td>
                <td style="font-weight: bold;">DPJP</td>
                <td style="font-weight: bold;">Petugas Input</td>
                <td style="font-weight: bold;">Asal Petugas</td>
                <td style="font-weight: bold;">Verifikasi Kasir</td>
                <td style="font-weight: bold;">Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
$session_petugas_id = $user['id'];
foreach ($tagihan as $t): ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=tanggal_indo($t['tgl'])?></td>
                    <td><?=format_mr($t['no_mr'])?></td>
                    <td><?=$t['nama']?></td>
                    <td><?=$t['poli']?></td>
                    <td><?=$t['dpjp']?></td>
                    <td><?=!empty($t['petugas_nama']) ? $t['petugas_nama'] : $t['petugas']?></td>
                    <td><?=$t['subbidang']?></td>
                    <td><?=$t['status_verif'] == 1 ? "<b style='color:green !important;'>SUDAH DIVERIFIKASI</b>" : "<b style='color:red !important;'>BELUM DIVERIFIKASI</b>"?></td>
                    <td class="text-center">
                        <a href="<?=base_url('billing/tindakan/') . $t['no']?>" class="btn btn-info" target="_blank" style="width: 100%; margin-bottom: 5px;">Tindakan</a>
                        <a href="<?=base_url('billing/delbilling/') . $t['no']?>" class="btn btn-danger" style="width: 100%;">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td style="font-weight: bold;">No.</td>
                <td style="font-weight: bold;">Tanggal</td>
                <td style="font-weight: bold;">No R.M</td>
                <td style="font-weight: bold;">Nama Pasien</td>
                <td style="font-weight: bold;">Asal Ruangan</td>
                <td style="font-weight: bold;">DPJP</td>
                <td style="font-weight: bold;">Petugas Input</td>
                <td style="font-weight: bold;">Asal Petugas</td>
                <td style="font-weight: bold;">Verifikasi Kasir</td>
                <td style="font-weight: bold;">Aksi</td>
            </tr>
        </tfoot>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tagihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url('billing/simpantagihanpoli')?>" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                            <span id="tanggal_indo" class="mt-2" style="color: red;">Pastikan pemilihan tanggal masuk pasien sudah benar!!!</span>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="">No R.M</label>
                            <input type="number" name="nomr" id="nomr" class="form-control" required>
                            <span id="error-message" style="color: red;">Inputan tidak bisa selain angka dan maksimal 8 digit!</span>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" onkeyup="this.value = this.value.toUpperCase()" required>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="">Ruangan Masuk</label>
                            <select name="poli" id="poli2" class="form-control" required>
                                <option value="">-Pilih-</option>
                              <?php foreach ($poli as $p): ?>
                                    <?php
if ($p['nama_poli'] === 'IGD') {
    $nama = 'IGD';
} elseif ($p['nama_poli'] === 'Rawat Inap Perinatologi') {
    $nama = 'Rawat Inap Perinatologi';
} else {
    $nama = 'Poli ' . $p['nama_poli'];
}
?>
                                    <option value="<?=$nama?>" <?=isset($_POST['poli']) && $_POST['poli'] == $nama ? "selected" : ""?>><?=$nama?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="">DPJP</label>
                            <select name="dok" id="dok" class="form-control">
                                <option value="">-pilih-</option>
                                <?php foreach ($dktr as $d): ?>
                                    <option value="<?=$d['nm_dokter']?>"><?=$d['nm_dokter']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <label for="">Kelas</label>
                            <select name="kelas" id="kelas" class="form-control" required>
                                <option value=""> - Pilih Kelas - </option>
                                <option value="Non Kelas">Non Kelas</option>
                                <option value="I">Kelas I</option>
                                <option value="II">Kelas II</option>
                                <option value="III">Kelas III</option>
                                <option value="VIP">VIP</option>
                                <option value="HCU">HCU</option>
                                <option value="INTENSIV">INTENSIV</option>
                                <option value="ISOLASI">ISOLASI</option>
                                <option value="IGD">IGD</option>
                                <option value="VK">VK</option>
                            </select>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="">Petugas Input</label>
                            <input type="text" name="pinput" id="pinput" class="form-control" value="<?=$user['id']?>" hidden>
                            <input type="text" class="form-control" value="<?=$user['name']?>" disabled>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Update</h4>
                <ol>
                    <li>
                        Penambahan fitur pencarian data
                        <ul class="text-danger">
                            <li><small>Fitur pencarian ditambahkan untuk mengantisipasi loading data lama</small></li>
                            <li><small>Data tidak akan muncul sebelum di dicari</small></li>

                        </ul>
                    </li>
                    <li>
                        penambahan kelas
                    </li>
                    <li>Perubahan untuk no M.R tidak memakai titik, hanya berupa angka</li>
                    <li>automatis huruf besar pada nama pasien</li>
                    <li>Penambahan Ruang VIP</li>
                    <li>Disable tombol enter</li>
                    <li>penambahan validasi (requred), data yang di input tidak boleh kosong</li>
                    <li>penambahan tombol edit data pada Tagihan</li>
                    <li>bagi data yang telah terinput sebelum penambahan kelas, mohon di edit di tombol edit, bagi yang tidak pakai kelas, bisa di kosongkan saja</li>
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


 <div class="modal fade" id="CetakRekapModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak Rekap Tagihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url('billing/cetakrekaptagihanruangan')?>" method="post">
                <div class="card mb-1" style="background-color: #ffcbd1;">
                        <div class="card-body p-1">
                                <span style="font-size:12px;"><b>(!)</b> Perhatian, Mohon cek hasil cetak. Akurasi data bulan Oktober 2024 belum 100% sesuai karna aplikasi masih dalam pengembangan dan perbaikan. Juga jangan menggunakan kasir@gmail.com lagi dalam penginputan data.</span>
                        </div>

                </div>
                <div class="card mb-3" style="background-color: #FED8B1;">
                        <div class="card-body p-1">
                                <span style="font-size:12px;"><b>(?) Scroll kebawah untuk tombol cetak.</b></span>
                        </div>
                </div>
                <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0" style="font-weight: bold;">Filter Utama (Wajib Di Pilih)</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="ruangan">Ruang Tindakan</label>
                                <select name="ruangan" id="ruangan" class="form-control" required>
                                    <option value="">-pilih-</option>
                                    <option value="ANAK">ANAK</option>
                                    <option value="BEDAH">BEDAH</option>
                                    <option value="PARU">PARU</option>
                                    <option value="GIGI">GIGI</option>
                                    <option value="SARAF">SARAF</option>
                                    <option value="MATA">MATA</option>
                                    <option value="KULIT DAN KELAMIN">KULIT DAN KELAMIN</option>
                                    <option value="KEBIDANAN">KEBIDANAN</option>
                                    <option value="PENYAKIT DALAM">PENYAKIT DALAM</option>
                                    <option value="UMUM">UMUM</option>
                                    <option value="JANTUNG">JANTUNG</option>
                                    <option value="THT">THT</option>
                                    <option value="Kedokteran Fisik Dan Rehabilitasi Medik">Kedokteran Fisik Dan Rehabilitasi Medik</option>
                                    <option value="FISIOTERAPI">FISIOTERAPI</option>
                                    <option value="VK">VK</option>
                                    <option value="RANAP ANAK">RANAP ANAK</option>
                                    <option value="RAWAT GABUNG">RAWAT GABUNG</option>
                                    <option value="RANAP PRT">RANAP PRT</option>
                                    <option value="RANAP BEDAH">RANAP BEDAH</option>
                                    <option value="RANAP JANTUNG/MATA/THT/KULIT">RANAP JANTUNG/MATA/THT/KULIT</option>
                                    <option value="VIP">VIP</option>
                                    <option value="RAWAT INAP PENYAKIT DALAM DAN SYARAF">RAWAT INAP PENYAKIT DALAM DAN SYARAF</option>
                                    <option value="RAWAT INAP FISIOTERAPI">RAWAT INAP FISIOTERAPI</option>
                                    <option value="RAWAT INAP PARU">RAWAT INAP PARU</option>
                                    <option value="APOTEK RANAP">APOTEK RANAP</option>
                                    <option value="Labor PA">Labor PA</option>
                                    <option value="LABORATORIUM PK">LABORATORIUM PK</option>
                                    <option value="RADIOLOGI">RADIOLOGI</option>
                                    <option value="APOTEK RAWAT JALAN">APOTEK RAWAT JALAN</option>
                                    <option value="GIZI">GIZI</option>
                                    <option value="DEPO FARMASI OK">DEPO FARMASI OK</option>
                                    <option value="ICU">ICU</option>
                                    <option value="OK">OK</option>
                                    <option value="IGD">IGD</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bulan">Bulan</label>
                                <select name="bulan" id="month" class="form-control" required>
                                    <option value="">-pilih-</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>

                           <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select name="tahun" id="year" class="form-control" required>
                                    <option value="">-pilih-</option>
                                    <?php
$startYear = 2024;
$currentYear = date('Y');
for ($y = $startYear; $y <= $currentYear; $y++): ?>
                                        <option value="<?=$y?>"><?=$y?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>


                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0" style="font-weight: bold;">Filter Tambahan (Opsional/Tidak Wajib Di Pilih)</h6>
                            <span style="font-size:12px;">filter ini merupakan tambahan yang tidak wajib dipilih, berfungsi untuk mencetak rekap data dengan keterangan yang lebih spesifik</span>
                        </div>
                        <div class="card-body">
                             <div class="form-group">
                                <label for="bulan">Kelas</label>
                                <select name="kelas" id="class" class="form-control">
                                    <option value="-" selected>-pilih-</option>
                                    <option value="Non Kelas">Non Kelas</option>
                                    <option value="I">Kelas I</option>
                                    <option value="II">Kelas II</option>
                                    <option value="III">Kelas III</option>
                                    <option value="VIP">VIP</option>
                                    <option value="HCU">HCU</option>
                                    <option value="INTENSIV">INTENSIV</option>
                                    <option value="ISOLASI">ISOLASI</option>
                                    <option value="IGD">IGD</option>
                                    <option value="VK">VK</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="">Ruang Masuk</label>
                            <select name="poli_masuk" id="poli_masuk" class="form-control">
                                <option value="-" selected>-Pilih-</option>
                               <?php foreach ($poli as $p): ?>
                                    <?php if ($p['nama_poli'] === 'IGD'): ?>
                                        <option value="IGD">IGD</option>
                                    <?php elseif ($p['nama_poli'] === 'Rawat Inap Perinatologi'): ?>
                                        <option value="Rawat Inap Perinatologi">Rawat Inap Perinatologi</option>
                                    <?php else: ?>
                                        <option value="Poli <?=$p['nama_poli']?>">Poli <?=$p['nama_poli']?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                             <label for="">Ruangan Rawat</label>
                            <select name="poli_ranap" id="poli_ranap" class="form-control" required>
                                <option value="-" selected>-Pilih-</option>
                                <option value="Rawat Inap Bedah">Rawat Inap Bedah</option>
                                <option value="Rawat Inap Anak">Rawat Inap Anak</option>
                                <option value="Rawat Inap Gabung">Rawat Inap Gabung</option>
                                <option value="Rawat Inap Penyakit Dalam">Rawat Inap Penyakit Dalam</option>
                                <option value="Rawat Inap Syaraf">Rawat Inap Syaraf</option>
                                <option value="Rawat Inap Jantung">Rawat Inap Jantung</option>
                                <option value="Rawat Inap Mata">Rawat Inap Mata</option>
                                <option value="Rawat Inap THT">Rawat Inap THT</option>
                                <option value="Rawat Inap Kulit">Rawat Inap Kulit</option>
                                <option value="Rawat Inap Paru">Rawat Inap Paru</option>
                                <option value="Rawat Inap Perinatologi">Rawat Inap Perinatologi</option>
                                <option value="Rawat Inap VK">Rawat Inap VK</option>
                                <option value="Rawat Inap ICU">Rawat Inap ICU</option>
                                <option value="Rawat Inap VIP">Rawat Inap VIP</option>
                                <option value="Rawat Inap Fisioterapi">Rawat Inap Fisioterapi</option>
                            </select>
                        </div>
                          <div class="form-group">
                            <label for="tindakan">Jenis Tindakan</label>
                            <select name="jenis_tindakan" id="jenis_tindakan" class="form-control">
                                <option value="-" selected>-Pilih-</option>
                                <option value="Biaya Dokter">Biaya Dokter</option>
                                <option value="Biaya Perawatan">Biaya Perawatan</option>
                                <option value="Biaya Tindakan">Biaya Tindakan</option>
                                <option value="Biaya Penunjang Medis">Biaya Penunjang Medis</option>
                                <option value="Biaya Penunjang Non Medis">Biaya Penunjang Non Medis</option>
                                <option value="Biaya Farmasi">Biaya Farmasi</option>
                                <option value="Biaya Lain-lain">Biaya Lain-lain</option>
                            </select>
                            </div>
                        </div>
                                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" formtarget="_blank">Cetak</button>
                </form>
            </div>
        </div>
    </div>
</div>