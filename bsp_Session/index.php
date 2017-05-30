<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>LoginScreen</title>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<link href="https://fonts.googleapis.com/css?family=Amaranth|Coming+Soon|Julius+Sans+One|Marck+Script|Patrick+Hand|Raleway|Roboto|Rock+Salt" rel="stylesheet">
  	<script src="https://code.jquery.com/jquery-latest.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- Das neueste kompilierte und minimierte CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optionales Theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Das neueste kompilierte und minimierte JavaScript -->

  	<style>
  	h1{
  		font-family: 'Patrick Hand';
  	}
  	</style>
 </head>
 <body>
 	<div class="container">
 		<div class="row">
 			<h1 class="col-xs-offset-2">Herzlich Willkommen!</h1>
 		</div>

 		<div class="row">
 			<form class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="login">
 				<div class="form-group">
 					<label class="col-xs-offset-2">Benutzername: <input class="form-control"type="text" name="username" required></label><br>
 				</div>
 				<div class="form-group">
 					<label class="col-xs-offset-2">Passwort: <input class="form-control"  type="password" name="password" required></label><br>
 				</div>
 				<div class="form-group">
 					<input class="col-xs-offset-2 btn" value="Login" type="submit" name="confirm"><br>
 				</div>
 			</form>
 		</div>

 		<?php
 			if(isset($_POST['confirm']))
 			{
 				require "main.php";
 			}
 		?>
 	</div>
 </body>
 </html>