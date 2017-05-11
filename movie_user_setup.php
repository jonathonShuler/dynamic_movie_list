<html>

	<head>
		<title>
			Account Setup
		</title>
		<!--<link type="text/css" rel="stylesheet" href="movie_stylesheet.css"/>-->
	</head>

	<body>

		<div class="imageBox">
			<div class="outerBox">
				<div class="innerBox">
				<p class="notWhite">Create an Account</p>
					<br>
					<form action="movie_user_setup.php" method="post">
						<input type="text" name="username" placeholder="Create a Username"><br><br>
						<input type="password" name="password" placeholder="Create a Password"><br><br>
						<input type="submit" value="Create Account">
						<a href="movie_login.php">
							<button type="button">
								Cancel
							</button>
						</a>
					</form>	
				</div>
			</div>
		</div>


	<?php

	require_once 'movie_db_info.php';

	$conn = new mysqli($hn, $un, $pw, $db);
	if ($conn->connect_error) die($conn->connect_error);


	if(	isset($_POST['username']) &&
		isset($_POST['password'])) {
			$username=get_post($conn, 'username');
			$password=get_post($conn, 'password');
			
			$salt1 = 'qm&h*';
			$salt2 = 'pg!@';
			$token = hash('ripemd128',"$salt1$password$salt2");

			$query="INSERT INTO user (user_id, username, password) VALUES ".
				"(null,'$username','$token')";
			$result=$conn->query($query);
			header("Location: movie_login.php");
			if(!$result){
				echo "INSERT failed: $query <br>" . $conn->error . "<br><br>";
			}
	}

	$conn->close();

	function get_post($conn, $var) {
		return $conn->real_escape_string($_POST[$var]);
	}

	?>






	</body>
</html>