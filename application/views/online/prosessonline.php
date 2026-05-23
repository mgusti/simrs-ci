<div class="container-fluid">
    <h1 class="h3 mb-4 mt-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <form action="<?= base_url('online/updateonline')?>" method="post">
    <input type="text" name="no" id="no" value="<?= $online['no']?>" hidden>
        <div class="row">
            <div class="col-lg-3">
                <label for="">No MR</label>
                <input type="text" name="nomr" id="nomr" class="form-control" value="<?= $online['nomr']?>" readonly>
            </div>
            <div class="col-lg-3">
                <label for="">No Rujukan</label>
                <input type="text" name="norujukan" id="norujukan" class="form-control" value="<?= $online['norujukan']?>" readonly>
            </div>
            <div class="col-lg-3">
                <label for="">No telp</label>
                <input type="text" name="notelp" id="notelp" class="form-control" value="<?= $online['notelp']?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Tgl Kunjungan</label>
                <input type="text" name="tglkunjungan" id="tglkunjungan" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="<?= $online['tglkunjungan']?>">
            </div>
            <div class="col-lg-3">
                <label for="">Poli</label>
                <select name="poli" id="poli" class="form-control">
                    <option value="<?= $poli['id']?>"><?= $poli['nama_poli']?></option>
                    <?php
                        foreach($poli1 as $po):
                    ?>
                    <option value="<?= $po['id']?>"><?= $po['nama_poli']?></option>
                    <?php
                        endforeach;
                    ?>
                </select>
            </div>
            <div class="col-lg-3">
                <label for="">Status Tanggapan</label>
                <select name="statustanggap" id="statustanggap" class="form-control">
                    <option value="<?= $online['statustanggap']?>"><?= $online['statustanggap']?></option>
                    <?php
                        foreach($tanggap as $st):
                    ?>
                    <option value="<?= $st['nama']?>"><?= $st['nama']?></option>
                    <?php
                        endforeach;
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
                <div class="col-lg-6">
                    <label for="">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="4"></textarea>
                </div>
            </div>
        <button class="btn btn-info mt-3">Proses</button>
        <a href="<?= base_url('online/dataonline')?>" class="btn btn-danger mt-3">Kembali</a>
    </form>
</div>