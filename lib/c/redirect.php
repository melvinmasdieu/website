<?php

if ($_POST != null && $_POST["pageId"] != null)
	$pageId = $_POST["pageId"];

	switch($pageId) {

		case 1: echo file_get_contents("./lib/v/header.html");break;
		case 2: echo file_get_contents("./lib/v/footer.html");break;
		case 3: echo file_get_contents("./lib/v/login.html");break;
		case 4: echo file_get_contents("./lib/v/test.html");break;
		default: break;
	}

?>