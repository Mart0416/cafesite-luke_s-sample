<?php
session_start();
if(!isset($_SESSION["xx"])){
	header("location:loginForm.php");
	exit;
}

unset($_SESSION["xx"]);

header("location:main.php");

?>
