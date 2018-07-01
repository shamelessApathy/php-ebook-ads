<?php

require('constants.php');
require('globals.php');
require('uri_router.php');

session_start();
$_SESSION['start'] = true;
$uri = $_SERVER['REQUEST_URI'];


uri_router($uri);



?>
