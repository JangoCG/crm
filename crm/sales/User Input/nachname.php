<?php
if (empty(trim($_POST["nachname"]))) {
    $nachnameError = "Bitte geben Sie einen Nachnamen ein";

} elseif (!(ctype_alpha($_POST["nachname"]))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
    $nachnameError = "Bitte verwenden Sie nur Buchstaben für den Nachnamen";
} elseif (strlen(trim($_POST["nachname"])) < 2) {
    $nachnameError = "Der Nachname muss 2 Buchstaben oder mehr enthalten";
} elseif (strlen(trim($_POST["nachname"])) > 25) {
    $nachnameError = "Der Nachname darf nicht mehr als 25 Buchstaben enthalten";
} else {
    $nachname = trim($_POST["nachname"]);
}

?>