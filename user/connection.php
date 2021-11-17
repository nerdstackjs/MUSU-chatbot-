<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "todobot";

$conn = mysqli_connect($servername, $username, $password, $db);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());

}

?>