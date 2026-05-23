<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?=$title;?></h1>
    <?=$this->session->flashdata('messege');?>
    <div class="card">
        <div class="card-body">
            <div class="row mt-3 mb-3">
                <div class="col-lg-12">
                    <h1 class="h3 mb-2 text-gray-800">Detail Pasien</h1>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Tanggal</label>
                            <input type="text" class="form-control" value="<?=tanggal_indo($dpjp['tgl'])?>" disabled>
                        </div>
                        <div class="col-lg-6">
                            <label for="">No R.M</label>
                            <input type="text" class="form-control" value="<?=format_mr($dpjp['no_mr'])?>" disabled>
                        </div>
                        <div class="col-lg-6 mt-2">
                            <label for="">Nama Pasien</label>
                            <input type="text" class="form-control" value="<?=$dpjp['nama']?>" disabled>
                        </div>
                        <div class="col-lg-6 mt-2">
                            <label for="">Asal Ruangan</label>
                            <input type="text" class="form-control" value="<?=$dpjp['poli'];?>" disabled>
                        </div>
                        <div class="col-lg-6 mt-2">
                            <label for="">DPJP</label>
                            <input type="text" class="form-control" value="<?=$dpjp['dpjp']?>" disabled>
                        </div>
                        <div class="col-lg-3 mt-2">
                            <label for="">Kelas</label>
                            <input type="text" class="form-control" value="<?=$dpjp['kelas'];?>" disabled>
                        </div>
                        <div class="col-lg-3 mt-2">
                            <label for="" style="visibility: hidden;">Asal Ruangan</label>
                            <button type="button" class="btn btn-warning form-control" data-toggle="modal" data-target="#editDetailPasienModal">Edit Pasien</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-cards" style="display: flex; gap: 20px;">
        <div class="card mt-2" style="width: 100%;">
            <div class="card-body">
                <form action="<?=base_url('billing/simpantindakan')?>" method="post">
                    <h1 class="h3 mb-2 text-gray-800">Form Input Tindakan</h1>
                    <span style="color: grey;">Input Tindakan Seperti Biasa Melalui Form Ini</span>
                    <br>
                    <span style="color: black;"><b>Pilih Jenis Tindakan -> Inputkan Biaya -> Inputkan Keterangan -> Tekan Tombol Tambah Tindakan</b></span>
                    <div class="row mt-3 mb-3">
                        <div class="col-lg-12">
                            <label for="">Jenis Tindakan</label>
                            <select name="tindakan" id="tindakan" class="form-control" required>
                                <option value="">-Pilih-</option>
                                <option value="Biaya Dokter">Biaya Dokter</option>
                                <option value="Biaya Perawatan">Biaya Perawatan</option>
                                <option value="Biaya Tindakan">Biaya Tindakan</option>
                                <option value="Biaya Penunjang Medis">Biaya Penunjang Medis</option>
                                <option value="Biaya Penunjang Non Medis">Biaya Penunjang Non Medis</option>
                                <option value="Biaya Farmasi">Biaya Farmasi</option>
                                <option value="Biaya Lain-lain">Biaya Lain-lain</option>
                            </select>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="biaya">Biaya</label>
                            <input type="text" name="formatted_biaya" id="formatted_biaya" class="form-control" required>
                            <!-- Hidden input untuk menyimpan nilai asli -->
                            <input type="hidden" name="biaya" id="biaya">
                            <!-- Elemen untuk menampilkan pesan error -->
                            <span id="error-message" style="color: red;">Inputan tidak bisa selain angka!</span>
                        </div>
                        <div class="col-lg-12 mt-2" hidden>
                            <label for="">bil</label>
                            <input type="text" name="no_bil" id="no_bil" class="form-control" value="<?=$kode?>" required>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="">Keterangan</label>
                            <textarea name="ket" id="ket" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <?php if ($dpjp['status_verif'] != 1): ?>
                        <button class="btn btn-primary">Tambah Tindakan</button>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <div class="card mt-2" style="width: 100%;">
            <div class="card-body">
                <form action="<?=base_url('billing/simpantindakanranap')?>" method="post">
                    <h1 class="h3 mb-2 text-gray-800">Form Petugas Rawat Inap</h1>
                    <!-- <span style="color: red;"><b>HANYA WAJIB</b> diinputkan <b>petugas rawat inap</b> untuk pasien yang <b>dirawat</b></span> -->
                    <!-- <br> -->
                    <span style="color: red;">Bila Pasien Merupakan <b>PASIEN RANAP</b> inputkan dahulu <b>TANGGAL MASUK</b> (SEGERA), sedangkan untuk <b>tanggal keluar</b> dapat diisi setelah <b>pasien pulang</b> dan tekan simpan kembali </span>
                    <div class="row mt-3 mb-3">
                        <div class="col-lg-12">
                            <label for="">Ruangan Rawat</label>
                            <select name="ruangrawat" id="ruangrawat" class="form-control" required>
                                <option value="" <?=isset($bil['ruang_ranap']) && $bil['ruang_ranap'] == null ? 'selected' : '';?>>-Pilih-</option>
                                <option value="Rawat Inap Bedah" <?=isset($bil['ruang_ranap']) && $bil['ruang_ranap'] == 'Rawat Inap Bedah' ? 'selected' : '';?>>Rawat Inap Bedah</option>
                                <option value="Rawat Inap Anak" <?=isset($bil['ruang_ranap']) && $bil['ruang_ranap'] == 'Rawat Inap Anak' ? 'selected' : '';?>>Rawat Inap Anak</option>
                                <option value="Rawat Inap Gabung" <?=isset($bil['ruang_ranap']) && $bil['ruang_ranap'] == 'Rawat Inap Gabung' ? 'selected' : '';?>>Rawat Inap Gabung</option>
                                <option value="Rawat Inap Penyakit Dalam" <?=isset($bil['ruang_ranap']) && $bil['ruang_ranap'] == 'Rawat Inap Penyakit Dalam' ? 'selected' : '';?>>Rawat Inap Penyakit Dalam</option>
                                <option value="Rawat Inap Syaraf" <?=isset($bil['ruang_ranap']) && $bil['ruang_ranap'] == 'Rawat Inap Syaraf' ? 'selected' : '';?>>Rawat Inap Syaraf</option>
                                <option value="Rawat Inap Jantung" <?=isset($bil['ruang_ranap']) && $bil['ruang_ranap'] == 'Rawat Inap Jantung' ? 'selected' : '';?>>Rawat Inap Jantung</option>
                                <option value="Rawat Inap Mata" <?=isset($bil['ruang_ranap']) && $bil['ruang_ranap'] == 'Rawat Inap Mata' ? 'selected' : '';?>>Rawat Inap Mata</option>
                                <option value="Rawat Inap THT" <?=isset($bil['ruang_ranap']) && $bil['ruang_ranap'] == 'Rawat Inap THT' ? 'selected' : '';?>>Rawat Inap THT</option>
                                <option value="Rawat Inap Kulit" <?=isset($bil['ruang_ranap']) && $bil['ruang_ranap'] == 'Rawat Inap Kulit' ? 'selected' : '';?>>Rawat Inap Kulit</option>
                                <option value="Rawat Inap Paru" <?=isset($bil['ruang_ranap']) && $bil['ruang_ranap'] == 'Rawat Inap Paru' ? 'selected' : '';?>>Rawat Inap Paru</option>
                                <option value="Rawat Inap Perinatologi" <?=isset($bil['ruang_ranap']) && $bil['ruang_ranap'] == 'Rawat Inap Perinatologi' ? 'selected' : '';?>>Rawat Inap Perinatologi</option>
                                <option value="Rawat Inap VK" <?=isset($bil['ruang_ranap']) && $bil['ruang_ranap'] == 'Rawat Inap VK' ? 'selected' : '';?>>Rawat Inap VK</option>
                                <option value="Rawat Inap ICU" <?=isset($bil['ruang_ranap']) && $bil['ruang_ranap'] == 'Rawat Inap ICU' ? 'selected' : '';?>>Rawat Inap ICU</option>
                                <option value="Rawat Inap VIP" <?=isset($bil['ruang_ranap']) && $bil['ruang_ranap'] == 'Rawat Inap VIP' ? 'selected' : '';?>>Rawat Inap VIP</option>
                                <option value="Rawat Inap Fisioterapi" <?=isset($bil['ruang_ranap']) && $bil['ruang_ranap'] == 'Rawat Inap Fisioterapi' ? 'selected' : '';?>>Rawat Inap Fisioterapi</option>


                            </select>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="tanggal_masuk_ranap">Tanggal Masuk Ranap</label>
                            <input type="date" name="tanggal_masuk_ranap" id="tanggal_masuk_ranap" class="form-control" value="<?=isset($bil['tgl_masuk_ranap']) ? $bil['tgl_masuk_ranap'] : '';?>" required>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="tanggal_keluar_ranap">Tanggal Keluar Ranap</label>
                            <input type="date" name="tanggal_keluar_ranap" id="tanggal_keluar_ranap" class="form-control" value="<?=isset($bil['tgl_keluar_ranap']) ? $bil['tgl_keluar_ranap'] : '';?>">
                            <span style="color: red;">*Jangan inputkan tanggal keluar ranap bila seluruh inputan belum selesai ditambahkan.</span>

                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="">Keterangan (Boleh diisi atau tidak)</label>
                            <textarea name="ket" id="ket" cols="30" rows="3" class="form-control"><?=isset($bil['ket_ranap']) ? htmlspecialchars($bil['ket_ranap']) : '';?></textarea>

                        </div>

                        <div class="col-lg-12 mt-2">
                            <label for="">Rawat Intensive?</label>
                            <select name="rawat_intensive" id="rawat_intensive" class="form-control" required>
                                <option value="0" <?=(isset($bil['is_intensive']) && $bil['is_intensive'] == 0) ? 'selected' : '';?>>Tidak</option>
                                <option value="1" <?=(isset($bil['is_intensive']) && $bil['is_intensive'] == 1) ? 'selected' : '';?>>Iya</option>
                            </select>
                        </div>
                        <div class="col-lg-12 mt-2" hidden>
                            <label for="">bil</label>
                            <input type="text" name="no_bil" id="no_bil" class="form-control" value="<?=$bil['no']?>">
                        </div>
                    </div>
                    <?php if ($dpjp['status_verif'] != 1): ?>
                        <button class="btn btn-warning" style="color: white; background-color: orange;">Simpan</button>
                        <a href="<?=base_url('billing/hapusTindakanRanap/' . $bil['no'])?>" class="btn btn-danger">Hapus</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <div class="card mt-2" style="width: 100%;">
        <div class="card-body">
            <div class="row mt-3 mb-3">
            <div class="col-lg-4">
    <label for="">Nama Verifikator Kasir</label><br>
    <strong><?=htmlspecialchars($verifikator['name'])?></strong>
