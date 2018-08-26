<?php

	$host="localhost";
	$user="ivan";
	$password="phonebook19";
	$dbname="phone book";
	
	$link = mysqli_connect($host, $user, $password, $dbname);
	if (mysqli_connect_error()) {
		die ("There was an error connecting to the database.");
	}

?>
