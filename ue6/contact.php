<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>blueIT</title>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<meta charset="UTF-8">
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
  		<form action="<?php $_SERVER['PHP_SELF']?>"method="POST">
        <h1>Kontakt</h1>
        <h3>Wir freuen uns auf Ihre Anfrage!</h3><br>
        <h4>Der Grund für Ihre Anfrage</h4>
        <label><input type="radio" name="grund"> Freie Stellen</label><br>
        <label><input type="radio" name="grund"> Produktreklamation</label><br>
        <label><input type="radio" name="grund"> Produktneuheiten</label><br><br>
        <h4>Anrede *</h4>
        <select name="anrede" size="1">
          <option>Frau</option>
          <option>Herr</option>
        </select><br><br>
        <label>Vorname * <input type="text" name="vorname" required></label>
        <label>Nachname * <input type="text" name="nachname" required></label><br>

        <label>Straße <input type="text" name="strasse"></label><br>
        <label>Postleitzahl <input type="number" name="plz"></label><br>
        <label>Ort <input type="text" name="ort"></label><br>
        <label>Land <input type="text" name="land"></label><br>

        <label>Telefon: <input type="tel" name="telefon"></label><br>
        <label>E-Mail: <input type="email" name="telefon"></label><br><br>

        <label>Anfrage <textarea name="anfrage" rows="2" cols="20"></textarea></label><br><br>

        <input type="submit" name="senden" value="Anfrage senden" onclick="alert('Herzlichen Dank für Ihre Anfrage! Aufgrund des derzeitigen Anfragevolumens kann die Beantwortung Ihrer Anfrage längere ZEit in Anspruch nehmen. Wir bitten um Ihr Verständnis und melden uns sobald als möglich bei Ihnen.'<br>'Ihr blueIT-Team')">

  		</form>



      <?php
        if(isset($_POST['senden']))
        { ?>

          <a href="success.php">Success</a>

          <div class="panel panel-primary">
          <div class="panel-heading">.:: Mail Report ::.</div>
          <div class="panel-body">
         <?php  
          require 'pwd.php';
          require 'vendor/autoload.php';
          //Create a new PHPMailer instance
          $mail = new PHPMailer;
          //Tell PHPMailer to use SMTP
          $mail->isSMTP();
          //Enable SMTP debugging
          // 0 = off (for production use)
          // 1 = client messages
          // 2 = client and server messages
          $mail->SMTPDebug = 2;
          //Ask for HTML-friendly debug output
          $mail->Debugoutput = 'html';
          //Set the hostname of the mail server
          $mail->Host = gethostbyname('smtp.gmail.com');//@TODO
          // use
          // $mail->Host = gethostbyname('smtp.gmail.com');
          // if your network does not support SMTP over IPv6
          //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
          $mail->Port = 587; //@TODO
          //Set the encryption system to use - ssl (deprecated) or tls
          $mail->SMTPSecure = 'ssl'; //@TODO
          //Whether to use SMTP authentication
          $mail->SMTPAuth = true;
          //Username to use for SMTP authentication - use full email address for gmail
          $mail->Username = "c.e.tuechler@gmail.com";//@TODO
          //Password to use for SMTP authentication
          $mail->Password = "$pwd"; //@TODO
          //Set who the message is to be sent from
          $mail->setFrom('c.e.tuechler@wvnet.at', 'Christina Tuechler');
          //Set an alternative reply-to address
          $mail->addReplyTo('c.e.tuechler@gmail.com', 'First Last');
          //Set who the message is to be sent to
          $mail->addAddress('c.e.tuechler@gmail.com', 'Mr. X');
          //Set the subject line
          $mail->Subject = 'PHPMailer GMail SMTP test';
          //Read an HTML message body from an external file, convert referenced images to embedded,
          //convert HTML into a basic plain-text alternative body
          $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
          //Replace the plain text body with one created manually
          $mail->AltBody = 'This is a plain-text message body';
          //Attach an image file
          //$mail->addAttachment('images/phpmailer_mini.png');
          //send the message, check for errors
          if (!$mail->send()) { //!$mail->send()
              echo "Mailer Error: " . $mail->ErrorInfo;

          } else {
              echo "Message sent!"; 

              
          }
          ?>
          </div>
        </div>  
        <?php } ?>
    </main>

    


  		
	</div>
</body>
</html>