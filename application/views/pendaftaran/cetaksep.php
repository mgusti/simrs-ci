<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cetak SEP</title>

    <!-- Custom fonts for this theme -->
    <link href="<?=base_url('assets/')?>cetak/metro/build/css/metro-all.min.css" rel="stylesheet"
      type="text/css">
    <link href="<?=base_url('assets/')?>cetak/fontawesome-free/css/all.min.css" rel="stylesheet"
      type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700"
      rel="stylesheet" type="text/css">
    <link
      href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic"
      rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="<?=base_url('assets/')?>cetak/jnumpad/jquery.numpad.css" rel="stylesheet">
    <link href="<?=base_url('assets/')?>cetak/css/freelancer.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>cetak/datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css">
 
    <style>
      #link{
        width : 200px;
      }
      #logo{
        width : 500px;
      }
      
			
		
			
			
    </style>

<style type="text/css">
    body {
		font-family: 'Varela Round', sans-serif;
	}
	.modal-confirm {		
		color: #636363;
		width: 400px;
	}
	.modal-confirm .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
        text-align: center;
		font-size: 14px;
	}
	.modal-confirm .modal-header {
		border-bottom: none;   
        position: relative;
	}
	.modal-confirm h4 {
		text-align: center;
		font-size: 26px;
		margin: 30px 0 -10px;
	}
	.modal-confirm .close {
        position: absolute;
		top: -5px;
		right: -2px;
	}
	.modal-confirm .modal-body {
		color: #999;
	}
	.modal-confirm .modal-footer {
		border: none;
		text-align: center;		
		border-radius: 5px;
		font-size: 13px;
		padding: 10px 15px 25px;
	}
	.modal-confirm .modal-footer a {
		color: #999;
	}		
	.modal-confirm .icon-box {
		width: 80px;
		height: 80px;
		margin: 0 auto;
		border-radius: 50%;
		z-index: 9;
		text-align: center;
		border: 3px solid #f15e5e;
	}
	.modal-confirm .icon-box i {
		color: #f15e5e;
		font-size: 46px;
		display: inline-block;
		margin-top: 13px;
	}
    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
		background: #60c7c1;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
		min-width: 120px;
        border: none;
		min-height: 40px;
		border-radius: 3px;
		margin: 0 5px;
		outline: none !important;
    }
	.modal-confirm .btn-info {
        background: #c1c1c1;
    }
    .modal-confirm .btn-info:hover, .modal-confirm .btn-info:focus {
        background: #a8a8a8;
    }
    .modal-confirm .btn-danger {
        background: #f15e5e;
    }
    .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
        background: #ee3535;
    }
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style>

<style>
    .loader {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 10;
      background: url("<?= base_url('assets/img/pageLoader.gif'); ?>") 50% 50% no-repeat rgb(249, 249, 249);
      opacity: .8;
    }
  </style>
  
 
  </head>



  <body id="page-top">
  

  <!-- Page Wrapper -->
  <div id="wrapper">

<div class="container-fluid mt-4">
<div class="header">
    <img class="mt-3" src="<?= base_url('assets/img/bpjs1.png')?>" alt="abc" id="gmbr">
    <center><h4> SURAT ELEGIBILITAS PESERTA BPJS </h4><h5>RSUD H. ABDUL MANAP KOTA JAMBI</h5></center>
