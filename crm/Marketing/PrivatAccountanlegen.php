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
$firma = "";
$firmaError = "";
$strasse = "";
$strasseError = "";
$land = "";
$landError = "";
$plz = "";
$plzError = "";
$strasse = "";
$strasseError = "";
$geburtsdatum = "";
$geburtsdatumError = "";
$stadt = "";
$stadtError = "";


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
    // Abfrage für Nachname
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
    // Abfrage für Firma
    if (empty(trim($_POST["firma"]))) {
        $firmaError = "Bitte geben Sie einen Firmennamen ein";

    } elseif (!(ctype_alpha($_POST["firma"]))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
        $firmaError = "Bitte verwenden Sie nur Buchstaben für die Firma";
    } elseif (strlen(trim($_POST["firma"])) < 2) {
        $firmaError = "Die Firma muss 2 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["firma"])) > 25) {
        $firmaError = "Die Firma muss 25 Buchstaben oder weniger enthalten";
    } else {
        $firma = trim($_POST["firma"]);
    }


    // Abfrage für PLZ
    if (empty(trim($_POST["plz"]))) {
        $plzError = "Bitte geben Sie eine Postleitzahl ein";
    } elseif (strlen(trim($_POST["plz"])) < 5) {
        $plzError = "Die Postleitzahl muss 5 Zahlen enthalten";
    } elseif (strlen(trim($_POST["plz"])) > 5) {
        $plzError = "Die Postleitzahl muss 5 Zahlen enthalten";
    } else {
        $plz = trim($_POST["plz"]);
    }

    // Abfrage für Land
    if (empty(trim($_POST["land"]))) {
    } elseif (!(ctype_alpha($_POST["land"]))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
        $landError = "Bitte geben Sie ein Land ein";
    } elseif (strlen(trim($_POST["land"])) < 4) {
        $landError = "Das Land muss 4 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["land"])) > 25) {
        $landError = "Das Land muss 25 Buchstaben oder weniger enthalten";
    } else {
        $land = trim($_POST["land"]);
    }

    // Abfrage für Straße
    if (empty(trim($_POST["strasse"]))) {
        $strasseError = "Bitte geben Sie ein Straße ein";
    } elseif (strlen(trim($_POST["strasse"])) < 4) {
        $strasseError = "Die Straße muss 4 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["strasse"])) > 25) {
        $strasseError = "Die Straße muss 25 Buchstaben oder weniger enthalten";
    } else {
        $strasse = trim($_POST["strasse"]);
    }

    // Abfrage für Geburtsdatum
    if (empty(trim($_POST["geburtsdatum"]))) {
        $geburtsdatumError = "Bitte geben Sie das Geburtsdatum ein mit der Syntax: YYYY-MM-DD ";
    } elseif (strlen(trim($_POST["geburtsdatum"])) == date()) {
        $geburtsdatumError = "Syntax für das Geburtsdatum: YYYY-MM-DD";
    } else {
        $geburtsdatum = trim($_POST["geburtsdatum"]);
    }

    // Abfrage für Stadt
    if (empty(trim($_POST["stadt"]))) {
    } elseif (!(ctype_alpha($_POST["stadt"]))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
        $stadtError = "Bitte geben Sie die Stadt ein";
    } elseif (strlen(trim($_POST["stadt"])) < 4) {
        $stadtError = "Die Stadt muss 4 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["stadt"])) > 25) {
        $stadtError = "Die Stadt muss 25 Buchstaben oder weniger enthalten";
    } else {
        $stadt = trim($_POST["stadt"]);
    }

    //Vordem Insert überprüfen ob Fehler vorhanden sind
    if(empty($vornameError) && empty($nachnameError) && empty($firmaError) && empty($plzError) && empty($landError) && empty($strasseError) && empty($geburtsdatumError) && empty($stadtError)){

        //SQL Statement Variable übergeben
        $sqlStatement = "INSERT INTO test (Vorname, Nachname, Firma, PLZ, Land, Strasse, Geburtsdatum, Stadt) 
                     VALUES ('$vorname', '$nachname', '$firma', '$plz', '$land', '$strasse', '$geburtsdatum', '$stadt')";

        //SQL Insert durchführen mit mysqli query
        if(mysqli_query($connection, $sqlStatement)) {
            echo "Account erfolgreich angelegt";
        } else {
            echo "Error:" .$sqlStatement . "<br>" . mysqli_error($connection);
        }
    }
}

