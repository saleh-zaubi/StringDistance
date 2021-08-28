<!DOCTYPE html>
<html>
<head>
	<title>String Distance</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css">
		html,body{
			height: 100%;
		}
		#container{
			min-height: calc(100% - 40px);			
		}
		.result-container{
			width: 100%;height: 200px; line-height: 30px;padding: 15px 20px
		}
		.clearfix{
			height: 40px
		}
		.hidden{
			display: none;
		}
		#note{
			line-height: 35px;
		}
		#tut{
			position: fixed;top: 0;bottom: 0;right: 0;left: 0; overflow: auto;
		}
		#close-tut{
			position: absolute;top: 0;right: 0;width: 50px;height: 50px;border-radius:0 0 0 5px;font-size:30px;font-weight:bold;text-align: center;cursor: pointer
		}

		.steps {
		  box-shadow: 0px 10px 15px -5px rgba(0, 0, 0, 0.3);
		  background-color: #FFF;
		  padding: 24px 0;
		  position: relative;
		  margin: auto;
		}

		.steps::before {
		  content: '';
		  position: absolute;
		  top: 0;
		  height: 24px;
		  width: 1px;
		  background-color: rgba(0, 0, 0, 0.2);
		  left: calc(50px / 2);
		  z-index: 1;
		}

		.steps::after {
		  content: '';
		  position: absolute;
		  height: 13px;
		  width: 13px;
		  background-color: var(--primary-color);
		  box-shadow: 0px 0px 5px 0px var(--primary-color);
		  border-radius: 15px;
		  left: calc(50px / 2);
		  bottom: 24px;
		  transform: translateX(-45%);
		  z-index: 2;
		}

		.step {
		  padding: 0 20px 24px 50px;
		  position: relative;
		  transition: all 0.4s ease-in-out;
		  background-color: #FFF;
		}

		.step::before {
		  content: '';
		  position: absolute;
		  height: 13px;
		  width: 13px;
		  background-color: rgb(0, 198, 198);
		  border-radius: 15px;
		  left: calc(50px / 2);
		  transform: translateX(-45%);
		  z-index: 2;

		}
		.minimized.step::before{
			background-color: rgb(198, 198, 198);
		}
		.step::after {
		  content: '';
		  position: absolute;
		  height: 100%;
		  width: 1px;
		  background-color: rgb(198, 198, 198);
		  left: calc(50px / 2);
		  top: 0;
		  z-index: 1;
		}

		.step.minimized {
		  background-color: #FFF;
		  transition: background-color 0.3s ease-in-out;
		  cursor: pointer;
		}

		.header {
		  user-select: none;
		  font-size: 16px;
		  color: rgba(0, 140, 155, 1);
		}
		.minimized .header{
			color: rgba(0, 0, 0, 0.65);	
		}
		.subheader {
		  user-select: none;
		  font-size: 14px;
		  color: rgba(0, 0, 0, 0.4);
		}

		.step-content {
		  transition: all 0.3s ease-in-out;
		  overflow: hidden;
		  position: relative;
		}

		.step.minimized > .step-content {
		  height: 0;
		  padding: 0 !important;
		}

		.step-content.one, .step-content.two, .step-content.three, .step-content.four, .step-content.five, .step-content.six {
		  width: 100%;
		  background-color: rgba(0, 0, 0, 0.05);
		  border-radius: 4px;
		  margin-top: 10px;
		}

		.step.minimized:hover {
		  background-color: rgba(0, 0, 0, 0.06);
		}
	</style>
