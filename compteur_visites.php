<?php

  // compteur d'utilisations (= nombre de chargements de la page)
  // création du fichier stockant le nombre d'utilisations du site
  if(!file_exists('./compteur_visites/compteur_visites.txt'))
  {
      $compteur_f = fopen('./compteur_visites/compteur_visites.txt', 'a+');
      $compte = 0;
  }
  else
  {
      $compteur_f = fopen('./compteur_visites/compteur_visites.txt', 'r+');
      $compte = fgets($compteur_f);
  }

  // incrémentation du nombre d'utilisations
  $compte += 1;
  fseek($compteur_f, 0);
  fputs($compteur_f, $compte);
  fclose($compteur_f);

  // nombre de visites journalières du site
  $nom = date("d_m");
  $nom .= ".txt";

  if(file_exists("./compteur_visites/compteur_journalier/$nom"))
  {
      $compteur_journalier = fopen("./compteur_visites/compteur_journalier/$nom", 'r+');
      $compte = fgets($compteur_journalier);
  }
  else
  {
      $compteur_journalier = fopen("./compteur_visites/compteur_journalier/$nom", 'a+');
      $compte = 0;
  }

  // incrémentation du nombre d'utilisations
  $compte++;
  fseek($compteur_journalier, 0);
  fputs($compteur_journalier, $compte);
  fclose($compteur_journalier);

?>

    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-123954649-1 ');
    </script>
