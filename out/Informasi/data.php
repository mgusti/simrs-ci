<?php require_once('../conf/conf.php'); 
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
date_default_timezone_set("Asia/Bangkok");
$tanggal = mktime(date("m"), date("d"), date("Y"));
$jam = date("H:i"); ?>
<main>
        <!-- container START -->
        <div class="container1" >
            <!-- Row START -->
            
            <div class="row" >
                <div class="col s3" >
                    <div class="card">
                        <div class="card-body">
                            <h3 style="text-align: center">VIP</h3>
                            
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">KAMAR</th>
                                        <th scope="col">TERISI</th>
                                        <th scope="col">TERSEDIA</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'VIP'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total1 from kamar where divisi = 'VIP' and statusdata = '1'")); ?>
                                        <?php echo $data2['total1']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total1 from kamar where divisi = 'VIP' and statusdata = '0'")); ?>
                                        <?php echo $data2['total1']; ?>
                                    </td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col s3">
                    <div class="card" >
                        <div class="card-body">
                            <h3 style="text-align: center">ICU</h3>
                            
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">KAMAR</th>
                                        <th scope="col">TERISI</th>
                                        <th scope="col">TERSEDIA</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'HCU'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total1 from kamar where divisi = 'HCU' and statusdata = '1'")); ?>
                                        <?php echo $data2['total1']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total1 from kamar where divisi = 'HCU' and statusdata = '0'")); ?>
                                        <?php echo $data2['total1']; ?>
                                    </td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col s3">
                    <div class="card" >
                        <div class="card-body">
                            <h3 style="text-align: center">PRT</h3>
                            
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">KAMAR</th>
                                        <th scope="col">TERISI</th>
                                        <th scope="col">TERSEDIA</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'PRT'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total1 from kamar where divisi = 'PRT' and statusdata = '1'")); ?>
                                        <?php echo $data2['total1']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total1 from kamar where divisi = 'PRT' and statusdata = '0'")); ?>
                                        <?php echo $data2['total1']; ?>
                                    </td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col s3" id="">
                    <div class="card" >
                        <div class="card-body">
                            <h3 style="text-align: center">VK</h3>
                            
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">KAMAR</th>
                                        <th scope="col">TERISI</th>
                                        <th scope="col">TERSEDIA</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'VK'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total1 from kamar where divisi = 'VK' and statusdata = '1'")); ?>
                                        <?php echo $data2['total1']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total1 from kamar where divisi = 'VK' and statusdata = '0'")); ?>
                                        <?php echo $data2['total1']; ?>
                                    </td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>       
            </div>
            <div class="row" >
                <div class="col s3" >
                    <div class="card" >
                        <div class="card-body">
                            <h3 style="text-align: center">ANAK</h3>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">KELAS</th>
                                        <th scope="col">L</th>
                                        <th scope="col">P</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>   
                                    <th scope="col">I</th>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'ANAK' and tipe_kamar='L' and statusdata='0' and kelas='1'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total1 from kamar where divisi = 'ANAK' and statusdata = '0' and tipe_kamar='W' and kelas='1'")); ?>
                                        <?php echo $data2['total1']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>II</th>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'ANAK' and tipe_kamar='L' and statusdata='0' and kelas='2'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'ANAK' and tipe_kamar='W' and statusdata='0' and kelas='2'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>III</th>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'ANAK' and tipe_kamar='L' and statusdata='0' and kelas='3'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'ANAK' and tipe_kamar='W' and statusdata='0' and kelas='3'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>    
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col s3" >
                    <div class="card" >
                        <div class="card-body">
                            <h3 style="text-align: center">BEDAH</h3>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">KELAS</th>
                                        <th scope="col">L</th>
                                        <th scope="col">P</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>   
                                    <th scope="col">I</th>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'BEDAH' and tipe_kamar='L' and statusdata='0' and kelas='1'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total1 from kamar where divisi = 'BEDAH' and statusdata = '0' and tipe_kamar='W' and kelas='1'")); ?>
                                        <?php echo $data2['total1']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>II</th>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'BEDAH' and tipe_kamar='L' and statusdata='0' and kelas='2'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'BEDAH' and tipe_kamar='W' and statusdata='0' and kelas='2'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>III</th>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'BEDAH' and tipe_kamar='L' and statusdata='0' and kelas='3'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'BEDAH' and tipe_kamar='W' and statusdata='0' and kelas='3'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>    
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col s3" >
                    <div class="card" >
                        <div class="card-body">
                            <h3 style="text-align: center">JANTUNG</h3>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">KELAS</th>
                                        <th scope="col">L</th>
                                        <th scope="col">P</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>   
                                    <th scope="col">I</th>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'JANTUNG' and tipe_kamar='L' and statusdata='0' and kelas='1'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total1 from kamar where divisi = 'JANTUNG' and statusdata = '0' and tipe_kamar='W' and kelas='1'")); ?>
                                        <?php echo $data2['total1']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>II</th>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'JANTUNG' and tipe_kamar='L' and statusdata='0' and kelas='2'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'JANTUNG' and tipe_kamar='W' and statusdata='0' and kelas='2'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>III</th>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'JANTUNG' and tipe_kamar='L' and statusdata='0' and kelas='3'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'JANTUNG' and tipe_kamar='W' and statusdata='0' and kelas='3'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>    
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col s3" >
                    <div class="card">
                        <div class="card-body">
                            <h3 style="text-align: center">PARU</h3>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">KELAS</th>
                                        <th scope="col">TERISI</th>
                                        <th scope="col">TERSEDIA</th>
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>   
                                    <th scope="col">ISOLASI</th>
                                    
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'ISOLASI' and statusdata='1'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'ISOLASI' and statusdata='0'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <th>II</th>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'PARU' and statusdata='1' and kelas='2'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'PARU' and statusdata='0' and kelas='2'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <th>III</th>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'PARU' and statusdata='1' and kelas='3'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'PARU' and statusdata='0' and kelas='3'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                        
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col s3" >
                    <div class="card" >
                        <div class="card-body">
                            <h3 style="text-align: center">INTERNE & SARAF</h3>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">KELAS</th>
                                        <th scope="col">L</th>
                                        <th scope="col">P</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>   
                                    <th scope="col">I</th>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'INTERNE' and tipe_kamar='L' and statusdata='0' and kelas='1'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total1 from kamar where divisi = 'INTERNE' and statusdata = '0' and tipe_kamar='W' and kelas='1'")); ?>
                                        <?php echo $data2['total1']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>II</th>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'INTERNE' and tipe_kamar='L' and statusdata='0' and kelas='2'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'INTERNE' and tipe_kamar='W' and statusdata='0' and kelas='2'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>III</th>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'INTERNE' and tipe_kamar='L' and statusdata='0' and kelas='3'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'INTERNE' and tipe_kamar='W' and statusdata='0' and kelas='3'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>    
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>   
                </div>
                <div class="col s3" >
                    <div class="card" >
                        <div class="card-body">
                            <h3 style="text-align: center">RAWAT GABUNG</h3>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">KELAS</th>
                                        <th scope="col">TERSEDIA</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>   
                                    <th scope="col">I</th>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'GABUNG' and tipe_kamar='W' and statusdata='0' and kelas='1'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <th>II</th>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'GABUNG' and tipe_kamar='W' and statusdata='0' and kelas='2'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <th>III</th>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'GABUNG' and tipe_kamar='W' and statusdata='0' and kelas='3'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                      
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>   
                </div>
                <div class="col s3" >
                    <div class="card" >
                        <div class="card-body">
                            <h3 style="text-align: center">MATA, THT, KULIT</h3>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">KELAS</th>
                                        <th scope="col">L</th>
                                        <th scope="col">P</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>   
                                    <th scope="col">I</th>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'MTK' and tipe_kamar='L' and statusdata='0' and kelas='1'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total1 from kamar where divisi = 'MTK' and statusdata = '0' and tipe_kamar='W' and kelas='1'")); ?>
                                        <?php echo $data2['total1']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>II</th>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'MTK' and tipe_kamar='L' and statusdata='0' and kelas='2'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'MTK' and tipe_kamar='W' and statusdata='0' and kelas='2'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>III</th>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'MTK' and tipe_kamar='L' and statusdata='0' and kelas='3'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>
                                    <td>
                                        <?php $data2 = mysqli_fetch_array(bukaquery("select tipe_kamar, count(tipe_kamar)as total from kamar where divisi = 'MTK' and tipe_kamar='W' and statusdata='0' and kelas='3'")); ?>
                                        <?php echo $data2['total']; ?>
                                    </td>    
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>   
                </div>
                
            </div>
            
                
        </div>
    </main>