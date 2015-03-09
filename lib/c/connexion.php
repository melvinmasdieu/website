<?php
include("./lib/m/mconnexion.php");

$login = $_POST["login"];
$password = $_POST["password"];

echo userConnect($login, $password);

?>