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
		<link rel="stylesheet" type="text/css" href="signupstyles.css">
</head>
<body>
	<div class="title">
		
		<h1  align="center"> Welcome To SignUp</h1>
	</div>
	<div class="loginbox">
		<img src="../dash/images/profile.png" class="profile">
		
		<h2>Signup Here</h2>
		
		<form action="signup.php" method="post">
			<p style="font-size:12px">Username</p>
			<input type="text" name="username" placeholder="Enter Username" required>
			
			<p style="font-size:12px">Email</p>
			<input type="email" name="email" placeholder="Enter Email" required>
			
			<p style="font-size:12px">Password</p> <input type="password" name="password" placeholder="Enter Password" id="myInput" required>
			<table border="1" height="10px" width="200px" style="margin-bottom:10px;padding: 0px;"><tr><td> <p style="font-size:10px; padding-top=0px;">Show Password </p> </td>
			<td width='15' style='padding-top:18px; padding-right:10px;'><center><input type="checkbox"  onclick="myFunction()"></center></td></tr></table>
			
			
			
			<p style="font-size:12px">Confirm Password</p><input type="password" name="password1" placeholder="Enter Password" id="myInput1" required>
			<table border="1" height="10px" width="200px" style="margin-bottom:10px;"><tr><td> <p style='font-size:10px'>Show Password </p> </td>
			<td width='15' style='padding-top:18px; padding-right:10px;'><center><input type="checkbox"  onclick="myFunction1()"></center></td></tr></table>
			
			<script>
				function myFunction() {
					var x = document.getElementById("myInput");
					if (x.type === "password") {
					x.type = "text";
					} else {
					x.type = "password";
					}
				}
				function myFunction1() {
					var x = document.getElementById("myInput1");
					if (x.type === "password") {
					x.type = "text";
					} else {
					x.type = "password";
					}
				}
			</script><br>
			
			<input type="submit" name="submit" value="Register"><br>
			

		</form>
	</div>


</body>
</html>	




<?php

	include('dbcon.php');
	
	if(isset($_POST['submit']))
	{
		$user_name = $_POST['username'];
		$email= $_POST['email'];
		$password= $_POST['password'];
		$password1= $_POST['password1'];
	
		if($password === $password1)
		{

		$qry = "INSERT INTO users(username, email, password) VALUES ('$user_name','$email','$password')";
		
		$run = mysqli_query($con,$qry);
		
			
				header('location:index.php');
				?>
				<script>
				alert("Registered Successfully");
				</script>
				<?php
		
		}
		else
		{
			?>
			<script>
			alert("Password Not Match");
			window.open('signup.php','_self');
			</script>
			<?php
		}
			
		
	
	}


		
?>	 