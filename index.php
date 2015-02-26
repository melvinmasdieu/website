<?php

if (!isset($_POST["pageId"])){
  $_POST["pageId"] = 1;
  include("./lib/c/redirect.php");
  $_POST["pageId"] = 3;
  include("./lib/c/redirect.php");
  $_POST["pageId"] = 2;
  include("./lib/c/redirect.php");
}
else
  include("./lib/c/redirect.php");
?>
