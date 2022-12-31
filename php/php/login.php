<?php

// Start a session
session_start();

$sname = "localhost";
$uname = "root";
$password = "";
$dbName = "user_db";

$mysqli =  new mysqli($sname, $uname, $password, $dbName);

if(!$mysqli) {
  echo "Connection faild!";
  exit();
}

    if (isset($_POST['login'])) {
        $username = $_POST['email-username'];
        $password = $_POST['password'];
        $query = $mysqli->prepare("SELECT * FROM user_list WHERE username=:username");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            echo 'Username password combination is wrong';
        } else {
            if (password_verify($password, $result['password'])) {
                $_SESSION['id'] = $result['id'];
                header("Location: ../sign in sign up/welcome.html");
            } else {
                echo 'Username password combination is wrong';
            }
        }
    }

?>