</head>
<body>
	<div id="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-info">
		  <a class="navbar-brand text-white" href="#">String Distance</a>
		  <a id="open-tut" class="ml-auto text-white" href="#">Assignment Tutorial</a>
		</nav>
		<div class="container mt-4">
			<form>
			  <div class="form-group">
			    <label for="text-a">String "a"</label>
			    <input type="text" class="form-control" id="text-a" placeholder="Strin a">
			  </div>
			  <div class="form-group">
			    <label for="text-b">String "b"</label>
			    <input type="text" class="form-control" id="text-b" placeholder="String b">
			  </div>
			  <div class="form-group">
			    <label for="method">Distance Method</label>
			    <select class="form-control" id="method">
			      <option value="lev">Levenshtein</option>
			      <option value="ham">Hamming</option>
			      <option value="both">Both</option>
			    </select>
			  </div>
			  <div class="form-group">
			    <button class="btn btn-primary" id="calc">Calculate</button>
			  </div>
			  <div class="form-group  mt-4">
			  	<h4>Operations</h4>
			  	<div class="result-container text-white bg-dark">
			  		<div id="result">
			  			
			  		</div>
			  	</div>
			  </div>
			</form>
		</div>

		<div class="container">
			<p id="note"><span class="alert alert-primary text-danger">Note</span> 
			Please make sure you are connected to the internet since this code uses CDN libraries.</p>
		</div>

	</div>
	<div class="bg-info clearfix">
		  
	</div>



	<div id="tut" class="bg-light text-dark pt-5 hidden">
		<span id="close-tut" class="bg-dark text-danger">X</span>
		<div class="container">
			<div class="mt-3 mb-5">
				<h3>Project files</h3>
				<div class="steps">
					  <div class="step">
						    <div class="step-header">
						      <div class="header">index.php</div>
						      <div class="subheader">
						      </div>
						    </div>
						    <div class="step-content one p-3">
						    	This is the webpage required at point 10.
					      		This page contain a fourm with 
					      		<ul>
					      			<li>Input field for string "a"</li>
					      			<li>Input field for string "b"</li>
					      			<li>Select field to select the method that will be used to calculate the distand</li>
					      			<li>Box to show the result</li>
					      		</ul>
							To run this file from command line
					      		<ul>
								<li>Put all the files in the root folder of your PHP server</li>
								<li>Open the terminal and type: start http://localhost/index.php</li>
								<li>Make sure you are connected to the internet since this file uses CDN libraries</li>
							</ul>
						    </div>
					  </div>
					  <div class="step minimized">
						    <div class="step-header">
						      <div class="header">ajax.php</div>
						      <div class="subheader"></div>
						    </div>
						    <div class="step-content two p-3">
						    	This file is a support file used by the index.php to get the result using ajax request.
						    </div>
					  </div>
					  <div class="step minimized">
						    <div class="step-header">
						      <div class="header">command.php</div>
						      <div class="subheader"></div>
						    </div>
						    <div class="step-content three p-3">
						    	This is the command line tool required at point 9.
					      		How to use
					      		<ul>
					      			<li>Open the terminal</li>
					      			<li>Type "php /path/to/command.php"</li>
					      			<li>Press enter</li>
					      			<li>Type the first string</li>
					      			<li>Press enter</li>
					      			<li>Type the second string</li>
					      			<li>Press enter</li>
					      			<li>The result will be displayed on the terminal</li>
					      		</ul>
						    </div>
					  </div>
					  <div class="step minimized">
						    <div class="step-header">
						      <div class="header">tests.php</div>
						      <div class="subheader"></div>
						    </div>
						    <div class="step-content four p-3">
						    	This is the test file required at point 8.
						    </div>
					  </div>
					   <div class="step minimized">
						    <div class="step-header">
						      <div class="header">LevenshteinDistance.php</div>
						      <div class="subheader"></div>
						    </div>
						    <div class="step-content five p-3">
						    	This file contains the LevenshteinDistance class which extends the abstract StringDistance class.<br>
						    	The LevenshteinDistance class will be required when we want to calculate the distance using Levenshtein method.<br>
						    	When we create a new instance of this class, it will calls the parent constructor to initiate the instance state.<br>
						    	To calculate the distance, we call the overrided method calculateDistance.
						    </div>
					  </div>
					   <div class="step minimized">
						    <div class="step-header">
						      <div class="header">HammingDistance.php</div>
						      <div class="subheader"></div>
						    </div>
						    <div class="step-content six p-3">
						    	This file contains the HammingDistance class which extends the abstract StringDistance class.<br>
						    	The HammingDistance class will be required when we want to calculate the distance using Hamming method.<br>
						    	When we create a new instance of this class, it will calls the parent constructor to initiate the instance state.<br>
						    	To calculate the distance, we call the overrided method calculateDistance.
						    </div>
					  </div>
					  <div class="step minimized">
						    <div class="step-header">
						      <div class="header">StringDistance.php</div>
						      <div class="subheader"></div>
						    </div>
						    <div class="step-content six p-3">
						    	This file contains an abstract class called StringDistance which contains common variables and methods between LevenshteinDistance and HammingDistance classes.
						    </div>
					  </div>
					  <div class="step minimized">
						    <div class="step-header">
						      <div class="header">FactoryHelper.php</div>
						      <div class="subheader"></div>
						    </div>
						    <div class="step-content six p-3">
						    	This file contains the FactoryHelper class which has a static metho called getStringDistance to call the appropriate classes and methods and return the string distance.
						    </div>
					  </div>
				</div>
			</div>
		</div>
	</div>



	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script type="text/javascript">
		$("#calc").on("click",function(e){
			e.preventDefault();
			var textA = $("#text-a").val();
			var textB = $("#text-b").val();
			var method = $("#method").val();
			$.ajax({
				type: "POST",
				url: "ajax.php",
				async: true,
				dataType: "json",
				data: {"text-a":textA,"text-b":textB, "method":method},
				success:function(data){
					if(data.status=="ok"){
						if(method=="both"){
							if(data.hamming>-1)
								$("#result").html("Levenshtein: "+data.levenshtein+" Operations. <br>"+"Hamming: "+data.hamming+" Operations.");
							else
								$("#result").html("Levenshtein: "+data.levenshtein+" Operations. <br>"+"Hamming: Lengths of both strings are not equal which must be to calculate the distance using Hamming method!");
						}else if(method=="lev"){
							$("#result").text("Levenshtein: "+data.levenshtein+" Operations.");
						}else if(method=="ham"){
							if(data.hamming>-1)
								$("#result").text("Hamming: "+data.hamming+" Operations.");
							else
								$("#result").text("Hamming: Lengths of both strings are not equal which must be to calculate the distance using Hamming method!");
						}
					}else{
						alert("Error!");
						console.log(data);
					}
				},
				error:function(data){
					alert("error "+data);
					console.log(data);
				}
			});
		});

		$("#open-tut").on("click",function(){
			$("body").css({"overflow":"hidden"});
			$("#tut").removeClass("hidden");
		});

		$("#close-tut").on("click",function(){
			$("body").css({"overflow":"auto"});
			$("#tut").addClass("hidden");
		});

		var curOpen;

		$(document).ready(function() {
		  curOpen = $('.step')[0];
		  
		  $('.step .step-content').on('click' ,function(e) {
		    e.stopPropagation();
		  });
		  
		  $('.step').on('click', function() {
		    if (!$(this).hasClass("minimized")) {
		      curOpen = null;
		      $(this).addClass('minimized');
		    }
		    else {
		      var next = $(this);
		      if (curOpen === null) {
		        curOpen = next;
		        $(curOpen).removeClass('minimized');
		      }
		      else {
		        $(curOpen).addClass('minimized');
		        setTimeout(function() {
		          $(next).removeClass('minimized');
		          curOpen = $(next);
		        }, 300);
		      }
		    }
		  });
		});
	</script>
</body>
</html>
