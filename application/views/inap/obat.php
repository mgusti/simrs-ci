<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Tambah Obat</button>
    
    <table class="table" id="example">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">No</th>
                <th scope="col">No. RM</th>
                <th scope="col">No. SEP</th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Nama Obat</th>
                <th scope="col">Jumlah Obat</th>
                <th scope="col">Satuan</th>
                <th scope="col">Waktu Pemberian Obat</th>
                <th scope="col">Pemberi Obat</th>
                <th scope="col">Aksi</th>
                


            </tr>
        </thead>
        <tbody>
        <?php
            $i = 1;
            foreach ($obat as $o) :
        ?>
            <tr>
                <th scope="row"><?= $i++?></th>
                <td><?= $o['no']?></td>
                <td><?= $o['nomr']?></td>
                <td><?= $o['nosep']?></td>
                <td><?= $o['nama_pasien']?></td>
                <td><?= $o['nama_brng']?></td>
                <td><?= $o['jumlah_obat']?></td>
                <td><?= $o['satuan']?></td>
                <td><?= $o['waktu_obat']?></td>
                <td><?= $o['pemberi_obat']?></td>
                <td>
                    <a href="<?= base_url('inap/hapusobat/')?><?= $o['no']?>" class="badge badge-danger">Hapus</a>
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
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tindakan Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
            <form action="<?= base_url('inap/inputobat');?>" method="post">
                <div class="row">
                    <div class="col-lg-4">
                        <label for="">Nama Obat</label>
                        <input type="text" name="nama_obat" id="nama_obat" class="form-control" readonly>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Kode Obat</label>
                        <input type="text" name="kode_obat" id="kode_obat" class="form-control" required >
                        
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <label for="">Jumlah Obat</label>
                        <input type="number" name="jumlah_obat" id="jumlah_obat" class="form-control" required>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Satuan</label>
                        <input type="text" name="satuan" id="satuan" class="form-control" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="">Waktu Pemberian Obat</label>
                        <select name="waktu_obat" id="waktu_obat" class="form-control" required>
                            <option value="">-pilih-</option>
                            <option value="1">Pagi</option>
                            <option value="2">Siang</option>
                            <option value="3">Malam</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label for="">Tgl Pemberian Obat</label>
                        <input type="text" name="tgl_obat" id="tgl_obat" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="">Petugas Pemberi Obat</label>
                        <input type="text" name="pemberi_obat" id="pemberi_obat" class="form-control" required>
                    </div>
                </div>
                <div class="row" hidden>
                    <div class="col-lg-3">
                        <label for="">nomr</label>
                        <input type="text" name="nomr" id="nomr" class="form-control" value="<?= $sep["nomr"]?>">
                    </div>
                    <div class="col-lg-3">
                        <label for="">nosep</label>
                        <input type="text" name="nosep" id="nosep" class="form-control" value="<?= $sep["nosep"]?>">
                    </div>
                    <div class="col-lg-3">
                        <label for="">user</label>
                        <input type="text" name="user" id="user" class="form-control" value="<?= $user["name"]?>">
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="<?= base_url('inap/tobat')?>" type="button" target="_blank" class="btn btn-warning">Obat</a>
        <button type="sumbit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>