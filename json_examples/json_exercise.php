<?php

$data = array("num1" => 2,"num2" => 3);
$dataJson = json_encode($data);

$postString = "data=" . urlencode($dataJson);

$contentLength = strlen($postString);

$header = array(
  'Content-Type: application/x-www-form-urlencoded',
  'Content-Length: ' . $contentLength
);

$url = "http://www.braingia.org/sum.php";

$ch = curl_init();

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);

$return = curl_exec($ch);

print $return;

//decoding from javascript object
$decoded = json_decode($return);

print $decoded->result . "\n";

curl_close($ch);

?>
