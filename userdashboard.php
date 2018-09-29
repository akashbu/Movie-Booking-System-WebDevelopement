<?php 
	session_start();
?>


<html>
<head>
<title>User Dashboard</title>
<link href="animate.css" type='text/css' rel="stylesheet">

<link rel="stylesheet" type="text/css" href="swiper.min.css">

<link rel="stylesheet" type="text/css" href="userdashboardstyles.css">

</head>

<style>
.navbar li a:hover {
    color: black;
	background-color:white;
	
}

.navbar ul 
{	
	height:60px;
    list-style-type: none;
    overflow: hidden;
    background-color: #0b243d;
}

.navbar li a {
    display: block;
    color: white;
    font-size: 16px;
    text-decoration: none;
}

</style>

<body >

<div class='navbar'>
<ul>	
<li>
	<div class="toggle-btn" onclick="toggleSidebar()">
	<span></span>
	<span></span>
	<span></span>
	</div>
</li>
<li style="padding-left:50px;padding-right:20px;padding-top:10px;"><a href="userdashboard.php">Home</a></li>	
<li><h4 style="padding:10px; float:right;"><a href="userlogout.php">LOGOUT</a></h4></li>
<li class="search"><input type='text' name='search' placeholder="Search movie"></li>
<li><button class='sign' onclick="document.location.href='index.php'">Sign In</button></li>

</ul>
</div>

<div id="sidebar">
	<ul>
		<li><center><img src="../dash/images/profile.png" width="150px" height="150px" /></center></li>
		<?php if(isset($_SESSION['name']) && isset($_SESSION['email']))
	{?>
		<li>Name : <?php echo $_SESSION['name'];?></li>
		<li>Email : <?php echo $_SESSION['email'];?></li>
		<li>Movie Booked : <?php 
		if(!empty($_SESSION['movie_n'])){ 
			echo $_SESSION['movie_n'];
		}
		else{
			echo"";
	}
	
		?> </li>
		
		<?php }else{?>
		<li><h4>You are not Logged In.Please Sign In</h4></li>
		<?php }?>
		
	</ul>
</div>



<?php 
include('dbcon.php');
		
$qry1 = "SELECT * from movies";
		
$result = mysqli_query($con,$qry1);


$row_count=mysqli_num_rows($result);
?>

<div class="swiper-container">
    <div class="swiper-wrapper">
	
	<?php	
	for($i=0;$i<$row_count;$i++)
	{
	$row1 = mysqli_fetch_array($result);	
	?>
	
	
    <div class="swiper-slide">
		<div class="imgBx">
			<img src="Image/<?php echo $row1['poster'];?>" width="300px" height="300px">
		</div>
		<div class="details">
			<h3><?php echo $row1['Movie_Name'];?><br><span><?php echo $row1['type'];?></span></h3>
		</div>
	</div>
	
	    
	<?php
	}
	?>	
	
	
	
	
	</div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
</div>





<div class="title1">
</div>


<div class="movie-list">
<h2 style="position:absolute;left:30px;top:600px;">COMEDY</h2>
<h2 style="position:absolute;left:30px;top:1000px;">DRAMA/ROMANCE</h2>

<h2 style="position:absolute;left:30px;top:1400px;">ACTION/THRILLER</h2>


 <table  width="100%" height="1280px" >
 
        <tr style="padding-top:40px;padding-bottom:10px;">
        <?php
       
        include('dbcon.php');
       
        $qry = "select * from movies where type='comedy'";
 
        $run = mysqli_query($con,$qry);
		$rows=mysqli_num_rows($run);
		while($row = mysqli_fetch_array($run))
		{
		if($row['Release_date']<="2018-11-31")
		{
        ?>       
                <td width="25%">
                <center>
                        <div class="flip-card">
 
                     <div class="zoomimg">
					 <a href="mdetails.php?id=<?php echo $row['Movie_id'];?>">
		<img height="300px" width="300px" style="transition:0.75s;border-radius:20px;" src="Image/<?php echo $row['poster'];?>"> </div>
					 </a>
               
                         </div>
                   
                </center>
                </td>
				
				
		<?php }
		
		}?>
			   
		</tr>
		
		
		
		<tr style="padding-top:30px;padding-bottom:10px;">
        <?php
       
        include('dbcon.php');
       
        $qry = "select * from movies where type='drama'";
 
        $run = mysqli_query($con,$qry);
		$rows=mysqli_num_rows($run);
		while($row = mysqli_fetch_array($run))
		{
		if($row['Release_date']<="2018-11-31")
		{
        ?>       
                <td width="25%">
                <center>
                        <div class="flip-card">
 
                     <div class="zoomimg">
					 <a href="mdetails.php?id=<?php echo $row['Movie_id'];?>">
		<img height="300px" width="300px" style="transition:0.75s;border-radius:20px;" src="Image/<?php echo $row['poster'];?>"> </div>
					 </a>
               
                         </div>
                   
                </center>
                </td>
				
				
		<?php }
		
		}?>
			   
		</tr>
		
		
		
		<tr style="padding-top:30px;padding-bottom:10px;">
        <?php
       
        include('dbcon.php');
       
        $qry = "select * from movies where type='action'";
 
        $run = mysqli_query($con,$qry);
		$rows=mysqli_num_rows($run);
		while($row = mysqli_fetch_array($run))
		{
		if($row['Release_date']<="2018-11-31")
		{
        ?>      
                <td width="25%">
                <center>
                        <div class="flip-card">
 
                     <div class="zoomimg">
					 <a href="mdetails.php?id=<?php echo $row['Movie_id'];?>">
		<img height="300px" width="300px" style="transition:0.75s;border-radius:20px;" src="Image/<?php echo $row['poster'];?>"> </div>
					 </a>
               
                         </div>
                   
                </center>
                </td>
				
				
		<?php }
		
		}?>
			   
		</tr>

    </table>

</div>



<div class="book"><center><form action="booking.php" method="post"> <input type="submit" name="submit" value="Book Now"> </form></center>
</div>

<div class="book1"><center><a href="upcomingmovies.php"><input type="submit" name="submit" value="Upcoming Movies"></center></a></center>
</div>


<?php

if(isset($_POST["submit"]))
{
	header('location:booking.php');
}
?>


<script type="text/javascript" src="swiper.min.js">
</script>


<script>
    var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 20,
        stretch: 0,
        depth: 200,
        modifier: 4,
        slideShadows : true,
      },
	   autoplay: {
        delay: 1000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
  </script>



<script>
	function toggleSidebar()
	{
		
		
		document.getElementById("sidebar").classList.toggle("active");
		
	}

</script>


</body>
</html>

