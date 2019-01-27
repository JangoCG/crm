<?php
if (empty(trim($_POST["hausNummer"]))) {
    $hausNummerError = "Bitte geben Sie einen hausNummern ein";

} elseif (!(ctype_digit ($_POST["hausNummer"]))) { //ctype_alpha prüft ob nur aus zahlen besteht
    $hausNummerError = "Bitte verwenden Sie nur Buchstaben für den hausNummern";
} else {
    $hausNummer = trim($_POST["hausNummer"]);
}

?>