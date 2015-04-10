<?php
session_start();

if (isset($_POST["action"])) {
	$action = htmlentities($_POST["action"]);
	switch($action)
	{
		case "connection":
			include("./lib/c/connexion.php");
			break;
		case "signup":
			include("./lib/c/signup.php");
			break;
		case "pathologies":
			include("./lib/c/pathologies.php");
			break;
		case "load": 
			if ($_POST != null && $_POST["pageId"] != null)
			$pageId = htmlentities($_POST["pageId"]);
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
					case 5: if (isset($_SESSION["connected"]) && $_SESSION["connected"] == 1) {
								session_destroy();					
								echo file_get_contents("./lib/v/disconnected.html");
							}
							elseif (isset($_SESSION["connected"]) && $_SESSION["connected"] == 0) {
								echo file_get_contents("./lib/v/403.html");
							}
							else {
								echo file_get_contents("./lib/v/disconnected.html");
							}
							break;
					case 6: echo file_get_contents("./lib/v/inscription.html");break;
					case 7: echo file_get_contents("./lib/v/topmenuconnected.html");break;
					case 8: echo file_get_contents("./lib/v/topmenudisconnected.html");break;
					case 9: echo file_get_contents("./lib/v/signupconfirm.html");break;
					case 10:	if ($_SESSION["connected"] == 1) {		
									echo file_get_contents("./lib/v/pathologies.html");
								}
								else {
									echo file_get_contents("./lib/v/403.html");
								}
								break;
					default: echo file_get_contents("./lib/v/404.html");
			}
			break;
		default: echo file_get_contents("./lib/v/404.html");
	}
}
else
{
	if (!isset($_SESSION["connected"]) || $_SESSION["connected"] == 0) {
			echo file_get_contents("./lib/v/header.html");
			echo file_get_contents("./lib/v/login.html");
			echo file_get_contents("./lib/v/footer.html");				
	}
	else {
			echo file_get_contents("./lib/v/headerconnected.html");
			include("./lib/c/client_soap.php");
			echo file_get_contents("./lib/v/footer.html");
	}
	
}

?>