<?php

 // Affichage des erreurs pour débogage
 ini_set('display_errors', 1);
 error_reporting(E_ALL);
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Récupération des données du formulaire
     $name = htmlspecialchars(trim($_POST['name']));
     $email = htmlspecialchars(trim($_POST['email']));
     $message = htmlspecialchars(trim($_POST['message']));
 
     // Validation des champs du formulaire
     if (!empty($name) && !empty($email) && !empty($message)) {
         // Préparer l'email
         $to = "siwar.najjar.sio@gmail.com"; // Remplacez par votre adresse email
         $subject = "Nouveau message de contact";
         $body = "Nom: $name\nEmail: $email\n\nMessage:\n$message";
         $headers = "From: $email";
 
         // Tente d'envoyer l'email
         if (mail($to, $subject, $body, $headers)) {
             echo "Message envoyé avec succès !";
         } else {
             echo "Erreur lors de l'envoi du message.";
         }
     } else {
         echo "Tous les champs sont requis.";
     }
 } else {
     echo "Méthode de requête non autorisée.";
 }
 
  

  
  
  /*
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
 
  Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'elmahdi.guitone.sio@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
 
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );


  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
  */