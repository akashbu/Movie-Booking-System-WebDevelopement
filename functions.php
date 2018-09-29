<?php
include('dbcon.php');

function getUser($id)
{
	$array=array();
		$qry = "select * from user WHERE id='$id'";
		
		$run = mysqli_query($con,$qry);
		
		while($r=mysqli_fetch_array($run))
		{
			$array['id'] = $r['id'];
			$array['username'] = $r['username'];
		}
		
		return $array;
}
?>



	session_start();
	require('functions.php');
	if($_SESSION['uid']){
		$un=getUser($_SESSION['uid']);
	}
	else{
		header('location:index.php');
	}