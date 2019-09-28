<?php

class FactoryHelper
{
	//helper method called get
	public static function getStringDistance($method, $a, $b)
	{
		$instance;

		if($method=="Levenshtein"){
			require_once("LevenshteinDistance.php");
			$instance = new LevenshteinDistance($a, $b);
			return $instance->calculateDistance();
		}
		else if($method=="Hamming"){
			require_once("HammingDistance.php");
			$instance = new HammingDistance($a, $b);
			return $instance->calculateDistance();
		}

		return -999;
	}
}

?>