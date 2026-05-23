<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <form action="" method="post">
        <div class="row">
            <div class="col-lg-3">
                <label for="">Kode Obat</label>
                <input type="text" name="kdobat" id="kdobat" class="form-control">
            </div>
            <div class="col-lg-3">
                <label for="">Nama Obat</label>
                <input type="text" name="nmobat" id="nmobat" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Satuan</label>
                <select name="satuan" id="satuan" class="form-control">
                    <option value="">-pilih-</option>
                    <option value="-">-</option>
                    <?php
                        foreach ($satuan as $s):
                    
                    ?>
                    <option value="<?=$s['satuan']?>"><?= $s['satuan']?></option>
                    <?php
                        endforeach;
                    ?>
                </select>
            </div>
            <div class="col-lg-3">
                <label for="">Letak Barang</label>
                <input type="text" name="letak" id="letak" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <label for="">Harga Beli</label>
                <input type="number" name="harga_beli" id="harga_beli" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <label for="">Harga Beli</label>
                <input type="number" name="harga_beli" id="harga_beli" class="form-control">
            </div>
            <div class="col-lg-2">
                <label for="">Beli Luar</label>
                <input type="number" name="beli_luar" id="beli_luar" class="form-control">
            </div>
            
        </div>
        <hr>
        <p>Harga Jual</p>
        <div class="row">
            <div class="col-lg-2">
                <label for="">Rawat Jalan</label>
                <input type="number" name="rawat_jalan" id="rawat_jalan" class="form-control">
            </div>
            <div class="col-lg-2">
                <label for="">Kelas 1</label>
                <input type="number" name="kls1" id="kls1" class="form-control">
            </div>
            <div class="col-lg-2">
                <label for="">Kelas 2</label>
                <input type="number" name="kls2" id="kls2" class="form-control">
            </div>
            <div class="col-lg-2">
                <label for="">Kelas 3</label>
                <input type="number" name="kls3" id="kls3" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <label for="">Utama</label>
                <input type="number" name="utama" id="utama" class="form-control">
            </div>
            <div class="col-lg-2">
                <label for="">VIP</label>
                <input type="number" name="vip" id="vip" class="form-control">
            </div>
            <div class="col-lg-2">
                <label for="">VVIP</label>
                <input type="number" name="vvip" id="vvip" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <label for="">Jual Bebas</label>
                <input type="number" name="jual_bebas" id="jual_bebas" class="form-control">
            </div>
            <div class="col-lg-2">
                <label for="">Karyawan</label>
                <input type="number" name="karyawan" id="karyawan" class="form-control">
            </div>
        </div>
    </form>
</div>