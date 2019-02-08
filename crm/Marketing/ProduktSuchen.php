<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produkt Suchen</title>
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
                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">Leads anlegen</a><a class="dropdown-item" role="presentation" href="LeadSuchen.php">Leads suchen</a><a class="dropdown-item" role="presentation" href="KampagneAnlegen.php">Kampagne anlegen</a><a class="dropdown-item" role="presentation" href="KampagneSuchen.php">Kampagne suchen</a><a class="dropdown-item" role="presentation" href="Dateisuche.php">Datei suchen</a></div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col text-right" style="background-color:#37434d;"><input type="search" placeholder="Suchbegriff eingeben"id="grossesFeld">
                <button class="btn btn-primary ml-2 mt-1 mb-1" type="button">Button</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="ProduktSuchen.php" method="post">
                    <h1>Produkte suchen</h1>
                    <div>
                        <label style="width:80.6px;">Produkt-ID</label>
                        <input type="text" placeholder="ID eingeben" name="produktid" class="ml-2"style="background-color:#ffffff;">
                    </div>
                    <div><label style="width:80.6px;">Name</label><input type="text" name="name" placeholder="Produktname eingeben"class="ml-2"></div>
                    <div><label style="width:80.6px;">Kategorie</label><input type="text" name="kategorie" placeholder="Kategorie eingeben"class="ml-2"></div>
                    <div><label style="width:80.6px;">Menge</label><input type="text" name="menge" placeholder="Stadt eingeben"class="ml-2"></div>
                    <div><label style="width:80.6px;">Preis</label><input type="text" name="preis" placeholder="Preis eingeben"class="ml-2">
                        <button class="btn btn-primary such-button" type="submit">Suchen</button>
                    </div>
                </form>



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
                $name = "";
                $kategorie = "";
                $menge ="";
                $preis ="";

                $produktid = trim($_POST["produktid"]);
                $name = trim($_POST["name"]);
                $kategorie = trim($_POST["kategorie"]);
                $menge = trim($_POST["name"]);
                $preis = trim($_POST["preis"]);

                //Diese IF Abfrage weil ich sonst Fehler bekommen, da beim ersten Aufruf noch kein post geschehen ist
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $selectStatement = "SELECT ProduktID, Name, Kategorie, Menge, Preis FROM Produktmarketing
                                        WHERE (ProduktID ='$produktid' AND ProduktID != '')  OR (Name = '$name'AND Name != '')
                                         OR (Kategorie = '$kategorie' AND Kategorie != '') OR (Menge = '$menge' AND Menge != '') OR (Preis = '$preis'AND Preis != '')";
                    $result = mysqli_query($connection, $selectStatement);


                    echo '<div>';
                echo ' <div class="table-responsive">';
                echo '   <table class="table">';
                    echo ' <thead>';
                    echo '<tr>';
                        echo '<th>ProduktID</th>';
                        echo '<th>Name</th>';
                        echo '<th>Kategorie</th>';
                        echo '<th>Menge</th>';
                        echo '<th>Preis</th>';
                        echo '</tr>';
                    echo '</thead>';
                    echo ' <tbody>';
                    if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';

                        // echo "</table>";
                echo " <td>". $row["ProduktID"]."</td>";
                echo " <td>". $row["Name"]."</td>";
                echo " <td>". $row["Kategorie"]."</td>";
                echo " <td>". $row["Menge"]."</td>";
                echo " <td>". $row["Preis"]."</td>";
                echo '</tr>';



                }

                echo ' </tbody>';
                echo '</table>';
                echo '</div>';
                echo '</div>';
            }
            }
            ?>
        </div>
    </div>
</div>
</div>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/Sidebar-Menu.js"></script>
</body>

</html>

<!DOCTYPE html>
<html>
