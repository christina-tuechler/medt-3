<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Pagination</title>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<style>

  	</style>
</head>
<body>

	<div class="container"> 
	<?php
	//DB Settings
		$host='localhost';
		$dbname='classicmodels';
		$user='root';
		$pwd='';
		
		//echo var_dump($db);
		//in mysql data mitloggen
		echo "<div class=\"page-header\">";
			echo "<h1> <span class=\"glyphicon glyphicon-user\"></span> Kontaktübersicht <small> pagination</small></h1>";
			echo "</div>";
		?>

		

	<?php
		try {
			//Verbindug herstellen, Objekt der Klasse anlegen
			$db=new PDO ("mysql:host=$host;dbname=$dbname", $user, $pwd);
			//echo "<p class=\"text-success\">Datenbankverbindung erstellt!</p>";

		} 
		catch (PDOException $e) {
			exit("<p class=\"text-danger\">Datenbank nicht verfügbar: ".$e->getMessage()."</p>"); // normal gibt man die Message nicht aus, verrät zu viel!
		}
		?>
		  
		  


				<?php
		  		if(isset($_GET['side']) && $_GET['side']>0)
		  		{
		  			$currentSide=$_GET['side'];

	       			$sql="SELECT count(customerName) FROM customers";
	       			$mySidesR=$db->query($sql);
					$mySides = $mySidesR->fetch();
					
					$pages=ceil($mySides[0]/20);
					echo "$pages";
					//var_dump($mySides);

					$firstSide=($currentSide-1)*20;
					$const=20;

					$res=$db->query("SELECT * FROM customers LIMIT $firstSide, $const");
					$tmp=$res->fetchAll();

					}
					else
					{
						$currentSide=1;
						$res=$db->query("SELECT * FROM customers LIMIT 20");
						$tmp=$res->fetchAll();
					}

					echo "<table class=\"table table-hover\">";

			echo "<thead>";
				echo "<tr>";
					echo "<th class=\"info\">Firma</th>";
					echo "<th class=\"info\">Nachname</th>";
					echo "<th class=\"info\">Vorname</th>";
					echo "<th class=\"info\">PLZ</th>";
					echo "<th class=\"info\">Ort</th>";
				echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
				foreach ($tmp as $item) { //$res->fetchAll(PDO::FETCH_OBJ); das ist ein static zugriff auf die klassenkonstante der klasse pdo oder ich kann auch $db->query($sql) schreiben statt $tmp
					echo "<tr>";
					echo "<td>$item[customerName]</td>";
					echo "<td>$item[contactLastName]</td>";
					echo "<td>$item[contactFirstName]</td>";
					echo "<td>$item[postalCode]</td>";
					echo "<td>$item[city]</td>";
					echo "</tr>";

				}
				
			echo "</tbody>";
			echo "</table>"; 
					
	       	
					echo "<ul class=\"breadcrumb\">";
						
						echo "<li><a href=\"page.php?side=1\"><<</a></li>";

						echo "<li>";

						if(isset($_GET['side'])&& $_GET['side']>0)
							$current=$_GET['side'];
						else
							$current=1;
						
						if($current > 1) 
						{
							$current=$current-1;
							echo "<a href=\"page.php?side=$current\"><</a>";
						}
							
						else
							echo "<a href=\"page.php?side=1\"><</a>";
						
						echo "</li>";

						$sql="SELECT count(customerName) FROM customers";
	       				$mySidesR=$db->query($sql);
						$mySides = $mySidesR->fetch();
						$pages=ceil($mySides[0]/20);


						for($i=1; $i <= $pages; $i++) { 
							echo "<li><a href=\"page.php?side=$i\">$i</a></li>";
 						}

 						
					
					
						echo "<li>";

						if(isset($_GET['side']))
							$current=$_GET['side'];
						else
							$current=1;
						
						if($current < $pages) 
						{
							$current=$current+1;
							echo "<a href=\"page.php?side=$current\">></a>";
						}
							
						else
							echo "<a href=\"page.php?side=$pages\">></a>";
						
						echo "</li>";

					?>
						<li><a href="page.php?side=<?php echo "$pages" ?>">>></a></li>
					</ul>

		
		</div>
	</body>
</html>