<html>

	<head>
		<title>Movie List</title>
		<!--<link type="text/css" rel="stylesheet" href="movie_stylesheet.css"/>-->
		<?php
			require_once 'movie_db_info.php';
			require_once 'movie_check_session.php';
		?>
	</head>
	
	<body>
		
		<div class="topHeader">
			<h1>Movie List</h1>
		</div>
		<div id="topListButtons">
			<a href="movie_add.php">
				<button>
					Add A Movie
				</button>
			</a>
			<a href="movie_logout.php">
				<button>
					Logout
				</button>
			</a>
		</div>
		
		<?php
			$conn = new mysqli($hn, $un, $pw, $db);
			if ($conn->connect_error) die($conn->connect_error);
			
			$query="SELECT * FROM movie";
			$result=$conn->query($query);
			if(!$result) die ($conn->error);

			$rows=$result->num_rows;
			for($j=0; $j<$rows; $j++) {
				$result->data_seek($j);
				$row=$result->fetch_array(MYSQLI_NUM);
	
		?>
				<div class="dlink">
					<p>
						<a href="movie_details.php?movieid=<?php echo $row[0]; ?>" class="alink">
							<img src="<?php echo $row[12]; ?>">
							<br> <?php echo $row[1]; ?>
						</a>
					</p>
					<form action="movie_delete.php" method="post">
						<input type="hidden" name="delete" value="yes">
						<input type="hidden" name="title" value="<?php echo $row[1]; ?>">
						<input type="submit" value="Delete Movie">
					</form>
				</div>	
		<?php			
			}
			$conn->close();
		?>
	</body>
</html>