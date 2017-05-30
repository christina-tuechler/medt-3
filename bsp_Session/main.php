	<?php
 		$username="christina";
 		$password="tuechler";



 		if($_POST['username']==$username && $_POST['password']==$password)
 			{
 				require "isLoggedIn.php";
 				header('Location: trackStar.php');
 			}
 			else
 				header('Location: index.php?visited=true');	
 	?>
