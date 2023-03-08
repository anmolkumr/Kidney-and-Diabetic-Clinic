<?php
define('DB_SERVER', 'fdb19.biz.nf');
define('DB_USERNAME', '2674802_root');
define('DB_PASSWORD', 'anmol@2604');
define('DB_NAME', '2674802_root');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else {
  echo "";
}
?>