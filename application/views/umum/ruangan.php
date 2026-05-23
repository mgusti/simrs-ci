<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>
    <?= $this->session->flashdata('messege'); ?>
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
  Tambah
</button>
    <table class="table table-responsive" id="example">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama Ruangan</th>
                <th>Lokasi</th>
                <th>Penanggung Jawab</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                foreach ($ruang as $b):
            ?>
            <tr>
                <td><?= $i++?></td>
                <td><?= $b['nama_ruangan']?></td>
                <td><?= $b['lokasi']?></td>
                <td><?= $b['penanggung']?></td>
                
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
        <h5 class="modal-title" id="exampleModalLabel">Input Ruangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('umum/simpanruang')?>" method="post">
            <div class="row">
                <div class="col-lg-12">
                    <label for="">Nama Ruangan</label>
                    <input type="text" name="nama" id="nama"  class="form-control" required>
                </div>
                <div class="col-lg-12">
                    <label for="">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi"  class="form-control" required>
                </div>
                <div class="col-lg-12">
                    <label for="">Penanggung Jawab</label>
                    <input type="text" name="penanggung" id="penaggung"  class="form-control" required>
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