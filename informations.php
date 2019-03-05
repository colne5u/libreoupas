<html>
    <head>
        <title>libreoupas - informations</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="bootstrap.css" rel="stylesheet">
        <meta charset="utf-8">
    </head>

    <style type="text/css">
        h2{
            text-align: center;
        }

        h6{
            font-style: italic;
        }

        .form-group-b{
            text-align: center;
        }
    </style>

    <?php

      if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "mdp") // Si le mot de passe est bon
      {

        // cette page regroupe les différentes informations de libreoupas

        $data = fopen('./compteur_visites/compteur_visites.txt', 'r+');
        $visites_total = fgets($data);
        fclose($data);

        // ouverture des fichiers contenant les données journalières
        $nom = date("d_m");
        $nom .= ".txt";
        $data = fopen("./compteur_visites/compteur_journalier/$nom", "r+");
        $compteur_journalier = fgets($data);
        fclose($data);

      }

    ?>

</html>
