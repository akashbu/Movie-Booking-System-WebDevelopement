<?php

	include('dbcon.php');
	
		

		$qry="SELECT image FROM movies WHERE Movie_id='5'";
		$run = mysqli_query($con,$qry);
		
		
	
while($rows = mysqli_fetch_assoc($run))
{       
    $image = $rows['image'];    
    print $image;
}
		mysqli_close($con);
			
	
		
?>	 