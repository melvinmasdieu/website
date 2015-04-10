<?php
include("./lib/m/msignup.php");

$login = htmlentities($_POST["login"]);
$password = htmlentities($_POST["password"]);
$email = htmlentities($_POST["email"]);

echo userSignUp($login, $password, $email);

?>