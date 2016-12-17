<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>a web page</title>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<style>
      *{
        margin:0px;
        padding: 0px;
      }
  		header{
  			background-color: gray;
        height:20px;
        text-align: center;
  		}
      nav{
        background-color: yellow;
        height:25px;
      }
      nav ul{
        list-style-type: none;
      }
      a .col-md-4{
        float:left;
        text-align: center;
        /*width:200px;*/
      }
      div .col-md-4{
        background-color: green;
        height:100px;
        text-align: center;
      }
      /*.col-xs-12{
        background-color: green;
        height:100px;
      }*/
      footer{
        background-color: gray;
        height:20px;
        text-align: center;
      }
  		
  	</style>
</head>
<body>
	<div class="container">

    <div class="row">
  		<header>header</header>
    </div>

    <div class="row">
  		<nav>
  			<ul>
  				<?php 
            $menuItems=array('Home','Products','Company','Blog');
            foreach($menuItems as $item)
              echo "<a class=\"col-md-3\" href='#'>".$item."</a>";
          ?>
        </ul>
      </nav>
    </div>

    <div class="row">
      <main>
        <div class="col-md-4">Box1</div>
        <div class="col-md-4">Box2</div>
        <div class="col-md-4">Box3</div>
      </main>
    </div>

    <div class="row">
      <footer>Footer</footer>
  	</div>

	</div>
</body>
</html>