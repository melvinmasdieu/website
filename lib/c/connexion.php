<?php
include("./lib/m/mconnexion.php");

$login = htmlentities($_POST["login"]);
$password = htmlentities($_POST["password"]);

echo userConnect($login, $password);

?>