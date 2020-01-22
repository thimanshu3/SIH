<?php

$cloudant_username = "b0d8c6c3-d4c4-4029-95f8-a9dcba368f8f-bluemix";
$cloudant_password = "150e8a78ab2aa45424603cf097b8a8ccdfbc6b09ac3994ee784e092319519da0";
$authstring = $cloudant_username.":".$cloudant_password."";//Creating an Authenticaiton String for accessing the Cloudant DB
$dbhost = "b0d8c6c3-d4c4-4029-95f8-a9dcba368f8f-bluemix.cloudant.com";
$dbname = "user-details";
$designdocument = "";
$searchindex = "";

if(isset($_POST['uid']))
{

$uid = $_POST['uid'];
//uid="63FE23"

$data = ' {
  "ticket_number": "'.$uid.'",
  "passenger_name" :"Divya Jain",
  "airline_name":"Indigo",
  "flight_no":"6E 5329",
  "departure_city":"Mumbai",
  "arrival_city":"Banglore",
  "departure_time":"08:45",
  "arrival_time": "10:20" ,
  "duration":"01h35m",
  "layover":"NULL",
  "class":"Economy",
  "seatnumber": "7D",
  "email":"jaindivya@gmail.com",
  "phone":"9784544438",
  "start_date":"22-01-2020",
  "end_date":"22-01-2020"
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

$response=json_decode($response,true);
// print_r($response);
session_start();
$_SESSION['user_id']=$response['id'];
$_SESSION['rev_id']=$response['rev'];

//$response['ok'] will be true if the code is added successfully
  if($response['ok'] == true){
    header("location: ./dashboard.php");
  }

}

else{

	echo '{"result" : "UID not valid!"}';

}
?>
