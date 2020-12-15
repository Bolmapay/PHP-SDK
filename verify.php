<?php
include 'credentials.php';
extract($_GET);


if(isset($_GET['orderid'])){

  // Check Order Detail
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bolmapay.com/api/auth/orders/status/$orderid",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
     'x-access-token: '.$bolma_api.'',
    'Content-Type: application/json',
    'Cookie: __cfduid=d7ef3ab201a455c020299fc6845a1fc9d1606969578'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
 $result = json_decode($response);
 
    // if($result->status == "0"){
        echo $response;
    // }


    
}


?>