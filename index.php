<html>
    <head>
		
	<!-- Global Site Tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
	
		gtag('config', 'UA-123954649-1 ');
	</script>

        <title>libreoupas</title>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="bootstrap.css" rel="stylesheet">
        <meta charset="utf-8">
    </head>
    
	<style type="text/css">

		body{
			background-image: url(fond.png);
		}
		
		.btn {
			width: 300px;
			height: 100px;
			border-radius: 50px;
		}
		
		h3{
			text-align: center;
		}
		
		td, th{
			font-size: x-large;
		}
		
		v{
			color: green;
		}
		
		r{
			color: red;
		}
		
	</style>
	<link rel="icon" href="favicon.png" />
	
	</br></br></br>
	<h3><img src="logo.png" alt="Logo Libre ou Pas"></h3>
	</br></br></br>
	
	<body>
	
        <?php
			
			// compteur d'utilisations (= nombre de chargements de la page)
			// création du fichier stockant le nombre d'utilisations du site
			if(!file_exists('./compteur_visites/compteur_visites.txt')){
				$compteur_f = fopen('./compteur_visites/compteur_visites.txt', 'a+');
				$compte = 0;
			}else{
				$compteur_f = fopen('./compteur_visites/compteur_visites.txt', 'r+');
				$compte = fgets($compteur_f);
			}
			
			// incrémentation du nombre d'utilisations
			$compte++;
			fseek($compteur_f, 0);
			fputs($compteur_f, $compte);
			fclose($compteur_f);
			
			// nombre de visites journalières du site
			$nom = date("d_m");
			$nom .= ".txt";
			
			if(file_exists("./compteur_visites/compteur_journalier/$nom")){
				$compteur_journalier = fopen("./compteur_visites/compteur_journalier/$nom", 'r+');
				$compte = fgets($compteur_journalier);
			}else{
				$compteur_journalier = fopen("./compteur_visites/compteur_journalier/$nom", 'a+');
				$compte = 0;
			}
			
			// incrémentation du nombre d'utilisations
			$compte++;
			fseek($compteur_journalier, 0);
			fputs($compteur_journalier, $compte);
			fclose($compteur_journalier);
			
			//fichier texte pour la MAJ toutes les 4h
			$MAJ = fopen("maj.txt", "a+");
			if(empty($MAJ)){
				$MAJ_var = date("H");
				fwrite($MAJ, $MAJ_var);
			}else{
				$MAJ_var = fgets($MAJ);
			}
					
			// mise à jour des données sur les salles toutes les 4 heures
			if( (($MAJ_var + 4) < date("H")) or ((date("H") > 1) and ((date("H") <= 11))) ){
				// DONNEES SALLES UBUNTU
				// j'efface tout le contenu du fichier "ADECal.ics, et je met à jour les données via l'URL
				fwrite(fopen("ADECal.ics", "w+"), @file_get_contents("https://planning.univ-lorraine.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?resources=24302,24303,24307,24308,24309,24310,24314&projectId=6&calType=ical&nbWeeks=16"));
				$MAJ = fopen("MAJ.txt", "w+");
				fwrite($MAJ, date("H"));
			}

			fclose($MAJ);
			
			// j'ouvre le fichier contenant les données agenda
            $data_ubuntu = fopen('ADECal.ics', 'r');
        
            // je récupère le nombre de lignes dans mon fichier
            $fichier = file('ADECal.ics');
            $count = count($fichier);
			
			// initialisation de l'heure 
			$dateJour = date("d/m");
			if((date("H") > 00) && (date("H") <= 07)){
				$heureTmp = date("H");
				$heureTmp += 2;
				$heure = "0";
				$heure .= $heureTmp;
				$heure .= ":";
				$heure .= date("i");
			}else{
				$heure = date("H");
				$heure += 1;
				$heure .= ":";
				$heure .= date("i");
			}	
			
			//initialisation de mes variables salle
			//par défaut, les salles sont libres
			$HP303[0] = "HP 303";
			$HP303[1] = "LIBRE";
			$HP303[2] = "";
			$HP303[3] = "";
			
			$HP309[0] = "HP 309";
			$HP309[1] = "LIBRE";
			$HP309[2] = "";
			$HP309[3] = "";
			
			$HP310[0] = "HP 310";
			$HP310[1] = "LIBRE";
			$HP310[2] = "";
			$HP310[3] = "";
			
			$HP311[0] = "HP 311";
			$HP311[1] = "LIBRE";
			$HP311[2] = "";			
			$HP311[3] = "";

			$HP312[0] = "HP 312";
			$HP312[1] = "LIBRE";
			$HP312[2] = "";
			$HP312[3] = "";
			
			$HP315[0] = "HP 315";
			$HP315[1] = "LIBRE";
			$HP315[2] = "";
			$HP315[3] = "";
			
			$HP319[0] = "HP 319";
			$HP319[1] = "LIBRE";
			$HP319[2] = "";
			$HP319[3] = "";
			
			//mes fonctions
			function dateJour($jour, $mois){
				$date = $jour;
				$date .= "/";
				$date .= $mois;
				
				return $date;
			}
			
			function heure ($heure, $minute){
				$debutCours = $heure;
				$debutCours .= ':';
				$debutCours .= $minute;
				
				return $debutCours;
			}
			
            //tant que je n'ai pas parcouru tout le fichier, je boucle
            $i = 1;
            while ($i <= $count){
                //je récupère les 7 premières lettres de chaque ligne
				$DTSTART = "";
                for($j = 0 ; $j < 8 ; $j++){
                    $DTSTART .= fgetc($data_ubuntu);
				}
				for ($j = 0 ; $j < 4 ; $j++){
					fgetc($data_ubuntu);
				}
                //je récupère la date après "DTSTART"
				$mois = "";
                for ($k = 0 ; $k < 2 ; $k++){
                    $mois .= fgetc($data_ubuntu);
                }
				$jour = "";
				for ($k = 0 ; $k < 2 ; $k++){
					$jour .= fgetc($data_ubuntu);
				}
				
				$date = dateJour($jour, $mois);
				
				fgetc($data_ubuntu);
				//je récupère l'heure et la minute de début  
				$heureDebut = "";
				for ($k = 0 ; $k < 2 ; $k++){
					$heureDebut .= fgetc($data_ubuntu);
				}
				
				$minuteDebut = "";
				for ($k = 0 ; $k < 2 ; $k++){
					$minuteDebut .= fgetc($data_ubuntu);
				}
				
				//on est sur la MAUVAISE LIGNE ou si le COURS EST FINI, on réinitialise les variables et on passe a la ligne suivante
                if (($DTSTART != "DTSTART:") or ($heure > heure($heureFin, $minuteFin))){
					$DTSTART = "";
					$mois = "";
					$jour = "";
					$heureDebut = "";
					$minuteDebut = "";
					$heureFin = "";
					$minuteFin = "";
					$nomSalle = "";
					fgets($data_ubuntu);	
				//On est sur la BONNE LIGNE et il y a ACTUELLEMENT/PROCHAINEMENT cours
                }else{
					//on ignore les caractères qui concernent la date de fin (inutile)
					fgets($data_ubuntu);					
					for ($j = 0 ; $j < 14 ; $j++){
						fgetc($data_ubuntu);
					}
					
					//on enregistre l'heure et la minute de la fin
					fgetc($data_ubuntu);
					$heureFin = "";
					for ($j = 0 ; $j < 2 ; $j++){
						$heureFin .= fgetc($data_ubuntu);
					}
					$minuteFin = "";
					for ($j = 0 ; $j < 2 ; $j++){
						$minuteFin .= fgetc($data_ubuntu);
					}

					
					//on enregistre le nom de la salle
					fgets($data_ubuntu);
					fgets($data_ubuntu);
					for ($j = 0 ; $j < 20 ; $j++){
						fgetc($data_ubuntu);
					}
					for ($j = 0 ; $j < 6 ; $j++){
						$nomSalle .= fgetc($data_ubuntu);
					}
					
					if ($heureDebut == "07"){
					  $heureDebut = "08";
					  $heureFin = "10";
					}else if($heureDebut == "08"){
					  $heureDebut = "09";
					  $heureFin +=1;
					}else{
					  $heureDebut += 1;
					  $heureFin +=1;
					}
					
					// écriture des informations concernant les salles si elles sont occupées
					if ($date == $dateJour){
						if ($nomSalle == "HP 303"){
							if (($heure >= heure($heureDebut, $minuteDebut)) && ($heure <= heure($heureFin, $minuteFin))){
								$HP303[0] = "HP 303";
								$HP303[1] = "OCCUP&Eacute;E";
								$HP303[2] = heure($heureDebut, $minuteDebut);
								$HP303[3] = heure($heureFin, $minuteFin);
							}
						}
						if ($nomSalle == "HP 309"){
							if (($heure >= heure($heureDebut, $minuteDebut)) && ($heure <= heure($heureFin, $minuteFin))){
								$HP309[0] = "HP 309";
								$HP309[1] = "OCCUP&Eacute;E";
								$HP309[2] = heure($heureDebut, $minuteDebut);
								$HP309[3] = heure($heureFin, $minuteFin);
							}
						}
						if ($nomSalle == "HP 310"){
							if (($heure >= heure($heureDebut, $minuteDebut)) && ($heure <= heure($heureFin, $minuteFin))){
								$HP310[0] = "HP 310";
								$HP310[1] = "OCCUP&Eacute;E";
								$HP310[2] = heure($heureDebut, $minuteDebut);
								$HP310[3] = heure($heureFin, $minuteFin);
							}
						}
						if ($nomSalle == "HP 311"){
							if (($heure >= heure($heureDebut, $minuteDebut)) && ($heure <= heure($heureFin, $minuteFin))){
								$HP311[0] = "HP 311";
								$HP311[1] = "OCCUP&Eacute;E";
								$HP311[2] = heure($heureDebut, $minuteDebut);
								$HP311[3] = heure($heureFin, $minuteFin);
							}
						}
						if ($nomSalle == "HP 312"){
							if (($heure >= heure($heureDebut, $minuteDebut)) && ($heure <= heure($heureFin, $minuteFin))){
								$HP312[0] = "HP 312";
								$HP312[1] = "OCCUP&Eacute;E";
								$HP312[2] = heure($heureDebut, $minuteDebut);
								$HP312[3] = heure($heureFin, $minuteFin);
							}
						}					
						if ($nomSalle == "HP 315"){
							if (($heure >= heure($heureDebut, $minuteDebut)) && ($heure <= heure($heureFin, $minuteFin))){
								$HP315[0] = "HP 315";
								$HP315[1] = "OCCUP&Eacute;E";
								$HP315[2] = heure($heureDebut, $minuteDebut);
								$HP315[3] = heure($heureFin, $minuteFin);
							}
						}
						if ($nomSalle == "HP 319"){
							if (($heure >= heure($heureDebut, $minuteDebut)) && ($heure <= heure($heureFin, $minuteFin))){
								$HP319[0] = "HP 319";
								$HP319[1] = "OCCUP&Eacute;E";
								$HP319[2] = heure($heureDebut, $minuteDebut);
								$HP319[3] = heure($heureFin, $minuteFin);
							}
						}
					}
					
					//on réinitialise les variables
					$DTSTART = "";
					$nomSalle = "";
					$mois = "";
					$heureDebut = "";
					$minuteDebut = "";					
					$heureFin = "";
					$minuteFin = "";
				}
                $i += 1;
            }
        	
            // fermeture du fichier de données
            fclose($data_ubuntu);
			
			// DONNEES SALLES WINDOWS
			////MAJ toutes les 4 heures
			if( (($MAJ_var + 4)<date("H")) or ((date("H")>1) and ((date("H")<=11))) ){
				// j'efface tout le contenu du fichier "ADECal.ics, et je met à jour les données via l'URL
				fwrite(fopen("ADECal_windows.ics", "w+"), @file_get_contents("https://planning.univ-lorraine.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?resources=9349,24304,24305,24306,24311,24312,57501&projectId=6&calType=ical&nbWeeks=16"));
				$MAJ = fopen("MAJ.txt", "w+");
				fwrite($MAJ, date("H"));
			}
			
			// j'ouvre le fichier contenant les données agenda
            $data_windows = fopen('ADECal_windows.ics', 'r');
        
            // je récupère le nombre de lignes dans mon fichier
            $fichier = file('ADECal_windows.ics');
            $count = count($fichier);
			
			//initialisation de mes variables salle
			//par défaut, les salles sont libres
			$HP301[0] = "HP 301";
			$HP301[1] = "LIBRE";
			$HP301[2] = "";
			$HP301[3] = "";
			
			$HP306[0] = "HP 306";
			$HP306[1] = "LIBRE";
			$HP306[2] = "";
			$HP306[3] = "";
			
			$HP307[0] = "HP 307";
			$HP307[1] = "LIBRE";
			$HP307[2] = "";
			$HP307[3] = "";
			
			$HP316[0] = "HP 316";
			$HP316[1] = "LIBRE";
			$HP316[2] = "";			
			$HP316[3] = "";

			$HP318[0] = "HP 318";
			$HP318[1] = "LIBRE";
			$HP318[2] = "";
			$HP318[3] = "";
			
			$HP320[0] = "HP 320";
			$HP320[1] = "LIBRE";
			$HP320[2] = "";
			$HP320[3] = "";
			
            //tant que je n'ai pas parcouru tout le fichier, je boucle
            $i = 1;
            while ($i <= $count){
                //je récupère les 7 premières lettres de chaque ligne
				$DTSTART = "";
                for($j = 0 ; $j < 8 ; $j++){
                    $DTSTART .= fgetc($data_windows);
				}
				for ($j = 0 ; $j < 4 ; $j++){
					fgetc($data_windows);
				}
                //je récupère la date après "DTSTART"
				$mois = "";
                for ($k = 0 ; $k < 2 ; $k++){
                    $mois .= fgetc($data_windows);
                }
				$jour = "";
				for ($k = 0 ; $k < 2 ; $k++){
					$jour .= fgetc($data_windows);
				}
				
				$date = dateJour($jour, $mois);
				
				fgetc($data_windows);
				//je récupère l'heure et la minute de début  
				$heureDebut = "";
				for ($k = 0 ; $k < 2 ; $k++){
					$heureDebut .= fgetc($data_windows);
				}
				
				$minuteDebut = "";
				for ($k = 0 ; $k < 2 ; $k++){
					$minuteDebut .= fgetc($data_windows);
				}
				
				//on est sur la MAUVAISE LIGNE ou si le COURS EST FINI, on réinitialise les variables et on passe a la ligne suivante
                if (($DTSTART != "DTSTART:") or ($heure > heure($heureFin, $minuteFin))){
					$DTSTART = "";
					$mois = "";
					$jour = "";
					$heureDebut = "";
					$minuteDebut = "";
					$heureFin = "";
					$minuteFin = "";
					$nomSalle = "";
					fgets($data_windows);	
				//On est sur la BONNE LIGNE et il y a ACTUELLEMENT/PROCHAINEMENT cours
                }else{
					//on ignore les caractères qui concernent la date de fin (inutile)
					fgets($data_windows);					
					for ($j = 0 ; $j < 14 ; $j++){
						fgetc($data_windows);
					}
					
					//on enregistre l'heure et la minute de la fin
					fgetc($data_windows);
					$heureFin = "";
					for ($j = 0 ; $j < 2 ; $j++){
						$heureFin .= fgetc($data_windows);
					}
					$minuteFin = "";
					for ($j = 0 ; $j < 2 ; $j++){
						$minuteFin .= fgetc($data_windows);
					}
					
					//on enregistre le nom de la salle
					fgets($data_windows);
					fgets($data_windows);
					for ($j = 0 ; $j < 20 ; $j++){
						fgetc($data_windows);
					}
					for ($j = 0 ; $j < 6 ; $j++){
						$nomSalle .= fgetc($data_windows);
					}
					
					//opération pas propre (car on est sur des chaînes de caractères et non des entiers) pour mettre augmenter de 2 heures
					if($heureDebut < 8){
						$heureDebutTmp = "0";
						$heureDebut += 1;
						$heureDebutTmp .= $heureDebut;
						$heureDebut = $heureDebutTmp;
					}else{
						$heureDebut += 1;
					}
					if($heureFin < 8){
						$heureFinTmp = "0";
						$heureFin += 1;
						$heureFinTmp .= $heureFin;
						$heureFin = $heureFinTmp;
					}else{
						$heureFin += 1;
					}
					
					// écriture des informations concernant les salles si elles sont occupées
					if ($date == $dateJour){
						if ($nomSalle == "HP 301"){
							if (($heure >= heure($heureDebut, $minuteDebut)) && ($heure <= heure($heureFin, $minuteFin))){
								$HP301[0] = "HP 301";
								$HP301[1] = "OCCUP&Eacute;E";
								$HP301[2] = heure($heureDebut, $minuteDebut);
								$HP301[3] = heure($heureFin, $minuteFin);
							}
						}
						if ($nomSalle == "HP 306"){
							if (($heure >= heure($heureDebut, $minuteDebut)) && ($heure <= heure($heureFin, $minuteFin))){
								$HP306[0] = "HP 306";
								$HP306[1] = "OCCUP&Eacute;E";
								$HP306[2] = heure($heureDebut, $minuteDebut);
								$HP306[3] = heure($heureFin, $minuteFin);
							}
						}
						if ($nomSalle == "HP 307"){
							if (($heure >= heure($heureDebut, $minuteDebut)) && ($heure <= heure($heureFin, $minuteFin))){
								$HP307[0] = "HP 307";
								$HP307[1] = "OCCUP&Eacute;E";
								$HP307[2] = heure($heureDebut, $minuteDebut);
								$HP307[3] = heure($heureFin, $minuteFin);
							}
						}
						if ($nomSalle == "HP 316"){
							if (($heure >= heure($heureDebut, $minuteDebut)) && ($heure <= heure($heureFin, $minuteFin))){
								$HP316[0] = "HP 316";
								$HP316[1] = "OCCUP&Eacute;E";
								$HP316[2] = heure($heureDebut, $minuteDebut);
								$HP316[3] = heure($heureFin, $minuteFin);
							}
						}
						if ($nomSalle == "HP 318"){
							if (($heure >= heure($heureDebut, $minuteDebut)) && ($heure <= heure($heureFin, $minuteFin))){
								$HP318[0] = "HP 318";
								$HP318[1] = "OCCUP&Eacute;E";
								$HP318[2] = heure($heureDebut, $minuteDebut);
								$HP318[3] = heure($heureFin, $minuteFin);
							}
						}					
						if ($nomSalle == "HP 320"){
							if (($heure >= heure($heureDebut, $minuteDebut)) && ($heure <= heure($heureFin, $minuteFin))){
								$HP320[0] = "HP 320";
								$HP320[1] = "OCCUP&Eacute;E";
								$HP320[2] = heure($heureDebut, $minuteDebut);
								$HP320[3] = heure($heureFin, $minuteFin);
							}
						}
					}
					
					//on réinitialise les variables
					$DTSTART = "";
					$nomSalle = "";
					$mois = "";
					$heureDebut = "";
					$minuteDebut = "";					
					$heureFin = "";
					$minuteFin = "";
				}
                $i += 1;
            }
        
            // fermeture du fichier de données
            fclose($data_windows);
			
			// mise à jour de l'heure actuelle (besoin de h+2)
			$heureReelle = date("H");
			$heureReelle += 1;
			$heureReelle .= ":";
			$heureReelle .= date("i");
			
			
			// si on signale un bug
			if(!empty($_GET['description_bug'])){
				$data = fopen("bug.txt", "a+");
				$carnet_adresses = fopen("carnet_adresses.txt", "a+");
				
				// ajout de la nouvelle adresse mail
				$texte = "";
				$texte .= $_GET['email'];
				$texte .= "\n";
				
				fwrite($carnet_adresses, $texte);
				fclose($carnet_adresses);
				
				// concaténation des informations
				$texte = "";
				$texte .= $_GET['description_bug'];
				$texte .= "\n";
				$texte .= $_GET['email'];
				$texte .= "\n";
				
				fwrite($data, $texte);
				fclose($data);
			}
			
			// si on prend contact
			if(!empty($_GET['contact'])){
				$data = fopen("contact.txt", "a+");
				$carnet_adresses = fopen("carnet_adresses.txt", "a+");
				
				// ajout de la nouvelle adresse mail
				$texte = "";
				$texte .= $_GET['email'];
				$texte .= "\n";
				
				fwrite($carnet_adresses, $texte);
				fclose($carnet_adresses);
				
				// concaténation des informations
				$texte = "";
				$texte .= $_GET['contact'];
				$texte .= "\n";
				$texte .= $_GET['email'];
				$texte .= "\n";
				
				fwrite($data, $texte);
				fclose($data);
			}
        ?>
		
		<div class="jumbotron">
			<div class="container">
				<h3><strong><?php echo $heureReelle; ?></strong></h3>
				</br></br>
					<table class="table table-lg table-sm table-striped">
					<thead>
						<th scope="row">NOM DE LA SALLE</th>
						<th scope="col">DISPONIBILIT&Eacute;</th>
						<th scope="col">OCCUP&Eacute;E DE</th>			
						<th scope="col">&Agrave;</th>
					</thead>
