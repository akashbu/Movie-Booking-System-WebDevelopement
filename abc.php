<<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Swiper demo</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

<link rel="stylesheet" href="../dist/css/swiper.min.css">

<style>
    html, body {
      position: relative;
      height: 100%;
    }
    body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color:#000;
      margin: 0;
      padding: 0;
    }
    .swiper-container {
      width: 100%;
      height: 100%;

    }
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

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

<div class="swiper-container">
<div class="swiper-wrapper">
<div class="swiper-slide">Slide 1</div>
<div class="swiper-slide">Slide 2</div>
<div class="swiper-slide">Slide 3</div>
<div class="swiper-slide">Slide 4</div>
<div class="swiper-slide">Slide 5</div>
<div class="swiper-slide">Slide 6</div>
<div class="swiper-slide">Slide 7</div>
<div class="swiper-slide">Slide 8</div>
<div class="swiper-slide">Slide 9</div>
<div class="swiper-slide">Slide 10</div>
</div>

<div class="swiper-pagination"></div>

<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
</div>

<script src="../dist/js/swiper.min.js"></script>

<script>
    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
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
</body>
</html>
!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Swiper demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="../dist/css/swiper.min.css">

  <!-- Demo styles -->
  <style>
    html, body {
      position: relative;
      height: 100%;
    }
    body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color:#000;
      margin: 0;
      padding: 0;
    }
    .swiper-container {
      width: 100%;
      height: 100%;
    }
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
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
	
	.swiper-slide .imgBx {
	width: 100%;
	height: 300px;
	overflow: hidden;
}

.swiper-slide .imgBx img{
	width: 100%;
}

.swiper-slide .details{
	box-sizing: border-box;
	padding: 20px;
}

.swiper-slide .details h3{
	margin: 0;
	font-size: 20px;
	padding: 0;
	text-align: center;
	line-height: 20px;
}

.swiper-slide .details h3 span{
	font-size: 16px;
	color: red;
}



  </style>
</head>
<body>
  <!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper">
    <div class="swiper-slide">
		<div class="imgBx">
			<img src="stree.jpg" width="300px" height="300px">
		</div>
		<div class="details">
			<h3>Stree<br><span>Bollywood</span></h3>
		</div>
	</div>
	
	    <div class="swiper-slide">
		<div class="imgBx">
			<img src="gold.jpg" width="300px" height="300px">
		</div>
		<div class="details">
			<h3>Gold<br><span>Bollywood</span></h3>
		</div>
	</div>
	
	    <div class="swiper-slide">
		<div class="imgBx">
			<img src="kaala.jpg" width="300px" height="300px">
		</div>
		<div class="details">
			<h3>Kaala<br><span>Tollywood</span></h3>
		</div>
	</div>
	
	    <div class="swiper-slide">
		<div class="imgBx">
			<img src="mi.jpg" width="300px" height="300px">
		</div>
		<div class="details">
			<h3>Mission Impossible:6<br><span>Hollywood</span></h3>
		</div>
	</div>
	
	    <div class="swiper-slide">
		<div class="imgBx">
			<img src="man.jpg" width="300px" height="300px">
		</div>
		<div class="details">
			<h3>Manmarziyan<br><span>Bollywood</span></h3>
		</div>
	</div>
	
	    <div class="swiper-slide">
		<div class="imgBx">
			<img src="tcgn.jpg" width="300px" height="300px">
		</div>
		<div class="details">
			<h3>TCGN<br><span>Marathi</span></h3>
		</div>
	</div>
	
	    <div class="swiper-slide">
		<div class="imgBx">
			<img src="batti.jpg" width="300px" height="300px">
		</div>
		<div class="details">
			<h3>Batti Gul Meter Chalu<br><span>Bollywood</span></h3>
		</div>
	</div>
	
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>

  <!-- Swiper JS -->
  <script src="../dist/js/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
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
</body>
</html>