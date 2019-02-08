<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privat-Account anlegen</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="../assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="../assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<div id="wrapper">

    <?php
    include "sidebar.html";
    include "navigation-bar.html"
    ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <form action="PrivatAccountanlegen.php" method="post">
                    <h1>Privat-Account anlegen</h1><br>
                    <h4>Allgemeine Daten</h4><br>
                    <div>
                        <label style="width:109.6px;">Vorname</label>
                        <input type="text" name="vorname" value="<?php echo $vorname; ?>" class="ml-2" style="background-color:#ffffff;">
                        <span class="help-block"><?php echo $vornameError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Nachname</label>
                        <input type="text" name="nachname" value="<?php echo $nachname; ?>" class="ml-2" style="background-color:#ffffff;">
                        <span class="help-block"><?php echo $nachnameError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Firma</label>
                        <input type="text" name="firma" value="<?php echo $firma; ?>" class="ml-2"></div>
                    <span class="help-block"><?php echo $firmaError; ?></span>
                    <button class="btn btn-primary such-button" type="submit">Account anlegen</button>
            </div>
            <div class="col">
                <br><br><br><h4>Adressdaten</h4><br>
                <div>
                    <label style="width:109.6px;">Straße</label>
                    <input type="text" name="strasse" value="<?php echo $strasse; ?>" class="ml-2">
                    <span class="help-block"><?php echo $strasseError; ?></span>
                </div>
                <div>
                    <label style="width:109.6px;">PLZ</label>
                    <input type="text" name="plz" value="<?php echo $plz; ?>" class="ml-2">
                    <span class="help-block"><?php echo $plzError; ?></span>
                </div>
                <div>
                    <label style="width:109.6px;">Stadt</label>
                    <input type="text" name="stadt" value="<?php echo $stadt;?>" class="ml-2">
                    <span class="help-block"><?php echo $stadtError; ?></span>
                </div>
                <div>
                    <label style="width:109.6px;">Land</label>
                    <input type="text" name="land" value="<?php echo $land; ?>" class="ml-2">
                    <span class="help-block"><?php echo $landError; ?></span>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/Sidebar-Menu.js"></script>
</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: cengiz
 * Date: 23.11.18
 * Time: 00:09
 */

include("config.php");

//Variablen deklarieren und mit leeren Werten initalisieren

$vorname = "";
$vornameError = "";
$nachname = "";
$nachnameError = "";
$firma= "";
$firmaError= "";
$plz= "";
$plzError= "";
$land= "";
$strasse= "";
$strasseError= "";
$stadt= "";
$stadtError= "";
$geburtsdatum = "";
$geburtsdatumError = "";



//Diese IF Abfrage weil ich sonst Fehler bekommen, da beim ersten Aufruf noch kein post geschehen ist
if($_SERVER["REQUEST_METHOD"] == "POST") {

    //Abfrage für Vorname
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
    //Abfrage für Nachname
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

    //Abfrage für Firma
    if (empty(trim($_POST["firma"]))) {
        $firmaError = "Bitte geben Sie einen firman ein";

    } elseif (!(ctype_alpha($_POST["firma"]))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
        $firmaError = "Bitte verwenden Sie nur Buchstaben für die FIrma";
    } elseif (strlen(trim($_POST["firma"])) < 2) {
        $firmaError = "Der Firma muss 2 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["firma"])) > 25) {
        $firmaError = "Der Firma muss 25 Buchstaben oder weniger enthalten";
    } else {
        $firma = trim($_POST["firma"]);
    }

    //Abfrage für PLZ
    if (empty(trim($_POST["plz"]))) {
        $plzError = "Bitte geben Sie eine PLZ ein";
    } elseif (!(ctype_digit ($_POST["plz"]))) { //ctype_alpha prüft ob nur aus zahlen besteht
        $plzError = "Bitte verwenden Sie nur Buchstaben für die PLZ";
    } elseif (strlen(trim($_POST["plz"])) < 5) {
        $plzError = "Der PLZ muss 2 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["plz"])) > 5) {
        $plzError = "Der PLZ muss 25 Buchstaben oder weniger enthalten";
    } else {
        $plz = trim($_POST["plz"]);
    }


    //Abfrage für Land

    if (empty(trim($_POST["land"]))) {
        $landError = "Bitte geben Sie einen landn ein";

    } elseif (!(ctype_alpha($_POST["land"]))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
        $landError = "Bitte verwenden Sie nur Buchstaben für den landn";
    } elseif (strlen(trim($_POST["land"])) < 2) {
        $landError = "Der land muss 2 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["land"])) > 25) {
        $landError = "Der land muss 25 Buchstaben oder weniger enthalten";
    } else {
        $land = trim($_POST["land"]);
    }

    //Abfrage für Straße

    if (empty(trim($_POST["strasse"]))) {
        $strasseError = "Bitte geben Sie einen strassen ein";

    } elseif (!(ctype_alpha($_POST["strasse"]))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
        $strasseError = "Bitte verwenden Sie nur Buchstaben für den strassen";
    } elseif (strlen(trim($_POST["strasse"])) < 2) {
        $strasseError = "Der strasse muss 2 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["strasse"])) > 25) {
        $strasseError = "Der strasse muss 25 Buchstaben oder weniger enthalten";
    } else {
        $strasse = trim($_POST["strasse"]);
    }

    //Abfrage für Stadt

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
    if(empty($vornameError) && empty($nachnameError) && empty($firmaError) && empty($plzError) && empty($landError) && empty($strasseError) && empty($stadtError)) {

        //SQL Statement Variable übergeben
        $sqlStatement = "INSERT INTO test (Vorname, Nachname,Firma, PLZ, Land, Strasse, Stadt) 
                     VALUES ('$vorname', '$nachname', '$firma', '$plz', '$land', '$strasse', '$stadt')";

        //SQL Insert durchführen mit mysqli query
        if(mysqli_query($connection, $sqlStatement)) {
            echo "Account erfolgreich angelegt";
        } else {
            echo "Error:" .$sqlStatement . "<br>" . mysqli_error($connection);
        }
    }
}

?>