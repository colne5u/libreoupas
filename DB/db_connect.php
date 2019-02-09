<?php
  /* connexion à la DB */
  try {
    $db = new PDO('mysql:host=localhost;dbname=m_terrassement;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }
  catch(Exception $e) {
    die('Erreur : ' . $e->getMessage());
  }
?>
