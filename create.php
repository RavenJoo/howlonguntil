<?php

// Provide host, username, and password in the future.
$con = mysqli_connect();

if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create database if there's none.
$ini = "CREATE DATABASE IF NOT EXISTS my_db";

if (mysqli_query($con, $ini)) {
	echo "Database my_db created successfully";
} else {
	echo "Error creating database: " . mysqli_error($con);
}

// Create table if there's none.
$tab = "CREATE TABLE IF NOT EXISTS Test(
	PID INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(PID),
	TestValue INT
	)";

if (mysqli_query($con, $tab)) {
	echo "Table Test created successfully";
} else {
	echo "Error creating table: " . mysqli_error($con);
}

// Get data from html
$newtime = mysqli_real_escape_string($con, $_POST['newtime']);

// Insert data into database
$sql = "INSERT INTO Test (TestValue)
	VALUES ('$newtime')";

if (!mysqli_query($con, $sql)) {
	die("Error: " . mysqli_error($con));
}
echo $newtime . " recorded successfully.";

mysqli_close($con);

?>