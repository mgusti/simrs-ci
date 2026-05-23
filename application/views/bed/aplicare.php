        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <?= validation_errors(); ?>

            <div class="row">

                <div class="col-lg">

                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newAplicareModal">Add New Aplicare</a>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">KK Aplicare</th>
                                <th scope="col">Kode Bangsal</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Kapasitas</th>
                                <th scope="col">Tersedia</th>
                                <th scope="col">Tsd Pria</th>
                                <th scope="col">Tsd Wanita</th>
                                <th scope="col">Tsd Pria Wanita</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($aplicare as $apc) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $apc['kode_kelas_aplicare']; ?></td>
                                    <td><?= $apc['kd_bangsal']; ?></td>
                                    <td><?= $apc['kelas']; ?></td>
                                    <td><?= $apc['kapasitas']; ?></td>
                                    <td><?= $apc['tersedia']; ?></td>
                                    <td><?= $apc['tersediapria']; ?></td>
                                    <td><?= $apc['tersediawanita']; ?></td>
                                    <td><?= $apc['tersediapriawanita']; ?></td>
                                    <td>
                                        <a href="" class="badge badge-success">Edit</a>
                                        <a href="" class="badge badge-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Modal -->
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="newAplicareModal" tabindex="-1" role="dialog" aria-labelledby="newAplicareModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newAplicareModalLabel">Add New Aplicare</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('bed/aplicare'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="form-row align-items-center">
                                    <div class="col-auto my-1">
                                        <select class="custom-select mr-sm-2" id="kodekelasaplicare" name="kodekelasaplicare">
                                            <option selected>Kode Kelas Aplicare</option>
                                            <option value="NON">-</option>
                                            <option value="VVP">VVP</option>
                                            <option value="VIP">VIP</option>
                                            <option value="UTM">UTAMA</option>
                                            <option value="KL1">KELAS 1</option>
                                            <option value="KL2">KELAS 2</option>
                                            <option value="KL3">KELAS 3</option>
                                            <option value="ICU">ICU</option>
                                            <option value="ICC">ICCU</option>
                                            <option value="NIC">NICU</option>
                                            <option value="PIC">PICU</option>
                                            <option value="IGD">IGD</option>
                                            <option value="UGD">UGD</option>
                                            <option value="SAL">RUANG BERSALIN</option>
                                            <option value="HCU">HCU</option>
                                            <option value="ISO">RUANG ISOLASI</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <select name="kdbangsal" id="kdbangsal" class="form-control">

                                    <option value="">Select Bangsal</option>
                                    <?php foreach ($bangsal as $bg) : ?>
                                        <option value="<?= $bg['kd_bangsal'] ?>"><?= $bg['kd_bangsal'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="form-row align-items-center">
                                    <div class="col-auto my-1">
                                        <select class="custom-select mr-sm-2" id="kelas" name="kelas">
                                            <option selected>Kelas</option>
                                            <option value="Kelas 1">Kelas 1</option>
                                            <option value="Kelas 2">Kelas 2</option>
                                            <option value="Kelas 3">Kelas 3</option>
                                            <option value="Kelas Utama">Kelas Utama</option>
                                            <option value="Kelas VIP">Kelas VIP</option>
                                            <option value="Kelas VVIP">Kelas VVIP</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="kapasitas" name="kapasitas" placeholder="Kapasistas">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="tersedia" name="tersedia" placeholder="Tersedia">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="tersediapria" name="tersediapria" placeholder="Tersedia Pria">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="tersediawanita" name="tersediawanita" placeholder="Tersedia Wanita">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="tersediapriawanita" name="tersediapriawanita" placeholder="Tersedia Pria Wanita">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>