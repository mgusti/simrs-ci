<?php

//if(!isset($_POST["start"]) and (!isset($_POST["limit"]))){
    //$tes= 0;
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
        "Content-Type: application/json"
    );
    //$start = $_POST["start"];
	//$limit = $_POST["limit"];
    curl_setopt($ch, CURLOPT_URL, "https://dvlp.bpjs-kesehatan.go.id:8888/aplicaresws/rest/bed/read/0082R003/1/100");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 31);
    curl_setopt($ch, CURLOPT_HTTPGET, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //json_decode($ch);
	$content = curl_exec($ch);
    $err = curl_error($ch);

    echo $err;

    //echo $content;
    $tes = json_decode($content, true);
//}

?>