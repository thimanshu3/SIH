<?php
$cloudant_username = "b0d8c6c3-d4c4-4029-95f8-a9dcba368f8f-bluemix";
$cloudant_password = "150e8a78ab2aa45424603cf097b8a8ccdfbc6b09ac3994ee784e092319519da0";
$authstring = $cloudant_username.":".$cloudant_password."";//Creating an Authenticaiton String for accessing the Cloudant DB
$dbhost = "b0d8c6c3-d4c4-4029-95f8-a9dcba368f8f-bluemix.cloudant.com";

$dbname1 = "food-orders";
$designdocument = "";
$searchindex = "";


$url1 = "https://".$authstring."@".$dbhost."/".$dbname1."/_all_docs?email=sinucosu@gmail.com";

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
echo json_encode($response1 , true);



$url1 = "https://".$authstring."@".$dbhost."/".$dbname1."/_all_docs?id=sinucosu@gmail.com";

$headers = array("Content-Type:application/json");

$ch1 = curl_init();

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_URL, $url1);
curl_setopt($ch, CURLOPT_POST, 0);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_NOBODY, 0);
//curl_setopt($ch, CURLOPT_FAILONERROR, 1);

$response = curl_exec($ch);
curl_close($ch);


//echo $response;
$response1 = json_decode($response1, true);
echo json_encode($response , true);

?>