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
$rolle="";
$rolleError="";
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

    //Rolle
    //Um den Wert von Rolle zu erhalten wird Array durchlaufen, welches vorher im input deklariert wurde
    foreach ($_POST['rolle'] as $rolle) {
    }

    //Vordem Insert überprüfen ob Fehler vorhanden sind
    if(empty($vornameError) && empty($nachnameError) && empty($firmaError) && empty($plzError) && empty($landError) && empty($strasseError) && empty($stadtError)) {


        //Überprüfen ob die Servicerückmeldung schon in der Datenbank vorhanden
        $sqlPrüfen = "SELECT Vorname, Nachname, Firma  FROM accounts
                      WHERE (Vorname ='$vorname') AND (Nachname = '$nachname') AND (Firma = '$firma')";

        $resultPrüfen = mysqli_query($connection, $sqlPrüfen);
        if (mysqli_num_rows($resultPrüfen) >= 1) {
            $datenbankError = "Account bereits vorhanden";
        } else {
            //SQL Statement Variable übergeben
            $sqlStatement = "INSERT INTO accounts (Vorname, Nachname,Firma, PLZ, Land, Strasse, Rolle, Stadt, Hausnummer) 
                     VALUES ('$vorname','$nachname','$firma', '$plz', '$land', '$strasse', '$rolle', '$stadt', '$hausNummer')";

            //SQL Insert durchführen mit mysqli query
            if (mysqli_query($connection, $sqlStatement)) {
                echo "Account erfolgreich angelegt";
            } else {
                echo "Error:" . $sqlStatement . "<br>" . mysqli_error($connection);
            }
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
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../css/cengiz.css">
</head>

<body>
<div id="wrapper">

            <!-- Sidebar Buttons-->

    <?php
    include "sidebar.html";
    include "navigation-bar.html";
    ?>




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
                        <label style="width:109.6px;">Rolle</label>
                        <select id="rolle" name="rolle[]"   class="ml-2" >
                            <option>Lieferant</option>
                            <option>Kunde</option>
                            <option>Spediteur</option>
                        </select>
                       <span class="help-block"><?php echo $rolleError; ?></span>
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
                        <span class="help-block"><?php echo $datenbankError; ?></span>
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

