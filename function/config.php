<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$data = "ride_the_wave_bd";

	$conn = new mysqli($servername, $username, $password, $data);

	if($conn -> connect_error) {
		die("connection failed");
	} else {
		//die("connected successfully");
	}

?>