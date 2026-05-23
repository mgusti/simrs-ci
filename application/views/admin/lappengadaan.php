<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <form action="<?= base_url('admin/lappengexcel')?>" method="post" autocomplete="off">
        <div class="row">
            <div class="col-lg-3">
                <label for="">Dari Tgl</label>
                <input type="text" name="dari" id="dr1" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd">
            </div>
            <div class="col-lg-3">
                <label for="">Sampai Tgl</label>
                <input type="text" name="sampai" id="dr2" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd">
            </div>
        </div>
        <button class="btn btn-danger mt-3">Excel</button>
    </form>
</div>