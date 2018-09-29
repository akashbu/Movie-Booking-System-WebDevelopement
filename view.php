
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
<li><a href="view.php" class="active">VIEW</a></li>
<li><a href="update.php">UPDATE</a></li>
<li><a href="delete.php">DELETE</a></li>
<li><a href="login.php" id='logout'>LOGOUT</a></li>
</ul>

</div>

<div class='content'>
<br><h2 align="center">MOVIES</h2>
<?php

include ("dbcon.php");

$qry="select name,movie_id, actor, actress, rdate, director,poster FROM movies";
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
<th>RELEASE DATE</th>
<th>DIRECTOR</th>
<th>POSTER/COVER</th>


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
	<td><?php echo $row["rdate"] ?></td>
	<td><?php echo $row["director"] ?></td>
	<td><img class="myImg" onclick="imgdisp(this.src)" alt="No Image" src="Image/<?php echo $row["poster"] ?>" height="50px" width='50px' ></td>
	</tr>
	<?php
}
}

?>

</div>

<div id="myModal" class="modal">
  <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
  <img class="modal-content" id="img01">

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');
var modalImg = document.getElementById("img01");

function imgdisp(img){
    modal.style.display = "block";
    modalImg.src = img;  
}

</script>

</body>
</html>