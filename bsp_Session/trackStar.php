<?php
session_start();
	//DB Settings
	require ("db/db.php");
	require ("api/manipulate.php");

?>

<?php
	    $res=$db->query("SELECT name, description, createDate, id FROM project");
		$tmp=$res->fetchAll();
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>trackStar</title>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<link href="https://fonts.googleapis.com/css?family=Amaranth|Coming+Soon|Julius+Sans+One|Marck+Script|Patrick+Hand|Raleway|Roboto|Rock+Salt" rel="stylesheet">
  	<script src="https://code.jquery.com/jquery-latest.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  	<style>
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

			<?php
 			if(isset($_POST['logoutBtn']))
 			{
 				$_SESSION['isLoggedIn']=false;
 				header('Location: index.php');	
 				
 			}
 			if($_SESSION['isLoggedIn']!==true)
 			{
 				header('Location: index.php?login');	
 			}
 			//echo "{$_SESSION['isLoggedIn']}";
			?>

	

	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        			<h4 class="modal-title">Löschen</h4>
      			</div>
      			<div class="modal-body">
        			<p>Wollen Sie das Projekt wirklich löschen?</p>
      			</div>
      			<div class="modal-footer">
        			<button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
        			<button type="button" onclick="DeleteTheProject()" class="btn btn-primary">Löschen</button>
      			</div>
    		</div><!-- /.modal-content -->
  		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

            <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Änderungen vornehmen</h4>
                        </div>
                        <div class="modal-body">

                            <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                                <div class="row form-group">
                                    <label for="editProjectName" class="col-sm-2 control-label">Name</label>
                                    <input id ="editProjectName" name="editProjectName" class="col-sm-5 control-label" type="text" value="">
                                </div>
                                <div class="row form-group">
                                    <label for="editProjectDesc" class="col-sm-2 control-label">Description</label>
                                    <input id="editProjectDesc" name="editProjectDesc" class="col-sm-5 control-label" type="text" value="">
                                </div>
                                <div class="row form-group">
                                    <label for="editProjectDate" class="col-sm-2 control-label">Date</label>
                                    <input id="editProjectDate" name="editProjectDate" class="col-sm-5 control-label" type="datetime" value="">
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" name="aktualisieren" onclick="EditTheProject()" class="btn btn-primary">Confirm</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->



	<div class="container"> 	

	<h1><span class="glyphicon glyphicon-home home"></span> Projektübersicht</h1>
	
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
						<td class="nameOfProject"><?php echo htmlspecialchars($item['name']) ?></td>
						<td class="descOfProject"><?php echo $item['description'] ?></td>
						<td class="dateOfProject"><?php echo $item['createDate'] ?></td>
						<td> 
							
								<span style="margin-right: 20px; color: red;" class="glyphicon glyphicon-trash delete-icon" aria-hidden="true"></span>
							
							
								<span style="color: green;"class="glyphicon glyphicon-pencil edit-icon" aria-hidden="true"></span>
							
						</td> <!--mit html5 eigene Attribute möglich "data-xyz" Bsp.: data-name-->
					</tr>
				<?php
				} ?>
				
			</tbody>
			</table>
			<form class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="logout">
 				<div class="form-group">
 					<input class="btn" type="submit" name="logoutBtn" value="Logout"><br>
 				</div>
 			</form>



	<!-- Anfang Löschen mit Conformation  (synchroner vs asynchroner request) -->

	<script>
		var currentProID;
		var currentRow;

		$(document).ready(function() {
			//leere NachrichtenBox bereitstellen, wird Kontextabhängig befüllt und gestaltet
			$("#msgBox").hide();

			$('.delete-icon').click(function(){	
				$('#deleteModal').modal('show');
					currentProID=$(this).closest("tr").attr('id'); //statt closest(tr) : parent().parent()
					console.log("Yes, ID des zu löschenden Projektes " + currentProID); //Span - Element auf das geklickt wurde JQuery-Variante
			});

			$('.edit-icon').click(function(){	
				
					currentProID=$(this).closest("tr").attr('id'); //statt closest(tr) : parent().parent()
				    currentRow=$(this).closest("tr");
                //window.location.href = "http://localhost/medt/bsp_Session/trackStar.php?currentProID=" + currentProID;
					console.log("Yes, ID des zu ändernden Projektes " + currentProID); 
					//$("#editModal").html('');
                    GetTheProject();

					$('#editModal').modal('show');//Span - Element auf das geklickt wurde JQuery-Variante
			});
			
		});

		function DeleteTheProject(){						
					//AJAX- call konfgurieren
					var myAjaxConfigObject={
						url: "http://localhost/medt/bsp_Session/trackStar.php", //http://127.0.0.1/medt/ue10/trackStar.php
						//Default: The current page
						type: "post", //post=POST type!=Type
						dataType: "json",
						data: "projectToDelete= " +currentProID, //Parameter als string
						//data: {projectToDelete:currentProID,...,..} //Parameter als Objekt
						success: function(dataFromServer, textStatus, jqXHR){
							console.log("Server response: "+ dataFromServer.delete);
							
							if(dataFromServer.delete ==1)//==1
							{
								//Löschen erfolgreich:
								//Zeile mit der id aus der html-tabelle entfernen ($(..).remove())
								//und Meldung mit der msgBox (css- nicht vergessen)
								
								//if($('#'+currentProID).length){
          							$('#'+currentProID).remove();
									$("#msgBox").text("Löschen erfolgreich!").addClass("bg-success").show(200).delay(2000).hide(200);
								//}
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
					$('#deleteModal').modal('hide');
					//console.log("Oh no"+ this.id); //JS variante
					//$("#msgBox").text("Das Projekt wurde nicht gelöscht!").addClass("bg-success").show(200).delay(2000).hide(200);
		}

		function GetTheProject(){						
					//AJAX- call konfgurieren
					var myAjaxConfigObject={
						url: "http://localhost/medt/bsp_Session/trackStar.php", //http://127.0.0.1/medt/ue10/trackStar.php
						//Default: The current page
						type: "post", //post=POST type!=Type
						dataType: "json",
						data: "projectToEdit= " +currentProID, //Parameter als string
						//data: {projectToDelete:currentProID,...,..} //Parameter als Objekt
						success: function(dataFromServer, textStatus, jqXHR){
							console.log("Server response: "+ dataFromServer.name);
							
							if(dataFromServer.name !==0)//==1
							{
                                //console.log(dataFromServer);
                                $("#editProjectName").val(dataFromServer['name']);
                                $("#editProjectDesc").val(dataFromServer['desc']);
                                $("#editProjectDate").val(dataFromServer['date']);
							}
								
							else
							{
								//Löschen nicht erfolgreich:
								//msgBox mit Fehlermeldung
								//$("#msgBox").text("Löschen fehlgeschlagen!").addClass("bg-error").show(200).delay(2000).hide(200);
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
					$('#editModal').modal('hide');
					//console.log("Oh no"+ this.id); //JS variante
					//$("#msgBox").text("Das Projekt wurde nicht gelöscht!").addClass("bg-success").show(200).delay(2000).hide(200);
		}


		function EditTheProject(){	
		//Datenbank!!!					
					//AJAX- call konfgurieren
					var myAjaxConfigObject={
						url: "http://localhost/medt/bsp_Session/trackStar.php", //http://127.0.0.1/medt/ue10/trackStar.php
						//Default: The current page
						type: "post", //post=POST type!=Type
						dataType: "json",
						data: {"projectToUpdate" : currentProID, "editProjectName" : $("#editProjectName").val(), "editProjectDesc" : $("#editProjectDesc").val(), "editProjectDate" : $("#editProjectDate").val()}, //Parameter als string
						//data: {projectToDelete:currentProID,...,..} //Parameter als Objekt
						success: function(dataFromServer, textStatus, jqXHR){
							console.log("Server response: "+ dataFromServer.change);
							
							if(dataFromServer.change ==1)//==1
							{
								//Löschen erfolgreich:
								//Zeile mit der id aus der html-tabelle entfernen ($(..).remove())
								//und Meldung mit der msgBox (css- nicht vergessen)
								
								//if($('#'+currentProID).length){
          							//$('#'+currentProID).remove();

                                currentRow.children('.nameOfProject').html($("#editProjectName").val());
                                currentRow.children('.descOfProject').html($("#editProjectDesc").val());
                                currentRow.children('.dateOfProject').html($("#editProjectDate").val());

                                $("#msgBox").text("Bearbeiten erfolgreich!").addClass("bg-success").show(200).delay(2000).hide(200);
								//}
							}
								
							else
							{
								//Löschen nicht erfolgreich:
								//msgBox mit Fehlermeldung
								$("#msgBox").text("Bearbeiten fehlgeschlagen!").addClass("bg-error").show(200).delay(2000).hide(200);
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
					$('#editModal').modal('hide');

					
					//console.log("Oh no"+ this.id); //JS variante
					//$("#msgBox").text("Das Projekt wurde nicht gelöscht!").addClass("bg-success").show(200).delay(2000).hide(200);
		}
		</script>

		
		</div>
	</body>
</html>
