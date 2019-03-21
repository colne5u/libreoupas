<?php

  /* default values for not required fields */
  $contact = 'non renseigné';

  /* if mail is filled */
  if(isset($_POST['email'])) {
    $mail = htmlspecialchars($_POST['email']);
    // if text is filled
    if(isset($_POST['contact'])) {
      $contact = htmlspecialchars($_POST['contact']);
    }
  }

  /* concatenation of the message */
  $message = 'Mail : ';
  $message .= $mail.PHP_EOL;
  $message .= $contact;

  /* sending the message */
  mail(
    'libreoupas@outlook.com',
    'contact - libreoupas.com',
    utf8_decode($message),
    'From : contact@libreoupas.com'
  );

  /* after the treatment redirection to main page */
  header('Location: http://www.clementcolne.com/libreoupas/');

?>
