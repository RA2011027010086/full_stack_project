<?php

//Your Mysql Config
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobportal";

//Create New Database Connection
$conn = new mysqli($servername, $username, $password, "jobportal");

//Check Connection
if($conn->connect_error) {
	die("Connection Failed: ". $conn->connect_error);
}