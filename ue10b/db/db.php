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