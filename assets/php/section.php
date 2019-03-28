<?php
        include "assets/php/edt.php";
        include "assets/php/contact.php";
        include "assets/php/admin.php";

        function addContent($edt, $libre) {
            if (isset($_GET["tab"])) {
                switch ($_GET["tab"]) {
                    case "Contact": {
                        addContact();
                        break;
                    }
                    case "Administrateur": {
                        addAdmin();
                        break;
                    }
                    default: {
                        addEdt($edt, $libre);
                    }
                }
            } else {
                addEdt($edt, $libre);
            }
        }

?>
