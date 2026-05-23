<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <form action="<?= base_url('farmasi/simpanbarangmasuk')?>" method="post">
        <div class="row">
            <div class="col-lg-3">
                <label for="">Tgl Faktur</label>
                <input type="text" name="tglfaktur" id="tglfaktur" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" required>
            </div>
            <div class="col-lg-3">
                <label for="">No Faktur</label>
                <input type="text" name="nofaktur" id="nofaktur" class="form-control" required>
            </div>
            <div class="col-lg-3">
                <label for="">Tgl Jatuh Tempo</label>
                <input type="text" name="jatuhtempo" id="jatuhtempo" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" required>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Nama PBF</label>
                <select name="pbf" id="pbf" class="form-control" required>
                    <option value="">-pilih-</option>
                    <?php
                        foreach($pbf as $p):
                    ?>
                    <option value="<?= $p['kd_pbf']?>"><?= $p['nm_pbf']?></option>
                    <?php
                        endforeach;
                    ?>
                </select>
            </div>
            <div class="col-lg-3">
                <label for="">Kode Pembelian</label>
                <select name="kd_pembelian" id="kd_pembelian" class="form-control" required>
                    <option value="">-pilih-</option>
                    <option value="1">BHP Non E-Katalog</option>
                    <option value="2">Gak Tau</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Nama Barang</label>
                <input type="text" name="nmbarang" id="barang-autocomplete" class="form-control mdb-autocomplete" required>
            </div>
            <div class="col-lg-3">
                <label for="">Kode Barang</label>
                <input type="text" name="kdbarang" id="kdbarang" class="form-control" required>
            </div>
            <div class="col-lg-3">
                <label for="">Tipe Barang</label>
                <input type="text" name="tipebarang" id="tipebarang" class="form-control" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <label for="">qty</label>
                <input type="number" name="qty" id="qty" class="form-control" required>
            </div>
            <div class="col-lg-2">
                <label for="">Satuan</label>
                <input type="text" name="satuan" id="satuan" class="form-control" required readonly>
            </div>
            <div class="col-lg-2">
                <label for="">Stok Sekarang</label>
                <input type="number" name="stok" id="stok" class="form-control" required readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">No Batch</label>
                <input type="text" name="nobatch" id="nobatch" class="form-control" required>
            </div>
            <div class="col-lg-3">
                <label for="">Exp Date</label>
                <input type="text" name="expdate" id="expdate" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" required>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Harga Satuan (Rp.)</label>
                <input type="number" name="hargasatuan" id="hargasatuan" class="form-control" required>
            </div>
            <div class="col-lg-3">
                <label for="">Jumlah (Rp.)</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" required>
            </div>
            <div class="col-lg-3">
                <label for="">Jumlah Tagihan (Rp.)</label>
                <input type="number" name="jumlahtagihan" id="jumlahtagihan" class="form-control" required>
            </div>
        </div>
        <button tipe="submit" class="btn btn-primary mt-3">Simpan</button>
        <a href="<?= base_url('farmasi/barangmasuk')?>" class="btn btn-danger mt-3">Kembali</a>
    </form>
    
    
</div>