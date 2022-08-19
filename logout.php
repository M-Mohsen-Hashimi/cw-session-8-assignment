<?php
require_once('authenticate.php');
unset($_SESSION["login"]);
header("location: login.php?logout=done");