<?php
if (empty(trim($_POST["firma"]))) {
    $firmaError = "Bitte geben Sie eine Firma ein";

} elseif (!ctype_alpha(str_replace(' ', '', $_POST["firma"]))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
    $firmaError = "Bitte verwenden Sie nur Buchstaben für die Firma";
} elseif (strlen(trim($_POST["firma"])) < 2) {
    $firmaError = "Der Firma muss 2 Buchstaben oder mehr enthalten";
} elseif (strlen(trim($_POST["firma"])) > 25) {
    $firmaError = "Die Firma darf nur weniger als 25 Buchstaben enthalten";
} else {
    $firma = trim($_POST["firma"]);
}

?>