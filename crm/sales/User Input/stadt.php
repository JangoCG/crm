<?php
if (empty(trim($_POST["stadt"]))) {
    $stadtError = "Bitte geben Sie einen Stadt ein";

} elseif (!(ctype_alpha($_POST["stadt"]))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
    $stadtError = "Bitte verwenden Sie nur Buchstaben für die Stadt";
} elseif (strlen(trim($_POST["stadt"])) < 2) {
    $stadtError = "Die Stadt muss 2 Buchstaben oder mehr enthalten";
} elseif (strlen(trim($_POST["stadt"])) > 25) {
    $stadtError = "Die Stadt muss 25 Buchstaben oder weniger enthalten";
} else {
    $stadt = trim($_POST["stadt"]);
}
?>