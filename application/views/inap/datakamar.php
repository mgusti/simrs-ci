<div class="container-fluid">
    <h1 class="h3 mb-4 mt-4 text-gray-800"><?=$title;?></h1>
    <?=$this->session->flashdata('messege');?>

    <table class="table table-striped table-bordered" id="a">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Waktu Update</th>
                <th scope="col">Kode Ruang</th>
                <th scope="col">Ruang Rawat</th>
                <th scope="col">Kelas</th>
                <th scope="col">Kapasitas</th>
                <th scope="col">Tersedia</th>
                <th scope="col">Tersedia Pria</th>
                <th scope="col">Tersedia Wanita</th>
                <th scope="col">Action</th>



            </tr>
        </thead>

        <tbody>
            <?php
$i = 1;
foreach ($kmr as $p):
?>
                <tr>
                    <th scope="row"><?=$i++?></th>
                    <td><?=$p['ts']?></td>
                    <td><?=$p['kode_ruang']?></td>
                    <td><?=$p['ruang']?></td>
                    <td><?=$p['kelas']?></td>
                    <td><?=$p['kapasitas']?></td>
                    <td><?=$p['tersedia']?></td>
                    <td><?=$p['tersediapria']?></td>
                    <td><?=$p['tersediawanita']?></td>
                    <td><a href="#" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?=$p['id']?>">Update</a></td>


                </tr>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?=$p['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
<?php
// Load database simanap
$su = $this->db->get_where('new_tt', ['id' => $p['id']])->row_array();
?>
                                <form action="<?=base_url('inap/updkmr/' . $su['id'])?>" method="post">
                                    <div class="row">
                                        <div class="col-lg-12 " hidden>
                                            <label for="">kode kelas</label>
                                            <input type="text" name="kodekelas" id="kodekelas" class="form-control" value="<?=$su['kodekelas']?>" readonly>
                                        </div>
                                        <div class="col-lg-12 " hidden>
                                            <label for="">kode Ruang</label>
                                            <input type="text" name="koderuang" id="koderuang" class="form-control" value="<?=$su['kode_ruang']?>" readonly>
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="">Ruangan</label>
                                            <input type="text" name="ruangan" id="ruangan" class="form-control" value="<?=$su['ruang']?>" readonly>
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="">Kelas</label>
                                            <input type="text" name="kelas" id="kelas" class="form-control" value="<?=$su['kelas']?>" readonly>
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="">Kapasitas</label>
                                            <input type="number" name="kapasitas" id="kapasitas" class="form-control" value="<?=$su['kapasitas']?>">
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="">Tersedia</label>
                                            <input type="number" name="tersedia" id="tersedia" class="form-control" value="<?=$su['tersedia']?>">
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="">Tersedia Pria</label>
                                            <input type="number" name="tersediapria" id="tersediapria" class="form-control" value="<?=$su['tersediapria']?>">
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="">Tersedia Wanita</label>
                                            <input type="number" name="tersediawanita" id="tersediawanita" class="form-control" value="<?=$su['tersediawanita']?>">
                                        </div>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-warning">update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
endforeach;
?>
        </tbody>
    </table>
</div>