<?php
include("config.php");
//Variablen deklarieren und mit leeren Werten initalisieren
$auftraggeberEingabe = $_POST["auftraggeber"];
$ansprechpartnerEingabe = $_POST["ansprechpartner"];
$mitarbeiterEingabe = $_POST["mitarbeiter"];
$beschreibung = "";
$beschreibungError = "";
$wichtigkeit = "";
$wichtigkeitError = "";
$status = "";
$statusError = "";
$auftraggeber = "";
$auftraggeberError = "";
$ansprechpartner = "";
$ansprechpartnerError = "";
$mitarbeiter = "";
$mitarbeiterError = "";
$referenz = "";
$referenzError = "";

//Diese IF Abfrage weil ich sonst Fehler bekommen, da beim ersten Aufruf noch kein post geschehen ist
if($_SERVER["REQUEST_METHOD"] == "POST") {
    //beschreibung
    if (empty(trim($_POST["beschreibung"]))) {
        $beschreibungError = "Bitte eine Beschreibung angeben";
    }
    elseif (strlen(trim($_POST["beschreibung"])) < 2) {
        $beschreibungError = "Die Beschreibung muss 2 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["beschreibung"])) > 40) {
        $beschreibungError = "Die Beschreibung muss 40 Buchstaben oder weniger enthalten";
    } else {
        $beschreibung = $_POST["beschreibung"];
    }
    //Wichtigkeit

    foreach ($_POST['wichtigkeit'] as $wichtigkeit) {
    }
    //Status

    foreach ($_POST['status'] as $status) {
    }
    //Auftraggeber
    if (empty(trim($_POST["auftraggeber"]))) {
        $auftraggeberError = "Bitte geben Sie einen Auftraggeber ein";
    }
    // SQL select für den Nachnamen des Auftraggebers
    $sqlSelect = "SELECT nachname FROM account WHERE nachname = '$auftraggeberEingabe'";
    // schaut wie viele Spalten es hat
    $result = mysqli_query($connection, $sqlSelect);
    //schaut ob es jetzt eine oder mehr eintragungen für den Nachnamen in Accounts gibt
    if(mysqli_num_rows($result) > 0){
        $auftraggeber = $auftraggeberEingabe;
    }
    else {
        $auftraggeberError = "Bitte geben Sie einen eingetragenen Auftraggeber ein";
    }
    //Ansprechpartner
    if (empty(trim($_POST["ansprechpartner"]))) {
        $ansprechpartnerError = "Bitte geben Sie einen Ansprechpartner ein";
    }
    // SQL select für den Nachnamen des Ansprechpartners
    $sqlSelect2 = "SELECT nachname FROM ansprechpartner WHERE nachname = '$ansprechpartnerEingabe'";
    // schaut wie viele Spalten es hat
    $result2 = mysqli_query($connection, $sqlSelect2);
    //schaut ob es jetzt eine oder mehr eintragungen für den Nachnamen in Ansprechpartner gibt
    if(mysqli_num_rows($result2) > 0){
        $ansprechpartner = $ansprechpartnerEingabe;
    }
    else {
        $ansprechpartnerError = "Bitte geben Sie einen vorhandenen Ansprechpartner ein";
    }
    //Zuständiger Mitarbeiter
    if (empty(trim($_POST["mitarbeiter"]))) {
        $mitarbeiterError = "Bitte geben Sie einen Mitarbeiter ein";
    }
    // SQL select für den Nachnamen des Mitarbeiter
    $sqlSelect1 = "SELECT nachname FROM mitarbeiter WHERE nachname = '$mitarbeiterEingabe'";
    // schaut wie viele Spalten es hat
    $result = mysqli_query($connection, $sqlSelect1);
    //schaut ob es jetzt eine oder mehr eintragungen für den Nachnamen in Mitarbeiter gibt
    if(mysqli_num_rows($result) > 0){
        $mitarbeiter = $mitarbeiterEingabe;
    }
    else {
        $mitarbeiterError = "Bitte geben Sie einen vorhandenen Mitarbeiter ein";
    }
    //Vordem Insert überprüfen ob Fehler vorhanden sind
    if(empty($beschreibungError) && empty($wichtigkeitError) && empty($statusError) && empty($auftraggeberError) && empty($ansprechpartnerError) && empty($mitarbeiterError)) {
        //SQL Statement Variable übergeben
        $sqlStatement = "INSERT INTO aktivitat (Beschreibung, Wichtigkeit, Status, Auftraggeber, Ansprechpartner, Mitarbeiter) 
                     VALUES ('$beschreibung', '$wichtigkeit', '$status', '$auftraggeber', '$ansprechpartner', '$mitarbeiter')";
        //SQL Insert durchführen mit mysqli query
        if(mysqli_query($connection, $sqlStatement)) {
            echo "Aktivität erfolgreich angelegt";
        } else {
            echo "Error:" .$sqlStatement . "<br>" . mysqli_error($connection);
        }
    }
}



?>

<!DOCTYPE html>
<html>

<head>
    <title>Aktivität anlegen</title>
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
            <form action="aktivitat.php" method="post">

            <div class="col">
                    <h1>Aktivität anlegen</h1>
                    <div class="one"><h4>Allgemeine Daten</h4></div>
                    <div class="one-container">
                        <div>
                            <label style="width:109.6px;">Beschreibung</label>
                            <input type="text" name="beschreibung" value="<?php echo $beschreibung;?>" class="ml-2">
                            <span class="help-block"><?php echo $beschreibungError; ?></span>
                        </div>
                        <div>
                            <label style="width:109.6px;">Wichtigkeit</label>
                            <select id="wichtigkeit" name="wichtigkeit[]"   class="ml-2" >
                                <option>wichtig</option>
                                <option>mittel</option>
                                <option>gering</option>
                            </select>
                            <span class="help-block"><?php echo $wichtigkeitError; ?></span>
                        </div>
                        <div>
                            <label style="width:109.6px;">Status</label>
                            <select id="status" name="status[]"   class="ml-2" >
                                <option>offen</option>
                                <option>in Bearbeitung</option>
                                <option>geschlossen</option>
                            </select>
                            <span class="help-block"><?php echo $statusError; ?></span>
                        </div>
                    </div>
            </div>
            <div class="col">
                <h1>&nbsp;</h1>
                <div class="one"><h4>Referenzen</h4></div>
                <div class="one-container">
                    <div>
                        <label style="width:109.6px;">Auftraggeber</label>
                        <input type="text" name="auftraggeber" value="<?php echo $auftraggeber; ?>" class="ml-2">
                        <span class="help-block"><?php echo $auftraggeberError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Ansprechpartner</label>
                        <input type="text" name="ansprechpartner" value="<?php echo $ansprechpartner; ?>" class="ml-2">
                        <span class="help-block"><?php echo $ansprechpartnerError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Zuständiger Mitarbeiter</label>
                        <input type="text" name="mitarbeiter" value="<?php echo $mitarbeiter;?>" class="ml-2">
                        <span class="help-block"><?php echo $mitarbeiterError; ?></span>
                        <button class="btn btn-primary such-button" type="submit">Aktivität anlegen</button>
                    </div>
                </div>
            </div>
            </form>

        </div>
    </div>
</body>

</html>