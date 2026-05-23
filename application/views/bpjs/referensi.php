<div class="container-fluid">
    <h1 class="h3 mb-4 mt-4 text-gray-800"><?=$title;?></h1>
</div>

 <button type="button" class="btn btn-warning mt-3 mb-3" style="color: white;" data-toggle="modal" data-target="#CetakRekapModal">
        Cetak Rekap
    </button>


 <div class="modal fade" id="CetakRekapModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                                <label for="order_by">Urutkan Berdasarkan</label>
                                <select name="order_by" id="order_by" class="form-control" required>
                                    <option value="1" selected>Tanggal Input Pasien</option>
                                    <option value="2">Tanggal Input Tindakan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0" style="font-weight: bold;">Filter Tambahan (Opsional)</h6>
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
                                    <option value="Poli <?=$p['nama_poli']?>">Poli <?=$p['nama_poli']?></option>
                                <?php endforeach;?>
                                <option value="Poli Fisioterapi">Poli Fisioterapi</option>
                                <option value="Rawat Inap Perinatologi">Rawat Inap Perinatologi</option>
                                <option value="IGD">IGD</option>
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
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


