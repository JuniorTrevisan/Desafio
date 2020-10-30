<?php

echo "<br><h2>Consulta</h2><br>";


echo $url3 = "http://localhost/desafio/user/list/"; 

 
$curl = curl_init($url3);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
   'Content-Type: application/json',
   'Accept: application/json',
   'accept-encoding: compress',
   'user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36'
   ));

$json_response = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);


if ( $status != 200 ) {
    die("Error: call to URL $url3 failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
}


curl_close($curl);

echo "<pre>$json_response</pre>";

echo "<hr>";

?>