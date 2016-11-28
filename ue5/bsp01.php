<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Bsp01</title>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<style>
  		li:nth-of-type(odd) {
  			background-color: #D8D8D8;
  		}
  		li:nth-of-type(even) {
  			background-color: #FAFAFA;
  		}
  		ul {
  			list-style-type: square;
  		}
  	</style>
</head>
<body>
	<div class="container">
		<h1>Beispiel 1</h1>
  		<form action="http://127.0.0.1/medt/ue5/bsp01.php" method="POST">
    		Ihre Eingabe: 
    		<input type="text" name="eingabe" value="Das ist ein Demo-Satz"> <br> <br>
    		<input type="submit" name="explodeBtn" value="Explode">
    		<input type="reset" name="resetBtn" value="Reset">
  		</form>

  		<?php
  			if(isset($_POST['explodeBtn']))
  			{
  				$words=explode(" ", $_POST['eingabe']);
  				echo "<h3>Ihre Eingabe als Liste</h3>";
  				echo "<ul>";
  				foreach($words as $item)
  					echo "<li>$item</li>";
  			}
  		?>
	</div>
</body>
</html>