?>

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
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>


<body>
<div id="wrapper">
    <div id="sidebar-wrapper" style="background-color:#37434d;">
        <h1>MarketingPro</h1>
        <div class="mt-5">
            <div class="dropdown amk-border"><a class="btn btn-primary dropdown-toggle kein-rahmen" data-toggle="dropdown" aria-expanded="false" role="button" href="#">Accounts & Produkte</a>
                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="ProduktAnlegen.html">Produkt anlegen</a><a class="dropdown-item" role="presentation" href="ProduktSuchen.html">Produkt suchen</a><a class="dropdown-item" role="presentation" href="PrivatAccountanlegen.php">Privat-Account anlegen</a><a class="dropdown-item" role="presentation" href="PrivatAccountsuchen.php">Privat-Account suchen</a></div>
            </div>
            <div class="dropdown"><button class="btn btn-primary dropdown-toggle kein-rahmen" data-toggle="dropdown" aria-expanded="false" type="button" style="width:248px;">Marketing</button>
                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">Leads anlegen</a><a class="dropdown-item" role="presentation" href="#">Leads suchen</a><a class="dropdown-item" role="presentation" href="#">Kampagne anlegen</a><a class="dropdown-item" role="presentation" href="#">Kampagne suchen</a><a class="dropdown-item" role="presentation" href="#">Marketingplan anlegen</a><a class="dropdown-item" role="presentation" href="#">Marketingplan suchen</a></div>
            </div>
        </div>
        <div></div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col text-right" style="background-color:#37434d;"><input type="search" placeholder="Suchbegriff eingeben" id="grossesFeld"><button class="btn btn-primary ml-2 mt-1 mb-1" type="button">Button</button></div>
        </div>


        <div class="row">
            <div class="col">
                <form action="PrivatAccountanlegen.php" method="post">
                    <h2>Privat-Account anlegen</h2><br>
                    <b>Allgemeine Daten</b><br><br>
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
                        <label style="width:109.6px;">Geburtsdatum</label>
                        <input type="text" name="geburtsdatum" value="YYYY-MM-DD" class="ml-2" style="background-color:#ffffff;">
                        <span class="help-block"><?php echo $geburtsdatumError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Firma</label>
                        <input type="text" name="firma" value="<?php echo $firma; ?>" class="ml-2" style="background-color:#ffffff;">
                        <span class="help-block"><?php echo $firmaError; ?></span>
                    </div>
            </div>
            <div class="col"><br><br><br>
                <b>Hauptadresse und Kommunikationsdaten</b><br><br>
                <div>
                    <label style="width:109.6px;">PLZ</label>
                    <input type="text" name="plz" value="<?php echo $plz; ?>" class="ml-2" style="background-color:#ffffff;">
                    <span class="help-block"><?php echo $plzError; ?></span>
                </div>
                <div>
                    <label style="width:109.6px;">Land</label>
                    <input type="text" name="land" value="<?php echo $land; ?>" class="ml-2" style="background-color:#ffffff;">
                    <span class="help-block"><?php echo $landError; ?></span>
                </div>
                <div>
                    <label style="width:109.6px;">Stadt</label>
                    <input type="text" name="stadt" value="<?php echo $stadt; ?>" class="ml-2" style="background-color:#ffffff;">
                    <span class="help-block"><?php echo $stadtError; ?></span>
                </div>
                <div>
                    <label style="width:109.6px;">Straße</label>
                    <input type="text" name="strasse" value="<?php echo $strasse; ?>" class="ml-2" style="background-color:#ffffff;">
                    <span class="help-block"><?php echo $strasseError; ?></span>
                </div><button class="btn btn-primary such-button" type="submit">Account anlegen</button></div>
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

