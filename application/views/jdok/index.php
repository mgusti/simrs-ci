<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 , user-scalable=no">
  <title>RSUD HAM</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  <link href="<?= base_url('assets/') ?>img/favicon.ico" rel="icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <link href="<?= base_url('assets/') ?>vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>css/style1.css" rel="stylesheet">
</head>
<body>
<?php
    $array_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat", "Sabtu", "Minggu");
    $hari = $array_hari[date("N")];
    $sekarang = $hari;
		?>
  <header id="header">
  <div class="container d-flex">

<div class="logo mr-auto">
    <div><img src="<?= base_url('assets/') ?>img/rs5.png"></div>
</div>
</div>
  </header>
  <section id="hero">
  <div class="container">
        <div class="row d-flex align-items-center">
            <div class=" col-lg-6" data-aos="fade-up">
                <h1>RSUD H. ABDUL MANAP</h1>
                <h2 id="tag">Melayani Dengan Setulus Hati</h2>
               
            </div>
        </div>
    </div>
  </section>
  <main id="main">
<section id="umum" >
    <div class="section-title">
      <h2 data-aos="fade-in">Jadwal Praktek Dokter <?=$judul?></h2> 
    </div>
    <div class="body">
    <h2 data-aos="fade-in" class="text-center">
</h2>
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-6">
              <div class="card text-white bg-secondary mb-3" >
              <form method="GET">
              <select name="hari_kerja" class="browser-default custom-select" id="select1">
                <option value="<?php echo $sekarang?>" <?php echo $sekarang ? 'selected="selected"' : ''; ?>><?php echo $sekarang ?></option>
               <option value="Senin" <?php echo (isset($_GET['hari_kerja']) && $_GET['hari_kerja'] == 'Senin') ? 'selected="selected"' : ''; ?>>Senin</option>
               <option value="Selasa" <?php echo (isset($_GET['hari_kerja']) && $_GET['hari_kerja'] == 'Selasa') ? 'selected="selected"' : ''; ?>>Selasa</option>
               <option value="Rabu" <?php echo (isset($_GET['hari_kerja']) && $_GET['hari_kerja'] == 'Rabu') ? 'selected="selected"' : ''; ?>>Rabu</option>
               <option value="Kamis" <?php echo (isset($_GET['hari_kerja']) && $_GET['hari_kerja'] == 'Kamis') ? 'selected="selected"' : ''; ?>>Kamis</option>
               <option value="Jumat" <?php echo (isset($_GET['hari_kerja']) && $_GET['hari_kerja'] == 'Jumat') ? 'selected="selected"' : ''; ?>>Jumat</option>
               <option value="Sabtu" <?php echo (isset($_GET['hari_kerja']) && $_GET['hari_kerja'] == 'Sabtu') ? 'selected="selected"' : ''; ?>>Sabtu</option>
                    </select>
              </div>
          </div>
          <div class="col-lg-6">
                    <select name="pilih_poli" class="browser-default custom-select">
                      <option disabled selected>-Semua Klinik <?=$judul?>-</option>
                    <?php
             
                    foreach($klinik as $k):
                      ?>
                  
                        <option value="<?= $k['nama_ruangan'] ?>"><?= $k['nama_ruangan'] ?></option>';
                              
            
                     
                      <?php endforeach ?>
                    </select>
            </div>
            <br />
            <br />
              <div class="col-md-12 text-center"> 
                 <button type="submit" class="btn btn-primary">Lihat Hasil</button> 
              </div>
            </form>  
       <br />
       <br />
       <div class="table-responsive">
       <table class="table table-bordered table-striped table-hover bg-light">
      <thead class="thead-dark">
			<tr>
				<th>Klinik</th>
				<th>Nama Dokter</th>
        <th>Jam Praktek</th>
			</tr>
      </thead>
			<?php 
        foreach($haripoli as $hp):
			?>
			<tr>
				<td><?= $hp['nama_ruangan']; ?></td>
				<td><?= $hp['nm_dokter']; ?></td>
        <td><?= $hp['jam_mulai']; ?> - <?= $hp['jam_selesai']; ?></td>
			</tr>
			<?php 
			endforeach
			?>
		</table>
    </div>
    <div class="col-md-12 text-center"> 
    <a class="btn btn-danger" href="https://simanap.rsudkotajambi.id">Kembali Ke Halaman Home</a>
    </div>
</section>
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/venobox/venobox.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/aos/aos.js"></script>
  <script src="<?= base_url('assets/') ?>js/main.js"></script>
</body>
</html>