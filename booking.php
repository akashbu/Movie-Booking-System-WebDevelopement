<?php
session_start();
?>
<html lang="en">
<head>
<meta charset="utf-8">
<title>User Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="swiper.min.css">

  <!-- Demo styles -->
  	<link href="animate.css" type='text/css' rel="stylesheet">

<style>
 html, body {
      position: relative;
      height: 100%;
}
select:required:invalid {
  color: gray;
}
option[value=""][disabled] {
  display: none;
}
option {
  color: black;
}

.locat{
	height: 40px;
	width: 100%px;
	background: black;
	color: white;
	display: none;

}


.locat1{
	width: 100%;
	height:auto;
	margin-top: 10px;
	display: none;
	
}

.locat2{
	height: 40px;
	width: 100%;
	background: black;
	color: white;
	display: none;
	margin-top: 10px;

}


.swiper-container {
      width: 100%;
      height: 300px;
    }

.swiper-slide {
      text-align: center;
      font-size: 18px;
      background:#fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
}

input[type="submit"]{
	border: 1px;
	background: #fb2525;
	outline: none;
	width:120px;
	height: 30px;
	color: #fff;
	border-radius:15px;
	
}

input[type="button"]{
	border: 1px;
	background: #fb2525;
	outline: none;
	width:120px;
	height: 30px;
	color: #fff;
	border-radius:15px;
	
}

.title2{
	width: 100%;
	height: 70px;
	background: black;
	color: white;
}


.h1{
	margin-left:0px;
	background: #151719;
	color: white;
	height: 50px;
	
}




.h5 a{
	text-decoration: none;
	color: white;
}
</style>
</head>
<body class="animated fadeIn">


	<?php
		include('dbcon.php');
		$count=0;
		$loc="null";
		$mov="null";	

	
		if( isset($_POST['loc']) && isset($_POST['mov']))
		{
			$loc=$_POST['loc'];
			$mov=$_POST['mov'];
			$_SESSION['movie_n']=$mov;
	
		}
		else
		{
			echo "";
		}
		
		$qry = "select Movie_Name from movies";
		$run = mysqli_query($con,$qry);
	
		
		$qry1 = "SELECT DISTINCT Location FROM theatres;";
		$run1 = mysqli_query($con,$qry1);

		$qry2 = "SELECT Theatre_name, time1, time2, time3, time4, time5 FROM theatres where Location='$loc' and Movie_Name='$mov';";
		$run2 = mysqli_query($con,$qry2);

		
	?>
<table width="100%" height="20px" border="1">
	<tr>
	<td width="5%" bgcolor="black" >
	
	<h5 style="padding-top: 15px"><center><a href="userdashboard.php"><img src="back.png" height="30px" width="30px"></a></center></h5>

	</td>
	
	<td width="90%" bgcolor="black">
	<h3 style="color: white;padding-top: 10px "><center>Movie Ticket Booking</center></h3>

	</td>
	
	<td width="5%" bgcolor="black"><div class="h5">
	<h4 ><center><a href="userlogout.php">Logout</a></center></h4>
	</div>
	</td>
</tr>
</table>


<?php 
include('dbcon.php');
		
$qry1 = "SELECT * from movies";
		
$result = mysqli_query($con,$qry1);


$row_count=mysqli_num_rows($result);
?>

	  <!-- Swiper -->
<div class="swiper-container">
    <div class="swiper-wrapper">
	<?php	
	for($i=0;$i<$row_count;$i++)
	{
	$row1 = mysqli_fetch_array($result);	
	?>
	
      <div class="swiper-slide"><img src="Image/<?php echo $row1['poster'];?>" height="200px" width="200px"></div>
     <?php
	}
	 ?>

    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
