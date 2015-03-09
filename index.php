<?php
session_start();

if (isset($_POST["action"])) {
	$action = $_POST["action"];

	switch($action)
	{
		case "connection":
			include("./lib/c/connexion.php");
			break;
		case "signup":
			include("./lib/c/signup.php");
			break;
		case "load": 
			if ($_POST != null && $_POST["pageId"] != null)
			$pageId = $_POST["pageId"];
				switch($pageId) {

					case 1: echo file_get_contents("./lib/v/header.html");break;
					case 2: echo file_get_contents("./lib/v/footer.html");break;
					case 3: echo file_get_contents("./lib/v/login.html");break;
					case 4: if ($_SESSION["connected"] == 1) {						
								echo file_get_contents("./lib/v/connected.html");
							}
							else {
								echo file_get_contents("./lib/v/403.html");
							}
							break;
					case 5: if ($_SESSION["connected"] == 1) {	
								session_destroy();					
								echo file_get_contents("./lib/v/disconnected.html");
							}
							else {
								echo file_get_contents("./lib/v/403.html");
							}
							break;
					case 6: echo file_get_contents("./lib/v/inscription.html");break;
					default: break;
			}
			break;
		default: break;
	}
}
else
{
	if ($_SESSION["connected"] == 0) {
		echo file_get_contents("./lib/v/header.html");
		echo file_get_contents("./lib/v/login.html");
	}
	else {
		echo file_get_contents("./lib/v/headerconnected.html");
		echo file_get_contents("./lib/v/connected.html");
	}
		echo file_get_contents("./lib/v/footer.html");
	
}

?>