</div>

<div class="col-lg-4">
    <label for="">Waktu Verifikasi</label><br>
    <strong><?=tanggal_indo($dpjp['waktu_verif'])?></strong>
</div>


                <div class="col-lg-4">
    <label for="">Status Verifikasi</label><br>
    <?php if ($dpjp['status_verif'] == 1): ?>
        <span class="btn btn-sm btn-success">SUDAH DIVERIFIKASI</span>
    <?php else: ?>
       <span class="btn btn-sm btn-danger">BELUM DIVERIFIKASI</span>
    <?php endif; ?>
</div>

            </div>

            <!-- <?php $session_is = strtolower($user['subbidang']); ?> -->
            <!-- Tombol cetak hanya muncul jika subbidang user adalah "Kasir" -->
            <a href="<?=base_url('billing/cetaktagihanpoli/') . $kode?>" class="btn btn-success" target="_blank">
                <i class="fa fa-print"></i> Cetak
            </a>

            <?php if ($user['is_verif'] == 1 && $dpjp['status_verif'] != 1): ?>
                <a href="<?=base_url('billing/verifikasi/') . $kode?>" class="btn btn-warning">
                    <i class="fa fa-check"></i> Verfikasi
                </a>
            <?php endif; ?>

            <?php if ($user['is_verif'] == 1 && $dpjp['status_verif'] == 1): ?>
                <a href="<?=base_url('billing/batalverifikasi/') . $kode?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Batal Verfikasi
                </a>
            <?php endif; ?>

            <a href="#" class="btn btn-info" onclick="closeTab()">Tutup</a>
        </div>
    </div>

    <table id="example2" class="table table-striped table-bordered" style="width: 100%; text-align: center; vertical-align: middle;">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal Input</th>
                <th>Jenis Tindakan</th>
                <th>Biaya</th>
                <th>Keterangan</th>
                <th>Petugas Input</th>
                <th>Asal Petugas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
