<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>trackStar</title>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<style>
  		
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

		echo "<h1>Projektübersicht</h1>";

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
			$tmp=false;

			if(isset($_GET['deleteProject']))
       		{
	        	$deleteID=$_GET['deleteProject'];
	        	$delete=$db->query("DELETE FROM project WHERE id=$deleteID");

			 
				$countDeleted=$delete->rowCount();
				echo "Gelöschte Zeilen: $countDeleted";

	       	if($countDeleted == 1)
	       		echo '<p class="bg-access">Das Projekt wurde erfolgreich gelöscht!</p>';
	     
	       	else
	       		echo '<p class="bg-danger">Das Projekt konnte nicht gelöscht werden.</p>';

	       		
	       }


	       	//Edit button
	        if(isset($_GET['editProject']) || isset($_POST['editProject']))
	        { 
	        	$editID=$_GET['editProject'];
	        	$change=$db->query("SELECT name, description, createDate FROM project WHERE id=$editID");
				$toChange=$change->fetch(PDO::FETCH_ASSOC);
	        	if(!isset($_POST['editProjectAktualisieren']))
	        	{ ?>
	        		<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
	        		<h1><?php echo $toChange['name'] ?> bearbeiten</h1>
	        		<div class="form-group">
	        			<label for="editProjectName" class="col-sm-2 control-label">Name</label>
	        			<input name="editProjectName" class="col-sm-10 control-label" type="text" value="<?php echo $toChange['name'] ?>">
	        		</div>
	        		<div class="form-group">
	        			<label for="editProjectDesc" class="col-sm-2 control-label">Description</label>
	        			<input name="editProjectDesc" class="col-sm-10 control-label" type="text" value="<?php echo $toChange['description'] ?>">
	        		</div>
	        		<div class="form-group">
	        			<label for="editProjectDate" class="col-sm-2 control-label">Date</label>
	        			<input name="editProjectDate" class="col-sm-10 control-label" type="date" value="<?php echo $toChange['createDate'] ?>">
	        		</div>
	        		<div class="form-group">
	        			<input name="editProjectAktualisieren" class="col-sm-6 control-label" type="submit" value="Aktualisieren">
	        			<input name="editProjectAbbrechen" class="col-sm-6 control-label" type="reset" value="Abbrechen">
	        		</div>
	        		</form>

	        	<?php } 

	        else
	        {
	        	$update=$db->query("UPDATE project SET name=\"".$_POST['editProjectName']."\", description=\"".$_POST['editProjectDesc']."\", createDate=\"".$_POST['editProjectDate']."\" WHERE id=\"".$editID."\"");
				//$toUpdate=$update->execute();
				$count=$update->rowCount();
				echo "Bearbeitete Zeilen: $count";

				if($count==1)
					echo "<br>Das Bearbeiten war erfolgreich!";

				//print("Return number of rows that were deleted:\n");
				//$count = $del->rowCount();
				//print("Deleted $count rows.\n");
	        }
	    }
	        ?>
	        	
	        	
	       	

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
					echo "<td>$item[name]</td>";
					echo "<td>$item[description]</td>";
					echo "<td>$item[createDate]</td>";
					echo "<td>
							<a href=\"trackStar.php?deleteProject=$item[id]\">
								<span style=\"margin-right: 20px; color: red;\" class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span>
							</a>
							<a href=\"trackStar.php?editProject=$item[id]\">
								<span style=\"color: green;\"class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span>
							</a>
						</td>";
					echo "</tr>";

				}
				
			echo "</tbody>";
			echo "</table>"; ?>

			
			<?php
			//Trigger für das Löschen eines Projektes mit Java-Script
			//if(isset($_GET['deleteProject']))
       		//{
	        //	$deleteID=$_GET['deleteProject'];
	        //	$db->query("DELETE FROM project WHERE id=$deleteID");
	        //	$tmp=true;
			//

	        	//<script type="text/javascript">
	        		//window.location="trackStar.php";
	        	//</script>-->
	       	//<?php } 
	       	?>

		</div>
	</body>
</html>