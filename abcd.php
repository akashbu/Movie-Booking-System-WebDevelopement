<html>

<body>
<form method="post" enctype="multipart/form-data">
<input type='file' name='a[]'>
<input type='file' name='a[]'>
<input type='file' name='a[]'>
<input type='submit' name='submit' value='send'>

</form>

<object width="300" height="250" data="http://www.youtube.com/v/VUe3p23AJMo" type="application/x-shockwave-flash"><param name="src" value="http://www.youtube.com/v/VUe3p23AJMo" /></object>
</body>

</html>
<?php
include('dbcon.php');
if(isset($_POST['submit']))
	{
		$file=$_FILES["a"]["name"];
		echo"all";
		if($file[0]!=NULL)
		{
			echo "1";
		}
		if($file[1]!=NULL)
		{
			echo"2";
		}
		if($file[2]!=NULL)
		{
			echo"3";
		}
		
		
	}
	
	?>	
		
		
								<div align="center"> <?php echo "<b>UPLOAD FAILED(jpg,jpeg,png,gif EXTENSIONS ONLY)</b>";?></div><br>
