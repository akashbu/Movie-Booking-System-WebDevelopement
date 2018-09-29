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
<li><a href="dash.php" class="active" >HOME</a></li>
<li><a href="users.php" >USERS</a></li>
<li><a href="movie.php" >MOVIES</a></li>
<li><a href="theatres.php" >THEATRES</a></li>
<li><a href="shows.php" >SHOWS</a></li>
<li><a href="timings.php" >TIMINGS</a></li>
<li><b class='logout' style="padding-top:14px;padding-right:2px;"><?php echo strtoupper("USER:".$_SESSION['user']);?></b></li>
<li><a href="logout.php" class='logout'>LOGOUT</a></li>
</ul>

</div>

<div class='content'>
<br><center><h1 class="animated slideInUp">WELCOME to ADMIN DASHBOARD.</h1></center>
</div>

</body>
</html>








