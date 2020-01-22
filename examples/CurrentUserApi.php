<?php
$cloudant_username = "b0d8c6c3-d4c4-4029-95f8-a9dcba368f8f-bluemix";
$cloudant_password = "150e8a78ab2aa45424603cf097b8a8ccdfbc6b09ac3994ee784e092319519da0";
$authstring = $cloudant_username.":".$cloudant_password."";//Creating an Authenticaiton String for accessing the Cloudant DB
$dbhost = "b0d8c6c3-d4c4-4029-95f8-a9dcba368f8f-bluemix.cloudant.com";

$dbname1 = "user-details";
$designdocument = "";
$searchindex = "";


$url1 = "https://".$authstring."@".$dbhost."/".$dbname1."/".$_SESSION['user_id'];

$headers = array("Content-Type:application/json");

$ch1 = curl_init();

curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch1, CURLOPT_HEADER, 0);
curl_setopt($ch1, CURLOPT_URL, $url1);
curl_setopt($ch1, CURLOPT_POST, 0);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLOPT_NOBODY, 0);
//curl_setopt($ch, CURLOPT_FAILONERROR, 1);

$response1 = curl_exec($ch1);
curl_close($ch1);


//echo $response;
$response1 = json_decode($response1, true);
print_r($response1);


?>