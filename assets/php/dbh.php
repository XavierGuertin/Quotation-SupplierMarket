<?php
//set up database

$servername = 'us-cdbr-east-06.cleardb.net';
$user = 'bb795f8b496008';	
$pass = '92c727c3'; 
$dbName = 'heroku_8714cfa5818f328';


$conn = mysqli_connect($servername, $user, $pass, $dbName);

if(!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
?>