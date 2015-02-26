<?php
session_start();
include("./lib/m/mconnexion.php")

$login = $_POST["login"];
$password = $_POST["password"];

return userConnect($login, $password);

?>