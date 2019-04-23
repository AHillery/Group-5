<?php

$url = "http://www.google.com";
$ch = curl_init($url);

curl_exec($ch);
curl_close($ch);

?>