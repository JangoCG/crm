<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account suchen</title>
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

    </div>
        <div class="row">
            <div class="col">
                <form action="PrivatAccountsuchen.php" method="post">
                    <h1>Accounts suchen</h1>
                    <div>
                        <label style="width:80.6px;">Nachname</label>
                        <input type="text" placeholder="Name eingeben" name="nachname" class="ml-2"
                               style="background-color:#ffffff;">
                    </div>
                    <div><label style="width:80.6px;">Stadt</label><input type="text" name="stadt" placeholder="Stadt eingeben"
                                                                          class="ml-2"></div>
                    <div><label style="width:80.6px;">ID</label><input type="text" name="id" placeholder="ID eingeben"
                                                                       class="ml-2">
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

                $nachname = "";
                $stadt = "";
                $id ="";

                $nachname = trim($_POST["nachname"]);
                $stadt = trim($_POST["stadt"]);
                $id = trim($_POST["id"]);


                //Diese IF Abfrage weil ich sonst Fehler bekommen, da beim ersten Aufruf noch kein post geschehen ist
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $selectStatement = "SELECT ID,Vorname,Nachname, Firma, PLZ, Land, Strasse, Stadt FROM AccountCRM
                                        WHERE (Nachname ='$nachname' AND Nachname != '')  OR (Stadt = '$stadt'AND Stadt != '')
                                         OR (ID = '$id' AND ID != '')";
                    $result = mysqli_query($connection, $selectStatement);


                    echo '<div>';
                    echo ' <div class="table-responsive">';
                    echo '   <table class="table">';
                    echo ' <thead>';
                    echo '<tr>';
                    echo '<th>ID</th>';
                    echo ' <th>Vorname</th>';
                    echo '<th>Nachname</th>';
                    echo '<th>Firma</th>';
                    echo '<th>PLZ</th>';
                    echo '<th>Land</th>';
                    echo '<th>Strasse</th>';
                    echo '<th>Stadt</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo ' <tbody>';
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';

                            // echo "</table>";
                            echo " <td>". $row["ID"]."</td>";
                            echo " <td>". $row["Vorname"]."</td>";
                            echo " <td>". $row["Nachname"]."</td>";
                            echo " <td>". $row["Firma"]."</td>";
                            echo " <td>". $row["PLZ"]."</td>";
                            echo " <td>". $row["Land"]."</td>";
                            echo " <td>". $row["Strasse"]."</td>";
                            echo " <td>". $row["Stadt"]."</td>";
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