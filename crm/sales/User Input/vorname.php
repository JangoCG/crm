<?php
$vorname = $_POST['vorname'];

if (empty(trim($vorname))) {
    $vornameError = "Bitte geben Sie einen Vornamen ein";
} elseif (!(ctype_alpha($vorname))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
    $vornameError = "Bitte verwenden Sie nur Buchstaben für den Vornamen";
} elseif (strlen(trim($vorname)) < 2) {
    $vornameError = "Der Vorname muss 2 Buchstaben oder mehr enthalten";
} elseif (strlen(trim($vorname)) > 25) {
    $vornameError = "Der Vorname muss 25 Buchstaben oder weniger enthalten";
} else {
    $vorname = trim($vorname);
}

?>