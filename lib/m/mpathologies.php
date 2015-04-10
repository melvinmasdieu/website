<?php
include("./lib/m/mdb.php");

function getAllPathologies()
{
	$dbconn = dbConnect();
	$query = $dbconn->prepare('
		SELECT *
		FROM patho');
	$result = $query->execute();
	if (!$result) die('Requête impossible: ' . $query->errorCode());
	else {
		$pathologies = $query->fetchAll();
	}
	foreach ($pathologies as $key => $value) {
		echo "<tr><td>".$value['desc']."</td><td>".$value['type']."</td></tr>";
	}
}

?>