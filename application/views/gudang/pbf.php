<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
  Tambah PBF
</button>
    <table class="table table-responsive" id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode PBF</th>
                <th>Nama PBF</th>
                <th>No NPWP</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Aksi</th>
               
            </tr>
        </thead>
        <tbody>
            <?php
                $i =1;

                foreach($pbf as $b):
            ?>
            <tr>
                <td><?= $i++?></td>
                <td><?= $b['kd_pbf']?></td>
                <td><?= $b['nm_pbf']?></td>
                <td><?= $b['npwp']?></td>
                <td><?= $b['alamat']?></td>
                <td><?= $b['no_telp']?></td>
                <td>
            
                
                    <a href="" class="badge badge-warning">Edit</a>
                    <a href="<?= base_url('farmasi/hapuspbf/' . $b['kd_pbf'])?>" class="badge badge-danger">Hapus</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Input PBF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('farmasi/simpanpbf')?>" method="post">
            <div class="row">
                <div class="col-lg-12">
                    <label for="">Nama PBF</label>
                    <input type="text" name="namapbf" id="namapbf" class="form-control" required>
                </div>
                <div class="col-lg-12">
                    <label for="">NPWP</label>
                    <input type="text" name="npwp" id="npwp" class="form-control">
                </div>
                <div class="col-lg-12">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control">
                </div>
                <div class="col-lg-12">
                    <label for="">No Telp</label>
                    <input type="number" name="notlp" id="notlp" class="form-control">
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