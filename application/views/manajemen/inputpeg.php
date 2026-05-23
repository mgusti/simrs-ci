<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <form action="" method="post">
        <div class="row">
            <div class="col-lg-3">
                <label for="">NIK</label>
                <input type="number" name="nik" id="nik" class="form-control">
            </div>
            <div class="col-lg-3">
                <label for="">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <label for="">Jenis Kelamin</label>
                <select name="jenkel" id="jenkel" class="form-control">
                    <option value="">-pilih-</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>

                </select>
            </div>
            <div class="col-lg-2">
                <label for="">Tgl Lahir</label>
                <input type="text" name="tgllahir" id="tgllahir" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd">
            </div>

        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Bidang</label>
                
                <select name="bidang" id="role" class="form-control">
                </select>
            </div>
            <div class="col-lg-3">
                <label for="">Subbidang</label>
                <select name="subbidang" id="subbidang" class="form-control">
                </select>
            </div>
        </div>
    </form>
</div>