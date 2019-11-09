<?php
        include "assets/php/edt.php";
        include "assets/php/contact.php";
        include "assets/php/admin.php";
        include "assets/php/maj.php";

        function addContent($edt, $free, $type) {
            if (isset($_GET["tab"])) {
                switch ($_GET["tab"]) {
                    case "Contact": {
                        addContact();
                        break;
                    }
                    case "Statistiques": {
                        addAdmin();
                        break;
                    }
                    case "Dernières MAJ": {
                        addMaj();
                        break;
                    }
                    default: {
                        addEdt($edt, $free, $type);
                    }
                }
            } else {
                addEdt($edt, $free, $type);
            }
        }

?>
