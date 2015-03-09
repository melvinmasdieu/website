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

?>