<?php

  // valeurs par défault des champs non obligatoires
  $mail = 'non renseigné';
  $texte = 'non renseigné';

  // si le nom & le prénom & le numéro ont été renseignés
  if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['telephone'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $telephone = htmlspecialchars($_POST['telephone']);
    // si le mail a été renseigné
    if(isset($_POST['mail'])) {
      $mail = htmlspecialchars($_POST['mail']);
    }
    // si un texte a été renseigné
    if(isset($_POST['texte'])) {
      $texte = htmlspecialchars($_POST['texte']);
    }
  }

  /* concaténation du message */
  $message = 'Nom : ';
  $message .= $nom;
  $message .= "\n";
  $message .= 'Prénom : ';
  $message .= $prenom;
  $message .= "\n";
  $message .= 'Téléphone : ';
  $message .= $telephone;
  $message .= "\n";
  $message .= 'Mail : ';
  $message .= $mail;
  $message .= "\n\n";
  $message .= $texte;

  mail(
    'clement.colne@outlook.com',
    $_POST['nom'] . ' ' . $_POST['prenom'] . ' - Mangin Terrassement S.A.S',
    utf8_decode($message),
    'From : contact@mangin_terrassement.fr'
  );


  header('Location: http://www.clementcolne.com/m_terrassement/contact/');

?>
