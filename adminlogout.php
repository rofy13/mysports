<?php
session_start();

include("dbconfig.php");

//$user = $_SESSION['user'];
//echo $user;

session_destroy();

header('Location: adminlogin.php');

 ?>
