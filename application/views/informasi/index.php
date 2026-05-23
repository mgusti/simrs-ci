<!DOCTYPE html>

<body lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Informasi Bed</title>
        <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Bungee+Inline|Orbitron&display=swap" rel="stylesheet">

        <link href="<?= base_url('assets/'); ?>img/favicon.ico" rel="shortcut icon">
        <link rel="shortcut icon" href="<?= base_url('assets/'); ?>img/favicon.ico" type="image/x-icon" />
        <link rel="icon" href="<?= base_url('assets/'); ?>img/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/informasi.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/sb-admin-2.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/sb-admin-2.min.css') ?>">

    </head>

    <body background="<?= base_url('assets/img/back.jpg') ?>">
        <div class="container-fluid">
            <nav class="navbar mt-3" id="nav1">
                <h1>INFORMASI KETERSEDIAAN TEMPAT TIDUR <span>RSUD H. ABDUL MANAP</span></h1>


                <div class="time-banner">
                    <?php
                    //menentukan hari
                    $a_hari = array(1 => "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");
                    $hari = $a_hari[date("N")];
                    //menentukan tanggal
                    $tanggal = date("j");
                    //menentukan bulan
                    $a_bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                    $bulan = $a_bulan[date("n")];
                    //menentukan tahun
                    $tahun = date("Y");
                    //dan untuk menampilkan nya dengan format contoh Jumat, 22 Februari 2013
                    ?> <i class="fa fa-spinner fa-spin fa-fw"></i> <i class="fa fa-calendar"></i> <?php echo $hari . ", " . $tanggal . " " . $bulan . " " . $tahun; ?> <i class="fa fa-clock"></i> <span id="jam"></span>:<span id="menit"></span>:<span id="detik"></span>
                </div>
            </nav>



            <div class="container-fluid text-center">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card border-info mb-3 ">
                            <div class="card-body text-dark">
                                <h5 class="card-title">VIP</h5>

                                <table class="table table-borderless table-sm text-dark text-center">
                                    <thead class="">
                                        <tr>
                                            <th scope="col">KAPASITAS</th>
                                            <th scope="col">TERSEDIA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $vips = $this->db->get_where('new_tt', ['kode_ruang' => 'VIP'])->row_array();
                                        ?>
                                        <tr>
                                            <td><?= $vips['kapasitas'] ?></td>
                                            <td><?= $vips['tersedia'] ?></td>
                                        </tr>

                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card border-info mb-3">
                            <div class="card-body text-dark">
                                <h5 class="card-title">ICU</h5>
                                <table class="table table-borderless table-sm  text-dark">
                                    <thead class="">
                                        <tr>
                                            <th scope="col">KAPASITAS</th>
                                            <th scope="col">TERSEDIA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $icus = $this->db->get_where('new_tt', ['kode_ruang' => 'ICU'])->row_array();
                                        ?>
                                        <tr>
                                            <td><?= $icus['kapasitas'] ?></td>
                                            <td><?= $icus['tersedia'] ?></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card border-info mb-3">
                            <div class="card-body text-dark">
                                <h5 class="card-title">ICU COVID - 19</h5>
                                <table class="table table-borderless table-sm  text-dark">
                                    <thead class="">
                                        <tr>
                                            <th scope="col">KAPASITAS</th>
                                            <th scope="col">TERSEDIA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $iccs = $this->db->get_where('new_tt', ['kode_ruang' => 'ICC'])->row_array();
                                        ?>
                                        <tr>
                                            <td><?= $iccs['kapasitas'] ?></td>
                                            <td><?= $iccs['tersedia'] ?></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card border-info mb-3">
                            <div class="card-body text-dark">
                                <h5 class="card-title">ISOLASI COVID - 19</h5>
                                <table class="table table-borderless table-sm  text-dark">
                                    <thead class="">
                                        <tr>
                                            <th scope="col">KAPASITAS</th>
                                            <th scope="col">TERSEDIA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $isos = $this->db->get_where('new_tt', ['kode_ruang' => 'ISO'])->row_array();
                                        ?>
                                        <tr>
                                            <td><?= $isos['kapasitas'] ?></td>
                                            <td><?= $isos['tersedia'] ?></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card border-info mb-3">
                            <div class="card-body text-dark">
                                <h5 class="card-title">ANAK</h5>

                                <table class="table table-borderless table-sm table-responsive-xl text-dark">
                                    <thead class="">
                                        <tr>
                                            <th scope="col">KELAS</th>
                                            <th scope="col">KAPASITAS</th>
                                            <th scope="col">PRIA</th>
                                            <th scope="col">WANITA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            $ank1 = $this->db->get_where('new_tt', ['kode_ruang' => 'AN1'])->row_array();
                                            ?>
                                            <td>I</td>
                                            <td><?= $ank1['kapasitas'] ?></td>
                                            <td><?= $ank1['tersediapria'] ?></td>
                                            <td><?= $ank1['tersediawanita'] ?></td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $ank2 = $this->db->get_where('new_tt', ['kode_ruang' => 'AN2'])->row_array();
                                            ?>
                                            <td>II</td>
                                            <td><?= $ank2['kapasitas'] ?></td>
                                            <td><?= $ank2['tersediapria'] ?></td>
                                            <td><?= $ank2['tersediawanita'] ?></td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $ank3 = $this->db->get_where('new_tt', ['kode_ruang' => 'AN3'])->row_array();
                                            ?>
                                            <td>III</td>
                                            <td><?= $ank3['kapasitas'] ?></td>
                                            <td><?= $ank3['tersediapria'] ?></td>
                                            <td><?= $ank3['tersediawanita'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card border-info mb-3">
                            <div class="card-body text-dark">
                                <h5 class="card-title">BEDAH</h5>
                                <table class="table table-borderless table-sm table-responsive-lg text-dark">
                                    <thead class="">
                                        <tr>
                                            <th scope="col">KELAS</th>
                                            <th scope="col">KAPASITAS</th>
                                            <th scope="col">PRIA</th>
                                            <th scope="col">WANITA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            $bd1 = $this->db->get_where('new_tt', ['kode_ruang' => 'BD1'])->row_array();
                                            ?>
                                            <td>I</td>
                                            <td><?= $bd1['kapasitas'] ?></td>
                                            <td><?= $bd1['tersediapria'] ?></td>
                                            <td><?= $bd1['tersediawanita'] ?></td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $bd2 = $this->db->get_where('new_tt', ['kode_ruang' => 'BD2'])->row_array();
                                            ?>
                                            <td>II</td>
                                            <td><?= $bd2['kapasitas'] ?></td>
                                            <td><?= $bd2['tersediapria'] ?></td>
                                            <td><?= $bd2['tersediawanita'] ?></td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $bd3 = $this->db->get_where('new_tt', ['kode_ruang' => 'BD3'])->row_array();
                                            ?>
                                            <td>III</td>
                                            <td><?= $bd3['kapasitas'] ?></td>
                                            <td><?= $bd3['tersediapria'] ?></td>
                                            <td><?= $bd3['tersediawanita'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card border-info mb-3">
                            <div class="card-body text-dark">
                                <h5 class="card-title">JANTUNG</h5>
                                <table class="table table-borderless table-sm table-responsive-lg text-dark">
                                    <thead class="">
                                        <tr>
                                            <th scope="col">KELAS</th>
                                            <th scope="col">KAPASITAS</th>
                                            <th scope="col">PRIA</th>
                                            <th scope="col">WANITA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            $jtg1 = $this->db->get_where('new_tt', ['kode_ruang' => 'JTG1'])->row_array();
                                            ?>
                                            <td>I</td>
                                            <td><?= $jtg1['kapasitas'] ?></td>
                                            <td><?= $jtg1['tersediapria'] ?></td>
                                            <td><?= $jtg1['tersediawanita'] ?></td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $jtg2 = $this->db->get_where('new_tt', ['kode_ruang' => 'JTG2'])->row_array();
                                            ?>
                                            <td>II</td>
                                            <td><?= $jtg2['kapasitas'] ?></td>
                                            <td><?= $jtg2['tersediapria'] ?></td>
                                            <td><?= $jtg2['tersediawanita'] ?></td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $jtg3 = $this->db->get_where('new_tt', ['kode_ruang' => 'JTG3'])->row_array();
                                            ?>
                                            <td>III</td>
                                            <td><?= $jtg3['kapasitas'] ?></td>
                                            <td><?= $jtg3['tersediapria'] ?></td>
                                            <td><?= $jtg3['tersediawanita'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card border-info mb-3">
                            <div class="card-body text-dark">
                                <h5 class="card-title">PARU</h5>
                                <table class="table table-borderless table-sm table-responsive-lg text-dark">
                                    <thead class="">
                                        <tr>
                                            <th scope="col">KELAS</th>
                                            <th scope="col">KAPASITAS</th>
                                            <th scope="col">PRIA</th>
                                            <th scope="col">WANITA</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <?php
                                            $pr2 = $this->db->get_where('new_tt', ['kode_ruang' => 'PR2'])->row_array();
                                            ?>
                                            <td>II</td>
                                            <td><?= $pr2['kapasitas'] ?></td>
                                            <td><?= $pr2['tersediapria'] ?></td>
                                            <td><?= $pr2['tersediawanita'] ?></td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $pr3 = $this->db->get_where('new_tt', ['kode_ruang' => 'PR3'])->row_array();
                                            ?>
                                            <td>III</td>
                                            <td><?= $pr3['kapasitas'] ?></td>
                                            <td><?= $pr3['tersediapria'] ?></td>
                                            <td><?= $pr3['tersediawanita'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card border-info mb-3">
                            <div class="card-body text-dark">
                                <h5 class="card-title">PENYAKIT DALAM</h5>
                                <table class="table table-borderless table-sm table-responsive-lg text-dark">
                                    <thead class="">
                                        <tr>
                                            <th scope="col">KELAS</th>
                                            <th scope="col">KAPASITAS</th>
                                            <th scope="col">PRIA</th>
                                            <th scope="col">WANITA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            $pd1 = $this->db->get_where('new_tt', ['kode_ruang' => 'PD1'])->row_array();
                                            ?>
                                            <td>I</td>
                                            <td><?= $pd1['kapasitas'] ?></td>
                                            <td><?= $pd1['tersediapria'] ?></td>
                                            <td><?= $pd1['tersediawanita'] ?></td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $pd2 = $this->db->get_where('new_tt', ['kode_ruang' => 'PD2'])->row_array();
                                            ?>
                                            <td>II</td>
                                            <td><?= $pd2['kapasitas'] ?></td>
                                            <td><?= $pd2['tersediapria'] ?></td>
                                            <td><?= $pd2['tersediawanita'] ?></td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $pd3 = $this->db->get_where('new_tt', ['kode_ruang' => 'PD3'])->row_array();
                                            ?>
                                            <td>III</td>
                                            <td><?= $pd3['kapasitas'] ?></td>
                                            <td><?= $pd3['tersediapria'] ?></td>
                                            <td><?= $pd3['tersediawanita'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card border-info mb-3">
                            <div class="card-body text-dark">
                                <h5 class="card-title">MATA, THT, KULIT</h5>
                                <table class="table table-borderless table-sm table-responsive-lg text-dark">
                                    <thead class="">
                                        <tr>
                                            <th scope="col">KELAS</th>
                                            <th scope="col">KAPASITAS</th>
                                            <th scope="col">PRIA</th>
                                            <th scope="col">WANITA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            $mt1 = $this->db->get_where('new_tt', ['kode_ruang' => 'MT1'])->row_array();
                                            ?>
                                            <td>I</td>
                                            <td><?= $mt1['kapasitas'] ?></td>
                                            <td><?= $mt1['tersediapria'] ?></td>
                                            <td><?= $mt1['tersediawanita'] ?></td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $mt2 = $this->db->get_where('new_tt', ['kode_ruang' => 'MT2'])->row_array();
                                            ?>
                                            <td>II</td>
                                            <td><?= $mt2['kapasitas'] ?></td>
                                            <td><?= $mt2['tersediapria'] ?></td>
                                            <td><?= $mt2['tersediawanita'] ?></td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $mt3 = $this->db->get_where('new_tt', ['kode_ruang' => 'MT3'])->row_array();
                                            ?>
                                            <td>III</td>
                                            <td><?= $mt3['kapasitas'] ?></td>
                                            <td><?= $mt3['tersediapria'] ?></td>
                                            <td><?= $mt3['tersediawanita'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card border-info mb-3">
                            <div class="card-body text-dark">
                                <h5 class="card-title">RAWAT GABUNG</h5>
                                <table class="table table-borderless table-sm table-responsive-lg text-dark">
                                    <thead class="">
                                        <tr>
                                            <th scope="col">KELAS</th>
                                            <th scope="col">KAPASITAS</th>
                                            <th scope="col">WANITA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            $rg1 = $this->db->get_where('new_tt', ['kode_ruang' => 'RG1'])->row_array();
                                            ?>
                                            <td>I</td>
                                            <td><?= $rg1['kapasitas'] ?></td>
                                            <td><?= $rg1['tersediapria'] ?></td>
                                            <td><?= $rg1['tersediawanita'] ?></td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $rg2 = $this->db->get_where('new_tt', ['kode_ruang' => 'RG2'])->row_array();
                                            ?>
                                            <td>II</td>
                                            <td><?= $rg2['kapasitas'] ?></td>
                                            <td><?= $rg2['tersediapria'] ?></td>
                                            <td><?= $rg2['tersediawanita'] ?></td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $rg3 = $this->db->get_where('new_tt', ['kode_ruang' => 'RG3'])->row_array();
                                            ?>
                                            <td>III</td>
                                            <td><?= $rg3['kapasitas'] ?></td>
                                            <td><?= $rg3['tersediapria'] ?></td>
                                            <td><?= $rg3['tersediawanita'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card border-danger mb-3">
                            <div class="card-body text-dark">
                                <h5 class="card-title text-danger">TARIF</h5>
                                <small class="text-danger">PERWAL NO 41 TAHUN 2019</small>
                                <marquee direction="up" height="50%" onmouseout="this.start()" onmouseover="this.stop()" scrollamount="2">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p id="kelas">KELAS I</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p id="harga">Rp. 150.000,-</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p id="kelas">KELAS II</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p id="harga">Rp. 120.000,-</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p id="kelas">KELAS III</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p id="harga">Rp. 80.000,-</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p id="kelas">VIP</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p id="harga">Rp. 650.000,-</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p id="kelas">ISOLASI-<small>PARU</small></p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p id="harga">Rp. 193.750,-</p>
                                        </div>
                                    </div>
                                </marquee>
                            </div>
                        </div>
                    </div>




                </div>
                <div class="row">

                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid text-center my-auto">

                    <p class="mt-3 mb-2">Copyright SIMRS V2.2 <?= date('Y') ?></p>

                </div>

            </footer>


        </div>


        <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendor/datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="<?= base_url('assets/'); ?>vendor/datatable/js/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="<?= base_url('assets/'); ?>vendor/datatable/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?= base_url('assets/'); ?>vendor/datatable/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js" integrity="sha256-DI6NdAhhFRnO2k51mumYeDShet3I8AKCQf/tf7ARNhI=" crossorigin="anonymous"></script>

        <script>
            window.setTimeout("waktu()", 1000);

            function waktu() {
                var waktu = new Date();
                setTimeout("waktu()", 1000);
                document.getElementById("jam").innerHTML = waktu.getHours();
                document.getElementById("menit").innerHTML = waktu.getMinutes();
                document.getElementById("detik").innerHTML = waktu.getSeconds();
            }
        </script>
    </body>

    </html>