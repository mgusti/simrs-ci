<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>
    
    <table class="table table-responsive-md text-center" id="example">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tgl Pengadaan</th>
                <th scope="col">Nama Paket</th>
                <th scope="col">Vendor</th>
                <th scope="col">Nilai</th>
                <th scope="col">No Pengadaan</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
               
            </tr>
        </thead>
       <?php
       $i= 1;
        foreach ($pengadaan as $p):
       ?>
        <tbody>
            <tr>
                <th scope="row"><?= $i++?></th>
                <td><?= $p['tgl']?></td>
                <td><?= $p['paket']?></td>
                <td><?= $p['vendor']?></td>
                <td><?= 'Rp . ' . number_format($p['nilai'],2,',','.')?></td>
                <td><?= $p['no_pengadaan']?></td>
                <td><?= $p['status']?></td>
                <td>
                    <a href="<?= base_url('admin/editpengadaan/')?><?= $p['no']?>" class="badge badge-warning" >Edit</a>
                    <a href="<?= base_url('admin/hapuspeng/')?><?= $p['no']?>" class="badge badge-danger" >Hapus</a>
                </td>
            </tr>
        </tbody>
        <?php
            endforeach;
        ?>
        
    </table>
</div>