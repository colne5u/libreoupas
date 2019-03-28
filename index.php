<html>
    <head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>libreoupas</title>
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />
		<?php
            include "assets/php/edtLoad.php";
            include "assets/php/navigation.php";
            include "assets/php/theme.php";
            include "assets/php/edt.php";
        ?>
        <?php addCorrectTheme() ?>
    </head>
	<body>
        <div class="container-fluid">
            <header class="page-header">
                <a href="index.php">
                    <img id="Logo" src="assets/img/logo.png" class="logo img-responsive"/>
                </a>
            </header>
            <?php addNavigationBar(); ?>
            <section id="content" class="row">
                <?php addEdt() ?>
            </section>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/index.js"></script>
    </body>
</html>
