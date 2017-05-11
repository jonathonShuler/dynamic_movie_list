<html>
	<head>
		<title>
			Login
		</title>
		<!--<link type="text/css" rel="stylesheet" href="movie_stylesheet.css"/>-->
	</head>

	<body>

		<div class="imageBox">
			<div class="outerBox">
				<div class="innerBox">
					<p class="notWhite">Please Log In</p>
					<br>
					<form action="movie_login.php" method="post">
						<input type="text" name="username" placeholder="Username"><br><br>
						<input type="password" name="password" placeholder="Password"><br><br>
						<input type="submit" value="Login">
					</form>	
					<a href="movie_user_setup.php">
						<button type="button">
							Create an Account
						</button>
					</a>
				</div>
			</div>
		</div>

	<?php
	require_once 'movie_db_info.php';

	$conn = new mysqli($hn, $un, $pw, $db);
	if ($conn->connect_error) die($conn->connect_error);

	if (isset($_POST['username']) && isset($_POST['password'])) {
		
		$username_temp = mysql_entities_fix_string($conn, $_POST['username']);
		$password_temp = mysql_entities_fix_string($conn, $_POST['password']);
		
		//echo $username_temp.'<br>';
		
		$query = "SELECT * from user where username='$username_temp' ";
		$result = $conn->query($query);
		if(!$result) die($conn->error);
		elseif($result->num_rows){
			$row = $result->fetch_array(MYSQLI_NUM);
			$correct_password = $row[2];
			$username = $row[1];
			$result->close();
			
			$salt1 = 'qm&h*';
			$salt2 = 'pg!@';
			$token = hash('ripemd128', "$salt1$password_temp$salt2" );
			
			if($token == $correct_password){
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['password']=$correct_password;
				header("Location: movie_list.php");
			}else{
				exit();
			}		
		}else{
			exit();
		}	
			
	}else{
		exit();
	}

	$conn->close();


	function mysql_entities_fix_string($conn, $string){
		return htmlentities(mysql_fix_string($conn, $string));
	}

	function mysql_fix_string($conn, $string){
		if(get_magic_quotes_gpc()) $string = stripslashes($string);
		return $conn->real_escape_string($string);
	}
	?>



	</body>
</html>