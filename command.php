<?php
	
	//string array to hold the two strings a and b
	$strings = [];

	//int to accept only 2 strings from stdin
	$i=0;
	while($i<2){
		//add the new string to the array
		$strings[] = fgets( STDIN );
		$i++;
	}
	
	require_once("FactoryHelper.php");

	echo "\n---------\n";
	echo "Levenshtein: ".FactoryHelper::getStringDistance("Levenshtein",$strings[0],$strings[1])." operation(s)\n";
	$ham = FactoryHelper::getStringDistance("Hamming",$strings[0],$strings[1]);
	if($ham>-1)
		echo "Hamming: ".$ham." operation(s)";
	else
		echo "Hamming: Lengths of both strings are not equal which must be to calculate the distance using Hamming method!";
	echo "\n---------\n";

?>