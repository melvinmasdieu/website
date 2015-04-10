<?php
include("./lib/m/mdb.php");

function userSignUp($login, $password, $email)
{
	$dbconn = dbConnect();
	$retval = "Erreur pendant l'inscription";

	if (isset($login) && isset($password) && isset($email) && $login != "" && $password != "" && $email != "") {
		$query = $dbconn->prepare('
			INSERT INTO users (username, password, email)
 			VALUES (?,?,?)');
		$md5saltpassword = md5($login.sha1($password));
		if ($query->execute(array($login, $md5saltpassword, $email))) $retval = 1;
		else die('Requête impossible: ' . $query->errorCode());
	}

    return $retval;
}

?>