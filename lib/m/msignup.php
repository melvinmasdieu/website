<?php
include("./lib/m/mdb.php");

function userSignUp($login, $password)
{
	$dbconn = dbConnect();
	$retval = 0;

	if (isset($login) && isset($password)) {
		$query = $dbconn->prepare('SELECT password
		   	FROM users
		    WHERE username = ?');
		$query = $dbconn->prepare('INSERT INTO users (username, password)
 			VALUES (?,?)');
		$query->execute(array($login, $password));
	}

    return $retval;
}

?>