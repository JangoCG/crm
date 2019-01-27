<?php

if (empty(trim($_POST["land"]))) {
    $landError = "Bitte geben Sie ein Land ein";

} elseif (!(ctype_alpha($_POST["land"]))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
    $landError = "Bitte verwenden Sie nur Buchstaben für das Land";
} elseif (strlen(trim($_POST["land"])) < 2) {
    $landError = "Der Name vom Land muss mehr als 2 Buchstaben enthalten";
} elseif (strlen(trim($_POST["land"])) > 25) {
    $landError = "Name vom Land darf nicht mehr als 25 Buchstaben enthalten";
} else {
    $land = trim($_POST["land"]);
}

?>