</div>
    <div class="row">
        <div class="col-lg-12">
        <table>
            <tbody>
                <tr>
                    <th scope="row">No. SEP</th>
                    <td> : </td>
                    <td><?= $sep1['nosep']?></td>
                    <th scope="row">Peserta</th>
                    <td>:</td>
                    <td><?= $sep1['jnspeserta']?></td>
                    
                    <th>DINSOS</th>
                    <td>:</td>
                    <td><?= $sep1['dinsos']?></td>

                </tr>
                <tr>
                    <th scope="row">Tgl. SEP</th>
                    <td> : </td>
                    <td><?= $sep1['tgl_sep']?></td>
                    <th scope="row">COB</th>
                    <td> : </td>
                    <td><?= $sep1['cob']?></td>
                    
                    <th>PORLANISPRB</th>
                    
                    <td>:</td>
                    <td><?= $sep1['porlanisprb']?></td>
                </tr>
                </tr>
                <tr>
                    <th scope="row">No. Kartu</th>
                    <td> : </td>
                    <td><?= $sep1['nokartu']?> (MR. <?=$sep1['nomr']?>)</td>
                    <th scope="row">Penjamin</th>
                    <td> : </td>
                    <td><?= $sep1['penjamin']?></td>
                    <th>SKTM</th>
                    <td> : </td>
                    <td><?= $sep1['nosktm']?></td>
                </tr>
                </tr>
                <tr>
                    <th scope="row">Nama Peserta</th>
                    <td> : </td>
                    <td><?= $sep1['nama']?></td>
                    <th scope="row">Kls Rawat</th>
                    <td> : </td>
                    <td><?= $sep1['kelas']?></td>
                    
                </tr>
                <tr>
                    <th scope="row">Tgl. Lahir</th>
                    <td> : </td>
                    <td><?= $sep1['tgllahir']?> Kelamin : <?= $sep1['kelamin']?></td>
                    <th scope="row">Jns. Rawat</th>
                    <td> : </td>
                    <td><?= $sep1['jnspelayanan']?></td>
                </tr>
                 <tr>
                    <th scope="row">Sub/ Spesialis</th>
                    <td> : </td>
                    <td><?= $sep1['poli']?></td>
                    <th scope="row">Antrian Ke</th>
                    <td> : </td>
                    <td><?= $sep1['antrian']?></td>
                </tr>
                <tr>
                    <th scope="row">No Rujukan</th>
                    <td> : </td>
                    <td><?= $sep1['norujukan']?></td>
                    
                </tr>
                <tr>
                    <th scope="row">Diagnosa Awal</th>
                    <td> : </td>
                    <td><?= $sep1['diagnosa']?></td>
                </tr>
                <tr>
                    <th scope="row">Catatan</th>
                    <td> : </td>
                    <td><?= $sep1['catatan']?></td>
                </tr>
               
            
            </tbody>
        </table>
        </div>
        
    </div>

    <small id="smal">* Saya menyetujui BPJS Kesehatan menggunakan informasi medis pasien jika diperlukan.</small><br>
    <small id="smal">* SEP Bukan sebagai bukti penjamin peserta.</small>

    <tr>
        <th><p class="text-right">Pasien/Keluarga Pasien</p></th>
        
    </tr>
    <br>
    <tr>
        <th><p class="text-left">copy ke 1 <?= date('Y-m-d h:m:s')?> WIB</p></th>
        
    </tr>
    
</div>



<style>
    #smal{
        color: red;
    }
    #gmbr{
        width: 150px;
        float: left;
        height : 50px;
        
    }
 @media print {

html, body {
  height:100%; 
  margin: 0 !important; 
  padding: 0 !important;
  overflow: hidden;
}

}
</style>
<hr>



<div class="container-fluid mt-4">
<div class="header">
    <img class="mt-3" src="<?= base_url('assets/img/bpjs1.png')?>" alt="abc" id="gmbr">
    <center><h4> SURAT ELEGIBILITAS PESERTA BPJS </h4><h5>RSUD H. ABDUL MANAP KOTA JAMBI</h5></center>
