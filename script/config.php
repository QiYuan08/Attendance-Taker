<?php

$username =  "root";
$servername = "localhost";
$password = "";
$dbName = "attendence";

$db = mysqli_connect($servername, $username, $password, $dbName);

if(!$db){
    die("Connection failed.");
}
