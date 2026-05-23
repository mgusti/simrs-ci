<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Informasi Ketersediaan Kamar/Kelas</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link href="css/default.css" rel="stylesheet" type="text/css" />
</head>

<body onload="MM_preloadImages('images/menu1.jpg')">

	<div id="main">
		<div id="head"> </div>

		<div id="menutop">


			<!-- Menu Dropdown -->

		</div>
		<?php

		require_once('conf/conf.php');
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache"); // HTTP/1.0
		date_default_timezone_set("Asia/Bangkok");
		$tanggal = mktime(date("m"), date("d"), date("Y"));
		$jam = date("H:i");
		?>

		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link href="css/default.css" rel="stylesheet" type="text/css" />
			<script type="text/javascript" src="conf/validator.js"></script>
			<meta http-equiv="refresh" content="20" />
			<title>Informasi Ketersediaan Kamar</title>
			<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
			<script src="Scripts/AC_ActiveX.js" type="text/javascript"></script>
			<style type="text/css">
				<!--
				body {
					background-image: url();
					background-repeat: no-repeat;
					background-color: #693;
				}
				-->
			</style>
		</head>

		<body>

			<div align="left">
				<script type="text/javascript">
					AC_AX_RunContent('width', '32', 'height', '32'); //end AC code
				</script>
				<noscript>
					<object width="32" height="32">
						<embed width="32" height="32"></embed>
					</object>
				</noscript>
				<?php

				echo "   
		   <table width='100%' align='center' border='0' class='tbl_form' cellspacing='0' cellpadding='0'>
			  <tr>
				
				</td>
				<td>
				   <center>
					  
					  </font> 
					  <font size='5' color='Black' face='Tahoma' >" . date("d-M-Y", $tanggal) . "  " . $jam . "</font>
					  <br><br>
				   </center>
				</td>   
				<td  width='10%' align='left'>
					&nbsp;
				</td>  
				                                                       
			 </tr>
		  </table> ";
				?>
				<table width='100%' bgcolor='FFFFFF' border='0' align='center' cellpadding='0' cellspacing='0'>
					<tr class='head5'>
						<td width='100%'>
							<div align='center'></div>
						</td>
					</tr>
				</table>
				<table width='100%' bgcolor='FFFFFF' border='0' align='center' cellpadding='0' cellspacing='0'>
					<tr class='head4'>
						<td width='40%'>
							<div align='center'>
								<font size='5'><b>KELAS KAMAR</b></font>
							</div>
						</td>
						<td width='20%'>
							<div align='center'>
								<font size='5'><b>JUMLAH BED</b></font>
							</div>
						</td>
						<td width='20%'>
							<div align='center'>
								<font size='5'><b>BED TERISI</b></font>
							</div>
						</td>
						<td width='20%'>
							<div align='center'>
								<font size='5'><b>BED KOSONG</b></font>
							</div>
						</td>
					</tr>

					<?php
					$_sql = "Select kelas from kamar where statusdata='1' group by kelas";
					$hasil = bukaquery($_sql);

					while ($data = mysqli_fetch_array($hasil)) {
						echo "<tr class='isi7' >
					<td align='left'><font size='5' color='#BB00BB' face='Tahoma'><b>" . $data['kelas'] . "</b></font></td>
					<td align='center'>
					     <font size='6' color='red' face='Tahoma'>
					      <b>";
						$data2 = mysqli_fetch_array(bukaquery("select count(kelas) from kamar where statusdata='0' and kelas='" . $data['kelas'] . "'"));
						echo $data2[0];
						echo "</b>
					      </font>
					</td>
					<td align='center'>
					     <font color='#DDDD00' size='6'  face='Tahoma'>
					      <b>";
						$data2 = mysqli_fetch_array(bukaquery("select count(kelas) from kamar where statusdata='1' and kelas='" . $data['kelas'] . "' and status='ISI'"));
						echo $data2[0];
						echo "</b>
					      </font>
					</td>
					<td align='center'>
					      <font color='gren' size='6'  face='Tahoma'>
					      <b>";
						$data2 = mysqli_fetch_array(bukaquery("select count(kelas) from kamar where statusdata='0' and kelas='" . $data['kelas'] . "' and status='KOSONG'"));
						echo $data2[0];
						echo "</b>
					     </font>
					</td>
				</tr> ";
					}
					?>
				</table>
				<table width='100%' bgcolor='FFFFFF' border='0' align='center' cellpadding='0' cellspacing='0'>
					<tr class='head5'>
						<td width='100%'>
							<div align='center'></div>
						</td>
					</tr>
				</table>
		</body>