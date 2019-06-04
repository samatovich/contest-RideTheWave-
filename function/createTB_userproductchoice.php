<?php
	require 'config.php';	 

	// sql to create table
	$sql = "CREATE TABLE UserProductChoice (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	username VARCHAR(30) NOT NULL,
	user_product_choice VARCHAR(30) NOT NULL,
	product_times INT(6) NOT NULL,
	Date TIMESTAMP
	)";

	if ($conn->query($sql) === TRUE){
	    echo "Table UserInfo created successfully";
	} else{
	    echo "Error creating table: " . $conn->error;
	}

	$conn->close();
?>