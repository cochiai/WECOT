window.onload = function () {
	carousel();
}

// Used to toggle the menu on small screens when clicking on the menu button
function toggleNavigationMenu() {
	var x = document.getElementById("navDemo");
	if (x.className.indexOf("w3-show") == -1) {
		x.className += " w3-show";
	} else {
		x.className = x.className.replace(" w3-show", "");
	}
}

// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
function carousel() {
	var i;
	var x = document.getElementsByClassName("mySlides");
	for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";
	}
	myIndex++;
	if (myIndex > x.length) { myIndex = 1 }
	x[myIndex - 1].style.display = "block";
	setTimeout(carousel, 4000);
}

// form validation
function validateForm() {
	var firstname = document.forms["beAFamilyMemberForm"]["firstname"].value.trim();
	var lastname = document.forms["beAFamilyMemberForm"]["lastname"].value.trim();
	var email = document.forms["beAFamilyMemberForm"]["email"].value.trim();
	if (firstname == "") {
		alert("Firstname must be filled out");
		return false;
	} else if (lastname == "") {
		alert("Lastname must be filled out");
		return false;
	} else if (!validateEmail(email)) {
		alert("Please enter a valid email address");
		return false;
	}
}
function validateEmail(email) {
	const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

//gelocation
var map, infoWindow;
function initMap() {
	infoWindow = new google.maps.InfoWindow;

	//sbb bahnhof location
	var sbbpos = {
		lat: 47.048889,
		lng: 8.310556
	};
	// show map
	map = new google.maps.Map(document.getElementById('map'), {
		center: sbbpos,
		zoom: 10
	});

	// HTML5 geolocation
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function (position) {
			//user's location
			var pos = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			};

			map.setCenter(pos);

			var marker = new google.maps.Marker({ position: pos, map: map });
			var marker2 = new google.maps.Marker({ position: sbbpos, map: map });

		}, function () {
			// Browser doesn't support Geolocation
			handleLocationError(true, map.getCenter());
		});
	} else {
		// Browser doesn't support Geolocation
		handleLocationError(false, map.getCenter());
	}
}

function handleLocationError(browserHasGeolocation, pos) {
	infoWindow.setPosition(pos);
	infoWindow.setContent(browserHasGeolocation ?
		'Error: The Geolocation service failed.' :
		'Error: Your browser doesn\'t support geolocation.');
	infoWindow.open(map);
}

