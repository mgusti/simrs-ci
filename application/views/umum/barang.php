<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>
    <?= $this->session->flashdata('messege'); ?>
<a href="<?= base_url('umum/inputbarang')?>" class="btn btn-primary mb-3" >Tambah</a>
    <table class="table table-responsive" id="example">
        <thead>
            <tr>
                <th>NO</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>merk</th>
                <th>Ukuran</th>
                <th>Bahan</th>
                <th>Jenis Anggran</th>
                <th>Tahun Anggaran</th>
                <th>Jumlah</th>
                <th>Nilai satuan Barang</th>
                <th>Total Nilai Barang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                foreach ($barang as $b):
            ?>
            <tr>
                <td><?= $i++?></td>
                <td><?= $b['kd_barang']?></td>
                <td><?= $b['nama_barang']?></td>
                <td><?= $b['merk']?></td>
                <td><?= $b['ukuran']?></td>
                <td><?= $b['bahan']?></td>
                <td><?= $b['jenisanggaran']?></td>
                <td><?= $b['thnanggaran']?></td>
                <td><?= $b['jumlah']?></td>
                <td><?= $b['nilai']?></td>
                <td><?= $b['total']?></td>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('umum/simpanbarang')?>" method="post">
            <div class="row">
                <div class="col-lg-12">
                    <label for="">Kode Barang</label>
                    <input type="text" name="kodebarang" id="kodebarang"  class="form-control" required>
                </div>
                <div class="col-lg-12">
                    <label for="">Nama Barang</label>
                    <input type="text" name="namabarang" id="namabarang"  class="form-control" required>
                </div>
                <div class="col-lg-12">
                    <label for="">Merk</label>
                    <input type="text" name="merk" id="merk"  class="form-control">
                </div>
                <div class="col-lg-12">
                    <label for="">Ukuran</label>
                    <input type="text" name="ukuran" id="ukuran"  class="form-control">
                </div>
                <div class="col-lg-12">
                    <label for="">Bahan</label>
                    <input type="text" name="bahan" id="bahan"  class="form-control">
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

