<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>formDemo</title>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container">
	<form method="POST" action="http://127.0.0.1/medt/ue6/formDemo.php">
		<h1>Formular im Überblick</h1> <br> <br>

		<h3>Texteingabe</h3><br>
		<label>Eingabe: <input type="text" name="eingabe"></label> <br> <br>

		<h3>Radiobuttons</h3><br>
		<label>Alter: <input type="radio" name="alter" value="a1" checked>1-10</label> <br>
		<label>Alter: <input type="radio" name="alter" value="a2">11-20</label> <br>
		<label>Alter: <input type="radio" name="alter" value="a3">21-30</label> <br><br>


		<h3>Checkboxes</h3><br>
		<label><input type="checkbox" name="cb" value="agb" required="required">Ich akzeptiere die AGB's</label> <br> <br>
		<label><input type="checkbox" name="city[]" value="NYC">New York City</label><br>
		<label><input type="checkbox" name="city[]" value="B">Boston</label><br>
		<label><input type="checkbox" name="city[]" value="SF">San Francisco</label><br>
		<label><input type="checkbox" name="city[]" value="DC">Washington DC</label><br><br>

		<h3>Dropdown</h3><br>
		<select name="auto[]" size="0" multiple>
			<option>Audi</option>
			<option>BMW</option>
			<option>Seat</option>
			<option>VW</option>
			<option>Opel</option>
			<option>Seat</option>
		</select>
		<br>
		<select name="auto02[]" size="10">
			<option>Audi02</option>
			<option>BMW02</option>
			<option>Seat02</option>
			<option>VW02</option>
			<option>Opel02</option>
			<option>Seat02</option>
		</select>
		<br>
		<h3>Colorpicker</h3>
		<label>Colors: <input type="color" name="picker"></label>
		<!--<?php echo $_POST['picker']; ?>-->
		<br>
		<!-- kein value führt zu dem Wert on -->

		<br><br>
		<input type="submit" name="btn" value="Daten absenden">
	</form>
	<?php
		if(!isset($_POST['btn']))
			exit(); //Bricht Ausführung des Skripts an DIESER Stelle ab! Alle nachfolgenden Zeilen werden nicht mehr ausgeführt!
		
		echo '<p style="background-color: tomato">Dump von $_POST: ';
		var_dump($_POST);
		echo "</p>";

		if(isset($_POST['cb'])=='agb')
			echo "Den AGB's wird zugestimmt";
			
		if(isset($_POST['city'])){
			echo '<p>Dump von $_POST[\'city\']: ';
			var_dump($_POST['city']);
			echo "</p>";

			echo "<p>{$_POST['city'][0]}</p>";
		}
	?>
</div>
</body>
</html>