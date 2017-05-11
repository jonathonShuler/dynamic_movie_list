<?php

require_once 'movie_db_info.php';
require_once 'movie_check_session.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if(isset($_POST['delete']) && isset($_POST['title'])) {
	$title=get_post($conn, 'title');
	$query="DELETE FROM movie WHERE title='$title'";
	$result=$conn->query($query);
	if(!$result) echo "DELETE failed: $query <br>" .
	$conn->error . "<br><br>";
	
	echo <<<_END
	$title was successfully deleted!
	<br>
	<br>
	<a href="movie_list.php">Return To The Movie List</a>
_END;
}

$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}
?>