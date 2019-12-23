<?php
//include config.php
require_once('../includes/config.php');

//if not logged in, redirect to login page
$user -> logout();
header('Location: index.php');

?>
