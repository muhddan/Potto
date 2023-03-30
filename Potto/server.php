<?php
//database setting

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "potto";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

if(!$conn){
	die("Connection Failed. ". mysqli_connect_error());
}
?>