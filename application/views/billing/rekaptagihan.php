<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('messege'); ?>

    <div class="card">
        <div class="card-body">
            <form action="" method="post">
                <div class="row">
                    <div class="col-lg-3">
                        <label for="">Bulan</label>
                        <select name="bulan" id="bulan" class="form-control" required>
                            <option value="">-Pilih-</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label for="">tahun</label>
                        <input type="number" name="tahun" id="tahun" class="form-control" value="<?= date('Y') ?>">
                    </div>
                </div>
                <button class="btn btn-info mt-3 mb-3"><i class="fa fa-search"></i>Cari</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Ruangan</th>

                        <th>Total Tagihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($billing as $b) :
                    ?>
                        <tr>
                            <td><?= $b['pol'] ?></td>

                            <td><?= "Rp. " . number_format($b['biaya'], 2, ',', '.'); ?></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>