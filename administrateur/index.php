<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Espace administrateur - Mangin Terrassement</title>
    <!-- inclusions des feuilles CSS -->
    <link type='text/css' rel='stylesheet' href='../style.css'>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
  </head>

  <style>
    body {
      margin-top: 20px;
    }
  </style>

<?php

  /* connexion à la DB */
  include('../DB/db_connect.php');

  /* affichage du formulaire */
  ?>
  <html>
    <body>
      <form class="col-lg-offset-1 col-lg-6 col-md-offset-1 col-md-6 col-sm-offset-1 col-sm-6">
        <a class="btn btn-primary" href="../">Retour au site</a>
      </form>
      <form class="col-lg-offset-1 col-lg-6 col-md-offset-1 col-md-6 col-sm-offset-1 col-sm-6" method="post" action="./index.php">
        <legend>Ajout d'un article chantier</legend>
        <div class="form-group">
          <label for="textarea">Texte : </label>
          <textarea id="textarea" type="textarea" class="form-control" name="texte"></textarea>
        </div>
        <button class="btn btn-primary" type="submit">Envoyer</button>
      </form>
    </body>
  </html>

  <?php

  /* récupération des données si elles existent */
  if(isset($_POST['texte'])) {

    $texte = htmlspecialchars($_POST['texte']);

    $request = $db->prepare('INSERT INTO chantiers(texte) VALUES (:texte)');
    $request->execute(array(
      'texte' => $texte,
    ));

    echo 'Chantier bien ajouté';

    $request->closeCursor();

  }

?>

</html>
