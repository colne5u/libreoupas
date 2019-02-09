<?php

  if(isset($_POST['email']) && isset($_POST['contact'])) {
    if(!file_exists('./contact.txt')) {
        $contact_f = fopen('./contact.txt', 'a+');
    }else{
        $contact_f = fopen('./contact.txt', 'a');
    }
    $texte = htmlspecialchars($_POST['contact']);
    $texte .= "\n";
    $texte .= htmlspecialchars($_POST['email']);
    $texte .= "\n";
    fputs($contact_f, $texte);
    fclose($contact_f);
  }
  header('Location : http://clementcolne.com/libreoupas/');

?>
