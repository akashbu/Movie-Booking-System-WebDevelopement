
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
<li><a href="create.php">CREATE</a></li>
<li><a href="view.php">VIEW</a></li>
<li><a href="update.php" class="active">UPDATE</a></li>
<li><a href="delete.php">DELETE</a></li>
<li><a href="login.php" id='logout'>LOGOUT</a></li>
</ul>

</div>


<div class='content'>
<br><h2 align="center">MOVIES</h2>
<?php

include ("dbcon.php");


$qry="select name,movie_id, actor, actress, theatre_id, rdate, director FROM movies";
$result = mysqli_query($con,$qry);
$row_count=mysqli_num_rows($result);
if($row_count==0){echo  "<br><center><b>SHOWING 0 RESULTS.<b></center>";}
else{
	echo  "<br><center><b>SHOWING ".$row_count." RESULTS.<b></center><br>";
	
?>

<table align='center' border='1'>

<tr>
<th>Sr.No</th>
<th>MOVIE</th>
<th>Movie-ID</th>
<th>ACTOR</th>
<th>ACTRESS</th>
<th>Theatre-ID</th>
<th>RELEASE DATE</th>
<th>DIRECTOR</th>
<th>EDIT</th>
</tr>


<?php

for($i=0;$i<$row_count;$i++)
{
	$row=mysqli_fetch_assoc($result);
	?>
	<tr>
	<td><?php echo $i+1 ?></td>
	<td><?php echo $row["name"] ?></td>
	<td><?php echo $row["movie_id"] ?></td>
	<td><?php echo $row["actor"] ?></td>
	<td><?php echo $row["actress"] ?></td>
	<td><?php echo $row["theatre_id"] ?></td>
	<td><?php echo $row["rdate"] ?></td>
	<td><?php echo $row["director"] ?></td>

	<td><a href="edit.php?eid=<?php echo $row["movie_id"] ?>" style="color:white"><img style="height:20px;width:20px" src="edit.png"></a></td>

	</tr>
	
	<?php
	
}

}

?>

</div>

</body>
</html>