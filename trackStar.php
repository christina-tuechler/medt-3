<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>trackStar</title>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<link href="https://fonts.googleapis.com/css?family=Amaranth|Coming+Soon|Julius+Sans+One|Marck+Script|Patrick+Hand|Raleway|Roboto|Rock+Salt" rel="stylesheet">
  	<script src="https://code.jquery.com/jquery-latest.js"></script>
  	<style>
  		/*
  			to do: Abbrechen-Button

  			gelernt: header("Location: path/index.php"); -->so wie wenn ich index.php eingebe
  		*/

  		.edit-icon{
  			color: green;
  		}

  		.box{
  			font-size: 1.2em;
  			height:50px;
  		}

  		body{
  			background-color: #5bc0de;
  		}
  		.container{
  			background-color: white;
  		}
  		h1{
  			font-family: 'Julius Sans One', sans-serif;
  		}

  		td{
  			font-family: 'Roboto', sans-serif;
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
	?>	

	<?php
		try {
			//rowCount ist alles gelöscht?
			//Verbindug herstellen, Objekt der Klasse anlegen
			$db=new PDO ("mysql:host=$host;dbname=$dbname", $user, $pwd);
			//echo "<p class=\"text-success\">Datenbankverbindung erstellt!</p>";

		} 
		catch (PDOException $e) {
			exit("<p class=\"text-danger\">Datenbank nicht verfügbar: ".$e->getMessage()."</p>"); // normal gibt man die Message nicht aus, verrät zu viel!
		}

	?>

	<?php
		if(isset($_POST['projectToDelete']))
    	{
	        $deleteID = $_POST['projectToDelete'];
	        $delete=$db->prepare("DELETE FROM project WHERE id=:deleteID");
			$delete->bindParam(':deleteID', $deleteID, PDO::PARAM_INT);
			$delete->execute();

	        $count = $delete -> rowCount();
	    }
	    else
	    {
	    	$res=$db->query("SELECT name, description, createDate, id FROM project");
			$tmp=$res->fetchAll();
	    }
	?>

	<h1><span class=\"glyphicon glyphicon-home\"></span> Projektübersicht</h1>
	
	<p id="msgBox"></p>

		<table class="table table-hover">
			<thead>
				<tr>
					<th class="info">name</th>
					<th class="info">descripton</th>
					<th class="info">createDate</th>
					<th class="info">operations</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($tmp as $item) { ?> <!--$res->fetchAll(PDO::FETCH_OBJ); das ist ein static zugriff auf die klassenkonstante der klasse pdo oder ich kann auch $db->query($sql) schreiben statt $tmp-->
					<tr id="<?php echo $item['id']?>">
						<td><?php echo htmlspecialchars($item['name']) ?></td>
						<td><?php echo $item['description'] ?></td>
						<td><?php echo $item['createDate'] ?></td>
						<td> 
							
								<span style="margin-right: 20px; color: red;" class="glyphicon glyphicon-trash delete-icon" aria-hidden="true"></span>
							
							
								<span style="color: green;"class="glyphicon glyphicon-pencil edit-icon" aria-hidden="true"></span>
							
						</td> <!--mit html5 eigene Attribute möglich "data-xyz" Bsp.: data-name-->
					</tr>
				<?php
				} ?>
				
			</tbody>
			</table>






	<!-- Anfang Löschen mit Conformation  (synchroner vs asynchroner request) -->
		<script>
		$(document).ready(function() {
			//leere NachrichtenBox bereitstellen, wird Kontextabhängig befüllt und gestaltet
			$("#msgBox").hide();


			$('.delete-icon').click(function(){	
				var yn=confirm("Wollen Sie das Projekt wirklich löschen?");
				if(yn==true)
				{
					//ohne jquery: this.parent().parent().id würde nicht funktionieren
					var currentProID=$(this).closest("tr").attr('id'); //statt closest(tr) : parent().parent()
					console.log("Yes, ID des zu löschenden Projektes " + currentProID); //Span - Element auf das geklickt wurde JQuery-Variante
					
					

					//AJAX- call konfgurieren
					var myAjaxConfigObject={
						url: "http://localhost/medt/ue10/trackStar.php", //http://127.0.0.1/medt/ue10/trackStar.php
						//Default: The current page
						type: "post", //post=POST type!=Type
						data: "projectToDelete= " +currentProID, //Parameter als string
						//data: {projectToDelete:currentProID,...,..} //Parameter als Objekt
						success: function(dataFromServer, textStatus, jqXHR){
							console.log("Server response: "+ textStatus);

							

							if(dataFromServer)
							{
								//Löschen erfolgreich:
								//Zeile mit der id aus der html-tabelle entfernen ($(..).remove())
								//und Meldung mit der msgBox (css- nicht vergessen)

								
								if($('#'+currentProID).length){
          							$('#'+currentProID).remove();
									$("#msgBox").text("Löschen erfolgreich!").addClass("bg-success").show(200).delay(2000).hide(200);
								}
							}
								

							else
							{
								//Löschen nicht erfolgreich:
								//msgBox mit Fehlermeldung
								$("#msgBox").text("Löschen fehlgeschlagen!").addClass("bg-error").show(200).delay(2000).hide(200);
							}
								

						},
						//ist das Ziel, wenn die http-response nicht vom statuscode 200 ist
						error: function(jqXHR, msg){
							console.log("Server response: "+msg);
							$("#msgBox").text("Server nicht verfügbar!").addClass("bg-danger").show(200).delay(2000).hide(200);
						},
					};


					//AJAX-code absetzen
					$.ajax(myAjaxConfigObject);
				}
					
				else	

				{
					console.log("Oh no"+ this.id); //JS variante
					$("#msgBox").text("Das Projekt wurde nicht gelöscht!").addClass("bg-success").show(200).delay(2000).hide(200);
				}
			});
		});
		</script>



		</div>
	</body>
</html>