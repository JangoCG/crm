<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produkt anlegen</title>
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
                <form action="ProduktAnlegen.php" method="post">
                    <h1>Produkt anlegen</h1><br>
                    <h4>Produktdaten</h4><br>
                    <div>
                        <label style="width:109.6px;">Produkt-ID</label>
                        <input type="text" name="produktid" value="<?php echo $produktid; ?>" class="ml-2" style="background-color:#ffffff;">
                        <span class="help-block"><?php echo $produktidError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Name</label>
                        <input type="text" name="name" value="<?php echo $Name; ?>" class="ml-2" style="background-color:#ffffff;">
                        <span class="help-block"><?php echo $NameError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Kategorie</label>
                        <input type="text" name="kategorie" value="<?php echo $kategorie; ?>" class="ml-2" style="background-color:#ffffff;">
                        <span class="help-block"><?php echo $kategorieError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Menge</label>
                        <input type="text" name="menge" value="<?php echo $menge; ?>" class="ml-2" style="background-color:#ffffff;">
                        <span class="help-block"><?php echo $mengeError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Preis</label>
                        <input type="text" name="preis" value="<?php echo $preis; ?>" class="ml-2">
                    <span class="help-block"><?php echo $preisError; ?></span></div>
                    <button class="btn btn-primary such-button" type="submit">Produkt anlegen</button>
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

$produktid = "";
$produktidError = "";
$name = "";
$nameError = "";
$kategorie = "";
$kategorieError = "";
$menge = "";
$mengeError = "";
$preis = "";
$preisError = "";




//Diese IF Abfrage weil ich sonst Fehler bekommen, da beim ersten Aufruf noch kein post geschehen ist
if($_SERVER["REQUEST_METHOD"] == "POST") {

    //Abfrage für Produkt-ID
    if (empty(trim($_POST["produktid"]))) {
        $produktidError = "Bitte geben Sie eine Produktid ein";

    } elseif (!(ctype_digit($_POST["produktid"]))) {
        $produktidError = "Bitte verwenden Sie nur Zahlen für die Produkt-ID";
    } elseif (strlen(trim($_POST["produktid"])) < 2) {
        $produktidError = "Die Produkt-ID muss 2 Zahlen oder mehr enthalten";
    } elseif (strlen(trim($_POST["produktid"])) > 25) {
        $produktidError = "Die Produkt-ID muss 25 Zahlen oder weniger enthalten";
    } else {
        $produktid = trim($_POST["produktid"]);
    }

    //Abfrage für Name
    if (empty(trim($_POST["name"]))) {
        $nameError = "Bitte geben Sie einen Produktnamen ein";
    } elseif (!(ctype_alpha($_POST["name"]))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
        $nameError = "Bitte verwenden Sie nur Buchstaben für den Produktnamen";
    } elseif (strlen(trim($_POST["name"])) < 2) {
        $nameError = "Der Produktname muss 2 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["name"])) > 25) {
        $nameError = "Der Produktname muss 25 Buchstaben oder weniger enthalten";
    } else {
        $name = trim($_POST["name"]);
    }

    //Abfrage für Kategorie
    if (empty(trim($_POST["kategorie"]))) {
        $kategorieError = "Bitte geben Sie eine Kategorie ein";
    } elseif (!(ctype_alpha($_POST["kategorie"]))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
        $kategorieError = "Bitte verwenden Sie nur Buchstaben für die Kategorie";
    } elseif (strlen(trim($_POST["kategorie"])) < 2) {
        $kategorieError = "Die Kategorie muss 2 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["kategorie"])) > 25) {
        $kategorieError = "Die Kategorie muss 25 Buchstaben oder weniger enthalten";
    } else {
        $kategorie = trim($_POST["kategorie"]);
    }

    //Abfrage für Menge
    if (empty(trim($_POST["menge"]))) {
        $mengeError = "Bitte geben Sie einen plzn ein";

    } elseif (!(ctype_digit($_POST["menge"]))) {
        $mengeError = "Bitte verwenden Sie nur Zahlen für die Menge";
    } elseif (strlen(trim($_POST["menge"])) < 2) {
        $mengeError = "Die Menge muss 2 Zahlen oder mehr enthalten";
    } elseif (strlen(trim($_POST["menge"])) > 100) {
        $mengeError = "Die Menge muss 100 Zahlen oder weniger enthalten";
    } else {
        $menge = trim($_POST["menge"]);
    }


    //Abfrage für Preis

    if (empty(trim($_POST["preis"]))) {
        $preisError = "Bitte geben Sie einen Preis ein";
    } elseif (!(ctype_digit($_POST["preis"]))) {
        $preisError = "Bitte verwenden Sie nur Zahlen für den Preis";
    } elseif (strlen(trim($_POST["preis"])) < 2) {
        $preisError = "Der Preis muss 2 Zahlen oder mehr enthalten";
    } elseif (strlen(trim($_POST["preis"])) > 25) {
        $preisError = "Der Preis muss 25 Zahlen oder weniger enthalten";
    } else {
        $preis = trim($_POST["preis"]);
    }





    //Vordem Insert überprüfen ob Fehler vorhanden sind
    if(empty($produktidError) && empty($nameError) && empty($kategorieError) && empty($mengeError) && empty($preisError)) {

        //SQL Statement Variable übergeben
        $sqlStatement = "INSERT INTO Produktmarketing (ProduktID, Name, Kategorie, Menge, Preis) 
                     VALUES ('$produktid', '$name', '$kategorie', '$menge', '$preis')";

        //SQL Insert durchführen mit mysqli query
        if(mysqli_query($connection, $sqlStatement)) {
            echo "Produkt erfolgreich angelegt";
        } else {
            echo "Error:" .$sqlStatement . "<br>" . mysqli_error($connection);
        }
    }
}

?>