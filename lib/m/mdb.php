<?php

function dbConnect()
{
	$dbtype = "mysql";
	$dbhost = "localhost";
	$dbuser = "www";
	$dbpwd = "www";
	$dbbase = "webcpe";
	$dbcharset = "UTF8";
	
	$host = $dbtype.":host=".$dbhost.";dbname=".$dbbase.";charset=".$dbcharset;

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