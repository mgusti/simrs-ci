<div class="container-fluid">
    <h1 class="h3 mb-4 mt-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <table id="example" class="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Kode Kelas</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Kode Ruang</th>
                <th scope="col">Ruang Rawat</th>
                <th scope="col">Tersedia</th>
                <th scope="col">Total Bed</th>
                <th scope="col">Tersedia Pria</th>
                <th scope="col">Tersedia Wanita</th>
                <th scope="col">Tersedia Prida & Wanita</th>
                <th scope="col">Action</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                foreach($aplicare as $ap) :

            ?>

            <tr>
                <th scope="row"><?= $i++?></th>
                <td><?= $ap['kelas']?></td>
                <td><?= $ap['nm_kls']?></td>
                <td><?= $ap['nmsub']?></td>
                <td><?= $ap['subbidang']?></td>
                <td><?= $ap['tersedia']?></td>
                <td><?= $ap['total_bed']?></td>
                <td><?= $ap['laki']?></td>
                <td><?= $ap['wanita']?></td>
                <td><?= $ap['lp']?></td>
                <td>
                    <a href="<?= base_url('inap/insertapp')?>?kelas=<?= $ap['kelas']?>&ruang=<?=$ap['subbidang']?>&nmruang=<?=$ap['nmsub']?>&tersedia=<?=$ap['tersedia']?>&total=<?=$ap['total_bed']?>&laki=<?=$ap['laki']?>&wanita=<?=$ap['wanita']?>&lp=<?=$ap['lp']?>" class="badge badge-primary">Simpan</a>
                </td>
                
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
</div>