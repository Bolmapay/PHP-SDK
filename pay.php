<?php
include 'credentials.php';
extract($_POST);


if(isset($_POST['pay_now'])){
$ref = rand(111111111,000000000);
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.bolmapay.com/api/auth/create_new_order',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "amount":"'.$amount.'",
    "email":"'.$email.'",
    "phone":"'.$phone.'",
    "fullname":"'.$fullname.'",
    "reference":"'.$ref.'",
    "callback_url":"https://google.com"
}',
  CURLOPT_HTTPHEADER => array(
    'x-access-token: '.$bolma_api.'',
    'Content-Type: application/json',
    'Cookie: __cfduid=d7ef3ab201a455c020299fc6845a1fc9d1606969578'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
   $result = json_decode($response);
  if($result->status == "0"){
      $orderid = $result->orderid;
      $url = $result->url;
      header("Location: $url");
  }else{
      echo '
            <script>alert("
        Cannot generate payment invoice at the moment, please try again later!");</script>'; 
  }
    
}

?>