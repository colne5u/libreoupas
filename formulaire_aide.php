<html>
	<head>
        <title>libreoupas/demander de l'aide</title>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="bootstrap.css" rel="stylesheet">
        <meta charset="utf-8">
    </head>
	
	<style type="text/css">
		body{ 
			background-image: url(fond.png);
		}
		.form-group-b{
			text-align: center;
		}
		
	</style>
	
	<body>
		<form action="index.php" method="get">
		    <div class="form-group col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-1 col-sm-10">
		  	    <h3><strong>Je suis dans la salle</strong></h3>
			    <select name="salle" class="form-control" id="exampleFormControlSelect1">
			        <option>HP 303</option>
			        <option>HP 309</option>
			        <option>HP 310</option>
			        <option>HP 311</option>
			        <option>HP 312</option>
			        <option>HP 315</option>
			        <option>HP 319</option>
			    </select>
				<h3><strong>Je suis en</strong></h3>
				<select name="annee" class="form-control" id="exampleFormControlSelect1">
					<option>L1</option>
					<option>L2</option>
					<option>L3</option>
				</select>
				<h3><strong>Comment me reconnaître (emplacement dans la salle, couleur du tee-shirt, ...)</strong></h3>
				<textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
				<h3><strong>J'ai besoin d'aide sur</strong></h3>
				<select name="sujet" class="form-control" id="exampleFormControlSelect1">
					<option></option>
					<option>Python</option>
					<option>C</option>
					<option>HTML/CSS/PHP</option>
					<option>Autre</option>
				</select>
				<h3><strong>Details sur l'aide dont j'ai besoin</strong></h3>
				<textarea name="detail" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
				</br>
			</div>
		<div class="form-group-b col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
		    <input type="submit" value="Envoyer"></input>
		</div>
		</form>
	</body>
</html>