</div>
    <div class="row">
        <div class="col-lg-12">
        <table>
            <tbody>
                <tr>
                    <th scope="row">No. SEP</th>
                    <td> : </td>
                    <td><?= $sep1['nosep']?></td>
                    <th scope="row">Peserta</th>
                    <td>:</td>
                    <td><?= $sep1['jnspeserta']?></td>
                    <th>DINSOS</th>
                    <td>:</td>
                    <td><?= $sep1['dinsos']?></td>
                </tr>
                <tr>
                    <th scope="row">Tgl. SEP</th>
                    <td> : </td>
                    <td><?= $sep1['tgl_sep']?></td>
                    <th scope="row">COB</th>
                    <td> : </td>
                    <td><?= $sep1['cob']?></td>
                    <th>PORLANISPRB</th>
                    
                    <td>:</td>
                    <td><?= $sep1['porlanisprb']?></td>
                </tr>
                </tr>
                <tr>
                    <th scope="row">No. Kartu</th>
                    <td> : </td>
                    <td><?= $sep1['nokartu']?> (MR. <?=$sep1['nomr']?>)</td>
                    <th scope="row">Penjamin</th>
                    <td> : </td>
                    <td><?= $sep1['penjamin']?></td>
                    <th>SKTM</th>
                    <td> : </td>
                    <td><?= $sep1['nosktm']?></td>
                </tr>
                </tr>
                <tr>
                    <th scope="row">Nama Peserta</th>
                    <td> : </td>
                    <td><?= $sep1['nama']?></td>
                    <th scope="row">Kls Rawat</th>
                    <td> : </td>
                    <td><?= $sep1['kelas']?></td>
                </tr>
                <tr>
                    <th scope="row">Tgl. Lahir</th>
                    <td> : </td>
                    <td><?= $sep1['tgllahir']?> Kelamin : <?= $sep1['kelamin']?></td>
                    <th scope="row">Jns. Rawat</th>
                    <td> : </td>
                    <td><?= $sep1['jnspelayanan']?></td>
                </tr>
                 <tr>
                    <th scope="row">Sub/ Spesialis</th>
                    <td> : </td>
                    <td><?= $sep1['poli']?></td>
                    <th scope="row">Antrian Ke</th>
                    <td> : </td>
                    <td><?= $sep1['antrian']?></td>
                </tr>
                <tr>
                    <th scope="row">No Rujukan</th>
                    <td> : </td>
                    <td><?= $sep1['norujukan']?></td>
                    
                </tr>
                <tr>
                    <th scope="row">Diagnosa Awal</th>
                    <td> : </td>
                    <td><?= $sep1['diagnosa']?></td>
                </tr>
                <tr>
                    <th scope="row">Catatan</th>
                    <td> : </td>
                    <td><?= $sep1['catatan']?></td>
                </tr>
            </tbody>
        </table>
        </div>
        
    </div>

    <small id="smal">* Saya menyetujui BPJS Kesehatan menggunakan informasi medis pasien jika diperlukan.</small><br>
    <small id="smal">* SEP Bukan sebagai bukti penjamin peserta.</small>

    <tr>
        <th><p class="text-right">Pasien/Keluarga Pasien</p></th>
        
    </tr>
    <br>
    <tr>
        <th><p class="text-left">copy ke 2 <?= date('Y-m-d h:m:s')?> WIB</p></th>
        
    </tr>
    
</div>

<hr>



<div class="container-fluid mt-4">
<div class="header">
    <img class="mt-3" src="<?= base_url('assets/img/bpjs1.png')?>" alt="abc" id="gmbr">
    <center><h4> SURAT ELEGIBILITAS PESERTA BPJS </h4><h5>RSUD H. ABDUL MANAP KOTA JAMBI</h5></center>
