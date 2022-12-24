<?php

// Credentials
$dbhost = 'localhost:3307';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'gersgarage';

// Create a database connection
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
    exit();
}
?>