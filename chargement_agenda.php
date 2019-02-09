<?php

//TODO : pour + de rapidité on pourrait enregistrer le tableau généré plus bas dans un fichier en utilisant var_export()

//si le fichier agenda n'existe pas ou n'a pas été téléhargé depuis plus de 4h (60 * 60 * 4 = 14400)
if(!(file_exists("agenda.ics") && (time() - filemtime('agenda.ics')) < 14400))
{
	//recupère les ressources sur le site de l'université
	$url = 'https://planning.univ-lorraine.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?'
		.'resources=24302,24303,24307,24308,24309,24310,24314,24304,24305,24306,24311,24312,57501&projectId=6&calType=ical&nbWeeks=1';
	$file = fopen('agenda.ics', 'w+');

	//on garde une copie locale pour soulager le serveur de l'univ
	fwrite($file, @file_get_contents($url));
	fclose($file);
}

// on ouvre le fichier contenant les données agenda
$data = fopen('agenda.ics', 'r');

// initialisation de la date et de l'heure actuelle
$dateJour = date('d');
$heureReelle = date('H') + (date('i') / 60.0);

//initialisation de l'edt, ex $edt["HP 310"][1] corresponds au 2eme cours de la journée en salle HP 310
$salles = array("HP 303", "HP 309", "HP 310", "HP 311", "HP 312", "HP 315", "HP 319", "HP 301", "HP 306", "HP 307", "HP 316", "HP 318", "HP 320");
foreach($salles as $salle)
{
	$edt[$salle] = array();
	$libre[$salle] = true;
}

//decallage de l'agenda téléchargé
$offsetHeure = 1;

//tant que l'on a pas parcouru tout le fichier, on boucle
while (($ligne = fgets($data)) !== false)
{
	//on récupère les 7 premières lettres de chaque ligne
	$key = substr($ligne, 0, 7);

	//si la clé corresponds à la ligne indiquant le début du cours
    if ($key == "DTSTART")
    {
		$jour = substr($ligne, 14, 2); //jour auquel le cours a lieu
		$heureDebut = intval(substr($ligne, 17, 2)) + $offsetHeure;
		$minuteDebut = intval(substr($ligne, 19, 2));

		//on passe a la ligne suivante (DTEND)
		$ligne = fgets($data);
		
		//on enregistre l'heure et la minute de la fin
		$heureFin = intval(substr($ligne, 15, 2)) + $offsetHeure;
		$minuteFin = intval(substr($ligne, 17, 2));
		
		//on passe 2 lignes (LOCATION)
		fgets($data);
		$ligne = fgets($data);
		
		$nomSalle = substr($ligne, 20, 6);

		//ce cours a lieu aujourd'hui et a une salle définie, on l'ajoute à l'edt
		if($jour == $dateJour && $nomSalle !== false)
		{
			$indexCours = count($edt[$nomSalle]); //index du cours dans cette salle
			
			$edt[$nomSalle][$indexCours]['debut'] = $heureDebut + ($minuteDebut / 60.0); //ex 10h15 = 10.25
			$edt[$nomSalle][$indexCours]['fin'] = $heureFin + ($minuteFin / 60.0);

			$texte = ($heureDebut < 10 ? '0' : '').$heureDebut.':'
				.($minuteDebut < 10 ? '0' : '').$minuteDebut.'<br>'
				.($heureFin < 10 ? '0' : '').$heureFin.':'
				.($minuteFin < 10 ? '0' : '').$minuteFin;
			$edt[$nomSalle][$indexCours]['affichage'] = $texte;

			//si l'heure actuelle est comprise entre l'heure de début et l'heure de fin, la salle n'est pas libre
			if($heureReelle > $edt[$nomSalle][$indexCours]['debut'] && $heureReelle < $edt[$nomSalle][$indexCours]['fin'])
				$libre[$nomSalle] = false;
		}
	}
}

//fermeture du fichier de données
fclose($data);
?>