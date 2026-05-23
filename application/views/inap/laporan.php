<div class="container-fluid">
    <h1 class="h3 mb-4 mt-4 text-gray-800"><?= $title; ?> </h1>
    <?= $this->session->flashdata('messege'); ?>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Keadaan Pasien R. Inap</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Rekap Inap</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Laporan Tindakan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="diag-tab" data-toggle="tab" href="#diag" role="tab" aria-controls="diag" aria-selected="false">Diagnosa</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <br>
            <h4>Keadaan Pasien Rawat Inap</h4>
            
            <form action="<?= base_url('inap/laporan')?>" method="post">
                <div class="row">
                    <div class="col-lg-2">
                        <label for="">Tgl</label>
                        <input type="text" class="form-control" value="" name="tgl_mulai" id="tgl_mulai" data-provide="datepicker" data-date-format="yyyy-mm-dd" autocomplete='off'>
                    </div>
                    
                </div>
                    <button class="btn btn-info mt-3 mb-3">Cari</button>
                    <a class="btn btn-danger" target="_blank" href="<?= base_url('inap/lapkeadaanpasien/')?><?= $tgl?>" id="btnexcel1">Excel</a>
            </form>
            
            <li class="mb-3">Pasien Masuk</li>
            
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Tgl Masuk</th>
                    <th scope="col">No MR</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Cara Masuk</th>
                    <th scope="col">Diagnosa</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Dokter</th>
                    
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i = 1;

                    foreach ($inap as $nap):
                ?>
                    <tr>
                        <th scope="row"><?= $i++?></th>
                        <td><?= $nap['tgl_sep']?></td>
                        <td><?= $nap['nomr']?></td>
                        <td><?= $nap['nama_pasien']?></td>
                        <td><?= $nap['jenkel']?></td>
                        <td><?= $nap['nm_tipe']?></td>
                        <td><?= $nap['diagnosa']?></td>
                        <td><?= $nap['nm_ket']?></td>
                        <td><?= $nap['nm_dokter']?></td>
                    </tr>
                </tbody>
                <?php
                    endforeach;
                ?>
            </table>

            <li>Pasien Keluar</li>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Tgl Pulang</th>
                    <th scope="col">No MR</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Cara Keluar</th>
                    <th scope="col">Pasca Pulang</th>
                    <th scope="col">Lama Rawat</th>
                    
                    
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i = 1;

                    foreach ($pulang as $nap):
                ?>
                    <tr>
                        <th scope="row"><?= $i++?></th>
                        <td><?= $nap['tgl_pulang']?></td>
                        <td><?= $nap['nomr']?></td>
                        <td><?= $nap['nama']?></td>
                        <td><?= $nap['kelamin']?></td>
                        <td><?= $nap['nm_pulang']?></td>
                        <td><?= $nap['nm_pasca']?></td>
                        <td><?= $nap['lama_rawat']?> hari</td>
                        
                    </tr>
                </tbody>
                <?php
                    endforeach;
                ?>
            </table>
            
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <br>
                <h4>Rekap Pasien Rawat Inap</h4>
            <br>
            <form action="<?= base_url('inap/laprekapinap')?>" method="post">
                <div class="row">
                    <div class="col-lg-2">
                        <label for="">Dari Tgl </label>
                        <input type="text" class="form-control" value="" name="tgl_mulai2" id="tgl_mulai2" data-provide="datepicker" data-date-format="yyyy-mm-dd" autocomplete='off'>
                    </div>
                    <div class="col-lg-2">
                        <label for="">Sampai Tgl</label>
                        <input type="text" class="form-control" value="" name="tgl_akhir2" id="tgl_akhir2" data-provide="datepicker" data-date-format="yyyy-mm-dd" autocomplete='off'>
                    </div>
                </div>
                
                    
                    <button class="btn btn-danger mt-3"  id="1">Excel</button>
            </form>
            <hr>
            <br>
                <h4>Rekap Pasien Pulang</h4>
            <br>
            <form action="<?= base_url('inap/laprekappulang')?>" method="post">
                <div class="row">
                    <div class="col-lg-2">
                        <label for="">Dari Tgl </label>
                        <input type="text" class="form-control" value="" name="tgl_mulai3" id="tgl_mulai3" data-provide="datepicker" data-date-format="yyyy-mm-dd" autocomplete='off'>
                    </div>
                    <div class="col-lg-2">
                        <label for="">Sampai Tgl</label>
                        <input type="text" class="form-control" value="" name="tgl_akhir3" id="tgl_akhir3" data-provide="datepicker" data-date-format="yyyy-mm-dd" autocomplete='off'>
                    </div>
                </div>
                    <button class="btn btn-danger mt-3"  id="2">Excel</button>
            </form>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <br>
                <h4>Laporan Tindakan</h4>
            <br>
            <form action="<?= base_url('inap/laptindakan')?>" method="post">
                <div class="row">
                    <div class="col-lg-2">
                        <label for="">Dari Tgl </label>
                        <input type="text" class="form-control" value="" name="tgl_mulai4" id="tgl_mulai4" data-provide="datepicker" data-date-format="yyyy-mm-dd" autocomplete='off'>
                    </div>
                    <div class="col-lg-2">
                        <label for="">Sampai Tgl</label>
                        <input type="text" class="form-control" value="" name="tgl_akhir4" id="tgl_akhir4" data-provide="datepicker" data-date-format="yyyy-mm-dd" autocomplete='off'>
                    </div>
                </div>
                    <button class="btn btn-danger mt-3"  id="3">Excel</button>
            </form>
        </div>
        <div class="tab-pane fade" id="diag" role="tabpanel" aria-labelledby="diag-tab">
        <br>
                <h4>Laporan Diagnosa Terbanyak</h4>
            <br>
            <form action="<?= base_url('inap/lapdiag')?>" method="post">
                <div class="row">
                    <div class="col-lg-2">
                        <label for="">Dari Tgl </label>
                        <input type="text" class="form-control" value="" name="tgl_mulai5" id="tgl_mulai4" data-provide="datepicker" data-date-format="yyyy-mm-dd" autocomplete='off'>
                    </div>
                    <div class="col-lg-2">
                        <label for="">Sampai Tgl</label>
                        <input type="text" class="form-control" value="" name="tgl_akhir5" id="tgl_akhir4" data-provide="datepicker" data-date-format="yyyy-mm-dd" autocomplete='off'>
                    </div>
                </div>
                    <button class="btn btn-danger mt-3"  id="3">Excel</button>
            </form>
        </div>
    </div>
    
</div>