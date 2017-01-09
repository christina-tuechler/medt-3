<!DOCTYPE  html>
<html>
<head>
	<meta charset="UTF-8">
	<title>.:: PHP Mailer Demo ::.</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
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
		$mail->Host = 'smtp.gmail.com';//@TODO
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 587; //@TODO
		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls'; //@TODO
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = "c.e.tuechler@gmail.com";//@TODO
		//Password to use for SMTP authentication
		$mail->Password = "$pwd"; //@TODO
		//Set who the message is to be sent from
		$mail->setFrom('from@example.com', 'First Last');
		//Set an alternative reply-to address
		$mail->addReplyTo('replyto@example.com', 'First Last');
		//Set who the message is to be sent to
		$mail->addAddress('whoto@example.com', 'Mr. X');
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
		if (false) { //!$mail->send()
		    echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		    echo "Message sent!";
		}
		?>
		</div>
	</div>	
</div>
</body>
</html>
Contact GitHub API Training Shop Blog About
