<?php
/**
 * Created by PhpStorm.
 * User: cengiz
 * Date: 23.11.18
 * Time: 00:09
 */

include("config.php");

//Variablen deklarieren und mit leeren Werten initalisieren

$vorname ="";
$vornameError ="";
$nachname ="";
$nachnameError ="";
$firma="";
$firmaError="";
$plz="";
$plzError="";
$land="";
$strasse="";
$strasseError="";
$stadt="";
$stadtError="";



//Diese IF Abfrage weil ich sonst Fehler bekommen, da beim ersten Aufruf noch kein post geschehen ist
if($_SERVER["REQUEST_METHOD"] == "POST") {

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

    //Firma
    if (empty(trim($_POST["firma"]))) {
        $firmaError = "Bitte geben Sie einen firman ein";

    } elseif (!(ctype_alpha($_POST["firma"]))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
        $firmaError = "Bitte verwenden Sie nur Buchstaben für den firman";
    } elseif (strlen(trim($_POST["firma"])) < 2) {
        $firmaError = "Der firma muss 2 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["firma"])) > 25) {
        $firmaError = "Der firma muss 25 Buchstaben oder weniger enthalten";
    } else {
        $firma = trim($_POST["firma"]);
    }

    //PLZ
    if (empty(trim($_POST["plz"]))) {
        $plzError = "Bitte geben Sie einen plzn ein";

    } elseif (!(ctype_digit ($_POST["plz"]))) { //ctype_alpha prüft ob nur aus zahlen besteht
        $plzError = "Bitte verwenden Sie nur Buchstaben für den plzn";
    } elseif (strlen(trim($_POST["plz"])) < 5) {
        $plzError = "Der plz muss 2 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["plz"])) > 5) {
        $plzError = "Der plz muss 25 Buchstaben oder weniger enthalten";
    } else {
        $plz = trim($_POST["plz"]);
    }


    //Land

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

    //Straße

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
    if(empty($vornameError) && empty($nachnameError) && empty($firmaError) && empty($plzError) && empty($landError) && empty($strasseError) && empty($stadtError)) {

        //SQL Statement Variable übergeben
        $sqlStatement = "INSERT INTO test (Vorname, Nachname,Firma, PLZ, Land, Strasse) 
                     VALUES ('$vorname','$nachname','$firma', '$plz', '$land', '$strasse')";

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
    <title>Account anlegen</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="../assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="../assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
<div id="wrapper">
    <div id="sidebar-wrapper" style="background-color:#37434d;">
        <h1><a href="index.php">Sales</a></h1>
        <div class="mt-5">

            <!-- Sidebar Buttons-->

            <div class="dropdown amk-border"><a class="btn btn-primary dropdown-toggle kein-rahmen" data-toggle="dropdown" aria-expanded="false" role="button" href="#">Accounts</a>
                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="accounts.php">Accounts</a><a class="dropdown-item" role="presentation" href="accounts-anlegen.php">Accounts anlegen</a><a class="dropdown-item" role="presentation" href="ansprechpartner.php">Ansprechpartner</a></div>
            </div>
            <div class="dropdown"><button class="btn btn-primary dropdown-toggle kein-rahmen" data-toggle="dropdown" aria-expanded="false" type="button" style="width:248px;">Verkauf</button>
                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="leads.php">Leads</a><a class="dropdown-item" role="presentation" href="opportunitie.php">Opportunitys</a><a class="dropdown-item" role="presentation" href="kundenauftrag.php">Kundenaufträge</a></div>
            </div>
            <div class="dropdown"><button class="btn btn-primary dropdown-toggle kein-rahmen" data-toggle="dropdown" aria-expanded="false" type="button" style="width:100%;">Grundfunktionen</button>
                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="preise.php">Preise</a><a class="dropdown-item" role="presentation" href="produkte.php">Produkte</a><a class="dropdown-item" role="presentation" href="faktura.php">Faktura</a></div>
            </div>
        </div>
        <div></div>
    </div>

    <!-- Container und danach kommt die Obere Navigation-->


        <div class="container-fluid">
            <div class="row">
                <div class="col text-right" style="background-color:#37434d;"><input type="search" placeholder="Suchbegriff eingeben" id="grossesFeld"><button class="btn btn-primary ml-2 mt-1 mb-1" type="button">Button</button></div>
            </div>

            <div class="row">
                <div class="col">
                    <form action="accounts-anlegen.php" method="post">
                    <h1>Account anlegen</h1>
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
                        <input type="date" name="geburtsdatum" value="<?php echo $geburstdatum; ?>" class="ml-2">
                        <span class="help-block"><?php echo $geburstdatumError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Firma</label>
                        <input type="text" name="firma" value="<?php echo $firma; ?>" class="ml-2"></div>
                        <span class="help-block"><?php echo $firmaError; ?></span>
                </div>
                <div class="col">
                    <h1>&nbsp;</h1>
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
                        <input type="text" name="stadt" value="<?php echo $ort;?>" class="ml-2">
                        <span class="help-block"><?php echo $ortError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Land</label>
                        <input type="text" name="land" value="<?php echo $land; ?>" class="ml-2">
                        <span class="help-block"><?php echo $landError; ?></span>
                        <button class="btn btn-primary such-button" type="submit">Account anlegen</button>
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

