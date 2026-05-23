<div class="container-fluid mb-3">
    <div class="card">
        <div class="card-header">
            <h1 class="h3 mb-4 mt-4 text-gray-800 card-title"><?= $title; ?></h1>
            <?= $this->session->flashdata('messege'); ?>
        </div>


        <div class="card-body">
            <button type="button" class="btn btn-primary mt-2 mb-3" data-toggle="modal" data-target="#exampleModal">
                Tambah
            </button>
            <table class="table table-responsive-md table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Kode</th>
                        <th>Menu</th>
                        <th>Gambar</th>
                        <th>Link</th>
                        <th>Warna</th>
                        <th>Hapus</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($menu as $m) :
                    ?>
                        <tr>
                            <td>
                                <?= $m['id_menu'] ?>
                            </td>
                            <td>
                                <?= $m['nama'] ?>
                            </td>
                            <td>
                                <?= $m['gambar'] ?>
                            </td>
                            <td>
                                <?= $m['link'] ?>
                            </td>
                            <td>
                                <?= $m['warna'] ?>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('homepage/delmenu/') . $m['id_menu'] ?>" class="btn btn-danger">Hapus</a>
                            </td>
                            <td class="text-center">
                                <a href="" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('homepage/inpmenu'); ?>
                <div class="row mb-2">
                    <div class="col-lg-12">
                        <label for="nama">Menu</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Menu" required>
                    </div>
                    <div class="col-lg-12">
                        <label for="link">Link</label>
                        <input type="text" name="link" id="link" class="form-control" placeholder="link menu" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <label for="">Gambar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gmbr" name="gmbr" accept="image/*">
                            <label class="custom-file-label" for="gmbr">Pilih Gambar</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="">warna background</label>
                        <select name="warna" id="warna" class="form-control" required>
                            <option value="">-Pilih-</option>
                            <option value="bg-gradient-warning">kuning</option>
                            <option value="bg-gradient-danger">merah</option>
                            <option value="bg-gradient-primary">biru</option>
                            <option value="bg-gradient-info">biru muda</option>
                            <option value="bg-gradient-dark">hitam dark</option>
                            <option value="bg-gradient-light">abu abu</option>
                        </select>
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