$no = 1;
$session_petugas_id = $user['id'];
foreach ($tindakan as $t):
?>
                <tr>
                    <td>
                        <?=$no++?>
                    </td>
                    <td><?=tanggal_indo($t['tgl_input'])?></td>
                    <td><?=$t['jenis_tindakan']?></td>
                    <td> <?="Rp. " . number_format($t['biaya'], 2, ',', '.');?></td>
                    <td> <?=$t['keterangan']?></td>
                    <td><?=!empty($t['petugas_nama']) ? $t['petugas_nama'] : $t['petugas']?></td>
                    <td><?=$t['subbidang']?></td>
                    <td>
                        <?php if ($session_petugas_id == $t['petugas'] && $dpjp['status_verif'] != 1): ?>
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editTindakanModal"
                                data-kode="<?=$kode?>"
                                data-id="<?=$t['no'];?>"
                                data-tindakan="<?=$t['jenis_tindakan'];?>"
                                data-biaya="<?=$t['biaya'];?>"
                                data-keterangan="<?=$t['keterangan'];?>">Edit
                            </a>
                            <a href="<?=base_url('billing/hapustindakan/') . $t['no'] . '/' . $kode?>" class="btn btn-danger">Hapus</a>
                        <?php elseif ($dpjp['status_verif'] == 1): ?>
                            <span class="text-success">Tindakan Telah Diverifikasi Kasir</span>
                        <?php else: ?>
                            <span class="text-danger">Hanya bisa dihapus/diedit oleh petugas yang menginput</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php
