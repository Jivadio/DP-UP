<?php

// Replace this with your own email address
$to = 'malomartin@protonmail.com';

function url(){
  return sprintf(
    "%s://%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME']
  );
}

if($_POST) {

   $name = trim(stripslashes($_POST['name']));
   $email = trim(stripslashes($_POST['email']));
   $subject = trim(stripslashes($_POST['subject']));
   $contact_message = trim(stripslashes($_POST['message']));

   $message .= "Email de: " . $name . "<br />";
   $message .= "Adresse Email: " . $email . "<br />";
   $message .= "Téléphone: " . $subject . "<br />";
   $message .= "Message: <br />";
   $message .= nl2br($contact_message);
   
	$subject = "Nouveau contact !";

   // Set From: header
   $from =  $name . " <" . $email . ">";

   // Email Headers
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $email . "\r\n";
 	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

   ini_set("sendmail_from", $to); // for windows server
   $mail = mail($to, $subject, $message, $headers);

	if ($mail) { echo "OK"; }
   else { echo "Something went wrong. Please try again."; }

}

?>