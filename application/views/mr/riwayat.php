<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Riwayat Kunjungan</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Riwayat Obat</a>
            
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="container-fluid mt-3">
                <a href="<?= base_url('mr/lappasien/')?><?= $nomr?>" target="_blank" class="btn btn-danger mt-3 mb-3">EXCEL</a>
                <a href="<?= base_url('mr/datapasien')?>" class="btn btn-info">Kembali</a>
                <table class="table table-responsive-lg" id="example">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">No SEP</th>
                    <th scope="col">No MR</th>
                    <th scope="col">No BPJS</th>
                    <th scope="col">Tgl SEP</th>
                    <th scope="col">Tgl Pulang</th>
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">Jenis Rawat</th>
                    <th scope="col">Bidang Pelayanan</th>
                    <th scope="col">Diagnosa</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i=1;
                    foreach($sep as $s):
                ?>
                    <tr>
                        <th scope="row"><?= $i++?></th>
                        <td><?= $s['nosep']?></td>
                        <td><?= $s['nomr']?></td>
                        <td><?= $s['nokartu']?></td>
                        <td><?= $s['tgl_sep']?></td>
                        <td><?= $s['tgl_pulang']?></td>
                        <td><?= $s['nama']?></td>
                        <td><?= $s['jnspelayanan']?></td>
                        <td><?= $s['poli']?></td>
                        <td><?= $s['diagnosa']?></td>

                    </tr>
                    <?php
                        endforeach;
                    ?>
                </tbody>
                </table>
            
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="container-fluid mt-3">
                <a href="" class="btn btn-danger mt-3 mb-3">EXCEL</a>
                <a href="<?= base_url('pendaftaran/datapasien')?>" class="btn btn-info">Kembali</a>
                <table class="table table-responsive-lg" id="example2">
                    <thead>
                        <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Tgl Pemberian Obat</th>
                        <th scope="col">Kode Obat</th>
                        <th scope="col">Waktu Pemberian Obat</th>
                        <th scope="col">Jumlah Obat</th>
                        <th scope="col">Satuan</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i=1;
                        foreach($obat as $o):
                    ?>
                        <tr>
                            <th scope="row"><?= $i++?></th>
                            <td><?= $s['tgl_pemberian']?></td>
                            <td><?= $s['kd_obat']?></td>
                            <td><?= $s['waktu_obat']?></td>
                            <td><?= $s['jumlah_obat']?></td>
                            <td><?= $s['satuan']?></td>
                        

                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
            
            </div>
        </div>
        
    </div>
</div>