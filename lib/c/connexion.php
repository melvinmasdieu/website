<?php

$dbtype = "mysql";
$dbhost = "localhost";
$dbuser = "www";
$dbpwd = "www";
$dbbase = "webcpe";
$host = $dbtype.":host=".$dbhost.";dbname=".$dbbase;
#$host = "mysql:host=localhost;dbname=webcpe";


try {
	$dbconn = new PDO($host, $dbuser, $dbpwd);
} catch (PDOException $e) {
    print "Error: " . $e->getMessage() . "<br/>";
    die();
}

$login = $_POST["login"];
$password = $_POST["password"];

echo file_get_contents("./lib/v/connected.html");
echo file_get_contents("./lib/v/errorconnect.html");

?>