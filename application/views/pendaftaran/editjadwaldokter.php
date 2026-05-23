<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?=$title;?></h1>
    <form action="<?=base_url('pendaftaran/editjadwaldokteraksi')?>" method="post">
        <input type="text" name="id_jadwal_dokter" id="id" value="<?=$jadwal['ids'];?>" hidden>
        <div class="row">
            <div class="col-lg-6">
                <label for="nama_dokter">Dokter</label>
                <select name="kd_dokter" id="nama_dokter" class="form-control">
                    <option value="<?=$jadwal['kd_dokter'];?>"><?=$jadwal['nm_dokter'];?></option>
                    <?php
// Menampilkan opsi dokter setelah diurutkan
foreach ($dktr as $dokter):
?>
                            <option value="<?=$dokter['id']?>"><?=$dokter['nm_dokter']?></option>
                        <?php
endforeach;
?>

                </select>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-6"> <!-- Mengubah div menjadi col-lg-6 -->
                <label for="">Klinik</label>
                <select name="kd_poli" id="klinik" class="form-control">
                <option value="<?=$jadwal['kd_ruangan'];?>"><?=$jadwal['nama_ruangan'];?></option>
                <?php foreach ($poli as $p): ?>
                        <option value="<?=$p['id']?>"><?=$p['nama_ruangan']?></option>
                <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="">Hari Kerja</label>
                <select name="hari_kerja" id="hari" class="form-control">
                    <option value="<?=$jadwal['hari_kerja'];?>"><?=$jadwal['hari_kerja'];?></option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="">Jam Buka</label>
                <input type="time" name="jam_mulai" id="mulai" class="form-control"  value="<?=$jadwal['jam_mulai'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="">Jam Tutup</label>
                <input type="time" name="jam_tutup" id="tutup" class="form-control"  value="<?=$jadwal['jam_selesai'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="">Aktivasi</label>
                <select name="aktivasi" id="aktivasi" class="form-control">
                    <option value="<?=$jadwal['aktivasi'];?>"><?php echo($jadwal['aktivasi'] == 'B') ? "BUKA" : "TUTUP"; ?></option>
                    <option value="B">Buka</option>
                    <option value="T">Tutup</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6"> <!-- Mengubah div menjadi col-lg-12 -->
                <button class="btn btn-warning mt-3">Edit</button>
                <a href="<?=base_url('pendaftaran/jadwaldokter')?>" class="btn btn-danger mt-3">Kembali</a>
            </div>
        </div>
    </form>
</div>
