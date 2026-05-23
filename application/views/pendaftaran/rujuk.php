<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>
    <form action="<?= base_url('pendaftaran/simpanrujukan')?>" method="post">
        <div class="row">
            <div class="col-lg-3">
                <label for="">No SEP</label>
                <input type="text" name="nosep" id="nosep" class="form-control" required value="">
            </div>
            <div class="col-lg-2">
                <label for="">Tgl Rujukan</label>
                <input type="text" name="tglrujuk" id="tglrujuk" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" autocomplete="off" required>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <label for="">Jenis Faskes</label>
                <select name="jnsfaskes" id="jnsfaskes" class="form-control" required>
                    <option value="">-pilih-</option>
                    <option value="1">Faskes Tingkat 1</option>
                    <option value="2">Faskes Tingkat 2</option>
                </select>
                
            </div>
            <div class="col-lg-2">
                <label for="">Nama/ Kode Faskes</label>
                <input type="text" name="query3" id="faskes1" class="form-control">
            </div>
            <div class="col-lg-4">
                <label for="">Faskes Dirujuk</label>
                <select name="kdfaskes" id="list3" class="form-control" required>
                <option value=""></option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <label for="">Jenis Pelayanan</label>
                <select name="jnspel" id="" class="form-control" required>
                    <option value="">-pilih-</option>
                    <option value="1">R. Jalan</option>
                    <option value="2">R. Inap</option>
                </select>
                
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <label for="">Catatan</label>
                <input type="text" name="catatan" id="catatan" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">kode/ Nama Diagnosa</label>
                <input type="text" name="query" id="diagawal1" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="">Diagnosa</label>
                <select name="diagnosa2" id="list" class="form-control" required>
                    
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Tipe Rujukan</label>
                <select name="tiperujukan" id="tiperujukan" class="form-control" required>
                    <option value="">-pilih-</option>
                    <option value="0">Penuh</option>
                    <option value="1">Partial</option>
                    <option value="2">Rujuk Balik</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Kode/Nama Poli</label>
                <input type="text" name="query2" id="caripoli" class="form-control">
            </div>
            <div class="col-lg-4">
                <label for="">Poli</label>
                <select name="poli" id="list2" class="form-control" required>
                <option value=""></option>
                </select>
            </div>
        </div>
        <button class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>