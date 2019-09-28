<?php
	
	if(isset($_POST["text-a"])&&isset($_POST["text-b"])&&isset($_POST["method"]))
	{

		require_once("FactoryHelper.php");
		
		$a = $_POST["text-a"];
		$b = $_POST["text-b"];
		$method = $_POST["method"];

		$lev = 0;
		$ham = 0;

		if($method=="both"){

			$lev = FactoryHelper::getStringDistance("Levenshtein",$a,$b);
			$ham = FactoryHelper::getStringDistance("Hamming",$a,$b);

		}else if($method=="lev"){

			$lev = FactoryHelper::getStringDistance("Levenshtein",$a,$b);

		}else if($method=="ham"){
			
			$ham = FactoryHelper::getStringDistance("Hamming",$a,$b);

		}

		$data = array("status" => "ok", "levenshtein" => $lev, "hamming" => $ham);

		echo json_encode($data);
	}

?>