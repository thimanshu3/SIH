<?php
$cloudant_username = "b0d8c6c3-d4c4-4029-95f8-a9dcba368f8f-bluemix";
$cloudant_password = "150e8a78ab2aa45424603cf097b8a8ccdfbc6b09ac3994ee784e092319519da0";
$authstring = $cloudant_username.":".$cloudant_password."";//Creating an Authenticaiton String for accessing the Cloudant DB
$dbhost = "b0d8c6c3-d4c4-4029-95f8-a9dcba368f8f-bluemix.cloudant.com";
$dbname = "food-orders";
$designdocument = "";
$searchindex = "";

$url = "https://" . $authstring . "@" . $dbhost . "/" . $dbname . "/_all_docs?include_docs=true";

$headers = array("Content-Type:application/json");

$ch = curl_init();

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 0);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_NOBODY, 0);
//curl_setopt($ch, CURLOPT_FAILONERROR, 1);

$response = curl_exec($ch);
curl_close($ch);


//echo $response;
$response = json_decode($response, true);


$numberofdocs = $response['total_rows'];

$rows = $response['rows'];

?>