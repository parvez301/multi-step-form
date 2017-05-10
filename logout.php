<?php
//Include GP config file
session_start();
include_once 'config.php';
//Unset token and user data from session
unset($_SESSION['token']);
unset($_SESSION['userData']);
unset($_SESSION['logged_in']);
//Reset OAuth access token
$gClient->revokeToken();
//Destroy entire session
session_destroy();
//Redirect to homepage
header("Location:index.php");