<?php 
	session_start();
	
	if(isset($_SESSION['name'])){
		header('location:userdashboard.php');
	}

?>


<!DOCTYPE HTML>
<html lang="en_US">
<head>
	<meta charset="UTF-8">
		<title>EVENT MANAGEMENT SYSTEM</title>
		<link rel="stylesheet" type="text/css" href="indexstyles.css">
</head>
<body>
	<div class="title">
		<h3 align="right" style="margin-right:20px;"><a href="login.php">Admin Login</a></h3>
		<h1  align="center"> Welcome To MovieTick</h1>
	</div>
	<div class="loginbox">
		<img src="../dash/images/profile.png" class="profile" />
		
		<h2>Login Here</h2>
		
		<form action="index.php" method="post">
			<p>Username</p>
			<input type="text" name="username" placeholder="Enter Username" required>
			
			<p>Password</p>
			<input type="password" name="password" placeholder="Enter Password" required><br>
			
			<input type="submit" name="submit" value="Login"><br>
			
			<a href="signup.php">Create new account?</a>
		</form>
	</div>


</body>
</html>		


<?php

	include('dbcon.php');
	
	if(isset($_POST['submit']))
	{
		$username = $_POST['username'];
		$password= $_POST['password'];
		

		$qry = "select * from users WHERE username='$username' AND password='$password'";
		
		$run = mysqli_query($con,$qry);
		
		$row = mysqli_num_rows($run);
		
		if($row <1)
		{
			?>
			<script>
			alert("Invalid Username and Password");
			window.open('index.php','_self');
			</script>
			<?php
		}
		else
		{
			$data = mysqli_fetch_array($run);
			
			$un = $data['username'];
			$em = $data['email'];

			session_start();
		
			$_SESSION['name']=$un;
			$_SESSION['email']=$em;
			header('location:userdashboard.php');
		
		}
		
	}


		
?>	