<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>UE6</title>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<style>
  		header{
        background-color: white;
      }
      nav{
        background-color: blue;
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
      <img src="blueit_logo_2014.jpg" alt="logo">
    </header>

    <div class="row">
      <nav>
        <ul>
          <?php

          $menuItem=array(array("Home","index.php"), array("About", "#"), array("Portfolio", "#"), array("Kontakt", "contact.php"), array("Mein Konto", "#"), array("Hilfe", "#"));
            foreach($menuItem as $item)
            {
              echo "<li class=\"col-xs-12 col-md-2\"><a href=".$item[1].">".$item[0]."</a></li>";
            }

          ?>

        </ul>
      </nav>
    </div>