</div>
  
  

  <!-- Swiper JS -->
  <script src="swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
	slidesPerView: 5,
      spaceBetween: 10,
     
      autoplay: {
        delay: 2000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>

<center>
<form  method="post" >

	<table width="700px" style="margin-top: 20px; margin-bottom: 20px"  height="50px">
		<tr>
		
			<td width="50%">

				<select  required  style="width:100%; height:30px " name="mov">
					<option value="" disabled selected>Select Movie</option>	
					<?php
					while($data = mysqli_fetch_array($run))
					{
					if($data['Release_date']<="2018-09-31")
					{						
					?>
					<option value="<?php echo $data['Movie_Name']; ?>"> <?php echo $data['Movie_Name']; ?> </option>
					<?php
					}
					}
					?>
				</select>

			</td>
	
			<td width="50%">
				<select  required  style="width:100%; height:30px " name="loc">
					<option value="" disabled selected>Select Location</option>
					<option value="blank"></option>
					<?php
					
					while($data1 = mysqli_fetch_array($run1))
					{	
					?>
					<option value="<?php echo $data1["Location"]; ?>"> <?php echo $data1["Location"]; ?> </option>
					<?php
					}
					?>
				</select>

			</td>
	
		</tr>
	</table>
	<input type="submit" name="submit" value="Search Theatre" />
	<input type="button" value="Display" onclick="javascript:showDiv();" />
</form>
</center>

<hr>


<div id="lo" class="locat" ><center><h4 style="padding-top:10px;"><center><?php echo "Location : ".$_POST["loc"];?></center></h4></div>

<div id="lo2" class="locat2" ><center><h4 style="padding-top:10px;"><center><?php echo "Movie : ".$_POST["mov"];?></center></h4></div>
<center>

<div id="lo1" class="locat1">
<form  action="ticket.php" method="post" >
<table width="100%"  border="1" height="200px">	
						<?php
					
					while($data2 = mysqli_fetch_array($run2))
					{	
					?>
						<tr>
							<td>
								<input type="radio" name="theatre" value="<?php echo $data2["Theatre_name"];?>"  /> <?php echo $data2["Theatre_name"];?>
							</td>
							<?php
							if(!empty($data2["time1"]))
							{
							?>
							<td>
								<input type="radio" name="time" value="<?php echo $data2["time1"];?>"  /> <?php echo $data2["time1"];?>
							</td>
							<?php
							}
							 if(!empty($data2["time2"]))
							{
							?>

							<td>
								<input type="radio" name="time" value="<?php echo $data2["time2"];?>"  /> <?php echo $data2["time2"];?>
							</td>
							<?php
							}
							if(!empty($data2["time3"]))
							{
							?>
							<td>
								<input type="radio" name="time" value="<?php echo $data2["time3"];?>"  /> <?php echo $data2["time3"];?>
							</td>
							<?php
							}
							if(!empty($data2["time4"]))
							{
							?>
							<td>
								<input type="radio" name="time" value="<?php echo $data2["time4"];?>"  /> <?php echo $data2["time4"];?>
							</td>
							<?php
							}
							if(!empty($data2["time5"]))
							{
							?>
							<td>
								<input type="radio" name="time" value="<?php echo $data2["time5"];?>"  /> <?php echo $data2["time5"];?>
							</td>
							<?php
							}
							?>
						</tr>
					<?php
					}
					?>

</table>

<input type="submit" name="submit" value="Next" style="margin-top: 10px"  />

</center>
</div>
</form>
    <script type="text/javascript">
        function showDiv() {
            div = document.getElementById('lo');
           div.style.display="block";
		   div1 = document.getElementById('lo1');
           div1.style.display="block";
		   div2 = document.getElementById('lo2');
           div2.style.display="block";
        }
    </script>

	
</body>
</html>

<?php
if(!empty($_POST['submit']))
{
switch ($_POST['submit']) {

      case 'Search Theatre':
            echo "";
            break;

      
      case 'Next':
			if( isset($_POST['theatre']) && isset($_POST['time']) )
		{
		
			include ('dbcon.php');
				$thea=$_POST['theatre'];
				$tim=$_POST['time'];
				$_SESSION['theatre_n']=$thea;
				$_SESSION['timer']=$tim;


			$qry3 = "SELECT ticket_rate_Gold, ticket_rate_Silver FROM timing WHERE showtime='$tim' AND Theatre_Name='$thea';";
			$run3 = mysqli_query($con,$qry3);

			$data3=mysqli_fetch_array($run3);

			$_SESSION['Gold']=$data3['ticket_rate_Gold'];
			$_SESSION['Silver']=$data3['ticket_rate_Silver'];
			header('location:ticket.php');
	
		}
		else
		{
			echo "";
		}
		
            break;

}
}

?>