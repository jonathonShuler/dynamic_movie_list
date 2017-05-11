<?php

session_start();

if(!isset($_SESSION['username'])){
	header("Location: movie_login.php");
	exit();
}

?>