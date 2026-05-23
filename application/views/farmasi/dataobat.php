<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <a href="<?= base_url('farmasi/iobat')?>" class="btn btn-primary mb-3">Tambah</a>

<div class="table-responsive-sm">
        <table class="table" id="example">
            <thead>
                <tr>
                    <th scope="col" >No.</th>
                    <th scope="col" >Kode Obat</th>
                    <th scope="col" >Nama Obat</th>
                    <th scope="col" >Satuan</th>
                    
                    <th scope="col" >Kapasitas</th>
                    <th scope="col" >Exp Date</th>
                    <th scope="col" >Action</th>
                </tr>
            </thead>
            <tbody>
            
            <?php
                    $i= 1;
                    foreach($obat as $t) :

                ?>
                    <tr>
                        <th scope="row"><?= $i++?></th>
                        <td><?= $t['kode_brng']?></td>
                        <td><?= $t['nama_brng']?></td>
                        <td><?= $t['satuan']?></td>
                        
                        <td><?= $t['kapasitas']?></td>
                        <td><?= $t['expire']?></td>
                        <td>
                            <a href="" class="badge badge-danger">Hapus</a>
                            <a href="" class="badge badge-warning">Edit</a>
                        </td>

                        
                    </tr>
                    
                
                <?php
                    endforeach;
                ?>
            </tbody>
        </table>
    </div>

    
    
</div>