<div class="container-fluid">
     <?=$this->session->flashdata('messege');?>
    <h1 class="h3 mb-4 text-gray-800"><?=$title;?> Buka</h1>
    <a href="" class="btn btn-primary mb-3 mt-3" data-toggle="modal" data-target="#createModal">Tambah</a>
    <a href="<?=base_url('pendaftaran/bukajadwaldokter')?>" class="btn btn-warning mb-3 mt-3">Buka Semua</a>
    <a href="<?=base_url('pendaftaran/tutupjadwaldokter')?>" class="btn btn-danger mb-3 mt-3">Tutup Semua</a>
    <table class="table table-bordered table-striped table-responsive-sm" id="example">
        <thead>
            <tr>
                <th>NO.</th>
                <th>DOKTER</th>
                <th>KLINIK</th>
                <th>HARI KERJA</th>
                <th>JAM MULAI</th>
                <th>JAM TUTUP</th>
                <th>AKTIVASI</th>
                <th>EDIT</th>
                <th>HAPUS</th>
            </tr>
        </thead>
        <tbody>
            <?php
$i = 1;
foreach ($jadwal as $p):
?>
             <?php if ($p['aktivasi'] == 'B'): ?>
                <tr>
                    <th><?=$i++?></th>
                    <td><?=$p['nmd']?></td>
                    <td><?=$p['nmp']?></td>
                    <td><?=$p['hari_kerja']?></td>
                    <td><?=$p['jam_mulai']?></td>
                    <td><?=$p['jam_selesai']?></td>
                    <td>BUKA</td>

                    <td><a href="<?=base_url('pendaftaran/editjadwaldokter/') . $p['ids']?>" class="btn btn-warning">EDIT</a></td>
                    <td><a href="<?=base_url('pendaftaran/hapusjadwal/') . $p['ids']?>" class="btn btn-danger">HAPUS</a></td>

                </tr>
                <?php endif; ?>
            <?php
endforeach;
?>
        </tbody>
    </table>
</div>

<div class="container-fluid">
    <h1 class="h3 mt-5 mb-4 text-gray-800"><?=$title;?> Tutup</h1>
    <table class="table table-bordered table-striped table-responsive-sm" id="example">
        <thead>
            <tr>
                <th>NO.</th>
                <th>DOKTER</th>
                <th>KLINIK</th>
                <th>HARI KERJA</th>
                <th>JAM MULAI</th>
                <th>JAM TUTUP</th>
                <th>AKTIVASI</th>
                <th>EDIT</th>
                <!-- <th>HAPUS</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
$i = 1;
foreach ($jadwal as $p):
?>
            <?php if ($p['aktivasi'] == 'T'): ?>
                <tr>
                    <th><?=$i++?></th>
                    <td><?=$p['nmd']?></td>
                    <td><?=$p['nmp']?></td>
                    <td><?=$p['hari_kerja']?></td>
                    <td><?=$p['jam_mulai']?></td>
                    <td><?=$p['jam_selesai']?></td>
                    <td>TUTUP</td>
                    <td><a href="<?=base_url('pendaftaran/editjadwaldokter/') . $p['ids']?>" class="btn btn-warning">EDIT</a></td>
                    <!-- <td><a href="<?=base_url('pendaftaran/hapusjadwal/') . $p['ids']?>" class="btn btn-danger">HAPUS</a></td> -->
                </tr>
                <?php endif; ?>
            <?php
endforeach;
?>
        </tbody>
    </table>
</div>


<div class="container-fluid">
    <h1 class="h3 mt-5 mb-4 text-gray-800">Tanggal Penutupan Pendaftaran </h1>

    <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Tambahkan jadwal Tutup</h5>
                <p>*tanggal yang diinput adalah hari tidak diizinkan daftar, misalkan hari kamis libur maka tutup pendaftaran pada hari rabu</p>
                <form class="form-inline" action="<?=base_url('pendaftaran/tutupJadwalPendaftaran')?>" method="post">
                    <div class="form-group mr-2">
                        <label for="dateInput" class="mr-2">Tanggal</label>
                        <input type="date" class="form-control" id="dateInput" name="tanggal_tutup" required>
                    </div>
                    <div class="form-group mr-2">
                        <label for="textInput" class="mr-2">Keterangan</label>
                        <input type="text" class="form-control" id="textInput" name="keterangan">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    <table class="table table-bordered table-striped table-responsive-sm" id="example">
        <thead>
            <tr>
                <th>NO.</th>
                <th>TANGGAL PENUTUPAN</th>
                <th>KETERANGAN</th>
                <th>BATAL</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($tutup_poli != null): ?>
        <?php
$i = 1;
foreach ($tutup_poli as $tp):
?>
                <tr>
                    <th><?=$i++?></th>
                    <td><?=$tp['tanggal_tutup']?></td>
                    <td><?=$tp['keterangan']?></td>
                    <td><a href="<?=base_url('pendaftaran/batalTutupJadwal/') . $tp['id']?>" class="btn btn-danger">BATALKAN</a></td>
                </tr>
            <?php
endforeach;
?>
               <?php endif; ?>
        </tbody>
    </table>
</div>



<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url('pendaftaran/inputjadwaldokter')?>" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Dokter</label>
                            <select name="dok" class="form-control">
                                <option value="">-Pilih-</option>
                                <?php
foreach ($dktr as $d):
?>
                                    <option value="<?=$d['id']?>"><?=$d['nm_dokter']?></option>
                                <?php
endforeach;
?>
                            </select>
                        </div>

                        <div class="col-lg-12">
                            <label for="">Klinik</label>
                            <select name="poli" class="form-control">
                                <option value="">-Pilih-</option>
                                <?php
foreach ($poli as $p):
?>
                                    <option value="<?=$p['id']?>"><?=$p['nama_ruangan']?></option>
                                <?php
endforeach;
?>
                            </select>
                        </div>

                        <div class="col-lg-12">
                            <label for="">Hari Kerja</label>
                            <select name="hari" id="hari" class="form-control">
                                <option value="">-Pilih-</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label for="">Jam Buka</label>
                            <input type="time" name="mulai" id="mulai" class="form-control">
                        </div>
                        <div class="col-lg-12">
                            <label for="">Jam Tutup</label>
                            <input type="time" name="tutup" id="tutup" class="form-control">
                        </div>
                        <div class="col-lg-12">
                            <label for="">Aktivasi</label>
                            <select name="aktivasi" id="aktivasi" class="form-control">
                                <option value="">-Pilih-</option>
                                <option value="B">Buka</option>
                                <option value="T">Tutup</option>
                            </select>
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