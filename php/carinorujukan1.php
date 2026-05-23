<?php
// if(!isset($_POST["nokartu"])){
//    $tes= 0;
//    header("location:" . base_url("menu"));
//    $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Data tidak ditemukan</div>');
   
// }else{
    $data = "29409";
    $secretKey = "1iQ5B4702D";
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

$no = $_GET["norujukan"];

curl_setopt($ch, CURLOPT_URL, "https://dvlp.bpjs-kesehatan.go.id/VClaim-rest/Rujukan/$no");
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
$norujukan = json_decode($content, true);



//}
?>