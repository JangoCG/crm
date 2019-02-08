<!DOCTYPE html>
<html>

<!--Das hier in deine ganzen Dateien kopieren -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account anlegen</title>
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

    <!--Bis hier hin -->


    <div class="row">
        &emsp;&emsp;<div class="col">
            <br><h3>Wilkommen in ihrem MarketingPro-Bereich.</h3>

            <p><b>Wetter-Widget</p>

            <iframe
                    src="https://www.wetter.de/deutschland/wetter-fulda-18221348.html"
                    width="90%"
                    height="400"
                    name="SELFHTML_in_a_box">

                <p>
                    <a href="https://wiki.selfhtml.org/wiki/Startseite">SELFHTML</a>
                </p>
            </iframe>
        </div>
            <div class="col">
                </b><br><br><br><b><p>Golem-Widget</p>
                <iframe
                        src="https://www.golem.de/"
                        width="90%"
                        height="400"
                        name="SELFHTML_in_a_box">

                    <p>
                        <a href="https://wiki.selfhtml.org/wiki/Startseite">SELFHTML</a>
                    </p>
                </iframe>
            </div>
    </div>

    <br>
    <div class="row">
        &emsp;&emsp;&emsp;<div class="col2">
            <form method="POST" action="">
                <p><textarea rows="20" name="notiz" cols="68">Notiz eingeben</textarea></p>
                <p><input type="submit" value="Speichern" name="speichern"><input type="reset" value="Zurücksetzen" name="zurucksetzen"></p>
            </form>
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

$notiz = "";
$notizError = "";

//Abfrage für Notiz
if (empty(trim($_POST["notiz"]))) {
    $notizError = "Notiz eingeben";
} elseif (strlen(trim($_POST["notiz"])) > 5000) {
    $notizError = "Die Notiz mss 5000 Zeichen oder weniger enthalten";
} else {
    $notiz = trim($_POST["notiz"]);
}


//Diese IF Abfrage weil ich sonst Fehler bekommen, da beim ersten Aufruf noch kein post geschehen ist
if($_SERVER["REQUEST_METHOD"] == "POST") {


    //Vordem Insert überprüfen ob Fehler vorhanden sind
    if(empty($notizError)) {

        //SQL Statement Variable übergeben
        $sqlStatement = "INSERT INTO notiz (notiz) 
                     VALUES ('$notiz')";

        //SQL Insert durchführen mit mysqli query
        if(mysqli_query($connection, $sqlStatement)) {
            echo "Notiz erfolgreich gespeichert";
        } else {
            echo "Error:" .$sqlStatement . "<br>" . mysqli_error($connection);
        }
    }
}

?>