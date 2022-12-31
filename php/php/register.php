<?php

if(isset($_POST['email-username']) && isset($_POST['age']) && isset($_POST['password'])) {

include 'config.php';

function validate($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$uname = validate($_POST['email-username']);
$age = validate($_POST['age']);
$password = validate($_POST['password']);


if(empty($uname) || empty($age) || empty($password)) {
  header("Location: index.php");
    } else {
      $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "insert into user_list(username, age, password) values('$uname','$age','$passwordHash')";
        $res = mysqli_query($conn, $sql);

        if($res) {
          header("Location: ../sign in sign up/welcome.html");
        } else {
           echo "Your message could not be sent!";
        }
      }
} else {
header("Location: ../signup2.html");
}

?> 