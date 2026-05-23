<?php

//if(!isset($_POST["keyword"])){
    //$tes= 0;
//}else{

    $consid = "29409";
    $secretKey = "1iQ5B4702D";
    date_default_timezone_set('UTC');
    $tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
    $signature = hash_hmac('sha256', $consid . "&" . $tStamp, $secretKey, true);
    $encodedSignature = base64_encode($signature);
    
    $ch = curl_init();
    $headers = array(
        "X-cons-id:" . $consid,
        "X-timestamp: " . $tStamp,
        "X-signature: " . $encodedSignature,
        "Content-Type: application/json"
    );

	$kls = $_GET['kls'];
	$ruang = $_GET['ruang'];
	
	$arr=  array (
		"kodekelas" =>"$kls",
		"koderuang" =>"$ruang"
	);

	$json = json_encode($arr);
curl_setopt($ch, CURLOPT_URL, "https://dvlp.bpjs-kesehatan.go.id:8888/aplicaresws/rest/bed/delete/0082R003");
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 3);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //json_decode($ch);
    $content = curl_exec($ch);
    $err = curl_error($ch);

    //echo $err;

    echo $content;
	
    $tes = json_decode($content, true);
	
	redirect('inap/aplicare');
//}

?>