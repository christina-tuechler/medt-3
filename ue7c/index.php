<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>blueIT</title>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<style>
  		header{
  			background-color: white;
  		}
  		nav{
  			background-color: #428bca;
  			height:50px;
  		}
  		nav ul{
  			list-style-type: none;
  			text-align: center;
  			padding-top: 15px;
  		}

  		nav a{
  			text-decoration: none;
  			float:left;
  			width:100px;
  			color:white;
  		}
  		nav a:hover{
  			background-color: gray;
  			text-decoration: none;
  			color:white;
  		}

      footer{
        background-color: gray;
        height:25px;
        margin-top: 10px;
      }

      footer p{
        float: right;
        padding-right: 10px;
      }
  		
  	</style>
</head>
<body>
	<div class="container">
		<header>
			<img src="http://www.blueit-ltd.com/wp-content/uploads/2012/08/BlueIT-Padding-300x99.jpg" alt="logo">
		</header>

    <div class="row">
  		<nav>
  			<ul>
  				<?php
            $menuItem=array(array("Home","home"), array("About", "index.php?action=about"), array("Portfolio", "index.php?action=portfolio"), array("Contact", "contact"), array("Mein Konto", "index.php?action=me"), array("Hilfe", "index.php?action=help"));
              foreach($menuItem as $item)
              {
                echo "<li class=\"col-xs-12 col-md-2\"><a href=".$item[1].">".$item[0]."</a></li>";
              }

            ?>
  		</nav>
   </div>

    <!-- so hatten wir es zuerst ohne SEO
    <?php
      $action="home";
      $items=array("home", "about", "portfolio", "contact", "login");
      
      if(isset($_GET['action']))
      {
        $tmp=$_GET['action'];
        if(in_array($tmp, $items))
        {
          $action=$tmp;
        }
        else
        {
          $action="home";
        }
      }
      include "{$action}.php";
    ?>-->

    <!-- mit SEO -->
    <?php
            $url=$_SERVER['REQUEST_URI'];
            $words=explode('/', $url);

            //var_dump($words);

            $inc;
            switch($words[count($words)-1])
            {
              case "home": $inc="home";
                break; 
              case "contact": $inc="contact";
                break;
              default : $inc="home";
                break;
            }
            include "{$inc}.php";
    ?>

    <div class="row">
      <footer>
        <p>© by Christina Tüchler, 3CHIT</p>
      </footer>
    </div>	
	</div>
</body>
</html>