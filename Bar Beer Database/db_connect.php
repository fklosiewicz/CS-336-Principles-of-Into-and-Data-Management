<?php
// Variables Required to Connect to the Database
$host = "localhost";
$username = "root";
$user_pass = "usbw";
$database_in_use = "barbeerdrinkerplus";

// Instance of the Connection
$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "<br>";
?>