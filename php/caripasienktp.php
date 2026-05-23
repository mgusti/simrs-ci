<?php

//if($_GET["nosep"]== ""){
	
      //header("location:https://localhost/anjunganmandiri/menu");
   //$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">No SEP Tidak Boleh Kosong</div>');
//}else{

    $data = "6810";
    $secretKey = "1tP2B745C1";
    date_default_timezone_set('UTC');
    $tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
    $signature = hash_hmac('sha256', $data . "&" . $tStamp, $secretKey, true);
    $encodedSignature = base64_encode($signature);
    
    $ch = curl_init();
    $headers = array(
        "X-cons-id:" . $data,
        "X-timestamp: " . $tStamp,
        "X-signature: " . $encodedSignature,
        "Content-Type: Application/x-www-form-urlencoded"
    );
    $cari = $_GET["cari1"];
    $tgl = date('Y-m-d');
    curl_setopt($ch, CURLOPT_URL, "https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/Peserta/nik/$cari/tglSEP/$tgl");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 31);
    curl_setopt($ch, CURLOPT_HTTPGET, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //json_decode($ch);
    $content = curl_exec($ch);
    $err = curl_error($ch);

    echo $err;

    echo $content;
    
    //$tes = json_decode($content, true);
    //echo $tes["metaData"]["message"];
    //echo $tes;

        
        //endforeach;
	//if($tes['response']== null){
		
      //header("location:https://localhost/anjunganmandiri/menu");
	//$this->session->set_flashdata('messege', '<div class="alert alert-warning" role="alert"> Code : ' . $tes["metaData"]["code"] . ' Message : ' . $tes["metaData"]["message"] . '</div>');
	//}
	//else{
		//$tes;
	//}


?>