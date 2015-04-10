<?php
include("./lib/m/mdb.php");

function getAllPathologies()
{
	$result = "";
	$dbconn = dbConnect();
	$query = $dbconn->prepare('
		SELECT meridien.nom AS mnom, patho.desc AS pdesc, symptome.desc AS sdesc
		FROM patho
		INNER JOIN symptPatho ON patho.idP = symptPatho.idP
		INNER JOIN symptome ON symptPatho.idS = symptome.idS
		INNER JOIN meridien ON patho.mer = meridien.code
		ORDER BY mnom, pdesc ASC;');
	$result = $query->execute();
	if (!$result) die('Requête impossible: ' . $query->errorCode());
	else {
		$pathologies = $query->fetchAll(PDO::FETCH_ASSOC);
	}

	return json_encode($pathologies);
}

?>