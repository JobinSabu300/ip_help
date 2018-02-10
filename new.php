<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

	<script type="text/javascript">
	function showSelected(val){
		document.getElementById
('selectedResult').innerHTML = "The selected number is - " 
+ val
 top.location.href='new.php?data=' + val;
 


	}
</script>


</head>
<body>
	<div id='selectedResult'></div>

<select name='test' onChange='showSelected(this.value)'>
	<?php
	if(isset($_GET['data'])){$v=$_GET['data'];echo"
	<option value='1'>$v </option>
	<option value='2'>two</option>
	<option value='bca'>BCA</option>
               <option value='mca'>MCA</option>";}
	else{echo"
		<option value='1'>one</option>
	<option value='2'>two</option>
<option value='bca'>BCA</option>
               <option value='mca'>MCA</option>	";}?>
</select>
<?php 
if(isset($_GET['data']))
{$id=$_GET['data']; echo $id;}
?>
</body>
</html>
