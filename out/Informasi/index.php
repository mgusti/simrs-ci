<?php require_once('../conf/conf.php');
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
date_default_timezone_set("Asia/Bangkok");
$tanggal = mktime(date("m"), date("d"), date("Y"));
$jam = date("H:i");
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

  <!--<meta http-equiv="refresh" content="60; URL=http://localhost/simrs/out/informasi/video.php" />-->
  <link href="img/favicon.ico" rel="shortcut icon">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/template-informasi.css">

  <link href="fonts/fontawesome/css/all.css" rel="stylesheet">



  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
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

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>

  </style>
</head>

<body>
  <nav class="navbar fixed-top navbar-light">
    <div class="banner-nav-informasi"><i class="fa fa-plus-square"></i> <span>Informasi Ketersediaan Tempat Tidur RSUD H. Abdul Manap Kota Jambi</span></div>
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

  <div class="container-informasi">

    <div class="row">
      <div class="column">
        <!-- VIP -->
        <div class="card">
          <h2>VIP</h2>
          <table class="table">
            <thead>
              <tr>
                <th>KAPASITAS</th>
                <th>TERSEDIA</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'VIP'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
                
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total1 from bed where subbidang = 'VIP' and status = 'KOSONG'")); ?>
                  <?php echo $data2['total1']; ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="column">
        <!-- HCU -->
        <div class="card">
          <h2>ICU</h2>
          <table>
            <thead>
              <tr>
                <th>KAPASITAS</th>
                
                <th>TERSEDIA</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'ICU'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
                
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total1 from bed where subbidang = 'ICU' and status = 'KOSONG'")); ?>
                  <?php echo $data2['total1']; ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <h2>PRT</h2>
          <table>
            <thead>
              <tr>
                <th>KAPASITAS</th>
                
                <th>TERSEDIA</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'PRT'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
                
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total1 from bed where subbidang = 'PRT' and status = 'KOSONG'")); ?>
                  <?php echo $data2['total1']; ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <h2>VK</h2>
          <table>
            <thead>
              <tr>
                <th>KAPASITAS</th>
                
                <th>TERSEDIA</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'VK'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
                
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total1 from bed where subbidang = 'VK' and status = 'KOSONG'")); ?>
                  <?php echo $data2['total1']; ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="column">
        <!-- VIP -->
        <div class="card">
          <h2>ANAK</h2>
          <table>
            <thead>
              <tr>
                <th>KELAS</th>
              
                <th>Tsd Pria</th>
                <th>Tsd Wanita</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>I</td>
                
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'ANAK' and tipe_bed='L' and status='KOSONG' and kelas='KL1'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total1 from bed where subbidang = 'ANAK' and status='KOSONG' and tipe_bed='P' and kelas='KL1'")); ?>
                  <?php echo $data2['total1']; ?>
                </td>
              </tr>
              <tr>
                <td>II</td>
                
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'ANAK' and tipe_bed='L' and status='KOSONG' and kelas='KL2'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'ANAK' and tipe_bed='P' and status='KOSONG' and kelas='KL2'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
              </tr>
              <tr>
                <td>III</td>
                
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'ANAK' and tipe_bed='L' and status='KOSONG' and kelas='KL3'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'ANAK' and tipe_bed='P' and status='KOSONG' and kelas='KL3'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="column">
        <!-- BEDAH -->
        <div class="card">
          <h2>BEDAH</h2>
          <table>
            <thead>
              <tr>
                <th>KELAS</th>
                <th>Tsd Pria</th>
                <th>Tsd Wanita</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>I</td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'BEDAH' and tipe_bed='L' and status='KOSONG' and kelas='KL1'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total1 from bed where subbidang = 'BEDAH' and status='KOSONG' and tipe_bed='P' and kelas='KL1'")); ?>
                  <?php echo $data2['total1']; ?>
                </td>
              </tr>
              <tr>
                <td>II</td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'BEDAH' and tipe_bed='L' and status='KOSONG' and kelas='KL2'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'BEDAH' and tipe_bed='P' and status='KOSONG' and kelas='KL2'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
              </tr>
              <tr>
                <td>III</td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'BEDAH' and tipe_bed='L' and status='KOSONG' and kelas='KL3'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'BEDAH' and tipe_bed='P' and status='KOSONG' and kelas='KL3'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="column">
        <!-- JANTUNG -->
        <div class="card">
          <h2>JANTUNG</h2>
          <table>
            <thead>
              <tr>
                <th>KELAS</th>
                <th>Tsd Pria</th>
                <th>Tsd Wanita</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>I</td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'JANTUNG' and tipe_bed='L' and status='KOSONG' and kelas='KL1'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total1 from bed where subbidang = 'JANTUNG' and status='KOSONG' and tipe_bed='P' and kelas='KL1'")); ?>
                  <?php echo $data2['total1']; ?>
                </td>
              </tr>
              <tr>
                <td>II</td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'JANTUNG' and tipe_bed='L' and status='KOSONG' and kelas='KL2'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'JANTUNG' and tipe_bed='P' and status='KOSONG' and kelas='KL2'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
              </tr>
              <tr>
                <td>III</td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'JANTUNG' and tipe_bed='L' and status='KOSONG' and kelas='KL3'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'JANTUNG' and tipe_bed='P' and status='KOSONG' and kelas='KL3'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="column">
        <!-- PARU -->
        <div class="card">
          <h2>PARU</h2>
          <table>
            <thead>
              <tr>
                <th>KELAS</th>
                <th>Tsd Pria</th>
                <th>Tsd Wanita</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>ISOLASI</td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang='PARU' and status='KOSONG' and kelas='ISO' and tipe_bed='L'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang='PARU' and status='KOSONG' and kelas='ISO' and tipe_bed='P'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
              </tr>
              <tr>
                <td>II</td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang='PARU' and status='KOSONG' and kelas='KL2' and tipe_bed='L'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang='PARU' and status='KOSONG' and kelas='KL2' and tipe_bed='P'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
              </tr>
              <tr>
                <td>III</td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'PARU' and status='KOSONG' and kelas='KL3' and tipe_bed='L'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'PARU' and status='KOSONG' and kelas='KL3' and tipe_bed='P'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="column">
        <!-- JANTUNG -->
        <div class="card">
          <h2>INTERNE & SARAF</h2>
          <table>
            <thead>
              <tr>
                <th>KELAS</th>
                <th>Tsd Pria</th>
                <th>Tsd Wanita</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>I</td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'INTERNE SARAF' and tipe_bed='L' and status='KOSONG' and kelas='KL1'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total1 from bed where subbidang = 'INTERNE SARAF' and status='KOSONG' and tipe_bed='P' and kelas='KL1'")); ?>
                  <?php echo $data2['total1']; ?>
                </td>
              </tr>
              <tr>
                <td>II</td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'INTERNE SARAF' and tipe_bed='L' and status='KOSONG' and kelas='KL2'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'INTERNE SARAF' and tipe_bed='P' and status='KOSONG' and kelas='KL2'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
              </tr>
              <tr>
                <td>III</td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'INTERNE SARAF' and tipe_bed='L' and status='KOSONG' and kelas='KL3'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'INTERNE SARAF' and tipe_bed='P' and status='KOSONG' and kelas='KL3'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="column">
        <!-- JANTUNG -->
        <div class="card">
          <h2>MATA, THT & KULIT</h2>
          <table>
            <thead>
              <tr>
                <th>KELAS</th>
                <th>Tsd Pria</th>
                <th>Tsd Wanita</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>I</td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'MTK' and tipe_bed='L' and status='KOSONG' and kelas='KL1'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total1 from bed where subbidang = 'MTK' and status='KOSONG' and tipe_bed='P' and kelas='KL1'")); ?>
                  <?php echo $data2['total1']; ?>
                </td>
              </tr>
              <tr>
                <td>II</td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'MTK' and tipe_bed='L' and status='KOSONG' and kelas='KL2'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'MTK' and tipe_bed='P' and status='KOSONG' and kelas='KL2'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
              </tr>
              <tr>
                <td>III</td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'MTK' and tipe_bed='L' and status='KOSONG' and kelas='KL3'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'MTK' and tipe_bed='P' and status='KOSONG' and kelas='KL3'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="column">
        <!-- RAWAT GABUNG -->
        <div class="card">
          <h2>RAWAT GABUNG</h2>
          <table>
            <thead>
              <tr>
                <th>KELAS</th>
                <th>TERSEDIA</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>I</td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'RAWAT GABUNG' and tipe_bed='P' and status='KOSONG' and kelas='KL1'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
              </tr>
              <tr>
                <td>II</td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'RAWAT GABUNG' and tipe_bed='P' and status='KOSONG' and kelas='KL2'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
              </tr>
              <tr>
                <td>III</td>
                <td>
                  <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_bed, count(tipe_bed)as total from bed where subbidang = 'RAWAT GABUNG' and tipe_bed='P' and status='KOSONG' and kelas='KL3'")); ?>
                  <?php echo $data2['total']; ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      

    </div>
  </div>

  <div id="footer" class="navbar fixed-bottom">
    <!--FOOTER-->
    <div class="footer-tarif">Tarif bed :</div>
    <div class="row align-items-center">
      <marquee style="width: 100%;">
        Kelas 1 Rp. 150.000,- &nbsp &nbsp &nbsp &nbsp
        Kelas 2 Rp. 120.000,- &nbsp &nbsp &nbsp &nbsp
        Kelas 3 Rp. 80.000,- &nbsp &nbsp &nbsp &nbsp
        VIP Rp. 650.000,- &nbsp &nbsp &nbsp &nbsp
        ISOLASI(Paru) Rp. 193.750,-
      </marquee>
    </div>
  </div>
</body>

</html>