</div>
    <div class="row">
        <div class="col-lg-12">
        <table>
            <tbody>
                <tr>
                    <th scope="row">No. SEP</th>
                    <td> : </td>
                    <td><?= $sep1['nosep']?></td>
                    <th scope="row">Peserta</th>
                    <td>:</td>
                    <td><?= $sep1['jnspeserta']?></td>
                    <th>DINSOS</th>
                    <td>:</td>
                    <td><?= $sep1['dinsos']?></td>
                </tr>
                <tr>
                    <th scope="row">Tgl. SEP</th>
                    <td> : </td>
                    <td><?= $sep1['tgl_sep']?></td>
                    <th scope="row">COB</th>
                    <td> : </td>
                    <td><?= $sep1['cob']?></td>
                    <th>PORLANISPRB</th>
                    
                    <td>:</td>
                    <td><?= $sep1['porlanisprb']?></td>
                </tr>
                </tr>
                <tr>
                    <th scope="row">No. Kartu</th>
                    <td> : </td>
                    <td><?= $sep1['nokartu']?> (MR. <?=$sep1['nomr']?>)</td>
                    <th scope="row">Penjamin</th>
                    <td> : </td>
                    <td><?= $sep1['penjamin']?></td>
                    <th>SKTM</th>
                    <td> : </td>
                    <td><?= $sep1['nosktm']?></td>
                </tr>
                </tr>
                <tr>
                    <th scope="row">Nama Peserta</th>
                    <td> : </td>
                    <td><?= $sep1['nama']?></td>
                    <th scope="row">Kls Rawat</th>
                    <td> : </td>
                    <td><?= $sep1['kelas']?></td>
                </tr>
                <tr>
                    <th scope="row">Tgl. Lahir</th>
                    <td> : </td>
                    <td><?= $sep1['tgllahir']?> Kelamin : <?= $sep1['kelamin']?></td>
                    <th scope="row">Jns. Rawat</th>
                    <td> : </td>
                    <td><?= $sep1['jnspelayanan']?></td>
                </tr>
                 <tr>
                    <th scope="row">Sub/ Spesialis</th>
                    <td> : </td>
                    <td><?= $sep1['poli']?></td>
                    <th scope="row">Antrian Ke</th>
                    <td> : </td>
                    <td><?= $sep1['antrian']?></td>
                </tr>
                <tr>
                    <th scope="row">No Rujukan</th>
                    <td> : </td>
                    <td><?= $sep1['norujukan']?></td>
                    
                </tr>
                <tr>
                    <th scope="row">Diagnosa Awal</th>
                    <td> : </td>
                    <td><?= $sep1['diagnosa']?></td>
                </tr>
                <tr>
                    <th scope="row">Catatan</th>
                    <td> : </td>
                    <td><?= $sep1['catatan']?></td>
                </tr>
            </tbody>
        </table>
        </div>
        
    </div>

    <small id="smal">* Saya menyetujui BPJS Kesehatan menggunakan informasi medis pasien jika diperlukan.</small><br>
    <small id="smal">* SEP Bukan sebagai bukti penjamin peserta.</small>

    <tr>
        <th><p class="text-right">Pasien/Keluarga Pasien</p></th>
        
    </tr>
    <br>
    <tr>
        <th><p class="text-left">copy ke 3 <?= date('Y-m-d h:m:s')?> WIB</p></th>
        
    </tr>
    
</div>

<script src="<?= base_url('assets/'); ?>cetak/jquery/jquery.min.js"></script>
      <script src="<?= base_url('assets/'); ?>cetak/bootstrap/js/bootstrap.bundle.min.js"></script>
      
      

<!-- Bootstrap core JavaScript -->
<script src="<?=base_url('assets/')?>cetak/jquery/jquery.min.js"></script>
    <script src="<?=base_url('assets/')?>cetak/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?=base_url('assets/')?>cetak/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?=base_url('assets/')?>cetak/js/jqBootstrapValidation.js"></script>
    <script src="<?=base_url('assets/')?>cetak/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?=base_url('assets/')?>cetak/jnumpad/jquery.numpad.js"></script>
    <script src="<?=base_url('assets/')?>cetak/js/freelancer.min.js"></script>
    <script src="<?= base_url('assets/'); ?>cetak/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?= base_url('assets/'); ?>cetak/metro/build/js/metro.min.js"></script>
    <script src="<?= base_url('assets/'); ?>cetak/metro/build/js/metro.js"></script>
    <script>
       $(document).ready(function(){
        var poli = $("#poli").val();

        $.ajax({
              type: 'get',
              url: "<?= base_url('bpjs/antrian');?>",
              dataType: 'json',
              data: "poli="+poli,
              success: function(poli){
                
                $("#antrian").val(poli["total"]);
                
               
              }
            });
         
        
    
       })
    </script>
    <script>
		window.print();
        //window.location.href = "http://localhost/anjunganmandiri";
</script>
  </body>

</html>







