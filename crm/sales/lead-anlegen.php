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
$leadInteresse="";
$leadInteresseError="";
$hausNummer="";
$hausNummerError="";






//Diese IF Abfrage weil ich sonst Fehler bekommen, da beim ersten Aufruf noch kein post geschehen ist
if($_SERVER["REQUEST_METHOD"] == "POST") {

    require 'User Input/vorname.php';
    require 'User Input/nachname.php';
    require 'User Input/firma.php';
    require 'User Input/plz.php';
    require 'User Input/land.php';
    require 'User Input/strasse.php';
    require 'User Input/hausnummer.php';
    require 'User Input/stadt.php';


    //leadInteresse
    //Um den Wert von leadInteresse zu erhalten wird Array durchlaufen, welches vorher im HTML Code deklariert wurde als name
    foreach ($_POST['leadInteresse'] as $leadInteresse) {

    }

    foreach ($_POST['produkt'] as $produkt) {   //Ich hole das Produkt per post und speichere es in die Variable produkt

    }

    //Hausnummer - Hier wurden die restlichen Prüfungen weggelassen, weil inputlength = 3;
    if (empty(trim($_POST["hausNummer"]))) {
        $hausNummerError = "Bitte geben Sie einen hausNummern ein";

    } elseif (!(ctype_digit ($_POST["hausNummer"]))) { //ctype_alpha prüft ob nur aus zahlen besteht
        $hausNummerError = "Bitte verwenden Sie nur Buchstaben für den hausNummern";
    } else {
        $hausNummer = trim($_POST["hausNummer"]);
    }





    //Vordem Insert überprüfen ob Fehler vorhanden sind
    if(empty($vornameError) && empty($nachnameError) && empty($firmaError) && empty($plzError) && empty($landError) && empty($strasseError) && empty($stadtError)) {

        //SQL Statement Variable übergeben
        $sqlStatement = "INSERT INTO leads (Vorname, Nachname,Firma, PLZ, Land, Strasse, leadInteresse, Stadt, Hausnummer) 
                     VALUES ('$vorname','$nachname','$firma', '$plz', '$land', '$strasse', '$leadInteresse', '$stadt', '$hausNummer')";

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
    <title>Lead anlegen</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="../assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="../assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../css/cengiz.css">
</head>

<body>
<div id="wrapper">
    <?php
    include "sidebar.html";
    include "navigation-bar.html"
    ?>

    <!-- Container und danach kommt die Obere Navigation-->



        <div class="row">
            <div class="col">
                <form action="lead-anlegen.php" method="post">
                    <h1>Lead anlegen</h1>
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
                        <label style="width:109.6px;">Produkt</label>
                        <select id="produkt" name="produkt[]"   class="ml-2" >
                            <option>Produkt 1</option>
                            <option>Produkt 2</option>
                            <option>Produkt 3</option>
                        </select>
                        <span class="help-block"><?php echo $leadInteresseError; ?></span>
                    </div>
                    <div>
                        <label style="width:109.6px;">Bewertung</label>
                        <select id="leadInteresse" name="leadInteresse[]"   class="ml-2" >
                            <option>Hohes Interesse</option>
                            <option>Mittleres Interesse</option>
                            <option>Geringes Interesse</option>
                        </select>
                        <span class="help-block"><?php echo $leadInteresseError; ?></span>
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

                    <label style="width:109.6px;">Hausnummer</label>
                    <input type="text" name="hausNummer" maxlength="3" value="<?php echo $hausNummer; ?>" class="ml-2 kleines-feld">
                    <span class="help-block"><?php echo $hausNummerError; ?></span>
                </div>
                <div>
                    <label style="width:109.6px;">PLZ</label>
                    <input type="text" name="plz" maxlength="5" value="<?php echo $plz; ?>" class="ml-2">
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

