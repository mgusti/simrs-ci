<?php
	$consid = "29409";
    $secretKey = "1iQ5B4702D";
    date_default_timezone_set('UTC');
    $tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
    $signature = hash_hmac('sha256', $data . "&" . $tStamp, $secretKey, true);
    $encodedSignature = base64_encode($signature);
    
    $ch = curl_init();
    $headers = array(
        "X-cons-id:" . $consid,
        "X-timestamp: " . $tStamp,
        "X-signature: " . $encodedSignature,
        "Content-Type: application/json"
    );
    $tgl = $_POST["tglsepkunjungan"];
    $jnspel = $_POST["jnspel"];
    curl_setopt($ch, CURLOPT_URL, "https://dvlp.bpjs-kesehatan.go.id/VClaim-rest/Monitoring/Kunjungan/Tanggal/$tgl/JnsPelayanan/$jnspel");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 31);
    curl_setopt($ch, CURLOPT_HTTPGET, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //json_decode($ch);
    $content = curl_exec($ch);
    $err = curl_error($ch);

    //echo $err;

    //echo $content;
	$tes1 = json_decode($content, true);

?>
    <thead>
    <tr>
        <th scope="col">No.</th>
        <th scope="col">Diagnosa</th>
        <th scope="col">Jenis Pelayanan</th>
        <th scope="col">Kelas Rawat</th>
        <th scope="col">nama</th>
        <th scope="col">No Kartu</th>
        <th scope="col">No Sep</th>
        <th scope="col">No Rujukan</th>
        <th scope="col">poli</th>
        <th scope="col">Tgl Plg SEP</th>
        <th scope="col">Tgl SEP</th>
    </tr>
    </thead>
<?php
    if($tes1["response"] == null){

    }else{
        foreach ($tes1["response"]["sep"] as $tes) :
    
    
?>

    <tbody>
        <tr>
            <th scope="row">1</th>
            <td><?= $tes["diagnosa"]?></td>
            <td><?= $tes["jnsPelayanan"]?></td>
            <td><?= $tes["kelasRawat"]?></td>
            <td><?= $tes["nama"]?></td>
            <td><?= $tes["noKartu"]?></td>
            <td><?= $tes["noSep"]?></td>
            <td><?= $tes["noRujukan"]?></td>
            <td><?= $tes["poli"]?></td>
            <td><?= $tes["tglPlgSep"]?></td>
            <td><?= $tes["tglSep"]?></td>
        </tr>
    </tbody>



<?php
    endforeach;
}
?>