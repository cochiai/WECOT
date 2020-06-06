<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" href="img/Smile.png">
	<title>Smile</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">

	<!-- CSS -->
	<!-- My CSS -->
	<link rel="stylesheet" href="stylesheet.css">
	<!-- W3.CSS -->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<!-- W3.CSS: css from the "band" template (https://www.w3schools.com/w3css/w3css_templates.asp) -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- JavaScript -->
	<!-- My Javascript -->
	<script src='javascript.js' type='text/javascript'></script>
</head>
<body>
	<!-- header -->
	<section>
		<div class="w3-container w3-padding-64 w3-center w3-yellow w3-xlarge">
			<img class="logo" src="img/Smile.png" />
			<h2 class="w3-wide">SMILE</h2>
		</div>
	</section>

	<!-- Page content -->
	<div class="w3-content">
		<!-- INFORMATION -->
		<!-- The Smile Section -->
		<section>
			<div class="w3-container w3-content w3-center w3-padding-64 container">
				<?php
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						//values
						$firstname = $_POST["firstname"];
						$lastname = $_POST["lastname"];
						$lastname = $_POST["email"];
						$gender = $_POST["gender"];						
						$preferredActivities = $_POST["preferredActivities"];	
						
						print_r ($preferredActivities);
						exit();
						
						//validation
						$valid = true;
						$message = "";
						if (empty($firstname)) {
							$message = "Firstname is required.";
							$valid = false;
						} 				

						if($valid)
						{
							$title = "";
							if($gender == "male"){
								$title = "Mr.";								
							}else if($gender == "female"){
								$title = "Ms.";									
							}

							$preferredActivitiesComma = ""; 

							echo '<h2 class="w3-wide">THANK YOU FOR JOINING!</h2>
									<p class="w3-center">
										Welcome ' . $title . ' ' . $_POST["firstname"] . ' ' . $_POST["lastname"] .' :) <br>
										Your email address is ' . $_POST["email"] . '
										Your preferred activities are 
									</p>
									<a class="w3-button w3-black w3-section w3-left" type="submit" href="javascript:history.go(-1)">Back</a>';
						} else{
							echo '<h2 class="w3-wide">THERE WAS AN ERROR.</h2>
									<p class="w3-center">'
										. $message .' Please try again.
									</p>
									<button class="w3-button w3-black w3-section w3-right" type="submit">Try again</button>';
						}
					} else {
					
					}	
					
				?>				
			</div>			
		</section>
	</div>

	<!-- Footer -->
	<!-- The Contact Section -->
	<footer class="w3-container w3-padding-64 w3-center w3-light-grey w3-xlarge" id="contact">
		<h2 class="w3-wide w3-center">CONTACT</h2>
		<div class="w3-row w3-padding-32">
			<div class="w3-col m4 w3-large w3-margin-bottom">
				<i class="fa fa-map-marker icon"></i> Lucerne, Switzerland<br>
				<i class="fa fa-phone icon"></i> +41 76 333 33 33<br>
				<i class="fa fa-envelope icon"> </i> Email: info@smile.ch<br>
			</div>
			<div class="w3-col m8">
				<div id="map" class="geolocation"></div>
			</div>
		</div>
	</footer>
	<script async defer
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsqdn4B7Yr2IiaNwIArFznBR8uONCu1Q0&callback=initMap">
	</script>
</body>
</html>