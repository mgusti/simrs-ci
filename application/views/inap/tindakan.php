<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tindakan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Penunjang Medis</a>
    </li>
    
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="container-fluid mt-3">
            <a href="<?= base_url('inap/inputtindakan/')?><?= $sep?>" class="btn btn-primary mb-3">Tambah</a>
            <table class="table" id="example">   
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Jenis Tindakan</th>
                        <th scope="col">Jenis Pelayanan</th>
                        <th scope="col">Tgl Tindakan</th>
                        <th scope="col">Dokter</th>
                        <th scope="col">Petugas</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                    foreach ($tindakan as $t):

                ?>
                    <tr>
                        <th scope="row"><?= $i++;?></th>
                        <td><?= $t["nama_tindakan"]?></td>
                        <td><?= $t["jenis_pelayanan"]?></td>
                        <td><?= $t["tgl_tindakan"]?></td>
                        <td><?= $t["nm_dokter"]?></td>
                        <td><?= $t["petugas"]?></td>
                    </tr>
                <?php
                    endforeach;
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"> 
        <div class="container-fluid mt-3">
            <a href="<?= base_url('inap/inputaksipenunjang/')?><?= $sep?>" class="btn btn-primary mb-3">Tambah</a>
            <table class="table" id="example">   
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Tgl Permintaan</th>
                        <th scope="col">No Sep</th>
                        <th scope="col">No MR</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Jenis Pelayanan</th>
                        <th scope="col">Penunjang Medis</th>
                        <th scope="col">Status Request</th>
                        <th scope="col">Hasil</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                    foreach ($penunjang as $p):

                ?>
                    <tr>
                        <th scope="row"><?= $i++;?></th>
                        <td><?= $p["tgl_reg"]?></td>
                        <td><?= $p["nosep"]?></td>
                        <td><?= $p["nomr"]?></td>
                        <td><?= $p["nama_pasien"]?></td>
                        <td><?= $p["nama_pelayanan"]?></td>
                        <td><?= $p["jenis_pelayanan"]?></td>
                        <td><?= $p["nama"]?></td>
                        <td><a href="" class="badge badge-info">Hasil</a></td>
                        <td><a href="" class="badge badge-danger">Hapus</a></td>

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