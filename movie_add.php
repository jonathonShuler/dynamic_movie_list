<html>

	<head>
		<title>Add A Movie</title>
		<!--<link type="text/css" rel="stylesheet" href="movie_stylesheet.css"/>-->
		<?php
			require_once 'movie_db_info.php';
			require_once 'movie_check_session.php';
		?>
	</head>
	
	<body>
		<div class="topHeader">
			<h1>Add A Movie</h1>
		</div>
		<div class="details">
		<form action="movie_add.php" method="post">
			<pre>
			Movie Title <input type="text" name="title">
			Genre <input type="text" name="genre">
			MPAA Rating <input type="text" name="mpaa">
			IMDB User Score <input type="text" name="imdb">
			Metacritic Score <input type="text" name="metacritic">
			Top Billed Actress <input type="text" name="top_actress">
			Top Billed Actor <input type="text" name="top_actor">
			USA Release Date <input type="text" name="release_date">
			Run Time <input type="text" name="run_time">
			Director <input type="text" name="director">
			Sentiment <input type="text" name="sentiment">
			USA Box Office Gross <input type="text" name="usa_gross">
			Movie Poster Image URL <input type="text" name="image_url">
			
				       <input type="submit" name="Add Movie">
			</pre>
		</form>
		</div>
		<?php
			$conn = new mysqli($hn, $un, $pw, $db);
			if ($conn->connect_error) die($conn->connect_error);

			if(isset($_POST['title']) &&
				isset($_POST['genre']) &&
				isset($_POST['mpaa']) &&
				isset($_POST['imdb']) &&
				isset($_POST['metacritic']) &&
				isset($_POST['top_actress']) &&
				isset($_POST['top_actor']) &&
				isset($_POST['release_date']) &&
				isset($_POST['run_time']) &&
				isset($_POST['director']) &&
				isset($_POST['usa_gross']) &&
				isset($_POST['sentiment']) &&
				isset($_POST['image_url'])) {
					$title=get_post($conn, 'title');
					$genre=get_post($conn, 'genre');
					$mpaa=get_post($conn, 'mpaa');
					$imdb=get_post($conn, 'imdb');
					$metacritic=get_post($conn, 'metacritic');
					$top_actress=get_post($conn, 'top_actress');
					$top_actor=get_post($conn, 'top_actor');
					$release_date=get_post($conn, 'release_date');
					$run_time=get_post($conn, 'run_time');
					$director=get_post($conn, 'director');
					$usa_gross=get_post($conn, 'usa_gross');
					$image_url=get_post($conn, 'image_url');
					$sentiment=get_post($conn, 'sentiment');
					$query="INSERT INTO movie (movie_id, title, genre, mpaa, imdb, metacritic, top_actress, top_actor, release_date, run_time, director, usa_gross, image_url, sentiment) VALUES ".
						"(null,'$title','$genre','$mpaa','$imdb','$metacritic','$top_actress','$top_actor','$release_date','$run_time','$director','$usa_gross','$image_url','$sentiment')";
					$result=$conn->query($query);
					if(!$result) echo "INSERT failed: $query <br>" .
						$conn->error . "<br>";
						
	echo <<<_END
	<div id="movieadded">
	$title was successfully added!
	<br>
	<a href="movie_list.php">Return To The Movie List</a>
	</div>
_END;
			}

			function get_post($conn, $var) {
				return $conn->real_escape_string($_POST[$var]);
			}
			
			$conn->close();
		?>
		<div id="addcancel">
			<a href="movie_list.php">
				<button id="button">
					Cancel
				</button>
			</a>
		</div>
	</body>
</html>