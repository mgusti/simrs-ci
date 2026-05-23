<div class="container-fluid">
    <h1 class="h3 mb-4 mt-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <table class="table table-responsive-lg" id="example">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Nama Dokter</th>
                <th scope="col">Poli</th>
                <th scope="col">Hari Kerja</th>
                <th scope="col">Jam Mulai</th>
                <th scope="col">Jam Selesai</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
            foreach($jadwal as $j):
        ?>
            <tr>
                <td><?= $i++?></td>
                <td><?= $j['nm_dokter']?></td>
                <td><?= $j['nama_poli']?></td>
                <td><?= $j['hari_kerja']?></td>
                <td><?= $j['jam_mulai']?></td>
                <td><?= $j['jam_selesai']?></td>
            </tr>
            <?php
            endforeach;
        ?>
        </tbody>
        
    </table>
</div>