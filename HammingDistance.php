<?php
 
 require_once("StringDistance.php");

 class HammingDistance extends StringDistance
 {	

 	//the constructor will initiate the states and calulate the strings lengths
 	public function __construct($a, $b)
 	{
 		parent::__construct($a, $b);
 	}

 	//@Override
 	public function calculateDistance()
 	{

 		//strings lengths
 		$aLength = strlen($this->string_a);
 		$bLength = strlen($this->string_b);

 		if($aLength!=$bLength)
 			return -1;

 		//variable which will hold the result
 		$distance = 0;

 		$i=0;
 		
 		//while loop will compare characters of both strings
 		while ($i<$aLength) {

 			//if characters are different then count replace operation
 			if($this->string_a[$i]!=$this->string_b[$i])
 				$distance++;

 			$i++;
 		}

 		return $distance;
 	}

 }

?>