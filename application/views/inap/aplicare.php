
<?php
    include "php/ap_tersediakamar.php";
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 mt-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <table class="table" id="example">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Kelas</th>
                <th scope="col">Ruang Rawat</th>
                <th scope="col">Kode Ruang</th>

                <th scope="col">Tersedia</th>
                <th scope="col">Kapasitas</th>
                <th scope="col">Tersedia Pria</th>
                <th scope="col">Tersedia Wanita</th>
                <th scope="col">Last Update</th>
                <th scope="col">Action</th>
                
                

            </tr>
        </thead>

        <tbody>
            <?php
            $i = 1;
                foreach ($tes["response"]["list"] as $p) :
            ?>
            <tr>
                <th scope="row"><?= $i++?></th>
                <td><?= $p['namakelas']?></td>
                <td><?= $p['namaruang']?></td>
                <td><?= $p['koderuang']?></td>
                <td><?= $p['tersedia']?></td>
                <td><?= $p['kapasitas']?></td>
                <td><?= $p['tersediapria']?></td>
                <td><?= $p['tersediawanita']?></td>
                <td><?= $p['lastupdate']?></td>
                <td>
                    <a href="<?= base_url('inap/hapusaplicare?kls=')?><?=$p['kodekelas']?>&ruang=<?=$p['koderuang']?>" class="badge badge-danger">Hapus</a>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
</div>