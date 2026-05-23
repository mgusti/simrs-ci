<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <a href="<?= base_url('mr/pasienbaru')?>" class="btn btn-primary mb-4">Pasien Baru</a>
    <?= $this->session->flashdata('messege'); ?>

    <div class="container-fluid">
        <form action="<?= base_url('mr/datapasien')?>" method="post">
            <div class="row">
                <div class="col-lg-3">
                    <label for="">Cari Data</label>
                    <input type="text" class="form-control" id="key" name="key" value="" placeholder="NIK/MR/Nobpjs">
                </div>
            </div>
            <button class="btn btn-danger mt-3 mb-3" id="caripasienb">Cari</button>
        </form>
    </div>

    <table class="table">
        <thead>
        <tr>
                <th scope="col">No.</th>
                <th scope="col">No Rekam Medis</th>
                <th scope="col">No KTP</th>
                <th scope="col">No BPJS</th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Jensi Kelamin</th>
                <th scope="col">Tgl Lahir</th>
                <th scope="col">Aksi</th>

            </tr>
        </thead>
        <tbody>
        <?php
            $i=1;

            foreach ($pasien as $p) :
                

                
        ?>
            <tr>
                <th scope="row"><?= $i++?></th>
                <td><?= $p["no_rekam_medis"]?></td> 
                <td><?= $p["no_ktp"]?></td>
                <td><?= $p["nokartu"]?></td>
                <td><?= $p["nama_pasien"]?></td>
                <td><?= $p["jenkel"]?></td>
                <td><?= $p["tgl_lahir"]?></td>
                <td>
                    <a href="<?= base_url('mr/detailpasien/')?><?= $p['no_rekam_medis']?>" class="badge badge-info">detail</a>
                    <a href="<?= base_url('mr/hapus/')?><?= $p['no_rekam_medis']?>" class="badge badge-danger">Hapus</a>
                    <a href="<?= base_url('mr/riwayat/')?><?= $p['no_rekam_medis']?>" class="badge badge-primary">Riwayat</a>
                    <a href="<?= base_url('mr/sep_bpjs/')?><?= $p['no_rekam_medis']?>" class="badge badge-warning">SEP</a>
                    
                </td>
                
            </tr>
            <?php
                
                endforeach;
            
            ?>
        </tbody>
    </table>
</div>