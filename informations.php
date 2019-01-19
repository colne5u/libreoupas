<html>
    <head>
        <title>libreoupas/informations</title>
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
	
	<?php
	
    if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "mot_de_passe") // Si le mot de passe est bon
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
		
	// ouverture du fichier contenant les bugs
	$data_bug = fopen('bug.txt', 'r+');
		
	//ouverture du fichier contenant les contacts
	$data_contact = fopen('contact.txt', 'r+');
		
    ?>
	
		<div class="col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10">
			<h3>Le compteur de visites a été activé le 04/09/2018 : <strong><?php echo $visites_total; ?></strong> visites au total sur libreoupas</h3>
			<h3>Nombre de visites total aujourd'hui : <strong><?php echo $compteur_journalier; ?></strong></h3>
			</br>
			<table class="table table-lg table-sm table-striped">
				<tbody>
					<th scope="row">MESSAGE BUG</th>
					<th scope="col">ADRESSE</th>
				</tbody>
				<tbody>
					<tr>
						<td><?php echo fgets($data_bug); ?></td>			
						<td><?php echo fgets($data_bug); ?></td>
					</tr>
					<tr>
						<td><?php echo fgets($data_bug); ?></td>			
						<td><?php echo fgets($data_bug); ?></td>
					</tr>
					<tr>
						<td><?php echo fgets($data_bug); ?></td>			
						<td><?php echo fgets($data_bug); ?></td>
					</tr>
					<tr>
						<td><?php echo fgets($data_bug); ?></td>			
						<td><?php echo fgets($data_bug); ?></td>
					</tr>
					<tr>
						<td><?php echo fgets($data_bug); ?></td>			
						<td><?php echo fgets($data_bug); ?></td>
					</tr>
					<tr>
						<td><?php echo fgets($data_bug); ?></td>			
						<td><?php echo fgets($data_bug); ?></td>
					</tr>
					<tr>
						<td><?php echo fgets($data_bug); ?></td>			
						<td><?php echo fgets($data_bug); ?></td>
					</tr>
					<tr>
						<td><?php echo fgets($data_bug); ?></td>			
						<td><?php echo fgets($data_bug); ?></td>
					</tr>
					<tr>
						<td><?php echo fgets($data_bug); ?></td>			
						<td><?php echo fgets($data_bug); ?></td>
					</tr>
					<tr>
						<td><?php echo fgets($data_bug); ?></td>			
						<td><?php echo fgets($data_bug); ?></td>
					</tr>
				</tbody>
			</table>	
			</br>
			<table class="table table-lg table-sm table-striped">
				<tbody>
					<th scope="row">MESSAGE CONTACT</th>
					<th scope="col">ADRESSE</th>
				</tbody>
				<tbody>
					<tr>
						<td><?php echo fgets($data_contact); ?></td>			
						<td><?php echo fgets($data_contact); ?></td>
					</tr>
					<tr>
						<td><?php echo fgets($data_contact); ?></td>			
						<td><?php echo fgets($data_contact); ?></td>
					</tr>
					<tr>
						<td><?php echo fgets($data_contact); ?></td>			
						<td><?php echo fgets($data_contact); ?></td>
					</tr>
					<tr>
						<td><?php echo fgets($data_contact); ?></td>			
						<td><?php echo fgets($data_contact); ?></td>
					</tr>
					<tr>
						<td><?php echo fgets($data_contact); ?></td>			
						<td><?php echo fgets($data_contact); ?></td>
					</tr>
					<tr>
						<td><?php echo fgets($data_contact); ?></td>			
						<td><?php echo fgets($data_contact); ?></td>
					</tr>
					<tr>
						<td><?php echo fgets($data_contact); ?></td>			
						<td><?php echo fgets($data_contact); ?></td>
					</tr>
					<tr>
						<td><?php echo fgets($data_contact); ?></td>			
						<td><?php echo fgets($data_contact); ?></td>
					</tr>
					<tr>
						<td><?php echo fgets($data_contact); ?></td>			
						<td><?php echo fgets($data_contact); ?></td>
					</tr>
					<tr>
						<td><?php echo fgets($data_contact); ?></td>			
						<td><?php echo fgets($data_contact); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	<?php
	fclose($data_bug);
	fclose($data_contact);
    }
    ?>
	
</html>