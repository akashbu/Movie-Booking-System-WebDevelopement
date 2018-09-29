

<?php 
	session_start();
	
	if($_SESSION['uid1']){
		echo "";
	}
	else{
		header('location:login.php');
	}
?>



<!DOCTYPE HTML>
<html lang="en_US">
<head>
	<meta charset="UTF-8">
		<title>EVENT MANAGEMENT SYSTEM</title>
</head>
<body background="eimg.jpg" style="background-size: cover">
	<div class="title">
		<h1  align="center"> Welcome To Admin Dashboard</h1>
		<h2 align="center">MOVIES</h2>
	</div>
	
	<table align='center' border='1'>
	
	
		
		<form action="admindashboard.php" method="post" enctype="multipart/form-data">
			<tr>
			<td><p><b>Movie</b></p>
			<input type="text" name="movie_name" placeholder="Enter" required></td>
			<td><p><b>Theatre-ID</b></p>
			<input type="text" name="theatre_id" placeholder="Enter" required></td>
			<td><p><b>Actor</b></p>
			<input type="text" name="actor" placeholder="Enter" required></td>
			<td><p><b>Actress</b></p>
			<input type="text" name="actress" placeholder="Enter" required></td>
			<td><p><b>Director</b></p>
			<input type="text" name="director" placeholder="Enter" required></td>
			
			<td><p><b>Poster</b></p>
			<input type="file" name="img1" required></td>
			
			<td><p><b>Release-date</b></p>
			<input type="text" name="rdate" placeholder="Enter" required></td>
			
	
			<tr><td><input type="submit" name="submit" value="SAVE"></td></tr>
			</tr>
			
		</form>
	</table>
	
		
</body>
</html>			


<?php

	include('dbcon.php');
	if(isset($_POST['submit']))
	{
		$movie=$_POST['movie_name'];
		$actor=$_POST['actor'];
		$actress=$_POST['actress'];
		$director=$_POST['director'];
		$rdate=$_POST['rdate'];
		$tid=$_POST['theatre_id'];
		$image_name = $_FILES['img1']['name'];
		$temp_name = $_FILES['img1']['tmp_name'];
		
		move_uploaded_file($temp_name,"images/$image_name");
		$qry="INSERT INTO movies (Theatre_id, Movie_Name, Release_date, Actress, Actor, Director,image) 
		VALUES ('$tid','$movie','$rdate','$actress','$actor','$director','$image_name')";
		
		if (mysqli_query($con, $qry)) 
		{?>
		<div align="center"> <?php echo "New record created successfully";?></div>
		
		<?php
		}
		else
		{
		echo  "Error in inserting data" . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($con);
			
	}
		
?>	 