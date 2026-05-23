<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <form action="<?= base_url('umum/simpanbarang')?>" method="post" autocomplete="off">
            <div class="row">
                <div class="col-lg-3">
                    <label for="">Kode Barang</label>
                    <input type="text" name="kodebarang" id="kodebarang"  class="form-control" required>
                </div>
                <div class="col-lg-3">
                    <label for="">Nama Barang</label>
                    <input type="text" name="namabarang" id="namabarang"  class="form-control" required>
                </div>
                <div class="col-lg-3">
                    <label for="">Merk</label>
                    <input type="text" name="merk" id="merk"  class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <label for="">Ukuran</label>
                    <input type="text" name="ukuran" id="ukuran"  class="form-control">
                </div>
                <div class="col-lg-3">
                    <label for="">Bahan</label>
                    <input type="text" name="bahan" id="bahan"  class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <label for="">Tahun Anggaran</label>
                    <input type="number" name="tahun" id="tahun"  class="form-control" value="<?= date('Y')?>" required>
                </div>
                <div class="col-lg-3">
                    <label for="">Jenis Anggaran</label>
                    <select name="jenis" id="jenis" class="form-control" required>
                        <option value="">-pilih-</option>
                        <option value="">APBN</option>
                        <option value="">APBD</option>
                        <option value="">HIBAH</option>
                        
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <label for="">Nilai Satuan (Rp.)</label>
                    <input type="number" name="nilai" id="nilai"  class="form-control" required>
                </div>
                <div class="col-lg-3">
                    <label for="">Jumlah Barang</label>
                    <input type="number" name="jumlah" id="jumlah"  class="form-control" required>
                </div>
                <div class="col-lg-3">
                    <label for="">Nilai Total Barang (Rp.)</label>
                    <input type="number" name="total" id="total"  class="form-control" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            <a href="<?= base_url('umum/barang')?>" class="btn btn-danger mt-3">Kembali</a>
      </div>
    </form>
</div>