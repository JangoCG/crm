<?php

if (empty(trim($_POST["plz"]))) {
    $plzError = "Bitte geben Sie eine PLZ ein";

} elseif (!(ctype_digit ($_POST["plz"]))) { //ctype_alpha prüft ob nur aus zahlen besteht
    $plzError = "Bitte verwenden Sie nur Zahlen für die PLZ";
} elseif (strlen(trim($_POST["plz"])) < 5) {
    $plzError = "Bitte geben Sie eine gültige PLZ ein";
} elseif (strlen(trim($_POST["plz"])) > 5) {
    $plzError = "Die PLZ darf höchsten 5 Zahlen enthalten";
} else {
    $plz = trim($_POST["plz"]);
}

?>