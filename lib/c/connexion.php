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
echo $login."<br/>";
echo $password."<br/>";

$query = $dbconn->prepare('SELECT password
    FROM users
    WHERE username = ?');
$query->execute(array($login));

$result = $query->fetch(PDO::FETCH_ASSOC);

if ($result["password"] == $password){
	echo "connexion OK";
}
else {
	echo "connexion NOK";
}

#echo file_get_contents("./lib/v/connected.html");
#echo file_get_contents("./lib/v/errorconnect.html");

?>