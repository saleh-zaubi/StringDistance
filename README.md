# StringDistance

Project files

	index.php
		This is the webpage required at point 10.
		This page contain a fourm with
			Input field for string "a"
			Input field for string "b"
			Select field to select the method that will be used to calculate the string distand
			Box to show the result

	ajax.php
		This file is a support file used by the index.php to get the result using ajax request.

	command.php
		This is the command line tool required at point 9.
		How to use
			Open the terminal
			Type "php /path/to/command.php"
			Press enter
			Type the first string
			Press enter
			Type the second string
			Press enter
			The result will be displayed on the terminal

	tests.php
		This is the test file required at point 8.
	
	LevenshteinDistance.php
		This file contains the LevenshteinDistance class which extends the abstract StringDistance class.
		The LevenshteinDistance class will be required when we want to calculate the distance using Levenshtein method.
		When we create a new instance of this class, it will call the parent constructor to initiate the instance state.
		To calculate the distance, we call the overrided method calculateDistance.

	HammingDistance.php
		This file contains the HammingDistance class which extends the abstract StringDistance class.
		The HammingDistance class will be required when we want to calculate the distance using Hamming method.
		When we create a new instance of this class, it will call the parent constructor to initiate the instance state.
		To calculate the distance, we call the overrided method calculateDistance.

	StringDistance.php
		This file contains an abstract class called StringDistance which contains common variables and methods between LevenshteinDistance and HammingDistance classes.

	FactoryHelper.php
		This file contains the FactoryHelper class which has a static metho called getStringDistance to call the appropriate classes and methods and return the string distance.
