<?php
	
	abstract class StringDistance
	{
		protected $string_a; //to hold string a
	 	protected $string_b; //to hold string b

	 	protected function __construct($a,$b){
			$this->string_a = $a;
	 		$this->string_b = $b;
	 	}

	 	//calculateDistance will calculate and return the distance.
	 	abstract public function calculateDistance();
	}

?>