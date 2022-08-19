
<?php

if (!isset($_SESSION)) {
	session_start();
}
if (!isset($_SESSION["login"])) {
	header("location: login.php?authenticate=failed");
}
