<?php
include("./lib/m/mdb.php");

function userSignUp($login, $password)
{
	$dbconn = dbConnect();
	$retval = 0;

	if (isset($login) && isset($password)) {
		$query = $dbconn->prepare('
			INSERT INTO users (username, password)
 			VALUES (?,?)');
		$md5password = md5($password);
		$query->execute(array($login, $md5password));
	}

    return $retval;
}

?>