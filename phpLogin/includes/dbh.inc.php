<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "phpProject01";

$connection = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$connection){
    die("connection failed: " . mysqli_connect_error());
}