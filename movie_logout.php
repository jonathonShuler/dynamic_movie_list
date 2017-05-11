<?php

session_start();

if(isset($_SESSION['username'])){
	session_destroy();
	$_SESSION = array();
	echo <<<_END
	You have successfully logged out!
	<br>
	<a href="movie_login.php" >Log In Again</a>
_END;
}

?>