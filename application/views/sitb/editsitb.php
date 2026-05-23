<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('sitb/aksieditsitb/') . $tb['kd_sitb'] ?>" method="post">
                <div class="row">
                    <div class="col-lg-4">
                        <label for="">ID TB 03</label>
                        <input type="text" name="id_tb_03" id="id_tb_03" class="form-control" value="<?= $tb['id_tb_03'] ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="">Nama Pasien</label>
                        <input type="text" name="nama" id="nama" class="form-control" required value="<?= $tb['kd_pasien'] ?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="">NIK</label>
                        <input type="number" name="nik" id="nik" class="form-control" required value="<?= $tb['nik'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="<?= $tb['jenis_kelamin'] ?>"><?= $tb['jenis_kelamin'] ?></option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="">Alamat Lengkap</label>
                        <textarea name="alamat_lengkap" id="alamat_lengkap" cols="10" rows="4" class="form-control"><?= $tb['alamat_lengkap'] ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <label for="">ID Provinsi Pasien </label>
                        <input type="number" name="id_propinsi_pasien" id="id_propinsi_pasien" class="form-control" required value="<?= $tb['id_propinsi_pasien'] ?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="">Kode Kabupaten Pasien </label>
                        <input type="number" name="kd_kabupaten_pasien" id="kd_kabupaten_pasien" class="form-control" required value="<?= $tb['kd_kabupaten_pasien'] ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <label for="">KD fasyankes</label>
                        <input type="text" name="kd_fasyankes" id="kd_fasyankes" class="form-control" value="1571158" readonly required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="">Kode ICD-X</label>
                        <input type="text" name="kode_icd_x" id="kode_icd_x" class="form-control" value="<?= $tb['kode_icd_x'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="">Tipe Diagnosis</label>
                        <select name="tipe_diagnisis" id="tipe_diagnosis" class="form-control">
                            <option value="<?= $tb['tipe_diagnosis'] ?>"><?= $tb['tipe_diagnosis'] ?></option>
                            <option value="1">terkonfirmasi bakteriologis</option>
                            <option value="2">terdiagnosis klinis</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="">klasifikasi lokasi anatomi</label>
                        <select name="klasifikasi_lokasi_anatomi" id="klasifikasi_lokasi_anatomi" class="form-control">
                            <option value="<?= $tb['klasifikasi_lokasi_anatomi'] ?>"><?= $tb['klasifikasi_lokasi_anatomi'] ?></option>
                            <option value="1">Paru</option>
                            <option value="2">Ekstraparu</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <label for="">klasifikasi riwayat pengobatan</label>
                        <select name="klasifikasi_riwayat_pengobatan" id="klasifikasi_riwayat_pengobatan" class="form-control" required>
                            <option value="<?= $tb['klasifikasi_riwayat_pengobatan'] ?>"><?= $tb['klasifikasi_riwayat_pengobatan'] ?></option>
                            <option value="1">Baru</option>
                            <option value="2">Kabuh</option>
                            <option value="3">Diobati Setelah Gagal</option>
                            <option value="4">Diobati Setelah Putus Berobat</option>
                            <option value="5">Lain - Lain</option>
                            <option value="6">Riwayat Pengobatan Sebelumnya Tidak Diketahui</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="">tanggal mulai pengobatan</label>
                        <input type="date" name="tanggal_mulai_pengobatan" id="tanggal_mulai_pengobatan" class="form-control" required value="<?= $tb['tanggal_mulai_pengobatan'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <label for="">Paduan_Oat</label>
                        <select name="paduan_oat" id="paduan_oat" class="form-control">
                            <option value="<?= $tb['paduan_oat'] ?>"><?= $tb['paduan_oat'] ?></option>
                            <option value="kategori 1">Kategori 1</option>
                            <option value="kategori 2">Kategori 2</option>
                            <option value="kategori Anak usia < 15">kategori Anak usia < 15</option>
                            <option value="Lepasan">Lepasan</option>
                            <option value="paduan jangka pendek non injeksi">paduan jangka pendek injeksi</option>
                            <option value="paduan jangka panjang non injeksi">paduan jangka panjang injeksi</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="">sebelum pengobatan hasil mikroskopis</label>
                        <select name="sebelum_pengobatan_hasil_mikroskopis" id="sebelum_pengobatan_hasil_mikroskopis" class="form-control">
                            <option value="<?= $tb['sebelum_pengobatan_hasil_mikroskopis'] ?>"><?= $tb['sebelum_pengobatan_hasil_mikroskopis'] ?></option>
                            <option value="Neg">Neg</option>
                            <option value="1-9">1-9</option>
                            <option value="1+">1+</option>
                            <option value="2+">2+</option>
                            <option value="3+">3+</option>
                            <option value="Tidak Dilakuan">Tidak Dilakukan</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="">sebelum pengobatan hasil tes cepat</label>
                        <select name="sebelum_pengobatan_hasil_tes_cepat" id="sebelum_pengobatan_hasil_tes_cepat" class="form-control">
                            <option value="<?= $tb['sebelum_pengobatan_hasil_tes_cepat'] ?>"><?= $tb['sebelum_pengobatan_hasil_tes_cepat'] ?></option>
                            <option value="Neg">Neg</option>
                            <option value="Rif Sen">Rif Sen</option>
                            <option value="Rif Res">Rif Res</option>
                            <option value="Rif Indet">Rif Indet</option>
                            <option value="INVALID">INVALID</option>
                            <option value="ERROR">ERROR</option>
                            <option value="NO RESULT">NO RESULT</option>
                            <option value="Tidak Dilakukan">Tidak Dilakukan</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="">sebelum pengobatan hasil biakan</label>
                        <select name="sebelum_pengobatan_hasil_biakan" id="sebelum_pengobatan_hasil_biakan" class="form-control">
                            <option value="<?= $tb['sebelum_pengobatan_hasil_biakan'] ?>"><?= $tb['sebelum_pengobatan_hasil_biakan'] ?></option>
                            <option value="Negatif">Negatif</option>
                            <option value="1-9">1-9</option>
                            <option value="BTA">BTA</option>
                            <option value="1+">1+</option>
                            <option value="2+">2+</option>
                            <option value="3+">3+</option>
                            <option value="4+">4+</option>
                            <option value="NTM">NTM</option>
                            <option value="Kontaminasi">Kontaminasi</option>
                            <option value="Tidak Dilakukan">Tidak Dilakukan</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="">hasil mikroskopis bulan 2</label>
                        <select name="hasil_mikroskopis_bulan_2" id="hasil_mikroskopis_bulan_2" class="form-control">
                            <option value="<?= $tb['hasil_mikroskopis_bulan_2'] ?>"><?= $tb['hasil_mikroskopis_bulan_2'] ?></option>
                            <option value="Neg">Neg</option>
                            <option value="1-9">1-9</option>
                            <option value="1+">1+</option>
                            <option value="2+">2+</option>
                            <option value="3+">3+</option>
                            <option value="Tidak Dilakuan">Tidak Dilakukan</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="">hasil mikroskopis bulan 3</label>
                        <select name="hasil_mikroskopis_bulan_3" id="hasil_mikroskopis_bulan_3" class="form-control">
                            <option value="<?= $tb['hasil_mikroskopis_bulan_3'] ?>"><?= $tb['hasil_mikroskopis_bulan_3'] ?></option>
                            <option value="Neg">Neg</option>
                            <option value="1-9">1-9</option>
                            <option value="1+">1+</option>
                            <option value="2+">2+</option>
                            <option value="3+">3+</option>
                            <option value="Tidak Dilakuan">Tidak Dilakukan</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="">hasil mikroskopis bulan 5</label>
                        <select name="hasil_mikroskopis_bulan_5" id="hasil_mikroskopis_bulan_5" class="form-control">

                            <option value="<?= $tb['hasil_mikroskopis_bulan_5'] ?>"><?= $tb['hasil_mikroskopis_bulan_5'] ?></option>
                            <option value="Neg">Neg</option>
                            <option value="1-9">1-9</option>
                            <option value="1+">1+</option>
                            <option value="2+">2+</option>
                            <option value="3+">3+</option>
                            <option value="Tidak Dilakuan">Tidak Dilakukan</option>
                        </select>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="">akhir pengobatan hasil mikroskopis</label>
                        <select name="akhir_pengobatan_hasil_mikroskopis" id="akhir_pengobatan_hasil_mikroskopis" class="form-control">

                            <option value="<?= $tb['akhir_pengobatan_hasil_mikroskopis'] ?>"><?= $tb['akhir_pengobatan_hasil_mikroskopis'] ?></option>
                            <option value="Neg">Neg</option>
                            <option value="1-9">1-9</option>
                            <option value="1+">1+</option>
                            <option value="2+">2+</option>
                            <option value="3+">3+</option>
                            <option value="Tidak Dilakuan">Tidak Dilakukan</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="">tanggal_hasil_akhir_pengobatan</label>
                        <input type="date" name="tanggal_hasil_akhir_pengobatan" id="tanggal_hasil_akhir_pengobatan" class="form-control" value="<?= $tb['tanggal_hasil_akhir_pengobatan'] ?>">
                    </div>
                    <div class="col-lg-4">
                        <label for="">hasil akhir pengobatan</label>
                        <select name="hasil_akhir_pengobatan" id="hasil_akhir_pengobatan" class="form-control">
                            <option value="<?= $tb['hasil_akhir_pengobatan'] ?>"><?= $tb['hasil_akhir_pengobatan'] ?></option>
                            <option value="sembuh">sembuh</option>
                            <option value="pengobatan lengkap">Pengobatan Lengkap</option>
                            <option value="lost to follow up">Lost to follow up</option>
                            <option value="meninggal">meninggal</option>
                            <option value="gagal">gagal</option>
                            <option value="tidak dievaluasi">tidak dievaluasi</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="">tgl_lahir</label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?= $tb['tgl_lahir'] ?>" required>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Foto Toraks</label>
                        <select name="foto_toraks" id="foto_toraks" class="form-control">
                            <option value="<?= $tb['foto_toraks'] ?>"><?= $tb['foto_toraks'] ?></option>
                            <option value="positif">positiif</option>
                            <option value="negatif">negatif</option>
                            <option value="tidak dilakuakan">tidak dilakukan</option>
                        </select>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary mt-3 mb-3">Edit</button>
        </div>
        </form>
    </div>

</div>