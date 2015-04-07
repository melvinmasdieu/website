<?php
include("./lib/m/msignup.php");

$login = htmlentities($_POST["login"]);
$password = htmlentities($_POST["password"]);

echo userSignUp($login, $password);

?>