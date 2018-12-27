<?php
//db details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'real_estate';


//Connect and select the database
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
	//echo "fine!!";
}
?>

