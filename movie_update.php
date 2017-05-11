<html>

	<head>
		<title>Update A Movie</title>
		<!--<link type="text/css" rel="stylesheet" href="movie_stylesheet.css"/>-->
		<?php
			require_once 'movie_db_info.php';
			require_once 'movie_check_session.php';
		?>
	</head>
	
	<body>
		<div class="topHeader">
			<h1>Update Movie</h1>
		</div>
		<?php
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
			
		if(isset($_POST['update']) &&
			isset($_POST['movie_id'])){
				$movie_id=get_post($conn, 'movie_id');
				//echo 'Movie ID1: '.$movie_id;
				
				$query="SELECT * FROM `movie` WHERE `movie_id`='$movie_id'";
				$result=$conn->query($query);
				if(!$result) die ($conn->error);
			
				$rows=$result->num_rows;
				for($j=0; $j<$rows; $j++) {
					$result->data_seek($j);
					$row=$result->fetch_array(MYSQLI_NUM);
	
		?>
				<div id="updatediv">
					<form action="movie_update.php" method="post">
						<pre>
							<input type="hidden" name="movie_id" value="<?php echo $row[0]; ?>">
							<span>Movie Title</span> <input type="text" name="title" value="<?php echo $row[1]; ?>">
							<span>Genre</span> <input type="text" name="genre" value="<?php echo $row[2]; ?>">
							<span>MPAA Rating</span> <input type="text" name="mpaa" value="<?php echo $row[3]; ?>">
							<span>IMDB User Score</span> <input type="text" name="imdb" value="<?php echo $row[4]; ?>">
							<span>Metacritic Score</span> <input type="text" name="metacritic" value="<?php echo $row[5]; ?>">
							<span>Top Billed Actress</span> <input type="text" name="top_actress" value="<?php echo $row[6]; ?>">
							<span>Top Billed Actor</span> <input type="text" name="top_actor" value="<?php echo $row[7]; ?>">
							<span>USA Release Date</span> <input type="text" name="release_date" value="<?php echo $row[8]; ?>">
							<span>Run Time</span> <input type="text" name="run_time" value="<?php echo $row[9]; ?>">
							<span>Director</span> <input type="text" name="director" value="<?php echo $row[10]; ?>">
							<span>Sentiment</span> <input type="text" name="sentiment" value="<?php echo $row[13]; ?>">
							<span>USA Box Office Gross</span> <input type="text" name="usa_gross" value="<?php echo $row[11]; ?>">
							<span>Movie Poster Image URL</span> <input type="text" name="image_url" value="<?php echo $row[12]; ?>">
							<input type="submit">
						</pre>
					</form>
				</div>
		<?php
				}
		}
			if(isset($_POST['movie_id']) &&
				isset($_POST['title']) &&
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
					$movie_id=get_post($conn, 'movie_id');
					//echo 'Movie_id2: '.$movie_id;
					$title=get_post($conn, 'title');
					//echo 'Title: '.$title;
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
					
					$query="UPDATE movie 
							SET title='$title',genre='$genre',mpaa='$mpaa',imdb='$imdb',metacritic='$metacritic',top_actress='$top_actress',top_actor='$top_actor',release_date='$release_date',run_time='$run_time',director='$director',usa_gross='$usa_gross',image_url='$image_url',sentiment='$sentiment'
							WHERE movie_id='$movie_id'";
					$result=$conn->query($query);
					if(!$result) echo "UPDATE failed: $query <br>" .
						$conn->error . "<br>";
					
					echo <<<_END
	<div id="movieadded">
	$title was successfully updated!
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
		
		<a href="movie_list.php" id="buttonlink">
				<button id="updatecancel">
							Cancel
				</button>
		</a>
	</body>
</html>