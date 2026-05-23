<div class="container-fluid">
    <h1 class="h3 mb-4 mt-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <table class="table" id="example" >
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Tgl. Sep</th>
                <th scope="col">No. Sep</th>
                <th scope="col">No. MR</th>
                <th scope="col">Nama Pasein</th>
                <th scope="col">Kelas Rawat</th>
                <th scope="col">BED</th>
                <th scope="col">Ruang Rawat</th>
                <th scope="col">Tipe Masuk</th>
                <th scope="col">Dokter</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Aksi</th>
                
            </tr>
        </thead>
        <tbody>
        <?php
            
            $i=1;
            foreach ($inap as $nap) :
        ?>
            <tr>
                <th scope="row"><?= $i++?></th>
                <td><?= $nap['tgl_sep']?></td> 
                <td><?= $nap['nosep']?></td>
                <td><?= $nap['nomr']?></td>
                <td><?= $nap['nama_pasien']?></td>  
                <td><?= $nap['nm_kls']?></td>
                <td><?= $nap['bed']?></td>
                <td><?= $nap['ruang_rawat']?></td>
                <td><?= $nap['nm_tipe']?></td>
                <td><?= $nap['nm_dokter']?></td>
                <td><?= $nap['nm_ket']?></td>
                <td>
                    <a href="<?= base_url('inap/pulang/')?><?= $nap['nosep']?>" class="badge badge-primary">Pulang</a>
                    <a href="<?= base_url('inap/hapusinap/')?><?= $nap['nosep']?>" class="badge badge-danger">Hapus</a>
                    <a href="<?= base_url('inap/tindakan/')?><?= $nap['nosep']?>" class="badge badge-info">Tindakan</a>
                    <a href="<?= base_url('inap/obat/')?><?= $nap['nosep']?>" class="badge badge-warning">Obat</a>

                    
                </td>
                

            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
</div>

