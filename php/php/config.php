<?php 

$sname = "localhost";
$uname = "root";
$password = "";
$dbName = "user_db";

$conn = mysqli_connect($sname, $uname, $password, $dbName);

if(!$conn) {
  echo "Connection faild!";
  exit();
}

?>