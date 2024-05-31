<?php
include 'dbConfig.php';
$uid = $_GET['uid'];
$check_uid = mysqli_query($con, "SELECT * FROM uids WHERE uid = '".$uid."'");
if (mysqli_num_rows($check_uid) == 1) {
$fetchUID = mysqli_fetch_assoc($check_uid);
echo $fetchUID['nickname'];
return false;
}
$apiUrl = 'https://shop.garena.sg/api/auth/player_id_login';
$data = array(
    'app_id' => 100067,
    'login_id' => $uid,
    'app_server_id' => 0
);
$jsonData = json_encode($data);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept-Encoding: gzip, deflate, br',
    'Accept-Language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7',
    'Connection: keep-alive',
    'Content-Length: ' . strlen($jsonData),
    'Cookie: source=mb; _gid=GA1.2.565554625.1701011422; _gat_gtag_UA_137597827_4=1; session_key=4ryv313j988obgb94ip9l871vhu0m0fw; _ga=GA1.2.1754394281.1699017599; datadome=fki3KEySi7F0lUp1DMaCFePgR9nG3XdwZtuoDRp34gfh2oNRxnE4CvcjjfBlNxW0158MQ3Nez3cpOOp9PmS7I6XJzBiQElfH4nkEX5RgWs7myybJjPNf2vyZG5leItY8; _ga_R04L19G92K=GS1.1.1701011410.2.1.1701011454.0.0.0',
    'Host: shop.garena.sg',
    'Origin: https://shop.garena.sg',
    'Referer: https://shop.garena.sg/app/100067/idlogin',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'Accept: application/json',
    'sec-ch-ua: "Not)A;Brand";v="24", "Chromium";v="116"',
    'sec-ch-ua-mobile: ?1',
    'sec-ch-ua-platform: "Android"',
    'x-datadome-clientid: Jmho2Ii8HPbH7oYogHAaf7~jJkrnuoe2Vf7oUk3zBadjqUWaFOuWF6JcUJ9dm0QiVzX_17vUBG4uw9rn8tiFe7oy0Spb6Mf4wJF7DjToYhK3MeHVRgpmGGxRezIKvMP8',
    'User-Agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36'
));
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}
curl_close($ch);
if (strpos($response, "\x1f\x8b\x08") === 0) {
    $response = gzdecode($response);
}
$parsedResponse = json_decode($response, true);
if (isset($parsedResponse['nickname'])) {
$uniqueId = bin2hex(random_bytes(10));
$ign = $parsedResponse['nickname'];
$saveNickname = mysqli_query($con, "INSERT INTO uids (`id`, `uid`, `nickname`) VALUES ('$uniqueId', '$uid', '$ign')");
echo $parsedResponse['nickname'];
} else if (isset($parsedResponse['url'])) {
echo 'captcha';
} else { 
$uniqueId = bin2hex(random_bytes(10));
$saveNickname = mysqli_query($con, "INSERT INTO uids (`id`, `uid`, `nickname`) VALUES ('$uniqueId', '$uid', 'incorrect_player_id')");
echo 'incorrect_player_id';
}
?>

