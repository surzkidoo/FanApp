<?php
session_start();
  $curl = curl_init();
  $ref=$_GET["ref"];
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/$ref",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_599a51069de787925ee6e3d049f1f09c81113847",
      "Cache-Control: no-cache",
    ),
  ));
  
  $result = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $result;
    $response=json_decode($result);
    $_SESSION["status"]=$response->data->status;
    $_SESSION["message"]=$response->message;
    header("Success.php");
  }
?>