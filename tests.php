<?php

	require_once("FactoryHelper.php");

	$a = "this is a test";
	$b = "this is test";

	echo "String a: ".$a."<br>";
	echo "String b: ".$b."<br><br>";
	echo "Levenshtein: ".FactoryHelper::getStringDistance("Levenshtein",$a,$b)." operation(s)";
	echo "<br>";
	$ham = FactoryHelper::getStringDistance("Hamming",$a,$b);
	if($ham>-1)
		echo "Hamming: ".$ham." operation(s)";
	else
		echo "Hamming: Lengths of both strings are not equal which must be to calculate the distance using Hamming method!";
	echo "<br>---------<br>";

	$a = "this is test";
	$b = "the is test";

	echo "String a: ".$a."<br>";
	echo "String b: ".$b."<br><br>";
	echo "Levenshtein: ".FactoryHelper::getStringDistance("Levenshtein",$a,$b)." operation(s)";
	echo "<br>";
	$ham = FactoryHelper::getStringDistance("Hamming",$a,$b);
	if($ham>-1)
		echo "Hamming: ".$ham." operation(s)";
	else
		echo "Hamming: Lengths of both strings are not equal which must be to calculate the distance using Hamming method!";
	echo "<br>---------<br>";

?>