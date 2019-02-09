<?php
	require_once "chargement_agenda.php";

	//si on prend contact
	if(!empty($_POST['contact']))
	{
		$data = fopen("contact.txt", "a+");
		$texte = $_POST['email']."\n".$_POST['contact']."\n";
		fwrite($data, $texte);
		fclose($data);
	}

	$tailleEdt = 500; //largeur de l'edt en pixels
	$nbHeures = 11; //11 heures entre 8h et 19h
?>

<html>
    <head>
		<meta charset="utf-8">
        <title>libreoupas</title>
		<link href="style.css" rel="stylesheet">
		<link rel="icon" href="favicon.png">
		<?php include_once "compteur_visites.php" ?>
        <script type="text/javascript">
			function libreoupas_description()
			{
				alert("libreoupas est un site répertoriant les salles informatiques Ubuntu et Windows de la FST accessibles aux étudiants,\
et indique si elles sont libre ou non\n\nAttention, il y a cependant une marge d'erreur (salle occupée sans que cela soit\
indiqué par l'administration, annulation / ajout / déplacement de cours de dernière minute, etc...)\n\nLe site est encore en\
développement, donc n'hésite pas à signaler tout problème sur l'onglet 'signaler un bug'\n\nDe plus, libreoupas est ouvert\
aux critiques, idées et avis constructifs à faire sur l'onglet 'contact'\n\nL'accès aux salles dépend des droits qui sont\
accordés à votre carte étudiant\n\nBonne utilisation :)");
			}
		</script>
    </head>

	<body>
		<h1><img src="logo.png" alt="libreoupas"></h1>
		<div class="main">
			<h2><?php echo date('H:i'); ?></h3>
			<table>
				<tr>
					<th>SALLE</th>
					<th></th>
					<?php
						echo '<th style="width:'.$tailleEdt.'px">EDT';
						$heure = date('H') + date('i') / 60;
						$left = (($heure - 8) / $nbHeures) * $tailleEdt; //marge a gauche en pixels par rapport au debut de l'edt
						echo '<div id="indicHeure" style="left:'.$left.'px;height:'.(count($salles) * 46).'px"></div></th>';
					?>
				</tr>
				<?php
					$i = 0;
					//pour chaque salle de l'edt
					foreach($edt as $nomSalle => $edtSalle)
					{
						echo "<tr>\n";
						echo '<td>'.$nomSalle.($i < 7 ? ' (Linux)' : ' (Windows)')."</td>\n"; //les 7 premieres salles sont des Linux, le reste est Windows
						echo '<td>'.($libre[$nomSalle] ? '<v>LIBRE</v>' : '<r>OCCUP&Eacute;E</r>')."</td>\n";
						echo '<td>';
						//pour chaque cours dans cette salle
						foreach ($edtSalle as $cours)
						{
							$width = (($cours['fin'] - $cours['debut']) / $nbHeures) * $tailleEdt; //taille en pixels du div
							$left = (($cours["debut"] - 8) / $nbHeures) * $tailleEdt; //marge a gauche en pixels par rapport au debut de l'edt
							echo '<div class="cours" style="width:'.$width.'px;left:'.$left.'px">'.$cours['affichage'].'</div>'."\n";
						}
						echo "</td>\n</tr>\n";
						$i++;
					}
				?>
			</table>
		</div>
		<footer>
			<div class="bouton" onclick="libreoupas_description()">
				libreoupas c'est quoi ?
			</div>
			<div class="bouton" onclick="window.location='contact.php'">
				Contact
			</div>
		</footer>
    </body>
</html>
