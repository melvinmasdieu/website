<?php
include("./lib/m/mdb.php");

function getAllPathologies($login, $password)
{
	$dbconn = dbConnect();
	$query = $dbconn->prepare('
		SELECT *
		FROM patho');
	$result = $query->execute();
	if ($result) $pathologies = $result;
	else die('Requête impossible: ' . $query->errorCode());
print_r($pathologies);
    return $pathologies;
}

?>