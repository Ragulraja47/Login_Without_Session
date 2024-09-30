<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "auction";

$conn = new mysqli($server, $user, $pass, $db);

if($conn->connect_error){
    die("db connection failed:". $conn->connect_error);
}
?>