<?php
include("config.php");
//Variablen deklarieren und mit leeren Werten initalisieren
$auftraggeberEingabe = $_POST["auftraggeber"];
$ansprechpartnerEingabe = $_POST["ansprechpartner"];
$produktEingabe = $_POST["produkt"];
$mitarbeiterEingabe = $_POST["mitarbeiter"];
$auftraggeber = "";
$auftraggeberError = "";
$beschreibung = "";
$beschreibungError = "";
$ansprechpartner = "";
$ansprechpartnerError = "";
$mitarbeiter = "";
$mitarbeiterError = "";
$status = "";
$statusError = "";
$garantie = "";
$garantieError = "";
$produkt = "";
$produktError = "";
$alter = "";
$alterError = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    //Auftraggeber
    if (empty(trim($_POST["auftraggeber"]))) {
        $auftraggeberError = "Bitte geben Sie einen Auftraggeber ein";
    }
    // SQL select für den Nachnamen des Auftraggebers
    $sqlSelect = "SELECT nachname FROM account WHERE nachname = '$auftraggeberEingabe'";
    // schaut wie viele Spalten es hat
    $result = mysqli_query($connection, $sqlSelect);
    //schaut ob es jetzt eine oder mehr eintragungen für den Nachnamen in Accounts gibt
    if(mysqli_num_rows($result) >= 1){
        $auftraggeber = $auftraggeberEingabe;
    }
    else {
        $auftraggeberError = "Bitte geben Sie einen eingetragenen Auftraggeber ein";
    }
    //Beschreibung
    if (empty(trim($_POST["beschreibung"]))) {
        $beschreibungError = "Bitte eine Beschreibung angeben";
    }
     elseif (strlen(trim($_POST["beschreibung"])) < 2) {
        $beschreibungError = "Die Beschreibung muss 2 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["beschreibung"])) > 40) {
        $beschreibungError = "Die Beschreibung muss 40 Buchstaben oder weniger enthalten";
    } else {
        $beschreibung = trim($_POST["beschreibung"]);
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
    if(mysqli_num_rows($result2) >= 1){
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
    $sqlSelect = "SELECT nachname FROM mitarbeiter WHERE nachname = '$mitarbeiterEingabe'";
    // schaut wie viele Spalten es hat
    $result = mysqli_query($connection, $sqlSelect);
    //schaut ob es jetzt eine oder mehr eintragungen für den Nachnamen in Mitarbeiter gibt
    if(mysqli_num_rows($result) >= 1){
        $mitarbeiter = $mitarbeiterEingabe;
    }
    else {
        $mitarbeiterError = "Bitte geben Sie einen vorhandenen Mitarbeiter ein";
    }
    //Status

    foreach ($_POST['status'] as $status) {
    }
    //Garantie-ID
    if ($_POST["garantie"] == "0001") {
        $garantie = "0001";
    }
    else if($_POST["garantie"] == "0002") {
        $garantie = "0002";
    }
    else if($_POST["garantie"] == "0003") {
        $garantie = "0003";
    }
    else {
        $garantieError = "Bitte geben Sie eine gültige Garantie-ID an";
    }
    //Produkt
    if(empty(trim($_POST["produkt"]))) {
        $produktError = "Bitte geben Sie ein Produkt ein";
    }
    // SQL select für den Produktnamen
    $sqlSelect3 = "SELECT name FROM Produktmarketing WHERE name = '$produktEingabe'";
    // schaut wie viele Spalten es hat
    $result3 = mysqli_query($connection, $sqlSelect3);
    //schaut ob es jetzt eine oder mehr eintragungen für den Nachnamen in Accounts gibt
    if(mysqli_num_rows($result3) >= 1){
        $produkt = $produktEingabe;
    }
    else {
        $produktError = "Bitte geben Sie ein vorhandenes Produkt ein";
    }
    //Alter des Produkts
    if(empty(trim($_POST["alter"]))) {
        $produktError = "Bitte geben Sie ein Alter ein";
    }
    else if(!(ctype_digit($_POST["alter"]))) {
        $alterError = "Bitte geben Sie nur Ziffern ein";
    }
    else if($_POST["alter"] < 16) {
        $alterError = "Das Alter des Produkts kann höchstens 15 Jahre alt sein";
    }
    else {
        $alter = trim($_POST["alter"]);
    }
    //Vordem Insert überprüfen ob Fehler vorhanden sind
    if(empty($auftraggeberError) && empty($ansprechpartnerError) && empty($mitarbeiterError) && empty($statusError) && empty($beschreibungError) && empty($garantieError) && empty($alterError) && empty($produktError)) {
        //Überprüfen ob die Servicerückmeldung schon in der Datenbank vorhanden
        $sqlPrüfen = "SELECT Auftraggeber, Alter, Beschreibung FROM servicerueckmeldung
                      WHERE (Auftraggeber = '$auftraggeber') AND (Alter = '$alter') AND (Beschreibung = '$beschreibung')";
        $resultPrüfen = mysqli_query($connection, $sqlPrüfen);
        if(mysqli_num_rows($resultPrüfen) >= 1){
            $datenbankError = "Bitte legen Sie eine noch nicht vorhandene Servicerückmeldung an";
        } else {
            //SQL Statement Variable übergeben
            $sqlStatement = "INSERT INTO servicerueckmeldung (Auftraggeber, Ansprechpartner, Mitarbeiter, Beschreibung, Status, Garantie, Produkt, Alter) 
                     VALUES ('$auftraggeber','$ansprechpartner','$mitarbeiter', '$beschreibung', '$status', '$garantie', '$produkt', '$alter')";
            //SQL Insert durchführen mit mysqli query
            if(mysqli_query($connection, $sqlStatement)) {
                echo "Servicerückmeldung erfolgreich angelegt";
            } else {
                echo "Error:" .$sqlStatement . "<br>" . mysqli_error($connection);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Servicerückmeldung anlegen</title>
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
            <form action="servicerückmeldung.php" method="post">

            <div class="col">
                    <h1>Servicerückmeldung anlegen</h1>
                    <div class="one"><h4>Allgemeine Daten</h4></div>
                    <div class="one-container">
                        <div>
                            <label style="width:109.6px;">Auftraggeber</label>
                            <input type="text" name="auftraggeber" value="<?php echo $auftraggeber; ?>" class="ml-2" style="background-color:#ffffff;">
                            <span class="help-block"><?php echo $auftraggeberError; ?></span>
                        </div>
                        <div>
                            <label style="width:109.6px;">Beschreibung</label>
                            <input type="text" name="beschreibung" value="<?php echo $beschreibung; ?>" class="ml-2">
                            <span class="help-block"><?php echo $beschreibungError; ?></span>
                        </div>
                        <div>
                            <label style="width:109.6px;">Ansprechpartner</label>
                            <input type="text" name="ansprechpartner" value="<?php echo $ansprechpartner; ?>" class="ml-2">
                            <span class="help-block"><?php echo $ansprechpartnerError; ?></span>
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
                        <label style="width:109.6px;">Garantie-ID</label>
                        <input type="text" name="garantie" value="<?php echo $garantie; ?>" class="ml-2">
                        <span class="help-block"><?php echo $garantieError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Produkt</label>
                        <input type="text" name="produkt" value="<?php echo $produkt;?>" class="ml-2">
                        <span class="help-block"><?php echo $produktError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Alter des Produkts</label>
                        <input type="text" name="alter" value="<?php echo $alter; ?>" class="ml-2">
                        <span class="help-block"><?php echo $alterError; ?></span>
                        <button class="btn btn-primary such-button" type="submit">Servicerückmeldung anlegen</button>
                        <span class="help-block"><?php echo $datenbankError; ?></span>
                    </div>
                </div>
            </div>
    </form>
        </div>

</div>
</body>

</html>