<?php

	$mysqli = mysqli_connect('localhost', 'root', '', 'db_jwt'); 

	if (mysqli_connect_errno()) {

		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	
	}

?>