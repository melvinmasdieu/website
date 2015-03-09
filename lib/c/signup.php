<?php
include("./lib/m/msignup.php");

$login = $_POST["login"];
$password = $_POST["password"];

echo userSignUp($login, $password);

?>