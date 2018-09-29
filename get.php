



<?php
	
		
	$db = mysqli_connect("localhost","root","","ems"); //keep your db name
$sql = "SELECT * FROM movies";
$sth = $db->query($sql);
$result=mysqli_fetch_array($sth);
echo '<img height="200px" height="200px" src="data:image/jpeg;base64,'.base64_encode( $result['poster'] ).'"/>';
	?>