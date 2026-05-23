<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
 Tambah Barang
</button>
    <table class="table" id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Tipe Barang</th>
                
                <th>Satuan</th>
                <th>Stok</th>
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
                <td><?= $b['kd_barang']?></td>
                <td><?= $b['nm_barang']?></td>
                <td><?= $b['tipe_barang']?></td>
                
                <td><?= $b['satuan']?></td>
                <td><?= $b['stok']?></td>
                <td>
                    <a href="" class="badge badge-warning">Edit</a>
                    <a href="<?= base_url('farmasi/hapusbarang/' . $b['kd_barang'] )?>" class="badge badge-danger">Hapus</a>
                </td>
            </tr>
                
                
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
</div>



<!-- Modal -->
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
        <form action="<?= base_url('farmasi/simpanbarang')?>" method="post">
            <div class="row">
                <div class="col-lg-12">
                    <label for="">Kode Barang</label>
                    <input type="text" name="kdbarang" id="kdbarang" class="form-control" required onkeyup="this.value = this.value.toUpperCase()">
                </div>
                <div class="col-lg-12">
                    <label for="">Nama Barang</label>
                    <input type="text" name="nmbarang" id="nmbarang" class="form-control" required>
                </div>
                <div class="col-lg-6">
                    <label for="">Satuan</label>
                    <select name="satuan" id="satuan" class="form-control" required>
                        <option value="">-pilih-</option>
                        <?php
                            foreach ($satuan as $s):
                        ?>
                        <option value="<?= $s['satuan']?>"><?= $s['satuan']?></option>
                        <?php
                            endforeach;
                        ?>
                    </select>
                </div>
                <div class="col-lg-6">
                    <label for="">Tipe Barang</label>
                    <select name="tipebarang" id="tipebarang" class="form-control" required>
                        <option value="">-pilih-</option>
                        <option value="BHP">BHP</option>
                        <option value="Obat">Obat</option>
                    </select>
                </div>
                <div class="col-lg-6">
                    <label for="">Stok</label>
                    <input type="number" name="stok" id="stok" class="form-control" required>
                </div>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>