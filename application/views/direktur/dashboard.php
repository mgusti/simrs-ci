<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card border-left-info mb-3 text-center">
                    <label for="">Total Keseluruhan Pasien</label>
                    <h1><?= $pasien['total']?></h1>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-left-info mb-3 text-center">
                    <label for="">Total Pasien Rawat Inap</label>
                    <h1><?= $pasien['total']?></h1>
                </div>
            </div>
        </div>
        
    </div>
</div>