<?php

function dbConnect()
{
	$dbtype = "mysql";
	$dbhost = "localhost";
	$dbuser = "www";
	$dbpwd = "www";
	$dbbase = "webcpe";
	$host = $dbtype.":host=".$dbhost.";dbname=".$dbbase;

	$dbconn = "";

	try {
		$dbconn = new PDO($host, $dbuser, $dbpwd);
	} catch (PDOException $e) {
	    print "Error: " . $e->getMessage() . "<br/>";
	    die();
	}

	return $dbconn;
}

function userConnect($login, $password)
{
	$dbconn = dbConnect();
	$retval = 0;

	if (isset($login) && isset($password)
	{
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