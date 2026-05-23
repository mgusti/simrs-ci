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

$no = $_GET["nokartu"];

curl_setopt($ch, CURLOPT_URL, "https://dvlp.bpjs-kesehatan.go.id/VClaim-rest/Rujukan/RS/List/Peserta/$no");
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
$rujukan = json_decode($content, true);
$i= 1;
?>
<div class="row">
    <div class="alert alert-warning" role="alert" id="errujukan">
       Code : <?= $rujukan["metaData"]["code"]?> Message : <?= $rujukan["metaData"]["message"]?>
    </div>
</div>
<table class='table'>
<thead>
  <tr>
    <th scope='col'>NO.</th>
    <th scope='col'>No. Rujukan</th>
    <th scope='col'>Tgl Rujukan</th>
    <th scope='col'>Faskes Perujuk</th>
    <th scope='col'>Poli Rujukan</th>
    <th scope='col'>Pelayanan</th>

   
  </tr>
</thead>

<?php
    foreach ($rujukan["response"]["rujukan"] as $a) :
?>
<tbody>
  <tr>
    <th scope='row'><?=$i++?></th>
    <td><a class="badge badge-primary" href="<?= 'http://localhost/rawatInap/pendaftaran/sepbarurujukan?norujukan='?><?= $a['noKunjungan']?>"><?= $a['noKunjungan']?></a></td>
    <td><?= $a["tglKunjungan"] ?></td>
    <td><?= $a['provPerujuk']['nama']?></td>
    <td><?= $a['poliRujukan']['nama']?></td>
    <td><?= $a['pelayanan']['nama']?></td>
   
  </tr>

</tbody>
<?php
endforeach;
?>
</table>



