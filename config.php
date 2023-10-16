<?php

	$servername = "localhost";
	$username = "id21403606";
	$password = "";
	$dbname = "id21403606_bankdb";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if(!$conn){
		die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
	}

?>