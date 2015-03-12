<?php
include("./lib/m/mdb.php");

function userConnect($login, $password)
{
	$dbconn = dbConnect();
	$retval = 0;

	if (isset($login) && isset($password) && $login != "" && $password != "") {
		$query = $dbconn->prepare('SELECT password
		   	FROM users
		    WHERE username = ?');
		$query->execute(array($login));

		$result = $query->fetch(PDO::FETCH_ASSOC);

		if ($result["password"] == $password){
			$_SESSION["connected"] = 1;
			$retval = 1;
		}
	}

    return $retval;
}

?>