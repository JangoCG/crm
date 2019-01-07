<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privat-Account anlegen</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="../assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="../assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>


<body>
<div id="wrapper">
    <div id="sidebar-wrapper" style="background-color:#37434d;">
        <h1>CRM System</h1>
        <div class="mt-5">
            <div class="dropdown amk-border"><a class="btn btn-primary dropdown-toggle kein-rahmen" data-toggle="dropdown" aria-expanded="false" role="button" href="#">Accounts & Produkte</a>
                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="ProduktAnlegen.html">Produkt anlegen</a><a class="dropdown-item" role="presentation" href="ProduktSuchen.html">Produkt suchen</a><a class="dropdown-item" role="presentation" href="PrivatAccountanlegen.php">Privat-Account anlegen</a><a class="dropdown-item" role="presentation" href="PrivatAccountsuchen.html">Privat-Account suchen</a></div>
            </div>
            <div class="dropdown"><button class="btn btn-primary dropdown-toggle kein-rahmen" data-toggle="dropdown" aria-expanded="false" type="button" style="width:248px;">Marketing</button>
                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">Leads anlegen</a><a class="dropdown-item" role="presentation" href="#">Leads suchen</a><a class="dropdown-item" role="presentation" href="#">Kampagne anlegen</a><a class="dropdown-item" role="presentation" href="#">Kampagne suchen</a><a class="dropdown-item" role="presentation" href="#">Marketingplan anlegen</a><a class="dropdown-item" role="presentation" href="#">Marketingplan suchen</a></div>
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
                    <h3>Privat Account anlegen</h3><br>
                    <div><b>Allgemeine Daten</b></div><br>
                    <div><label style="width:109.6px;">ID</label><input type="text" class="ml-2" style="background-color:#ffffff;"></div>
                    <div><label style="width:109.6px;">Anrede</label><input type="text" class="ml-2" style="background-color:#ffffff;"></div>
                    <form action="PrivatAccountanlegen.php" method="post">
                        <div>
                            <label>Vorname</label>
                            <input type="text" name="Vorname" class="ml-2" style="background-color:#ffffff;" value="<?php echo $Vorname; ?>">
                            <span class="help-block"><?php echo $VornameError; ?></span>
                        </div>
                    </form>
                    <div><label style="width:109.6px;">Nachname</label><input type="text" class="ml-2" style="background-color:#ffffff;"></div>
                    <div><label style="width:109.6px;">Geburtsdatum</label><input type="text" class="ml-2"></div>
                    <div><label style="width:109.6px;">Firma</label><input type="text" class="ml-2"></div>

                </div>
                <div class="col">
                    <h1></h1><br><br>
                    <div><b>Hauptadresse und Kommunikationsdaten</b></div><br>
                    <div><label style="width:109.6px;">Straße</label><input type="text" class="ml-2"></div>
                    <div><label style="width:109.6px;">Hausnummer</label><input type="text" class="ml-2"></div>
                    <div><label style="width:109.6px;">PLZ</label><input type="text" class="ml-2"></div>
                    <div><label style="width:109.6px;">Ort</label><input type="text" class="ml-2"></div>
                    <div><label style="width:109.6px;">Land</label><input type="text" class="ml-2"></div>
                        <div><label style="width:109.6px;">Telefon</label><input type="text" class="ml-2"></div>
                        <div><label style="width:109.6px;">Mobiltelefon</label><input type="text" class="ml-2"></div>
                        <div><label style="width:109.6px;">E-Mail</label><input type="text" class="ml-2"></div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Privat-Account anlegen">
                        </div>
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


include("config.php");

//Variablen deklarieren und mit leeren Werten initalisieren

$Vorname = "";
$VornameError = "";

//USERNAMEN Prüfen
//Diese IF Abfrage weil ich sonst Fehler bekommen, da beim ersten Aufruf noch kein post geschehen ist
if($_SERVER["REQUEST_METHOD"] == "POST"){



    /*Das empty prüft ob die Variable leer ist
    **Das trim entfernt die Leerzeichen
     mit $_POST["username"] hole ich mir das password aus meiner HTML Form
    Insgesamt wird hier geschaut ob das passwort leer ist
    */
    if(empty(trim($_POST["Vorname"]))) {
        $VornameError =  "Bitte geben Sie einen Vornamen ein";

    } elseif(!(ctype_alpha($_POST["Vorname"]))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
        $VornameError = "Bitte verwende nur Buchstaben für deinen Vornamen";
    } elseif (strlen(trim($_POST["Vorname"])) < 1) {
        $VornameError = "Der Vornamen muss 1 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["Vorname"]))  > 10) {
        $VornameError = "Der Vorname muss 10 Buchstaben oder weniger enthalten";
    }
    else {
        $Vorname = trim($_POST["Vorname"]);
    }
}

    //Überprüfen auf Eingabefehler
    if(empty($VornameError)) {

    //SQL Statement Variable übergeben
    $sqlStatement = "INSERT INTO test (Vorname) 
                     VALUES ('$Vorname')";

    //SQL Insert durchführen mit mysqli query

    if (mysqli_query($connection, $sqlStatement)) {
        echo "Registrierung erfolgreich";
    } else {
        echo "Error:" . $sqlStatement . "<br>" . mysqli_error($connection);
    }
}

?>
