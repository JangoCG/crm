<?php
/**
 * Created by PhpStorm.
 * User: cengiz
 * Date: 23.11.18
 * Time: 00:09
 */

include("config.php");

//Variablen deklarieren und mit leeren Werten initalisieren

$id = "";
$idError = "";
$beschreibung = "";
$beschreibungError = "";
$interessent = "";
$interessentError = "";
$kampagne = "";
$kampagneError = "";
$partnernummer = "";
$partnernummerError = "";
$starttermin = "";
$startterminError = "";
$endtermin = "";
$endterminError = "";



//Diese IF Abfrage weil ich sonst Fehler bekommen, da beim ersten Aufruf noch kein post geschehen ist
if($_SERVER["REQUEST_METHOD"] == "POST") {

    //Abfrage für ID
    if (empty(trim($_POST["id"]))) {
        $idError = "Bitte geben Sie eine ID ein";
    } elseif (!(ctype_digit($_POST["id"]))) {
        $idError = "Bitte verwenden Sie nur Zahlen für die ID";
    } elseif (strlen(trim($_POST["id"])) < 1) {
        $idError = "Die ID muss 1 Zahl oder mehr enthalten";
    } elseif (strlen(trim($_POST["id"])) > 25) {
        $idError = "Die ID muss 25 Buchstaben oder weniger enthalten";
    } else {
        $id = trim($_POST["id"]);
    }

    //Abfrage für Beschreibung
    if (empty(trim($_POST["beschreibung"]))) {
        $beschreibungError = "Bitte geben Sie eine Beschreibung ein";
    } else {
        $beschreibung = trim($_POST["beschreibung"]);
    }

    //Abfrage für Interessent
    if (empty(trim($_POST["interessent"]))) {
        $interessentError = "Bitte geben Sie einen Interessenten ein";
    } elseif (strlen(trim($_POST["interessent"])) < 2) {
        $interessentError = "Der Interessent muss 2 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["interessent"])) > 25) {
        $interessentError = "Der Interessent muss 25 Buchstaben oder weniger enthalten";
    } else {
        $interessent = trim($_POST["interessent"]);
    }

    //Abfrage für Kampagne
    if (empty(trim($_POST["kampagne"]))) {
        $kampagneError = "Bitte geben Sie eine Kampagne ein";
    } elseif (strlen(trim($_POST["kampagne"])) < 5) {
        $kampagneError = "Die Kampagne muss 5 Zeichen oder mehr enthalten";
    } else {
        $kampagne = trim($_POST["kampagne"]);
    }


    //Abfrage für Land
    if (empty(trim($_POST["partnernummer"]))) {
        $partnernummerError = "Bitte geben Sie einen Partnernummer ein";
    } elseif (!(ctype_alnum($_POST["partnernummer"]))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
        $partnernummerError = "Bitte verwenden Sie nur Zahlen für die Partnernummer";
    } elseif (strlen(trim($_POST["partnernummer"])) < 4) {
        $partnernummerError = "Die Partnernummer muss 4 Zahlen oder mehr enthalten";
    } elseif (strlen(trim($_POST["partnernummer"])) > 25) {
        $partnernummerError = "Die Partnernummer muss 25 Zahlen oder weniger enthalten";
    } else {
        $partnernummer = trim($_POST["partnernummer"]);
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
    if(empty($idError) && empty($beschreibungError) && empty($interessentError) && empty($kampagneError) && empty($partnernummerError) && empty($startterminError) && empty($endterminError)) {

        //SQL Statement Variable übergeben
        $sqlStatement = "INSERT INTO LeadMarketing (ID, Beschreibung, Interessent, Kampagne, Partnernummer, Starttermin, Endtermin) 
                     VALUES ('$id', '$beschreibung', '$interessent', '$kampagne', '$partnernummer', '$starttermin', '$endtermin')";

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
        <h1><a href="index.php">Marketingpro</a></h1>
        <div class="mt-5">
            <div class="dropdown amk-border"><a class="btn btn-primary dropdown-toggle kein-rahmen" data-toggle="dropdown" aria-expanded="false" role="button" href="#">Accounts & Produkte</a>
                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="ProduktAnlegen.php">Produkt anlegen</a><a class="dropdown-item" role="presentation" href="ProduktSuchen.php">Produkt suchen</a><a class="dropdown-item" role="presentation" href="PrivatAccountanlegen.php">Privat-Account anlegen</a><a class="dropdown-item" role="presentation" href="PrivatAccountsuchen.php">Privat-Account suchen</a></div>
            </div>
            <div class="dropdown"><button class="btn btn-primary dropdown-toggle kein-rahmen" data-toggle="dropdown" aria-expanded="false" type="button" style="width:248px;">Marketing</button>
                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="LeadAnlegen.php">Leads anlegen</a><a class="dropdown-item" role="presentation" href="LeadSuchen.php">Leads suchen</a><a class="dropdown-item" role="presentation" href="KampagneAnlegen.php">Kampagne anlegen</a><a class="dropdown-item" role="presentation" href="KampagneSuchen.php">Kampagne suchen</a><a class="dropdown-item" role="presentation" href="Dateisuche.php">Datei suchen</a></div>
            </div>
        </div>
    </div>




    <div class="container-fluid">
        <div class="row">
            <div class="col text-right" style="background-color:#37434d;">
                <a class="btn  btn-primary ml-2 mt-1 mb-1" type="Suche" href="http://3.120.69.90/crm/startseite.php">Logout</a>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <form action="LeadAnlegen.php" method="post">
                    <h1>Lead anlegen</h1><br>
                    <div>
                        <label style="width:109.6px;">ID</label>
                        <input type="text" name="id" value="<?php echo $id; ?>" class="ml-2" style="background-color:#ffffff;">
                        <span class="help-block"><?php echo $idError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Beschreibung</label>
                        <input type="text" name="beschreibung" value="<?php echo $beschreibung; ?>" class="ml-2" style="background-color:#ffffff;">
                        <span class="help-block"><?php echo $beschreibungError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Interessent</label>
                        <input type="text" name="interessent" value="<?php echo $interessent; ?>" class="ml-2"></div>
                    <span class="help-block"><?php echo $interessentError; ?></span>
                <div>
                    <label style="width:109.6px;">Kampagne</label>
                    <input type="text" name="kampagne" value="<?php echo $kampagne; ?>" class="ml-2">
                    <span class="help-block"><?php echo $kampagneError; ?></span>
                </div>
                <div>
                    <label style="width:109.6px;">Partnernummer</label>
                    <input type="text" name="partnernummer" value="<?php echo $partnernummer; ?>" class="ml-2">
                    <span class="help-block"><?php echo $partnernummerError; ?></span>
                </div>
                <div>
                    <label style="width:109.6px;">Starttermin</label>
                    <input type="text" name="starttermin" value="<?php echo $starttermin;?>" class="ml-2">
                    <span class="help-block"><?php echo $startterminError; ?></span>
                </div>
                <div>
                    <label style="width:109.6px;">Endtermin</label>
                        <input type="text" name="endtermin" value="<?php echo $endtermin; ?>" class="ml-2">
                    <span class="help-block"><?php echo $endterminError; ?></span>
                    <button class="btn btn-primary such-button" type="submit">Lead anlegen</button>
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

