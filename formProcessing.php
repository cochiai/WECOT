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
					//check if call is from the form
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						//get values
						//check if post values are set, if yes get value, if not just empty or null
						$firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : "";
						$lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : "";
						$email = isset($_POST["email"]) ? $_POST["email"] : "";
						$gender = isset($_POST["gender"]) ? $_POST["gender"] : "";						
						$preferredActivities = isset($_POST["preferredActivities"]) ? $_POST["preferredActivities"] : null;	
						
						//validation
						//check if values are valid
						//valid == not empty and email address is valid
						$valid = true;
						$message = "";
						if (empty($firstname)) {
							$message = "Firstname is required.";
							$valid = false;
						} else if ($valid && empty($lastname)){
							$message = "Lastname is required.";
							$valid = false;						
						} else if ($valid && !filter_var($email, FILTER_VALIDATE_EMAIL)){
							$message = "Email address is invalid.";
							$valid = false;						
						} 

						//values are valid
						if($valid)
						{
							// prepare title depending on the gender.
							$title = "";
							if($gender == "male"){
								$title = "Mr.";								
							}else if($gender == "female"){
								$title = "Ms.";									
							}

							//prepare the preferred activity sentence
							//default value no preferred activities
							$preferredActivitiesComma = "You do not have any preferred activities."; 
							//user has preferred activities
							if(isset($preferredActivities)) {
								$preferredActvitiesCount = count($preferredActivities);

								//check if theres only one preferred activity, 
								//no loop needeed and singular sentence
								//and make preferredActivities lower case
								if($preferredActvitiesCount == 1) {
									$preferredActivitiesComma = 'Your preferred activity is ';
									$preferredActivitiesComma .= strtolower($preferredActivities[0]) . '.';

								}else{
									//more than 1 activity
									//plural
									//and make preferredActivities lower case
									$preferredActivitiesComma = 'Your preferred activities are ';
									for ($i = 0; $i < $preferredActvitiesCount; $i++) {
										//last preferred activity, add and instead of comma
										if(($preferredActvitiesCount -1) == $i) {
											$preferredActivitiesComma .= "and " . strtolower($preferredActivities[$i]) . ".";
										}else{
										//add comma
											$preferredActivitiesComma .= strtolower($preferredActivities[$i]) . ", ";
										}
									}
								}
							}

							//show result
							//and back button
							echo '<h2 class="w3-wide">THANK YOU FOR JOINING!</h2>
									<p class="w3-center">
										Welcome ' . $title . ' ' . $firstname . ' ' . $lastname .' :) <br>
										Your email address is ' . $email . '.<br>'
										. $preferredActivitiesComma .
									'</p>
									<a class="w3-button w3-black w3-section w3-left" type="submit" href="javascript:history.go(-1)">Back</a>';
						} else{
							//values are invalid
							//show error message
							//and back button
							echo '<h2 class="w3-wide">THERE WAS AN ERROR.</h2>
									<p class="w3-center">'
										. $message .' Please try again.
									</p>
									<a class="w3-button w3-black w3-section w3-left" type="submit" href="javascript:history.go(-1)">Try again</a>';
						}
					} else {
						//call is not from form but just from URL.
						echo '<h2 class="w3-wide">NOTHING TO SEE HERE.</h2>
							<a class="w3-button w3-black w3-section w3-left" type="submit" href="index.html">Go to smile home page.</a>';
					
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