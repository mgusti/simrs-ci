
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
    "Content-Type: Application/x-www-form-urlencoded"
);

$arr=  array (
  'request' => 
  array (
    't_sep' => 
    array (
      'noKartu' => $_POST['noKartu'],
      'tglSep' => $_POST['tglSep'],
      'ppkPelayanan' => '0082R003',
      'jnsPelayanan' => $_POST['jnspelayanan'],
      'klsRawat' => $_POST['klsRawat'],
      'noMR' => $_POST['noMR'],
      'rujukan' => 
      array (
        'asalRujukan' => $_POST['asalRujukan'],
        'tglRujukan' => $_POST['tglrujukan'],
        'noRujukan' => $_POST['norujukan'],
        'ppkRujukan' => $_POST['ppkasal'],
      ),
      'catatan' => $_POST['catatan'],
      'diagAwal' => $_POST['diagAwal'],
      'poli' => 
      array (
        'tujuan' => $_POST['poli'],
        'eksekutif' => '0',
      ),
      'cob' => 
      array (
        'cob' => $_POST['cob'],
      ),
      'katarak' => 
      array (
        'katarak' => $_POST['katarak'],
      ),
      'jaminan' => 
      array (
        'lakaLantas' => $_POST['lakalantas'],
        'penjamin' => 
        array (
          'penjamin' => $_POST['penjamin'],
          'tglKejadian' => $_POST['tglKejadian'],
          'keterangan' => $_POST['keterangan'],
          'suplesi' => 
          array (
            'suplesi' => $_POST['suplesi'],
            'noSepSuplesi' => $_POST['noSepSuplesi'],
            'lokasiLaka' => 
            array (
              'kdPropinsi' => $_POST['provinsi'],
              'kdKabupaten' => $_POST['kota_kab'],
              'kdKecamatan' => $_POST['kecamatan'],
            ),
          ),
        ),
      ),
      'skdp' => 
      array (
        'noSurat' => $_POST['noskdp'],
        'kodeDPJP' => $_POST['kodeDPJP'],
      ),
      'noTelp' => $_POST['noTelp'],
      'user' => $_POST['user'],
    ),
  ),
);                                                   
                            
                                  
$json = json_encode($arr);
//$parameter = $_POST["coba"];
curl_setopt($ch, CURLOPT_URL, "https://dvlp.bpjs-kesehatan.go.id/VClaim-rest/SEP/1.1/insert");
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 3);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//json_decode($ch);
$content = curl_exec($ch);
$err = curl_error($ch);

echo $err;

//print_r($content);
$tes = json_decode($content, true);

//header("location:http://localhost/anjunganmandiri/bpjs/sep?nosep=" . $tes['response']["sep"]['noSep'] . "&error=" . $tes["metaData"]["message"]);


?>
