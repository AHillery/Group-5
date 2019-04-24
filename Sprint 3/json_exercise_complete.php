<?php

$data = array("num1" => 3, "num2" => 5,"num3" => 10);
$dataJson = json_encode($data);

$postString = "data=" . urlencode($dataJson);

$contentLength = strlen($postString);

$header = array(
  'Content-Type: application/x-www-form-urlencoded',
  'Content-Length: ' . $contentLength
);

$url = "http://cnmtsrv2.uwsp.edu/~ahill985/sum.php";


$ch = curl_init();

curl_setopt($ch,
    CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch,
    CURLOPT_POSTFIELDS, $postString);
curl_setopt($ch,
    CURLOPT_HTTPHEADER, $header);
curl_setopt($ch,
    CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch,
    CURLOPT_URL, $url);

$return = curl_exec($ch);

print $return;

curl_close($ch);

?>
