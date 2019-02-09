<html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Les chantiers - Mangin Terrassement</title>
    <!-- inclusions des feuilles CSS -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
  <head>

  <body>
    <!-- en tête -->
    <header>

      <!-- menu -->
      <navbar>
        <navbar>
          <div class='navbar navbar-default navbar-fixed-top'>
            <a href="../" class="navbar-left"><img src="../images/logo.jpg" alt="logo" height="60px" width="190px" style="padding: 10px"/></a>
            <div class='container'>
              <ul class='nav navbar-nav'>
                <li><a href='../'>Accueil</a></li>
                <li class='active'><a href='./'>Chantiers</a></li>
                <li><a href='../contact'>Contact</a></li>
              </ul>
            </div>
          </div>
        </navbar>

    </header>

    <contenu>
      <?php

        /* connexion à la DB */
        include('../DB/db_connect.php');

        $answer = $db->query('SELECT texte, ID FROM chantiers ORDER BY ID DESC') or die(print_r($db->errorInfo()));
        while($data = $answer->fetch()) {
          ?>
          <div class="container-fluid">
            <div class="container">
              <div class="chantier">
                <section  class="col-sm-offset-1 col-sm-5 col-md-offset-1 col-md-5 col-lg-offset-1 col-lg-5">
                  <div><?php echo '<p>' . $data['texte']; ?></div>
                </section>
                <img src="images/<?php echo $data['ID']; ?>.jpg" alt="pelleteuse"/>
              </div>
            </div>
          </div>
        </br>
        <?php
        }

      ?>
    </contenu>
    <footer>
      <?php include "../footer.html";?>
    </footer>
  </body>

</html>
