<html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Contact - Mangin Terrassement</title>
    <!-- inclusions des feuilles CSS -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
  <head>

  <body>
    <!-- en tête -->
    <header>

      <!-- menu -->
      <navbar>
        <div class='navbar navbar-default navbar-fixed-top'>
          <a href="../" class="navbar-left"><img src="../images/logo.jpg" alt="logo" height="60px" width="190px" style="padding: 10px"/></a>
          <div class='container'>
            <ul class='nav navbar-nav'>
              <li> <a href='../'>Accueil</a> </li>
              <li><a href='../chantiers'>Chantiers</a> </li>
              <li class='active'><a href='./'>Contact</a> </li>
            </ul>
          </div>
        </div>
      </navbar>

    </header>

      <form class="col-lg-offset-1 col-lg-6 col-md-offset-1 col-md-6 col-sm-offset-1 col-sm-6" action="./mail_contact.php" method="post">
        <legend>Fiche de contact</legend>
        <div class="form-group">
          <label for="texte">* Nom : </label>
          <input id="text" type="text" class="form-control" name="nom" required="required">
        </div>
        <div class="form-group">
          <label for="texte">* Prénom : </label>
          <input id="text" type="text" class="form-control" name="prenom" required="required">
        </div>
        <div class="form-group">
          <label for="texte">* Numéro de téléphone : </label>
          <input id="text" type="tel" class="form-control" name="telephone" required="required">
        </div>
        <div class="form-group">
          <label for="texte">Adresse mail : </label>
          <input id="text" type="email" class="form-control" name="mail">
        </div>

        <div class="form-group">
          <label for="textarea">Votre message : </label>
          <textarea id="textarea" type="textarea" class="form-control" name="texte"></textarea>
        </div>
        <p class="CGU_formulaire">* champs obligatoires</p>
        <p class="CGU_formulaire">Mangin Terrassement S.A.S s'engage a ne pas vendre ni conserver vos données personnelles</p>
        <button class="btn btn-primary" type="submit">Envoyer</button>
      </form>
      <section class="col-sm-4 col-md-4 col-lg-4"><img src="../images/contact.jpg" alt="logo"/></section>

    <footer>
      <?php include "../footer.html";?>
    </footer>

  </body>

</html>
