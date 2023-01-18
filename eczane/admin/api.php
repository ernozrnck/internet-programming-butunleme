
<!-- nöbetçi eczane api -->

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.nosyapi.com/apiv2/pharmacy/get?city=istanbul&county=avcilar",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Authorization: Bearer SRCIPUaybgi6ugG4qN7S95ZSuBjqYrt4CwB5FCCoR2qfk7Uu6KSSVYCc3YFa"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response; 

?>