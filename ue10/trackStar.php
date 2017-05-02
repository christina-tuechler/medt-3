<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>trackStar</title>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<script src="http://code.jquery.com/jquery-latest.js"></script>
  	<style>
  		/*
  			to do: Abbrechen-Button

  			gelernt: header("Location: path/index.php"); -->so wie wenn ich index.php eingebe
  		*/

  		.edit-icon{
  			color: green;
  		}
  	</style>
</head>
<body>

	<div class="container"> 
	<?php
	//DB Settings
		$host='localhost';
		$dbname='medt3';
		$user='htluser';
		$pwd='htluser';
		
		//echo var_dump($db);
		//in mysql data mitloggen

		echo "<h1> <span class=\"glyphicon glyphicon-home\"></span> Projektübersicht</h1>";
	?>

		

	<?php
		try {
			//rowCount ist alles gelöscht?
			//Verbindug herstellen, Objekt der Klasse anlegen
			$db=new PDO ("mysql:host=$host;dbname=$dbname", $user, $pwd);
			echo "<p class=\"text-success\">Datenbankverbindung erstellt!</p>";

		} 
		catch (PDOException $e) {
			exit("<p class=\"text-danger\">Datenbank nicht verfügbar: ".$e->getMessage()."</p>"); // normal gibt man die Message nicht aus, verrät zu viel!
		}

		//Hier würde der Trigger für das Löschen eines Projektes ohne Anwendung von Java Script stehen

		//neues Projekt erstellen
		

	?>

	<!-- Anfang Löschen mit Conformation -->
		<script>
		$(document).ready(function() {
			console.log('eins');
			$('.delete-icon').click(function(){	
				if(confirm("Wollen Sie das Projekt wirklich löschen?"))
				{
					console.log("Yes" + $(this).attr('id')); //Span - Element auf das geklickt wurde JQuery-Variante
					var myAjaxConfigObject={
						url: "http://127.0.0.1/medt/ue10/trackStar.php", 
						//Default: The current page
						type: "post", //post=POST type!=Type
						data: "projectToDelete" + $(this).attr('id'),
						success: function(dataFromServer, textStatus, jqXHR){
							console.log("Server response: "+dataFromServer)
						},
					};
					$.ajax(myAjaxConfigObject);
				}
					
				else
					console.log("Oh no"+ this.id); //JS variante
			});
		});
		</script>
	<!-- Ende Löschen -->
	
		  

	<?php
		$res=$db->query("SELECT name, description, createDate, id FROM project");
		$tmp=$res->fetchAll();
		//print_r($tmp);
	?>
		<table class="table table-hover">
	<?php
			echo "<thead>";
				echo "<tr>";
					echo "<th class=\"info\">name</th>";
					echo "<th class=\"info\">descripton</th>";
					echo "<th class=\"info\">createDate</th>";
					echo "<th class=\"info\">operations</th>";
				echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
				foreach ($tmp as $item) { //$res->fetchAll(PDO::FETCH_OBJ); das ist ein static zugriff auf die klassenkonstante der klasse pdo oder ich kann auch $db->query($sql) schreiben statt $tmp
					echo "<tr>";
					echo "<td>".htmlspecialchars($item['name'])."</td>";
					echo "<td>$item[description]</td>";
					echo "<td>$item[createDate]</td>";
					echo "<td>
							
								<span id=\"$item[id]\" style=\"margin-right: 20px; color: red;\" class=\"glyphicon glyphicon-trash delete-icon\" aria-hidden=\"true\"></span>
							
							
								<span id=\"$item[id]\" style=\"color: green;\"class=\"glyphicon glyphicon-pencil edit-icon\" aria-hidden=\"true\"></span>
							
						</td>";
					echo "</tr>";

				}
				
			echo "</tbody>";
			echo "</table>"; 
		?>


		</div>
	</body>
</html>

PHP
if(isset($_post(projectToDelete9#
echo hallo))