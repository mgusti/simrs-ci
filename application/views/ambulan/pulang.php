<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('messege'); ?>

</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class=" shadow-lg p-3 mb-5 bg-white rounded ">
                <form action="<?= base_url('ambulan/aksipulang') ?>" method="post">
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="">Tanggal Pulang</label>
                            <input type="date" name="tgl" id="tgl" class="form-control" required>
                        </div>
                        <div class="col-lg-3">
                            <label for="">Jam Pulang</label>
                            <input type="time" name="jam" id="jam" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="">KM Mobil Awal</label>
                            <input type="number" name="awal" id="awal" class="form-control" value="<?= $jln['km_mobil'] ?>" readonly required>
                        </div>
                        <div class="col-lg-3">
                            <label for="">KM Mobil Pulang</label>
                            <input type="number" name="pulang" id="pulang" class="form-control" required>
                        </div>
                        <div class="col-lg-3">
                            <label for="">Jarak Tempuh (KM)</label>
                            <input type="number" name="jarak" id="jarak" class="form-control" readonly required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Keterangan</label>
                            <textarea name="ket" id="ket" cols="10" rows="10" class="form-control" required></textarea>
                        </div>
                    </div>
                    <input type="text" name="nomor" id="nomor" hidden value="<?= $jln['nomor'] ?>">
                    <input type="text" name="kd_mobil" id="kd_mobil" hidden value="<?= $jln['kd_mobil'] ?>">
                    <input type="text" name="id_supir" id="id_supir" hidden value="<?= $jln['id_supir'] ?>">
                    <button class="btn btn-primary mt-3" type="submit" id="spn">Simpan</button>
                    <a href="<?= base_url('ambulan/suratjalan') ?>" class="btn btn-danger mt-3">Kembali</a>
                </form>
            </div>
        </div>
        <div class="col-lg-4">
            <div class=" shadow-lg p-3 mb-5 bg-primary rounded text-white ">
                <div class="row">
                    <div class="col-lg-5">
                        <p>Nomor Surat</p>
                    </div>
                    <div class="col-lg-1">
                        <p>:</p>
                    </div>
                    <div class="col-lg-6">
                        <p><?= $jln['nomor'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <p>Tanggal Berangkat</p>
                    </div>
                    <div class="col-lg-1">
                        <p>:</p>
                    </div>
                    <div class="col-lg-6">
                        <p><?= $jln['tgl_jalan'] ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5">
                        <p>Jam Berangkat</p>
                    </div>
                    <div class="col-lg-1">
                        <p>:</p>
                    </div>
                    <div class="col-lg-6">
                        <p><?= $jln['jam'] ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-5">
                        <p>Driver</p>
                    </div>
                    <div class="col-lg-1">
                        <p>:</p>
                    </div>
                    <div class="col-lg-6">
                        <p><?= $jln['supir'] ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-5">
                        <p>No Polisi</p>
                    </div>
                    <div class="col-lg-1">
                        <p>:</p>
                    </div>
                    <div class="col-lg-6">
                        <p><?= $jln['nopol'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>