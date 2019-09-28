<?php

 require_once("StringDistance.php");
 
 class LevenshteinDistance extends StringDistance
 {
 
 	//the constructor will call the parent class constructor to initiate the states
 	public function __construct($a, $b)
 	{
 		parent::__construct($a, $b);
 	}

 	//@Override
 	public function calculateDistance()
 	{

 		$chars=[[]]; //this multidimentional array will contains the distance between substrings from both original strings
 		
 		//strings lengths
 		$aLength = strlen($this->string_a);
 		$bLength = strlen($this->string_b);

 		for($i=0; $i<=$aLength; $i++){
 			for($j=0; $j<=$bLength; $j++){
 				
 				//first row will contains the number of operations needed to convert each substring of "a" string to empty string 
 				if($i==0) $chars[$i][$j]=$j;

 				//first column will contains the number of operations needed to convert each substring of "b" string to empty string
 				else if($j==0) $chars[$i][$j]=$i;

 				//if both characters are equal then no operation is needed
 				else if($this->string_a[$i-1]==$this->string_b[$j-1])
 					$chars[$i][$j]=$chars[$i-1][$j-1];

 				//if characters are different then take the minimum of the insert, delete or replace operation
 				else
 					$chars[$i][$j] = min(
 											$chars[$i-1][$j],			//delete operation
 											$chars[$i][$j-1],			//insert operation
 											$chars[$i-1][$j-1]		//replace operation
 										)
 										+1; //count this operation
 			}
 		}

 		return $chars[$aLength][$bLength];
 	}

 }

?>
