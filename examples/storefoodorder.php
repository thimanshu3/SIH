<?php
require 'credentials.php';

if(isset($_POST['item']))
{

$data = ' {
  "id": "'.$_POST['email'].'", 
  "fooditem": "'.$_POST['item'].'",
  "price" :	"'.$_POST['price'].'",
  "seatnumber": "'.$_POST['seat'].'",
  "status": "False",
  "username": "'.$_POST['username'].'",
  "email" : "'.$_POST['email'].'"
 }';


$url = "https://".$authstring."@".$dbhost."/".$dbname;

$headers = array("Content-Type:application/json");

// $data = json_encode($data);
//echo $url;
//echo $data;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_NOBODY, 0);
//curl_setopt($ch, CURLOPT_FAILONERROR, 1);

$response = curl_exec($ch);
curl_close($ch);

//$response=json_decode($response,true);

//$response['ok'] will be true if the code is added successfully
echo($response);
}

else{

	echo '{"result" : "item or price not given"}';

}
?>
