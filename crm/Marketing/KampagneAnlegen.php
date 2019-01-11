<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("config.php");

//Variablen deklarieren und mit leeren Werten initalisieren

$beschreibung = "";
$beschreibungError = "";
$art = "";
$artError = "";
$zielsetzung = "";
$zielsetzungError = "";
$taktik = "";
$taktikError = "";
$prioritaet = "";
$prioritaetError = "";
$mitarbeiter = "";
$mitarbeiterError = "";
$starttermin = "";
$startterminError = "";
$endtermin = "";
$endterminError = "";



    //Diese IF Abfrage weil ich sonst Fehler bekommen, da beim ersten Aufruf noch kein post geschehen ist
    if($_SERVER["REQUEST_METHOD"] == "POST") {


    //Abfrage für Beschreibung
    if (empty(trim($_POST["beschreibung"]))) {
        $beschreibungError = "Bitte geben Sie eine Beschreibung ein";
    } elseif (strlen(trim($_POST["beschreibung"])) < 2) {
        $beschreibungError = "Die Beschreibung muss 2 Zeichen oder mehr enthalten";
    } elseif (strlen(trim($_POST["beschreibung"])) > 66) {
        $beschreibungError = "Die Beschreibung muss 66 Zeichen oder weniger enthalten";
    } else {
        $beschreibung = trim($_POST["beschreibung"]);
    }

    //Abfrage für Zielsetzung
    if (empty(trim($_POST["zielsetzung"]))) {
        $zielsetzungError = "Bitte geben Sie eine Zielsetzung ein";
    } elseif (strlen(trim($_POST["zielsetzung"])) < 2) {
        $zielsetzungError = "Die Zielsetzung muss 2 Zeichen oder mehr enthalten";
    } elseif (strlen(trim($_POST["zielsetzung"])) > 66) {
        $zielsetzungError = "Die Zielsetzung muss 66 Zeichen oder weniger enthalten";
    } else {
        $zielsetzung = trim($_POST["zielsetzung"]);
    }

    //Abfrage für Zielsetzung
    if (empty(trim($_POST["taktik"]))) {
        $taktikError = "Bitte geben Sie eine Taktik ein";
    } elseif (strlen(trim($_POST["taktik"])) < 2) {
        $taktikError = "Die Taktik muss 2 Zeichen oder mehr enthalten";
    } elseif (strlen(trim($_POST["taktik"])) > 66) {
        $taktikError = "Die Taktik muss 66 Zeichen oder weniger enthalten";
    } else {
        $taktik = trim($_POST["taktik"]);
    }



    //Abfrage für Art --> Hier wird geprüft was angeklickt wurde, durch eine Schleife!
        foreach ($_POST['art'] as $art) {
        }

    //Abfrage für Priorität --> Hier wird geprüft was angeklickt wurde, durch eine Schleife!
        foreach ($_POST['prioritaet'] as $prioritaet) {
    }

    //Abfrage für Mitarbeiter
        if (empty(trim($_POST["mitarbeiter"]))) {
            $mitarbeiterError = "Bitte geben Sie eine Taktik ein";
        } elseif (strlen(trim($_POST["mitarbeiter"])) < 2) {
            $mitarbeiterError = "Die Taktik muss 2 Zeichen oder mehr enthalten";
        } elseif (strlen(trim($_POST["mitarbeiter"])) > 66) {
            $mitarbeiterError = "Die Taktik muss 66 Zeichen oder weniger enthalten";
        } else {
            $mitarbeiter = trim($_POST["mitarbeiter"]);
        }

    //Abfrage für Starttermin
        if (empty(trim($_POST["starttermin"]))) {
            $startterminError = "Bitte geben Sie ein Starttermin ein";
        } elseif (strlen(trim($_POST["starttermin"])) < 2) {
            $startterminError = "Der Starttermin muss 2 Zeichen oder mehr enthalten";
        } elseif (strlen(trim($_POST["starttermin"])) > 66) {
            $startterminError = "Der Starttermin muss 66 Zeichen oder weniger enthalten";
        } else {
            $starttermin = trim($_POST["starttermin"]);
        }

    //Abfrage für Endtermin
        if (empty(trim($_POST["endtermin"]))) {
            $endterminError = "Bitte geben Sie ein Starttermin ein";
        } elseif (strlen(trim($_POST["endtermin"])) < 2) {
            $endterminError = "Der Endtermin muss 2 Zeichen oder mehr enthalten";
        } elseif (strlen(trim($_POST["endtermin"])) > 66) {
            $endterminError = "Der Endtermin muss 66 Zeichen oder weniger enthalten";
        } else {
            $endtermin = trim($_POST["endtermin"]);
        }

        //Vordem Insert überprüfen ob Fehler vorhanden sind
    if (empty($beschreibungError) && empty($artError) && empty($zielsetzungError) && empty($taktikError) && empty($prioritaetError) && empty($startterminError) && empty($endterminError) && empty($mitarbeiterError)) {


        //SQL Statement Variable übergeben
        $sqlStatement = "INSERT INTO kampagne (Beschreibung, Art, Zielsetzung, Taktik, Prioritaet, Mitarbeiter, Starttermin, Endtermin) 
                     VALUES ('$beschreibung', '$art', '$zielsetzung', '$taktik', '$prioritaet', '$mitarbeiter', '$starttermin', '$endtermin')";

        //SQL Insert durchführen mit mysqli query
        if (mysqli_query($connection, $sqlStatement)) {
            echo "Account erfolgreich angelegt";
        } else {
            echo "Error:" . $sqlStatement . "<br>" . mysqli_error($connection);
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kampagne anlegen</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="../assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="../assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>


<body>
<div id="wrapper">
    <div id="sidebar-wrapper" style="background-color:#37434d;">
        <h1><a href="index.php">Marketingpro</a></h1>
        <div class="mt-5">
            <div class="dropdown amk-border"><a class="btn btn-primary dropdown-toggle kein-rahmen" data-toggle="dropdown" aria-expanded="false" role="button" href="#">Accounts & Produkte</a>
                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="ProduktAnlegen.html">Produkt anlegen</a><a class="dropdown-item" role="presentation" href="ProduktSuchen.html">Produkt suchen</a><a class="dropdown-item" role="presentation" href="PrivatAccountanlegen.php">Privat-Account anlegen</a><a class="dropdown-item" role="presentation" href="PrivatAccountsuchen.php">Privat-Account suchen</a></div>
            </div>
            <div class="dropdown"><button class="btn btn-primary dropdown-toggle kein-rahmen" data-toggle="dropdown" aria-expanded="false" type="button" style="width:248px;">Marketing</button>
                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">Leads anlegen</a><a class="dropdown-item" role="presentation" href="#">Leads suchen</a><a class="dropdown-item" role="presentation" href="KampagneAnlegen.php">Kampagne anlegen</a><a class="dropdown-item" role="presentation" href="#">Kampagne suchen</a><a class="dropdown-item" role="presentation" href="#">Marketingplan anlegen</a><a class="dropdown-item" role="presentation" href="#">Marketingplan suchen</a></div>
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
                <form action="KampagneAnlegen.php" method="post">
                    <h2>Kampagne anlegen</h2><br>
                    <b>Allgemeine Daten</b><br><br>
                    <div>
                        <label style="width:109.6px;">Beschreibung</label>
                        <input type="text" name="beschreibung" value="<?php echo $beschreibung; ?>" class="ml-2" style="background-color:#ffffff;">
                        <span class="help-block"><?php echo $beschreibungError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Art</label>
                        <select id="art" name="art[]"   class="ml-2" >
                            <option>Kundenanwerbung</option>
                            <option>Kampagne mit Partnern</option>
                            <option>Kundenentwicklung</option>
                            <option>WEB Kampagne</option>
                            <option>Kundenerhaltung</option>
                            <option>E-Mail-Marketing</option>
                            <option>Marktdurchdingung</option>
                        </select>
                        <span class="help-block"><?php echo $artError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Zielsetzung</label>
                        <input type="text" name="zielsetzung" value="<?php echo $zielsetzung; ?>" class="ml-2" style="background-color:#ffffff;">
                        <span class="help-block"><?php echo $zielsetzungError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Taktik</label>
                        <input type="text" name="taktik" value="<?php echo $taktik; ?>" class="ml-2" style="background-color:#ffffff;">
                        <span class="help-block"><?php echo $taktikError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Zuständiger Mitarbeiter</label>
                        <input type="text" name="mitarbeiter" value="<?php echo $mitarbeiter; ?>" class="ml-2" style="background-color:#ffffff;">
                        <span class="help-block"><?php echo $mitarbeiterError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Priorität</label>
                        <select id="prioritaet" name="prioritaet[]"   class="ml-2" >
                            <option>niedrig</option>
                            <option>mittel</option>
                            <option>hoch</option>
                            <option>sehr hoch</option>
                        </select>
                        <span class="help-block"><?php echo $prioritaetError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Starttermin</label>
                        <input type="text" name="starttermin" value="<?php echo $starttermin; ?>" class="ml-2" style="background-color:#ffffff;">
                        <span class="help-block"><?php echo $startterminError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Endtermin</label>
                        <input type="text" name="endtermin" value="<?php echo $endtermin; ?>" class="ml-2" style="background-color:#ffffff;">
                        <span class="help-block"><?php echo $endterminError; ?></span>
                    </div>
                        <div>&emsp;&emsp;&emsp;<button class="btn btn-primary such-button" type="submit">Kampagne anlegen</button></div>
                </form>
            </div>
        </div>
    </div>
        <div class="col">
            <form enctype="multipart/form-data" action="upload.php" method="POST">
                <br><br><p><h4>Kampagnedatei hochladen:</h4><br>
                <input type="file" name="hochgeladeneDatei">
                <input type="submit" value="Hochladen">
            </form>
        </div>
    </div>
</div>

<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/Sidebar-Menu.js"></script>

    </body>
</html>

