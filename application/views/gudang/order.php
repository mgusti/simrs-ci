<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <table class="table table-responsive-lg" id="example">
        <thead>
            <tr>
                <th>No.</th>
                <th>No. Order</th>
                <th>Tgl Order</th>
                <th>Kode Barang</th>
                <th>Jumlah Permintaan</th>
                <th>User Order</th>
                <th>Bidang</th>
                <th>Subbidang</th>
                <th>Status</th>
                <th>Aksi</th>
                
            </tr>
        </thead>
        <tbody id="tampil">
           

            
            
        </tbody>
    </table>
</div>