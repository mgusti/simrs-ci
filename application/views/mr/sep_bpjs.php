<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <a href="<?= base_url('mr/sepbaru/' . $pasien["no_rekam_medis"] . '?mrnosep=')?>" class="btn btn-primary mb-4">SEP BARU</a><br>
    <small style="color:red">* catatan tabel SEP dibawah merupakan Data SEP yang pernah berobat di RSUD H.Abdul Manap sejak diterbitkan aplikasi SIMRS </small><br>
   
        <?= $this->session->flashdata('messege'); ?>
    <table class="table" id="example">
        <thead>
            <tr>
            <th scope="col">No.</th>
            <th scope="col">No. SEP</th>
            <th scope="col">Tgl Daftar</th>
            <th scope="col">Tgl Pulang</th>
            <th scope="col">Tgl SEP</th>
            <th scope="col">Jenis Pelayanan</th>
            <th scope="col">No. Rujukan</th>
            <th scope="col">Kelas</th>
            <th scope="col">Diagnosa Awal</th>
            <th scope="col">Jenis Peserta</th>
            <th scope="col">Poli</th>
           


            <th scope="col">Aksi</th>

            </tr>
        </thead>
        <tbody>
        <?php
            $i=1;
            foreach ($sep as $s) :
        ?>
            <tr>
            <th scope="row"><?= $i++?></th>
            <td><?= $s['nosep']?></td>
            <td><?= $s['tgl_masuk']?></td>
            <td><?= $s['tgl_pulang']?></td>
            <td><?= $s['tgl_sep']?></td>
            <td><?= $s['jnspelayanan']?></td>
            <td><?= $s['norujukan']?></td>
            <td><?= $s['kelas']?></td>
            <td><?= $s['diagnosa']?></td>
            <td><?= $s['jnspeserta']?></td>
            <td><?= $s['poli']?></td>
            


            
            <td>
                <a href="<?= base_url('pendaftaran/hapussep/')?><?= $s['nosep']?>" class="badge badge-danger">Hapus</a>
                
            </td>
            </td>

            
            
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
</div>