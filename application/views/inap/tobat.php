<div class="container-fluid">
    <h1 class="h3 mb-4 mt-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <table class="table text-center" id="example" border="1">
        <thead>
            <tr>
                <th scope="col" rowspan="3">No.</th>
                <th scope="col" rowspan="3">Kode Obat</th>
                <th scope="col" rowspan="3">Nama Obat</th>
                <th scope="col" rowspan="3" >Satuan</th>
                <th colspan="7">Harga</th>
                <th scope="col" rowspan="3" >Kapasitas</th>
                <th scope="col" rowspan="3" >Exp Date</th>
                
                 
            </tr>
            <tr>
                <th scope="col" rowspan="2" >Rawat Jalan</th>
                <th colspan="3">Rawat Inap</th>
                <th scope="col" rowspan="2" >Beli Luar</th>
                <th scope="col" rowspan="2" >Jual Bebas</th>
                <th scope="col" rowspan="2" >Karyawan</th>
            </tr>
            <tr>
                <th>Kelas 1</th>
                <th>Kelas 2</th>
                <th>Kelas 3</th>
            </tr>
        </thead>
        <tbody>
        
        <?php
                $i= 1;
                foreach($tbat as $t) :

            ?>
                <tr>
                    <th scope="row"><?= $i++?></th>
                    <td><?= $t['kode_brng']?></td>
                    <td><?= $t['nama_brng']?></td>
                    <td><?= $t['satuan']?></td>
                    <td><?= $t['rawat_jalan']?></td>
                    <td><?= $t['kelas1']?></td>
                    <td><?= $t['kelas2']?></td>
                    <td><?= $t['kelas3']?></td>
                    <td><?= $t['beliluar']?></td>
                    <td><?= $t['jualbebas']?></td>
                    <td><?= $t['karyawan']?></td>
                    <td><?= $t['kapasitas']?></td>
                    <td><?= $t['expire']?></td>

                    
                </tr>
                
               
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
</div>