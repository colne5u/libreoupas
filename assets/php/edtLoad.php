<?php
    // If no file or not recently updated (4h)
	if (!(file_exists("assets/ics/agenda.ics") && (time() - filemtime('assets/ics/agenda.ics')) < 14400)) {
        // University's file
		$url = "https://planning.univ-lorraine.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?resources=24302,24303,24308,24310,24314,24307,24309,57501,24312,24311,24306,24305,24304&projectId=7&calType=ical&nbWeeks=1";
		$file = fopen('assets/ics/agenda.ics', 'w+');

        // Local's copy
		$content = file_get_contents($url, true);
		fwrite($file, $content);
		fclose($file);
	}

	$data = fopen('assets/ics/agenda.ics', 'r');
	$today = date('d');
	$hour = date('H') + (date('i') / 60.0);

	$rooms = array("HP 301" => "Windows",
                   "HP 302" => "Windows",
                   "HP 303" => "Linux",
                   "HP 306" => "Windows",
                   "HP 307" => "Windows",
                   "HP 309" => "Linux",
                   "HP 310" => "Linux",
                   "HP 311" => "Linux",
                   "HP 312" => "Linux",
                   "HP 315" => "Linux",
                   "HP 316" => "Windows",
                   "HP 318" => "Windows",
                   "HP 319" => "Linux",
                   "HP 320" => "Windows");
	foreach ($rooms as $room => $roomType) {
		$edt[$room] = array();
        $type[$room] = $roomType;
		$free[$room] = 1;
	}

	$hourOffset = 1; // = 1 en heure d'hiver, = 2 en heur d'été 
	while (($line = fgets($data)) !== false) {
		$key = substr($line, 0, 7);

	    if ($key == "DTSTART") {
            $day = substr($line, 14, 2);
            // Event's start
			$startHour = intval(substr($line, 17, 2)) + $hourOffset;
			$startMin  = intval(substr($line, 19, 2));

            // Event's end
			$line = fgets($data);
			$endHour = intval(substr($line, 15, 2)) + $hourOffset;
			$endMin  = intval(substr($line, 17, 2));

			// Trash location + Event's name
			fgets($data);
			$line = fgets($data);
			$name = substr($line, 20, 6);

			if ($day == $today && $name !== false) {
				@$index = count($edt[$name]); //index du cours dans cette salle

				$edt[$name][$index]['start'] = $startHour + ($startMin / 60.0); //ex 10h15 = 10.25
				$edt[$name][$index]['end'] = $endHour + ($endMin / 60.0);

				$text = ($startHour < 10 ? '0' : '') . $startHour . ':'
					   .($startMin  < 10 ? '0' : '') . $startMin  . '<br/>'
					   .($endHour   < 10 ? '0' : '') . $endHour   . ':'
					   .($endMin    < 10 ? '0' : '') . $endMin;
				$edt[$name][$index]['text'] = $text;
			}
		}
        foreach ($edt as $name => $roomEdt) {
            foreach ($roomEdt as $range) {
            	if($roomEdt != "HP 12" && $roomEdt != "VG SC") {
					if ($hour > intval($range['start']) && $hour < $range['end']) {
						$free[$name] = 0;
						$maybeFree = true;
						foreach ($roomEdt as $tmpRange) {
							if ($hour + 0.5 >= intval($tmpRange['start']) && $hour + 0.5 <= $tmpRange['end']) {
								$maybeFree = false;
							}
						}
						if ($maybeFree) {
							$free[$name] = 2;
						}
					}
				}
            }
        }
	}

	fclose($data);
?>
