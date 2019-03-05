<html>
    <head>
        <title>libreoupas/contact</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="bootstrap.css" rel="stylesheet">
        <meta charset="utf-8">
    </head>

    <style type="text/css">
        body{
            background-image: url(fond.png);
        }

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

    <body>
        <form action="traitement_contact.php" method="post">
            <div class="form-group col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-1 col-sm-10">
                <h2><strong>Qu'a-tu à raconter à libreoupas ?</strong></h2>
                <textarea name="contact" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </br>
                <input type="email" name="email" class="form-control" placeholder="Entre ton email">
                <h6>libreoupas s'engage a utiliser ton mail uniquement pour te répondre</h6>
                </div>
                  <div class="form-group-b col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
                    <input type="submit" value="Envoyer"></input>
           </div>
      </form>
  </body>
</html>