endforeach;
?>
        </tbody>
    </table>
</div>

<!-- Modal Edit Detail Pasien -->
<div class="modal fade" id="editDetailPasienModal" tabindex="-1" role="dialog" aria-labelledby="editDetailPasienLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDetailPasienLabel">Edit Detail Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url('billing/aksieditbilling/') . $bil['no']?>" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?=$dpjp['tgl']?>" required>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="">No R.M</label>
                            <input type="number" name="nomr" id="nomr" class="form-control" value="<?=$dpjp['no_mr']?>" required>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" onkeyup="this.value = this.value.toUpperCase()" value="<?=$dpjp['nama']?>" required>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="">Ruangan Masuk</label>
                            <select name="poli" id="poliedit" class="form-control" required>
                                <?php foreach ($poli as $p): ?>
                                    <?php if ($p['nama_poli'] === "IGD"): ?>
                                        <option value="IGD" <?=$dpjp['poli'] == "IGD" ? "selected" : ""?>>IGD</option>
                                    <?php elseif ($p['nama_poli'] === "Rawat Inap Perinatologi"): ?>
                                        <option value="Rawat Inap Perinatologi" <?=$dpjp['poli'] == "Rawat Inap Perinatologi" ? "selected" : ""?>>Rawat Inap Perinatologi</option>
                                    <?php else: ?>
                                        <option value="Poli <?=$p['nama_poli']?>" <?=$dpjp['poli'] == "Poli {$p['nama_poli']}" ? "selected" : ""?>>Poli <?=$p['nama_poli']?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="">Kelas</label>
                            <select name="kelas" class="form-control" id="kelasedit" required>
                                <option value="<?=$dpjp['kelas']?>"><?=$dpjp['kelas']?></option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                            </select>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="">DPJP</label>
                            <select name="dok" id="dok1" class="form-control" required>
                                <option value="<?=$dpjp['dpjp']?>"><?=$dpjp['dpjp']?></option>
                                <?php foreach ($dktr as $d): ?>
                                    <option value="<?=$d['nm_dokter']?>"><?=$d['nm_dokter']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Tindakan -->
<div class="modal fade" id="editTindakanModal" tabindex="-1" role="dialog" aria-labelledby="editTindakanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTindakanLabel">Edit Tindakan Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url('billing/edittindakan/')?>" method="post" id="editTindakanForm">
                    <div class="row">
                        <input type="hidden" name="no" id="no">
                        <input type="hidden" name="kode" id="kode">
                        <div class="col-lg-12">
                            <label for="tindakan">Jenis Tindakan</label>
                            <select name="tindakan" id="tindakan" class="form-control">
                                <option value="Biaya Dokter">Biaya Dokter</option>
                                <option value="Biaya Perawatan">Biaya Perawatan</option>
                                <option value="Biaya Tindakan">Biaya Tindakan</option>
                                <option value="Biaya Penunjang Medis">Biaya Penunjang Medis</option>
                                <option value="Biaya Penunjang Non Medis">Biaya Penunjang Non Medis</option>
                                <option value="Biaya Farmasi">Biaya Farmasi</option>
                                <option value="Biaya Lain-lain">Biaya Lain-lain</option>
                            </select>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="biaya">Biaya Tindakan</label>
                            <input type="text" name="biaya" id="biaya" class="form-control">
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" name="keterangan" id="keterangan" class="form-control">
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