<tbody>
						<tr>
							<td><?php echo $HP301[0]; echo "  (Windows)";?></td>	
							<td><?php if($HP301[1] == "LIBRE"){ echo "<v>"; echo $HP301[1];}else{echo "<r>"; echo $HP301[1];}?></td>			
							<td><?php if($HP301[1] == "LIBRE"){ echo "<v>"; echo $HP301[2];}else{echo "<r>"; echo $HP301[2];}?></td>			
							<td><?php if($HP301[1] == "LIBRE"){ echo "<v>"; echo $HP301[3];}else{echo "<r>"; echo $HP301[3];}?></td>			
						</tr>
						<tr>
							<td><?php echo $HP303[0]; echo "  (Ubuntu)";?></td>		
							<td><?php if($HP303[1] == "LIBRE"){ echo "<v>"; echo $HP303[1];}else{echo "<r>"; echo $HP303[1];}?></td>			
							<td><?php if($HP303[1] == "LIBRE"){ echo "<v>"; echo $HP303[2];}else{echo "<r>"; echo $HP303[2];}?></td>			
							<td><?php if($HP303[1] == "LIBRE"){ echo "<v>"; echo $HP303[3];}else{echo "<r>"; echo $HP303[3];}?></td>			
						</tr>
						<tr>
							<td><?php echo $HP306[0]; echo "  (Windows)"; ?></td>			
							<td><?php if($HP306[1] == "LIBRE"){ echo "<v>"; echo $HP306[1];}else{echo "<r>"; echo $HP306[1];}?></td>			
							<td><?php if($HP306[1] == "LIBRE"){ echo "<v>"; echo $HP306[2];}else{echo "<r>"; echo $HP306[2];}?></td>			
							<td><?php if($HP306[1] == "LIBRE"){ echo "<v>"; echo $HP306[3];}else{echo "<r>"; echo $HP306[3];}?></td>			
						</tr>	
						<tr>
							<td><?php echo $HP307[0]; echo "  (Windows)"; ?></td>			
							<td><?php if($HP307[1] == "LIBRE"){ echo "<v>"; echo $HP307[1];}else{echo "<r>"; echo $HP307[1];}?></td>			
							<td><?php if($HP307[1] == "LIBRE"){ echo "<v>"; echo $HP307[2];}else{echo "<r>"; echo $HP307[2];}?></td>			
							<td><?php if($HP307[1] == "LIBRE"){ echo "<v>"; echo $HP307[3];}else{echo "<r>"; echo $HP307[3];}?></td>			
						</tr>
						<tr>
							<td><?php echo $HP309[0]; echo "  (Ubuntu)"; ?></td>			
							<td><?php if($HP309[1] == "LIBRE"){ echo "<v>"; echo $HP309[1];}else{echo "<r>"; echo $HP309[1];}?></td>			
							<td><?php if($HP309[1] == "LIBRE"){ echo "<v>"; echo $HP309[2];}else{echo "<r>"; echo $HP309[2];}?></td>			
							<td><?php if($HP309[1] == "LIBRE"){ echo "<v>"; echo $HP309[3];}else{echo "<r>"; echo $HP309[3];}?></td>			
						</tr>
						<tr>
							<td><?php echo $HP310[0]; echo "  (Ubuntu)"; ?></td>			
							<td><?php if($HP310[1] == "LIBRE"){ echo "<v>"; echo $HP310[1];}else{echo "<r>"; echo $HP310[1];}?></td>			
							<td><?php if($HP310[1] == "LIBRE"){ echo "<v>"; echo $HP310[2];}else{echo "<r>"; echo $HP310[2];}?></td>			
							<td><?php if($HP310[1] == "LIBRE"){ echo "<v>"; echo $HP310[3];}else{echo "<r>"; echo $HP310[3];}?></td>			
						</tr>
						<tr>
							<td><?php echo $HP311[0]; echo "  (Ubuntu)"; ?></td>			
							<td><?php if($HP311[1] == "LIBRE"){ echo "<v>"; echo $HP311[1];}else{echo "<r>"; echo $HP311[1];}?></td>			
							<td><?php if($HP311[1] == "LIBRE"){ echo "<v>"; echo $HP311[2];}else{echo "<r>"; echo $HP311[2];}?></td>
							<td><?php if($HP311[1] == "LIBRE"){ echo "<v>"; echo $HP311[3];}else{echo "<r>"; echo $HP311[3];}?></td>
						</tr>
						<tr>
							<td><?php echo $HP312[0]; echo "  (Ubuntu)"; ?></td>			
							<td><?php if($HP312[1] == "LIBRE"){ echo "<v>"; echo $HP312[1];}else{echo "<r>"; echo $HP312[1];}?></td>			
							<td><?php if($HP312[1] == "LIBRE"){ echo "<v>"; echo $HP312[2];}else{echo "<r>"; echo $HP312[2];}?></td>			
							<td><?php if($HP312[1] == "LIBRE"){ echo "<v>"; echo $HP312[3];}else{echo "<r>"; echo $HP312[3];}?></td>			
						</tr>
						<tr>
							<td><?php echo $HP315[0]; echo "  (Ubuntu)"; ?></td>			
							<td><?php if($HP315[1] == "LIBRE"){ echo "<v>"; echo $HP315[1];}else{echo "<r>"; echo $HP315[1];}?></td>			
							<td><?php if($HP315[1] == "LIBRE"){ echo "<v>"; echo $HP315[2];}else{echo "<r>"; echo $HP315[2];}?></td>			
							<td><?php if($HP315[1] == "LIBRE"){ echo "<v>"; echo $HP315[3];}else{echo "<r>"; echo $HP315[3];}?></td>			
						</tr>
						<tr>
							<td><?php echo $HP316[0]; echo "  (Windows)"; ?></td>			
							<td><?php if($HP316[1] == "LIBRE"){ echo "<v>"; echo $HP316[1];}else{echo "<r>"; echo $HP316[1];}?></td>			
							<td><?php if($HP316[1] == "LIBRE"){ echo "<v>"; echo $HP316[2];}else{echo "<r>"; echo $HP316[2];}?></td>			
							<td><?php if($HP316[1] == "LIBRE"){ echo "<v>"; echo $HP316[3];}else{echo "<r>"; echo $HP316[3];}?></td>			
						</tr>
						<tr>
							<td><?php echo $HP318[0]; echo "  (Windows)"; ?></td>			
							<td><?php if($HP318[1] == "LIBRE"){ echo "<v>"; echo $HP318[1];}else{echo "<r>"; echo $HP318[1];}?></td>			
							<td><?php if($HP318[1] == "LIBRE"){ echo "<v>"; echo $HP318[2];}else{echo "<r>"; echo $HP318[2];}?></td>			
							<td><?php if($HP318[1] == "LIBRE"){ echo "<v>"; echo $HP318[3];}else{echo "<r>"; echo $HP318[3];}?></td>			
						</tr>	
						<tr>
							<td><?php echo $HP319[0]; echo "  (Ubuntu)"; ?></td>			
							<td><?php if($HP319[1] == "LIBRE"){ echo "<v>"; echo $HP319[1];}else{echo "<r>"; echo $HP319[1];}?></td>			
							<td><?php if($HP319[1] == "LIBRE"){ echo "<v>"; echo $HP319[2];}else{echo "<r>"; echo $HP319[2];}?></td>			
							<td><?php if($HP319[1] == "LIBRE"){ echo "<v>"; echo $HP319[3];}else{echo "<r>"; echo $HP319[3];}?></td>			
						</tr>			
						<tr>
							<td><?php echo $HP320[0]; echo "  (Windows)"; ?></td>			
							<td><?php if($HP320[1] == "LIBRE"){ echo "<v>"; echo $HP320[1];}else{echo "<r>"; echo $HP320[1];}?></td>			
							<td><?php if($HP320[1] == "LIBRE"){ echo "<v>"; echo $HP320[2];}else{echo "<r>"; echo $HP320[2];}?></td>			
							<td><?php if($HP320[1] == "LIBRE"){ echo "<v>"; echo $HP320[3];}else{echo "<r>"; echo $HP320[3];}?></td>			
						</tr>		
					</tbody>
				</table>
			</div>
		</div>
		</br></br>
		<div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-4 col-sm-4">
			<button type = "button" class="btn btn-default" onclick="libreoupas_description()"><h4><strong>libreoupas c'est quoi ?</strong></h4></button>
			<script>
				function libreoupas_description() {
					alert("libreoupas est un site répertoriant les salles informatiques Ubuntu et Windows de la FST accessibles aux étudiants, et indique si elles sont libre ou non\n\nAttention, il y a cependant une marge d'erreur (salle occupée sans que cela soit indiqué par l'administration, annulation / ajout / déplacement de cours de dernière minute, etc...)\n\nLe site est encore en développement, donc n'hésite pas à signaler tout problème sur l'onglet 'signaler un bug'\n\nDe plus, libreoupas est ouvert aux critiques, idées et avis constructifs à faire sur l'onglet 'contact'\n\nL'accès aux salles dépend des droits qui sont accordés à votre carte étudiant\n\nBonne utilisation :)");
				}
			</script>
		</div>	
		</br></br></br></br></br></br></br></br>
		<div class="col-lg-offset-1 col-lg-4 col-md-offset-1 col-md-4 col-sm-offset-1 col-sm-4">
				<a href="bug.php"><button type="button" class="btn btn-default"><h4><strong>signaler un bug</strong></h4></button></a>
		</div>
		<div class="col-lg-offset-2 col-lg-5 col-md-offset-2 col-md-5 col-sm-offset-2 col-sm-5">
				<a href="contact.php"><button type="button" class="btn btn-default"><h4><strong>contact</strong></h4></button></a>
		</div>
		</br></br></br></br></br></br></br></br>
    </body>
</html>