<?php
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
    $nokartu1 = $_GET["nokartu1"];
    $tglmulai = $_GET["tglmulai"];
    $tglakhir = $_GET["tglakhir"];
    curl_setopt($ch, CURLOPT_URL, "https://dvlp.bpjs-kesehatan.go.id/VClaim-rest/monitoring/HistoriPelayanan/NoKartu/$nokartu1/tglMulai/$tglmulai/tglAkhir/$tglakhir");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 31);
    curl_setopt($ch, CURLOPT_HTTPGET, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //json_decode($ch);
    $content = curl_exec($ch);
    $err = curl_error($ch);

    //echo $err;

    echo $content;
	$tes2 = json_decode($content, true);
    echo $tes2["metaData"]["message"];
?>


