<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Status Pasien
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="norawat" value="<?= $pasien['no_rawat']; ?>">
                        <div class="form-group">
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <select class="custom-select mr-sm-2" id="status" name="status">
                                        <option value="<?= $pasien['status']; ?>" selected>Status Kamar</option>
                                        <option value="KOSONG">KOSONG</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <select class="custom-select mr-sm-2" id="statusdata" name="statusdata">
                                        <option value="<?= $pasien['statusdata']; ?>" selected>Status Data</option>
                                        <option value="0">0</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <select class="custom-select mr-sm-2" id="statuspulang" name="statuspulang">
                                        <option value="<?= $pasien['stts_pulang']; ?>" selected>Status Pasien</option>
                                        <option value="Pulang">Pulang</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>

                </div>

            </div>


        </div>
    </div>

</div>