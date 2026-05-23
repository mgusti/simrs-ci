<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah Text
</button>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">kd</th>
      <th scope="col">Text</th>
      <th scope="col">Aksi</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
    foreach ($te as $t):
  ?>
    <tr>
      
      <td><?= $t['kd']?></td>
      <td><?= $t['text']?></td>
      <td>
        <a href="<?= base_url('manajemen/hapustext/' . $t['kd'])?>" class="badge badge-danger">Hapus</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Input Running Text</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('manajemen/inptext')?>" method="post">
            <div class="row">
                <div class="col-lg-12">
                    <input type="text" name="text" id="text" class="form-control" placeholder="Input Text" required>
                </div>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        
      </div>
      </form>
    </div>
  </div>
</div>