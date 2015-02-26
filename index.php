<?php

if (isset($_POST["action"])) {
	$action = $_POST["action"];

	switch($action)
	{
		case "connection":
			include("./lib/c/connexion.php");
			break;
		case "load": 
			if ($_POST != null && $_POST["pageId"] != null)
			$pageId = $_POST["pageId"];
				switch($pageId) {

					case 1: echo file_get_contents("./lib/v/header.html");break;
					case 2: echo file_get_contents("./lib/v/footer.html");break;
					case 3: echo file_get_contents("./lib/v/login.html");break;
					default: break;
			}
			break;
		default: break;
	}
}
else
{
	echo file_get_contents("./lib/v/header.html");
	echo file_get_contents("./lib/v/footer.html");
	echo file_get_contents("./lib/v/login.html");
}

?>