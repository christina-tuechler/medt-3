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
        background-color: blue;
        height:50px;
      }
  		nav ul{
        list-style-type: none;
        text-align: center;
        padding-top: 15px;
      }
  		nav li{
  			/*border-right-width: 2px;
        border-left-width: 2px;
        border-color: white;*/
        
        margin:auto; /* warum funktioniert das nicht????? */

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
      h1{
        color:red;
      }
      main h1, h3{
        text-align: center;
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
  				<li class="col-xs-12 col-md-2"><a href="geruest.php">Home</a></li>
  				<li class="col-xs-12 col-md-2"><a href="#">About</a></li>
  				<li class="col-xs-12 col-md-2"><a href="#">Portfolio</a></li>
  				<li class="col-xs-12 col-md-2"><a href="contact.php">Kontakt</a></li>
  				<li class="col-xs-12 col-md-2"><a href="#">Mein Konto</a></li>
          <li class="col-xs-12 col-md-2"><a href="#">Hilfe</a></li>
  			</ul>
  		</nav>
    </div>

    <main>
      <div class="row">
      <h1>Kontakt</h1>
      <p class="col-xs-12">Herzlichen Dank für Ihre Anfrage! Aufgrund des derzeitigen Anfragevolumens kann die Beantwortung Ihrer Anfrage längere ZEit in Anspruch nehmen. Wir bitten um Ihr Verständnis und melden uns sobald als möglich bei Ihnen.</p>
      <p class="col-xs-12">Ihr blueIT-Team</p>
    </div>
    </main>
  </div>
</body>
</html>