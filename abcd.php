<!DOCTYPE html>
<html>
<body>
<div class='check'>
<input type="checkbox" class="seats" name="a1" checked disabled value="A1">
<input type="checkbox" class="seats" name="a2"  value="A2">

<input type="checkbox" class="seats" name="a"  value="A3">
</div>
<input type='submit' onclick='js()'>
    <script src="js/jquery-2.2.3.min.js"></script>

<script>


function js(){
if (($('input:checkbox:checked').length-<?php echo "1" ?>) == 2) 



alert("fhjkh");
}

</script>
</body>
</html>