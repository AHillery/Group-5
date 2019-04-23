<?php

$colors = array("red", "green", "blue");


$jsonColors = json_encode($colors);

print $jsonColors . "/n";

//Named Index Array

$colorHex = array("red" => "#FF000",
				"green" => "#008000",
				"blue" => "#0000FF"
				);
				
print json_encode($colorHex);

//Multi-Dimensional Array


//Sending a POST


//Content-Type - sets the type of request so server can parse content properly


//Receiving JSON Data
//php://input can be used with later versions of PHP to parse the raw input


?>