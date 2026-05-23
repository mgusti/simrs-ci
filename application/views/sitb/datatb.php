<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <a href="<?= base_url('sitb/forminputtb') ?>" class="btn btn-primary mt-3 mb-3">Tambah</a>
    <?= $this->session->flashdata('messege'); ?>
    <div class="card mb-3">
        <div class="card-body">
            <p>Data TB RS</p>
            <table class="table table-responsive table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th>ID TB 03</th>
                        <th>Tgl Pengobatan</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>ICD-10</th>
                        <th>sebelum pengobatan hasil tes cepat</th>
                        <th>hasil mikroskopis bulan_2</th>
                        <th>hasil mikroskopis bulan_3</th>
                        <th>hasil mikroskopis bulan_5</th>
                        <th>akhir pengobatan hasil mikroskopis</th>
                        <th>Hasil Akhir Pengobatan</th>
                        <th>Tgl Akhir pengobatan</th>
                        <th>Edit</th>
                        <th>Masukan ID TB 03</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($tb as $t) :
                    ?>
                        <tr>

                            <td>
                                <?= $t['id_tb_03'] ?>
                            </td>
                            <td>
                                <?= $t['tanggal_mulai_pengobatan'] ?>
                            </td>
                            <td>
                                <?= $t['nik'] ?>
                            </td>
                            <td>
                                <?= $t['kd_pasien'] ?>
                            </td>
                            <td>
                                <?= $t['kode_icd_x'] ?>
                            </td>
                            <td>
                                <?= $t['sebelum_pengobatan_hasil_tes_cepat'] ?>
                            </td>
                            <td>
                                <?= $t['hasil_mikroskopis_bulan_2'] ?>
                            </td>
                            <td>
                                <?= $t['hasil_mikroskopis_bulan_3'] ?>
                            </td>
                            <td>
                                <?= $t['hasil_mikroskopis_bulan_5'] ?>
                            </td>
                            <td>
                                <?= $t['akhir_pengobatan_hasil_mikroskopis'] ?>
                            </td>
                            <td>
                                <?= $t['hasil_akhir_pengobatan'] ?>
                            </td>
                            <td>
                                <?= $t['tanggal_hasil_akhir_pengobatan'] ?>
                            </td>
                            <td>
                                <?php
                                if ($t['id_tb_03'] == "") {
                                    $cs = "disabled";
                                } else {
                                    $cs = "enabled";
                                }
                                ?>
                                <a href="<?= base_url('sitb/editsitb/') . $t['kd_sitb'] ?>" class="btn btn-warning <?= $cs ?>"><i class="fa fa-edit"></i></a>
                            </td>
                            <td>
                                <a href="<?= base_url('sitb/inpidtb03/') . $t['kd_sitb'] ?>" class="btn btn-info">Masukan ID TB 03</a>
                            </td>
                        </tr>

                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>