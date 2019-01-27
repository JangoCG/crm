<?php
if (empty(trim($_POST["strasse"]))) {
    $strasseError = "Bitte geben Sie eine Strasse ein ein";
} elseif (!ctype_alpha(str_replace(' ', '', $_POST["strasse"]))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
    $strasseError = "Bitte verwenden Sie nur Buchstaben für die Strasse";
} elseif (strlen(trim($_POST["strasse"])) < 2) {
    $strasseError = "Der Strasse muss 2 Buchstaben oder mehr enthalten";
} elseif (strlen(trim($_POST["strasse"])) > 25) {
    $strasseError = "Der Strasse muss 25 Buchstaben oder weniger enthalten";
} else {
    $strasse = trim($_POST["strasse"]);
}
 ?>