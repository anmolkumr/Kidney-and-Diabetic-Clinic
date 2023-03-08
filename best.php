<?php
$servername = "fdb19.biz.nf";
$username = "2674802_root";
$password = "anmol@2604";
$db  = "2674802_root";

//Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
  echo "";
}
?>