<html>
	<head>
        <title>libreoupas/signaler un bug</title>
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
		<form action="index.php" method="get">
		    <div class="form-group col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-1 col-sm-10">
				<h2><strong>Décris le problème que tu as rencontré sur libreoupas</strong></h2>
				<textarea name="description_bug" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
				</br>
				<input type="email" name="email" class="form-control" placeholder="Entre ton email">
				<h6>libreoupas s'engage a utiliser ton mail uniquement pour te répondre en cas de besoin</h6>
			</div>
		<div class="form-group-b col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
		    <input type="submit" value="Envoyer"></input>
		</div>
		</form>
	</body>
</html>