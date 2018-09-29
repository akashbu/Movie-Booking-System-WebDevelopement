<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Swiper demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="swiper.min.css">

  <!-- Demo styles -->
  <style>
    html, body {
      position: relative;
      height: 100%;
    }

    .swiper-container {
      width: 100%;
      height: auto;
      background: #CFD8DC;
      margin-top: 20px;
    }
    .swiper-slide {
      font-size: 18px;
      color:black;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      padding: 40px 60px;
    }
    .parallax-bg {
      position: absolute;
      left: 0;
      top: 0;
      width: 130%;
      height: 100%;
      -webkit-background-size: cover;
      background-size: cover;
      background-position: center;
    }
    .swiper-slide .title {
      font-size: 41px;
      font-weight: 300;
    }
    .swiper-slide .subtitle {
      font-size: 21px;
	  padding-bottom:10px
    }
    .swiper-slide .text {
      font-size: 14px;
      max-width: 400px;
      line-height: 1.3;
    }

    .h5 a{
	text-decoration: none;
	color: white;
}

  </style>
</head>
<body>


<table width="100%" height="20px">
	<tr>
	<td width="5%" bgcolor="black" >
	
	<h5 style="padding-top: 15px"><center><a href="userdashboard.php"><img src="back.png" height="30px" width="30px"></a></center></h5>

	</td>
	
	<td width="90%" bgcolor="black">
	<h2 style="color: white;padding-top: 10px "><center>UPCOMING MOVIES</center></h2>

	</td>
	
	<td width="5%" bgcolor="black"><div class="h5">
	<h4 ><center><a href="userlogout.php">Logout</a></center></h4>
	</div>
	</td>
</tr>
</table>


  <!-- Swiper -->
  <div class="swiper-container">
 
    <div class="parallax-bg"  data-swiper-parallax="-23%"></div>
    <div class="swiper-wrapper">
    	<?php
		include('dbcon.php');
		
		$qry = "SELECT * from movies";
		
		$run = mysqli_query($con,$qry);
		
		if(mysqli_num_rows($run)>0)
		{
			while($row = mysqli_fetch_array($run))
			{
				if($row['Release_date']>='2018-09-01')
				{
				?>

	
      <div class="swiper-slide">
	  
	  <table width="auto" height="1200px" >
	  <tr>
	  
		<td style="position:absolute;top:20px;left:40px">
		<center><h2><?php echo $row['Movie_Name']; ?></h2></center>
		
		
        <div class="title" data-swiper-parallax="-300">
		<center>
		<img height="400px" width="340px"  src="Image/<?php echo $row['poster']?>"> 
		</center>
		</div>
		
        <div class="text" data-swiper-parallax="-300">
        	<center>
			<p>RunTime : <?php echo $row['RunTime']; ?> </p>
			<p>ReleaseDate : <?php echo $row['Release_date']; ?></p>
			<p>Type : <?php echo $row['type']; ?></p>
		</center>
        </div>
		
		<td style="position:absolute;top:20px;right:40px">
				<center><h2>TRAILER</h2></center>
		
		<object width="900px" height="400px"  data="http://www.youtube.com/v/<?php echo $row['trailer']; ?>" type="application/x-shockwave-flash">
				<param name="src" value="http://www.youtube.com/v/<?php echo $row['trailer']; ?>" /></object>
				
			
		
		</td>
		
		
		</tr>
		
		<tr>
		<h2 style="position:absolute;top:620px;left:80px;">CAST</h2>
		<td style="position:absolute;top:670px;left:80px">
				<p>ACTOR</p>
				<center>
					
					<img src="Image/<?php echo $row['ActorImg']?>" height="220px"width="150px" style="border-radius: 10px"/> 
					<h5> <?php echo $row['Actor']; ?></h5>
				</center>
		</td>
		
		
		<td style="position:absolute;top:670px;left:380px">
				<center>
					<p>ACTRESS</p>
					<img src="Image/<?php echo $row['ActressImg']?>" height="220px"width="150px" style="border-radius: 10px"/>
					<h5> <?php echo $row['Actress']; ?></h5>
				</center>
		</td>
		
		<td style="position:absolute;top:670px;left:680px">
				<center>
					<p>DIRECTOR</p>
					<img src="Image/<?php echo $row['DirectorImg']?>"height="220px"width="150px" style="border-radius: 10px"/> 
					<h5><?php echo $row['Director']; ?></h5>
				</center>
		</td>
		
		
		</tr>
		
		
		<tr>
		<h2 style="position:absolute;top:1020px;left:80px">SYNOPSIS</h2>
		<td style="position:absolute;top:1080px;left:80px">
		
				
					<p><?php echo $row['Description']?>
				<a style="text-decoration:none;" href="<?php echo $row['wiki']; ?>">More Details</a></p>
				
		</td>
		
		
		
		
		
		</tr>

		
	  </table>
      </div>
      <?php
  		}
	  }
	}

	?>

     
	  
   </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination swiper-pagination-white"></div>
    <!-- Add Navigation -->
    <div class="swiper-button-prev swiper-button-white" style=" background-color:black;padding:4px"></div>
    <div class="swiper-button-next swiper-button-white" style=" background-color: black;padding:4px"></div>
  </div>

  <!-- Swiper JS -->
  <script src="swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      speed: 600,
      parallax: true,
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
</body>
</html>
