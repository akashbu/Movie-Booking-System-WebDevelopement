
<html>
<head>
	<link href="dashstyle.css" type='text/css' rel="stylesheet">
	<title>Dashboard</title>
</head>
<body class='bg-gray'>

<div class='header'>
<center><img src='admin.png' alt="AdminLogo" id="adminlogo"><br><center id='head'>ADMIN DASHBOARD</center>

</center>

</div>

<div class='navbar'>

<ul class='func' align="center">
<li><a href="dash.php">HOME</a></li>
<li><a href="create.php" class="active">CREATE</a></li>
<li><a href="view.php">VIEW</a></li>
<li><a href="update.php">UPDATE</a></li>
<li><a href="delete.php">DELETE</a></li>
<li><a href="login.php" id='logout'>LOGOUT</a></li>
</ul>

</div>

<div class='content'>
<br><h2 align="center">MOVIES</h2><br>
<form action="create.php" method="post" enctype="multipart/form-data">
<table align='center' >

		
			<tr>
			<td><b>Movie:</b></td>
			<td><input type="text" name="movie_name"  required></td>
			</tr>
			<tr>
			<td><b>Actor:</b></td>
			<td><input type="text" name="actor"  required></td>
			</tr>
			<tr>
			<td><b>Actress</b></td>
			<td><input type="text" name="actress"  required></td>
			</tr>
			<tr>
			<td><b>Director:</b></td>
			<td><input type="text" name="director"  required></td>
			</tr>
			<tr>
			<td><b>Release-Date:</b></td>
			<td><input type="text" name="rdate"  required></td>
			</tr>
			<tr>
			<td><b>Poster/Cover</b></td>
			<td><input type="file" name="poster"  required></td>
			 
			</tr> 
			
			<tr><td><input type="submit" style="margin-left:90%" name="submit" value="SAVE"></td></tr>
			
		
	</table>
	</form>
	
	<?php

	include('dbcon.php');
	if(isset($_POST['submit']))
	{
		$movie=$_POST['movie_name'];
		$actor=$_POST['actor'];
		$actress=$_POST['actress'];
		$director=$_POST['director'];
		$rdate=$_POST['rdate'];
		
		//to get uploaded poster
		$file=$_FILES["poster"]["name"];
	
		$temp=$_FILES["poster"]["tmp_name"];
		
		$path="Image/".$file;
		$file1=explode(".",$file);
		$file1_name=$file1[0];
		$file_ext=$file1[1];
		$allowed_ext=array('jpg','jpeg','png','gif');
		
	if(in_array($file_ext,$allowed_ext))
	{	move_uploaded_file($temp,$path);

		$qry_duplicate="Select name,actor,actress,rdate,director from movies where name='$movie' AND actor='$actor' AND actress='$actress' AND
		rdate='$rdate' AND director='$director'";
		
		$duplicate_result=mysqli_query($con,$qry_duplicate);
		$duplicate_count=mysqli_num_rows($duplicate_result);
		if ($duplicate_count>0)
		{?>
			<div align="center"> <?php echo "<b>Movie details Already Present.</b>";?></div>
		
			<?php
		}
		
		else
		{
			$qry="INSERT INTO movies (name,actor, actress , rdate, director,poster) 
			VALUES ('$movie','$actor','$actress','$rdate','$director','$file')";
		
		
			if (mysqli_query($con, $qry)) 
			{?>
			<div align="center"> <?php echo "<b>New record created successfully.</b>";?></div>
		
			<?php
			}
			
			
			else
			{
			?>
			<div align="center"> <?php echo "<b>Error in connection.Insertion failed</b><br>".$qry . "<br>" . mysqli_error($con);?></div>
			<?php
			}

			mysqli_close($con);
		}	
	}
	
	else
		{
		?>
		<div align="center"> <?php echo "<b>Upload failed.Upload Only .jpg,.jpeg,.png,.gif Extensions.</b><br>";?></div>
		<?php
		}
	
	}
		
?>	 


</div>

</body>
</html>








