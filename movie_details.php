<html>

	<head>
		<title>Movie Details</title>
		<!--<link type="text/css" rel="stylesheet" href="movie_stylesheet.css"/>-->
		<?php
			require_once 'movie_db_info.php';
			require_once 'movie_check_session.php';
		?>
	</head>
	
	<body>
		<div class="topHeader">
			<h1>Movie Details</h1>
		</div>
		<?php
			$conn = new mysqli($hn, $un, $pw, $db);
			if ($conn->connect_error) die($conn->connect_error);
			
			if(isset($_GET['movieid'])){
			$movieid = $_GET['movieid'];
			//echo 'movie id: '.$movieid;
			
				$query="SELECT * FROM `movie` WHERE `movie_id`='$movieid'";
				$result=$conn->query($query);
				if(!$result) die ($conn->error);
			
				$rows=$result->num_rows;
				for($j=0; $j<$rows; $j++) {
					$result->data_seek($j);
					$row=$result->fetch_array(MYSQLI_NUM);
	
		?>
					<div id="detailsdiv">
						<img src="<?php echo $row[12]; ?>">
						
						<p>
							Movie Title: <?php echo $row[1]; ?>
						</p>
						
						<p>
							Genre: <?php echo $row[2]; ?>
						</p>
						
						<p>
							MPAA Rating: <?php echo $row[3]; ?>
						</p>
						
						<p>
							IMDB User Score: <?php echo $row[4]; ?>
						</p>
						
						<p>
							Metacritic Score: <?php echo $row[5]; ?>
						</p>
						
						<p>
							Top Billed Actress: <?php echo $row[6]; ?>
						</p>
						
						<p>
							Top Billed Actor: <?php echo $row[7]; ?>
						</p>
						
						<p>
							USA Release Date: <?php echo $row[8]; ?>
						</p>
						
						<p>
							Run Time: <?php echo $row[9]; ?>
						</p>
						
						<p>
							Director: <?php echo $row[10]; ?>
						</p>
						
						<p>
							Sentiment: <?php echo $row[13]; ?>
						</p>
						
						<p>
							USA Box Office Gross: <?php echo $row[11]; ?>
						</p>
						
						<form action="movie_update.php" method="post">
							<input type="hidden" name="update" value="yes">
							<input type="hidden" name="movie_id" value="<?php echo $row[0]; ?>">
							<input type="submit" value="Update Movie">
						</form>
					</div>
		<?php
				}
			}
			
			$conn->close();
		?>
		<div id="detailscancel">
			<a href="movie_list.php" id="buttonlink">
				<button>
							Return to List
				</button>
			</a>
		</div>
	</body>
</html>