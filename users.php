<?php 
	session_start();
	
	if($_SESSION['user']==true){
		echo "";
	}
	else{
		header('location:login.php');
	}
?>
<html class="animated fadeIn">
<head>
	<link href="dashstyle.css" type='text/css' rel="stylesheet">
	<link href="animate.css" type='text/css' rel="stylesheet">

	<title>Dashboard</title>

	
</head>
<body class='bg-gray'>

<div class='header'>
<center><img src='admin.png' alt="AdminLogo" id="adminlogo"><br><center id='head' class="animated flipInX">ADMIN DASHBOARD</center>

</center>

</div>

<div class='navbar'>

<ul align="center">
<li><a href="dash.php"  >HOME</a></li>
<li><a href="users.php" class="active">USERS</a></li>
<li><a href="movie.php" >MOVIES</a></li>
<li><a href="theatres.php" >THEATRES</a></li>
<li><a href="shows.php" >SHOWS</a></li>
<li><a href="timings.php" >TIMINGS</a></li>
<li><b class='logout' style="padding-top:14px;padding-right:2px;"><?php echo strtoupper("USER:".$_SESSION['user']);?></b></li>
<li><a href="logout.php" class='logout'>LOGOUT</a></li>
</ul>

</div>

<div class='content'>
<?php

include ("dbcon.php");

$qry="select username,email FROM users";
$result = mysqli_query($con,$qry);
$row_count=mysqli_num_rows($result);

if($row_count==0){echo  "<br><center><b>SHOWING 0 RESULTS.<b></center>";
}
else{
	echo  "<br><center><b>SHOWING ".$row_count." RESULTS.<b></center><br>";
	
?>
<table align='center' class="animated fadeInUp" border='1'>

<tr>
<th>Sr.No</th>
<th>USERNAME</th>
<th>EMAIL-ID</th>

</tr>

<?php

for($i=0;$i<$row_count;$i++)
{
	$row=mysqli_fetch_assoc($result);
	?>
	<tr>
	<td><?php echo $i+1 ?></td>
	<td><?php echo $row["username"] ?></td>
	<td><?php echo $row["email"] ?></td>
	</tr>
	<?php
}
}

?>


</div>

</body>
</html>








