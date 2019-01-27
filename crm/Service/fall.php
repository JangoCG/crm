<?php

include("config.php");
//Variablen deklarieren und mit leeren Werten initalisieren
$mitarbeiterEingabe = $_POST["mitarbeiter"];
$beschreibung = "";
$beschreibungError = "";
$art = "";
$artError = "";
$mitarbeiter = "";
$mitarbeiterError = "";
$status = "";
$statusError = "";
$prioritat = "";
$prioritatError = "";
$grund = "";
$grundError = "";

//Diese IF Abfrage weil ich sonst Fehler bekommen, da beim ersten Aufruf noch kein post geschehen ist
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Beschreibung
    if (empty(trim($_POST["beschreibung"]))) {
        $beschreibungError = "Bitte eine Beschreibung angeben";
    } elseif (strlen(trim($_POST["beschreibung"])) < 2) {
        $beschreibungError = "Die Beschreibung muss 2 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["beschreibung"])) > 40) {
        $beschreibungError = "Die Beschreibung muss 40 Buchstaben oder weniger enthalten";
    } else {
        $beschreibung = trim($_POST["beschreibung"]);
    }
    //Art
    if (empty(trim($_POST["art"]))) {
        $artError = "Bitte eine Art angeben";
    } elseif (strlen(trim($_POST["art"])) < 2) {
        $artError = "Die Art muss 2 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["art"])) > 40) {
        $artError = "Die Art muss 40 Buchstaben oder weniger enthalten";
    } else {
        $art = trim($_POST["art"]);
    }
    //Zuständiger Mitarbeiter
    if (empty(trim($_POST["mitarbeiter"]))) {
        $mitarbeiterError = "Bitte geben Sie einen Mitarbeiter ein";
    }
    // SQL select für den Nachnamen des Mitarbeiter
    $sqlSelect = "SELECT nachname FROM mitarbeiter WHERE nachname = '$mitarbeiterEingabe'";
    // schaut wie viele Spalten es hat
    $result = mysqli_query($connection, $sqlSelect);
    //schaut ob es jetzt eine oder mehr eintragungen für den Nachnamen in Mitarbeiter gibt
    if (mysqli_num_rows($result) >= 1) {
        $mitarbeiter = $mitarbeiterEingabe;
    } else {
        $mitarbeiterError = "Bitte geben Sie einen vorhandenen Mitarbeiter ein";
    }
    //Status

    foreach ($_POST['status'] as $status) {
    }
    //Status

    foreach ($_POST['priorität'] as $prioritat) {
    }
    //Grund
    if (empty(trim($_POST["grund"]))) {
        $grundError = "Bitte einen Grund angeben";
    } elseif (strlen(trim($_POST["grund"])) < 2) {
        $grundError = "Der Grund muss 2 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["grund"])) > 40) {
        $grundError = "Der Grund muss 40 Buchstaben oder weniger enthalten";
    } else {
        $grund = trim($_POST["grund"]);
    }
    //Vordem Insert überprüfen ob Fehler vorhanden sind
    if (empty($beschreibungError) && empty($artError) && empty($mitarbeiterError) && empty($statusError) && empty($prioritatError) && empty($grundError)) {
        //SQL Statement Variable übergeben
        $sqlStatement = "INSERT INTO fall (Beschreibung, Art, Mitarbeiter, Status, Prioritaet, Grund) 
                     VALUES ('$beschreibung','$art','$mitarbeiter', '$status', '$prioritat', '$grund')";
        //SQL Insert durchführen mit mysqli query
        if (mysqli_query($connection, $sqlStatement)) {
            echo "Fall erfolgreich angelegt";
        } else {
            echo "Error:" . $sqlStatement . "<br>" . mysqli_error($connection);
        }
    }


}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Fall anlegen</title>
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
        <form action="fall.php" method="post">

        <div class="col">
                <h1>Fall anlegen</h1>
                <div class="one"><h4>Allgemeine Daten</h4></div>
                <div class="one-container">
                    <div>
                        <label style="width:109.6px;">Beschreibung</label>
                        <input type="text" name="beschreibung" value="<?php echo $beschreibung; ?>" class="ml-2"
                               style="background-color:#ffffff;">
                        <span class="help-block"><?php echo $beschreibungError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Art</label>
                        <input type="text" name="art" value="<?php echo $art; ?>" class="ml-2">
                        <span class="help-block"><?php echo $artError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Zuständiger Mitarbeiter</label>
                        <input type="text" name="mitarbeiter" value="<?php echo $mitarbeiter; ?>" class="ml-2">
                        <span class="help-block"><?php echo $mitarbeiterError; ?></span>
                    </div>
                </div>
        </div>
        <div class="col">
            <h1>&nbsp;</h1>
            <div class="one"><h4>Zusatzinformationen</h4></div>
            <div class="one-container">
                <div>
                    <label style="width:109.6px;">Status</label>
                    <select id="status" name="status[]"   class="ml-2" >
                        <option>offen</option>
                        <option>in Bearbeitung</option>
                        <option>geschlossen</option>
                    </select>
                    <span class="help-block"><?php echo $statusError; ?></span>
                </div>
                <div>
                    <label style="width:109.6px;">Priorität</label>
                    <select id="priorität" name="priorität[]"   class="ml-2" >
                        <option>wichtig</option>
                        <option>mittel</option>
                        <option>gering</option>
                    </select>
                    <span class="help-block"><?php echo $prioritatError; ?></span>
                </div>
                <div>
                    <label style="width:109.6px;">Grund</label>
                    <input type="text" name="grund" value="<?php echo $grund; ?>" class="ml-2">
                    <button class="btn btn-primary such-button" type="submit">Fall anlegen</button>
                    <span class="help-block"><?php echo $grundError; ?></span>
                </div>
            </div>
        </div>
        </form>

    </div>
</div>
</body>

</html>