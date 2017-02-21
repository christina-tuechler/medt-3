   <main>

  		<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']?>" method="POST">

            <div class="form-group">

              <h1 class="text-center">Kontakt</h1>
              <h3 class="text-center">Wir freuen uns auf Ihre Anfrage!</h3><br>
              <h4 class="text-center">Der Grund für Ihre Anfrage</h4>

              <div class="text-center">
                <label class="radio-inline">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Freie Stellen"> Freie Stellen
                </label>
                <label class="radio-inline">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Produktreklamation"> Produktreklamation
                </label>
                <label class="radio-inline">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="Produktneuheiten"> Produktneuheiten
                </label>
              </div>

              <label for="inputVN" class="col-sm-2 control-label">Vorname *</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputVN" placeholder="Vorname" required>
              </div>

              <label for="inputNN" class="col-sm-2 control-label">Nachname *</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputNN" placeholder="Nachname" required>
              </div>

              <label for="anrede" class="col-sm-2 control-label">Anrede *</label>
                <div class="col-sm-10">  
                  <select class="selectpicker form-control" name="anrede">
                    <option>Frau</option>
                    <option>Herr</option>
                    </select>   
                </div><br>  

              <label for="inputStreet" class="col-sm-2 control-label">Straße</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputStreet" placeholder="Straße">
              </div>

              <label for="inputPLZ" class="col-sm-2 control-label">Postleitzahl</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="inputPLZ" placeholder="Postleitzahl">
              </div>

              <label for="inputLoc" class="col-sm-2 control-label">Ort</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputLoc" placeholder="Ort">
              </div>

              <label for="inputLand" class="col-sm-2 control-label">Land</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputLand" placeholder="Land">
              </div>

              <label for="inputTel" class="col-sm-2 control-label">Telefon</label>
              <div class="col-sm-10">
                <input type="tel" class="form-control" id="inputTel" placeholder="Tel">
              </div>

              <label for="inputEmail" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
              </div>

              <label for="inputAF" class="col-sm-2 control-label">Anfrage</label>
              <div class="col-sm-10">
                <textarea name="anfrage" rows="3"class="form-control" id="inputAF"></textarea> 
              </div>
              
              <div class="col-sm-12">
                <input type="submit" class="btn btn-primary btn-lg btn-block" name="senden" value="Anfrage senden" onclick="alert('Herzlichen Dank für Ihre Anfrage! Aufgrund des derzeitigen Anfragevolumens kann die Beantwortung Ihrer Anfrage längere ZEit in Anspruch nehmen. Wir bitten um Ihr Verständnis und melden uns sobald als möglich bei Ihnen.'<br>'Ihr blueIT-Team')">
              </div>
            </div><br>
          
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