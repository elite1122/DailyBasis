<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "daily_basis_db";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>