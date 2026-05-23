<?php

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

$pelayanan = $_GET["jnspelayanan1"];
$tglpelayanan = $_GET["tglsep"];
$spesialis = $_GET["spesialis"];
curl_setopt($ch, CURLOPT_URL, "https://dvlp.bpjs-kesehatan.go.id/VClaim-rest/referensi/dokter/pelayanan/$pelayanan/tglPelayanan/$tglpelayanan/Spesialis/$spesialis");
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
 $test2 = json_decode($content, true);
 
 ?>
 <option value="">-</option>
 <?php
     if($test2["response"] == null){
 
     }else{
         foreach ($test2["response"]['list'] as $tes) :
     
     
 ?>
 <option value="<?= $tes["kode"]?>"><?= $tes["nama"]?></option>
 
 
 
 <?php
     endforeach;
 }
 ?>







