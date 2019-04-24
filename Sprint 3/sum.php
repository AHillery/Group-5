<?php

if(isset($_POST["data"]))
	{
		$numbers = json_decode($_POST["data"]);
		$sum = "Empty Array";
		
		$answer = array();

		if($numbers != NULL && count($numbers) != 0){
			foreach($numbers as $num){
				$sum += $num;
			}
			
			$answer["result"] = $sum;
			$result = json_encode($answer);
			
			print $result;
			
			return $result;
		}
		else{

			$answer["result"] = $sum;
			$result = json_encode($answer);
			
			print $result;
			
			return $result;
		}
	}
else
	{
		$answer = array();
		
		$error = "";
		
		$answer["result"] = $error;
		
		$result = json_encode($answer);
		
		print $result;
		
		return $result;
	}
?>