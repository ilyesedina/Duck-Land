<?php
$serverName = "mysql79.unoeuro.com";
$dBUserName = "especialphoto_dk";
$dBPassword = "ndwa4H69cD";
$dBName = "especialphoto_dk_db";
$port = 3306;




$conn =  mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName, $port);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}