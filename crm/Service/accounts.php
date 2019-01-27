<?php
include("config.php");
//Variablen deklarieren und mit leeren Werten initalisieren
$vorname = "";
$vornameError = "";
$nachname = "";
$nachnameError = "";
$firma = "";
$firmaError = "";
$plz = "";
$plzError = "";
$land = "";
$landError = "";
$strasse = "";
$strasseError = "";
$hausnummer = "";
$hausnummerError = "";
$stadt = "";
$stadtError = "";
//Diese IF Abfrage weil ich sonst Fehler bekommen, da beim ersten Aufruf noch kein post geschehen ist
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Vorname
    if (empty(trim($_POST["vorname"]))) {
        $vornameError = "Bitte geben Sie einen Vornamen ein";
    } elseif (!(ctype_alpha($_POST["vorname"]))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
        $vornameError = "Bitte verwenden Sie nur Buchstaben für den Vornamen";
    } elseif (strlen(trim($_POST["vorname"])) < 2) {
        $vornameError = "Der Vorname muss 2 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["vorname"])) > 25) {
        $vornameError = "Der Vorname muss 25 Buchstaben oder weniger enthalten";
    } else {
        $vorname = trim($_POST["vorname"]);
    }
    //Nachname
    if (empty(trim($_POST["nachname"]))) {
        $nachnameError = "Bitte geben Sie einen nachnamen ein";
    } elseif (!(ctype_alpha($_POST["nachname"]))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
        $nachnameError = "Bitte verwenden Sie nur Buchstaben für den nachnamen";
    } elseif (strlen(trim($_POST["nachname"])) < 2) {
        $nachnameError = "Der nachname muss 2 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["nachname"])) > 25) {
        $nachnameError = "Der nachname muss 25 Buchstaben oder weniger enthalten";
    } else {
        $nachname = trim($_POST["nachname"]);
    }
    //Rolle

    foreach ($_POST['rolle'] as $rolle) {
        echo $rolle;
    }
    //Firma
    if (empty(trim($_POST["firma"]))) {
        $firmaError = "Bitte geben Sie eine Firma ein";
    } elseif (strlen(trim($_POST["firma"])) < 2) {
        $firmaError = "Der firma muss 2 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["firma"])) > 25) {
        $firmaError = "Der firma muss 25 Buchstaben oder weniger enthalten";
    } else {
        $firma = trim($_POST["firma"]);
    }
    //PLZ
    if (empty(trim($_POST["plz"]))) {
        $plzError = "Bitte geben Sie einen PLZ ein";
    } elseif (!(ctype_digit($_POST["plz"]))) { //ctype_alpha prüft ob nur aus zahlen besteht
        $plzError = "Bitte verwenden Sie nur Buchstaben für den PLZ";
    } elseif (strlen(trim($_POST["plz"])) < 5) {
        $plzError = "Die PLZ muss genau 5 Buchstaben enthalten";
    } elseif (strlen(trim($_POST["plz"])) > 5) {
        $plzError = "Die PLZ muss genau 5 Buchstaben enthalten";
    } else {
        $plz = trim($_POST["plz"]);
    }
    //Land
    if (empty(trim($_POST["land"]))) {
        $landError = "Bitte geben Sie eine Land ein";
    } elseif (!(ctype_alpha($_POST["land"]))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
        $landError = "Bitte verwenden Sie nur Buchstaben für das Land";
    } elseif (strlen(trim($_POST["land"])) < 2) {
        $landError = "Das Land muss 2 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["land"])) > 25) {
        $landError = "Das Land muss 25 Buchstaben oder weniger enthalten";
    } else {
        $land = trim($_POST["land"]);
    }
    //Straße
    if (empty(trim($_POST["strasse"]))) {
        $strasseError = "Bitte geben Sie eine Straße ein";
    } elseif (!(ctype_alpha($_POST["strasse"]))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
        $strasseError = "Bitte verwenden Sie nur Buchstaben für die Straßen";
    } elseif (strlen(trim($_POST["strasse"])) < 2) {
        $strasseError = "Die Straße muss 2 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["strasse"])) > 25) {
        $strasseError = "Die Straße muss 25 Buchstaben oder weniger enthalten";
    } else {
        $strasse = trim($_POST["strasse"]);
    }
    //Hausnummer
    if (empty(trim($_POST["hausnummer"]))) {
        $hausnummerError = "Bitte geben Sie eine Hausnummer ein";
    } else if (!(ctype_digit($_POST["hausnummer"]))) {
        $hausnummerError = "Bitte geben Sie nur Zahlen ein";
    } else if ($_POST["hausnummer"] < 1) {
        $hausnummerError = "Bitte geben Sie eine gültige Hausnummer an";
    } else if ($_POST["hausnummer"] > 999) {
        $hausnummerError = "Bitte geben Sie eine gültige Hausnummer an";
    } else {
        $hausnummer = $_POST["hausnummer"];
    }
    //Stadt
    if (empty(trim($_POST["stadt"]))) {
        $stadtError = "Bitte geben Sie einen stadtn ein";
    } elseif (!(ctype_alpha($_POST["stadt"]))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
        $stadtError = "Bitte verwenden Sie nur Buchstaben für den stadtn";
    } elseif (strlen(trim($_POST["stadt"])) < 2) {
        $stadtError = "Der stadt muss 2 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["stadt"])) > 25) {
        $stadtError = "Der stadt muss 25 Buchstaben oder weniger enthalten";
    } else {
        $stadt = trim($_POST["stadt"]);
    }
    //Vordem Insert überprüfen ob Fehler vorhanden sind
    if (empty($vornameError) && empty($nachnameError) && empty($firmaError) && empty($plzError) && empty($landError) && empty($strasseError) && empty($hausnummerError) && empty($stadtError)) {
        //Überprüfung ob Account schon existiert
        $sqlPrüfen = "SELECT Vorname, Nachname, PLZ, Strasse, Hausnummer FROM account 
                      WHERE (Vorname = '$vorname') AND (Nachname = '$nachname') AND (PLZ = '$plz') AND (Strasse = '$strasse') AND (Hausnummer = '$hausnummer')";
        $resultPrüfen = mysqli_query($connection, $sqlPrüfen);
        if (mysqli_num_rows($resultPrüfen) >= 1) {
            $datenbankError = "Bitte legen Sie einen noch nicht vorhandenen Account an";
        } else {
            //SQL Statement Variable übergeben
            $sqlStatement = "INSERT INTO account (Vorname, Nachname, Rolle, Firma, PLZ, Land, Strasse, Hausnummer, Stadt) 
                     VALUES ('$vorname','$nachname', '$rolle', '$firma', '$plz', '$land', '$strasse', '$hausnummer', '$stadt')";
            //SQL Insert durchführen mit mysqli query
            if (mysqli_query($connection, $sqlStatement)) {
                echo "Account erfolgreich angelegt";
            } else {
                echo "Error:" . $sqlStatement . "<br>" . mysqli_error($connection);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>andisos</title>
    <?php
    include 'template/navigation-head.html';
    ?>
</head>

<body>
<div id="wrapper">
    <?php
    include 'template/navigation-body.html';
    ?>
    <div class="row">
        <form action="accounts.php" method="post">

            <div class="col">
                <h1>Account anlegen</h1>
                <div class="one"><h4>Allgemeine Daten</h4></div>
                <div class="one-container">
                    <div>
                        <label style="width:109.6px;">Vorname</label>
                        <input type="text" name="vorname" value="<?php echo $vorname; ?>" class="ml-2"
                               style="background-color:#ffffff;">
                        <span class="help-block"><?php echo $vornameError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Nachname</label>
                        <input type="text" name="nachname" value="<?php echo $nachname; ?>" class="ml-2"
                               style="background-color:#ffffff;">
                        <span class="help-block"><?php echo $nachnameError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Rolle</label>
                        <select id="rolle" name="rolle[]" class="ml-2">
                            <option>Lieferant</option>
                            <option>Kunde</option>
                            <option>Spediteur</option>
                        </select>
                        <span class="help-block"><?php echo $rolleError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Firma</label>
                        <input type="text" name="firma" value="<?php echo $firma; ?>" class="ml-2">
                        <span class="help-block"><?php echo $firmaError; ?></span>
                    </div>
                </div>
            </div>
            <div class="col">
                <h1>&nbsp;</h1>
                <div class="one"><h4>Adressinformationen</h4></div>
                <div class="one-container">
                    <div>
                        <label style="width:109.6px;">Straße</label>
                        <input type="text" name="strasse" value="<?php echo $strasse; ?>" class="ml-2">
                        <span class="help-block"><?php echo $strasseError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Hausnummer</label>
                        <input type="text" name="hausnummer" value="<?php echo $hausnummer; ?>"
                               class="ml-2 kleines-feld">
                        <span class="help-block"><?php echo $hausnummerError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">PLZ</label>
                        <input type="text" name="plz" value="<?php echo $plz; ?>" class="ml-2">
                        <span class="help-block"><?php echo $plzError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Stadt</label>
                        <input type="text" name="stadt" value="<?php echo $stadt; ?>" class="ml-2">
                        <span class="help-block"><?php echo $stadtError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Land</label>
                        <input type="text" name="land" value="<?php echo $land; ?>" class="ml-2">
                        <span class="help-block"><?php echo $landError; ?></span>
                        <button class="btn btn-primary such-button" type="submit">Account anlegen</button>
                        <span class="help-block"><?php echo $datenbankError; ?></span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>

</html>