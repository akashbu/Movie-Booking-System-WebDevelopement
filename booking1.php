<html lang="en">
<head>
<meta charset="utf-8">
<title>User Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="swiper.min.css">

  <!-- Demo styles -->
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
      height: 350px;
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


</style>
</head>
<body>


	<?php
		include('dbcon.php');
		$count=0;
		$loc="null";
		$mov="null";
		if( isset($_POST['loc']) && isset($_POST['mov']) )
		{
			$loc=$_POST['loc'];
			$mov=$_POST['mov'];
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

	  <!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide"><img src="stree.jpg" height="250px" width="350px"></div>
      <div class="swiper-slide"><img src="gold.jpg" height="250px" width="350px"></div>
      <div class="swiper-slide"><img src="tcgn.jpg" height="250px" width="350px"></div>
      <div class="swiper-slide"><img src="mi.jpg" height="250px" width="350px"></div>
      <div class="swiper-slide"><img src="kaala.jpg" height="250px" width="350px"></div>
      <div class="swiper-slide"><img src="man.jpg" height="250px" width="350px"></div>
      <div class="swiper-slide"><img src="stree.jpg" height="250px" width="350px"></div>

    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>

  <!-- Swiper JS -->
  <script src="swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
	slidesPerView: 3,
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

	<table width="700px" style="margin-top: 20px; margin-bottom: 20px" border="1" height="50px">
		<tr>
		
			<td width="50%">

				<select  required  style="width:100%; height:30px " name="mov">
					<option value="" disabled selected>Select Movie</option>	
					<option value="blank"></option>
					<?php
					
					while($data = mysqli_fetch_array($run))
					{	
					?>
					<option value="<?php echo $data["Movie_Name"]; ?>"> <?php echo $data["Movie_Name"]; ?> </option>
					<?php
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
	<input type="submit" name="submit" value="Search Theatre" onclick="javascript:showDiv();"> 
	<!-- <input type="button" value="Next" onclick="javascript:showDiv();" /> -->
</form>
</center>

<hr>


<div id="lo" class="locat" ><center><h4 style="padding-top:10px;"><center><?php echo "Location : ".$_POST["loc"];?></center></h4></div>

<div id="lo2" class="locat2" ><center><h4 style="padding-top:10px;"><center><?php echo "Movie : ".$_POST["mov"];?></center></h4></div>
<center>

<div id="lo1" class="locat1">
<form action="ticket.php" method="post" >
<table width="100%"  border="1" height="200px">	
						<?php
					
					while($data2 = mysqli_fetch_array($run2))
					{	
					?>
						<tr>
							<td>
								<input type="radio" name="theatre" value="<?php echo $data2["Theatre_name"];?>"  /> <?php echo $data2["Theatre_name"];?>
							</td>
							
							<td>
								<input type="radio" name="time" value="<?php echo $data2["time1"];?>"  /> <?php echo $data2["time1"];?>
							</td>
							
							<td>
								<input type="radio" name="time" value="<?php echo $data2["time2"];?>"  /> <?php echo $data2["time2"];?>
							</td>
							
							<td>
								<input type="radio" name="time" value="<?php echo $data2["time3"];?>"  /> <?php echo $data2["time3"];?>
							</td>

							<td>
								<input type="radio" name="time" value="<?php echo $data2["time4"];?>"  /> <?php echo $data2["time4"];?>
							</td>
							
							<td>
								<input type="radio" name="time" value="<?php echo $data2["time5"];?>"  /> <?php echo $data2["time5"];?>
							</td>
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

switch ($_POST['submit']) {

      case 'Search Theatre':
            echo "";
            break;

      
      case 'Next':
			if( isset($_POST['theatre']) && isset($_POST['time']) )
		{
			echo $_POST['theatre']."<br>".$_POST['time'];
			header('location:ticket.php');
		}
		else
		{
			echo "";
		}
		
            break;

}

?>