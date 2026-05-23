<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>
<!-- Button trigger modal -->
    <a href="<?= base_url('farmasi/ibarangmasuk')?>" class="btn btn-primary mb-3">Tambah Barang Masuk</a>
    <table class="table table-responsive" id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama PBF</th>
                <th>Kode Pembelian</th>
                <th>No Faktur</th>
                <th>Tgl Faktur</th>
                <th>Tgl Jatuh Tempo</th>
                <th>Nama Obat dan BHP</th>
                <th>JML</th>
                <th>Kemasan</th>
                <th>No Batch</th>
                <th>Exp Date</th>
                <th>Harga Satuan</th>
                <th>Jumlah</th>
                <th>Jumlah Tagihan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i =1;

                foreach($barang as $b):
            ?>
            <tr>
                <td><?= $i++?></td>
                <td><?= $b['nm_pbf']?></td>
                <td><?= $b['kd_pembelian']?></td>
                <td><?= $b['nofaktur']?></td>
                <td><?= $b['tglfaktur']?></td>
                <td><?= $b['tgljatuhtempo']?></td>
                <td><?= $b['namabarang']?></td>
                <td><?= $b['qty']?></td>
                <td><?= $b['satuan']?></td>
                <td><?= $b['no_batch']?></td>
                <td><?= $b['exp']?></td>
                <td><?= $b['harga_satuan']?></td>
                <td><?= $b['jml']?></td>
                <td><?= $b['jml_tagihan']?></td>
                <td>
                    <a href="" class="badge badge-warning">Edit</a>
                    <a href="" class="badge badge-danger">Hapus</a>
                </td>
            </tr>
               
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
</div>


