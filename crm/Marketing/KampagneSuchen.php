<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kampagne suchen</title>
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
                <form action="KampagneSuchen.php" method="post">
                    <h1>Kampagne suchen</h1>
                    <div>
                        <label style="width:80.6px;">Beschreibung</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" placeholder="Beschreibung eingeben" name="beschreibung" class="ml-2" style="background-color:#ffffff;">
                    </div>
                    <div>
                        <label style="width:80.6px;">Art</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" name="art" placeholder="Art eingeben" class="ml-2"></div>
                    <div>
                        <label style="width:80.6px;">Zielsetzung</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" name="zielsetzung" placeholder="Zielsetzung eingeben" class="ml-2">
                    </div>
                    <div>
                        <label style="width:80.6px;">Taktik</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" placeholder="Taktik eingeben" name="taktik" class="ml-2" style="background-color:#ffffff;">
                    </div>
                    <div>
                        <label style="width:80.6px;">Priorität</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" placeholder="Priorität eingeben" name="prioritaet" class="ml-2" style="background-color:#ffffff;">
                    </div>
                    <div>
                        <label style="width:80.6px;">Mitarbeiter</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" placeholder="Mitarbeiter eingeben" name="mitarbeiter" class="ml-2" style="background-color:#ffffff;">
                    </div>
                    <div>
                        <label style="width:80.6px;">Starttermin</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" placeholder="Starttermin eingeben" name="starttermin" class="ml-2" style="background-color:#ffffff;">
                    </div>
                    <div>
                        <label style="width:80.6px;">Endtermin</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" placeholder="Endtermin eingeben" name="endtermin" class="ml-2" style="background-color:#ffffff;">
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

                $beschreibung = "";
                $art = "";
                $zielsetzung = "";
                $taktik = "";
                $prioritaet = "";
                $mitarbeiter = "";
                $starttermin = "";
                $endtermin = "";

                $beschreibung = trim($_POST["beschreibung"]);
                $art = trim($_POST["art"]);
                $zielsetzung = trim($_POST["zielsetzung"]);
                $taktik = trim($_POST["taktik"]);
                $prioritaet = trim($_POST["prioritaet"]);
                $mitarbeiter = trim($_POST["mitarbeiter"]);
                $starttermin = trim($_POST["starttermin"]);
                $endtermin = trim($_POST["endtermin"]);


                //Diese IF Abfrage weil ich sonst Fehler bekommen, da beim ersten Aufruf noch kein post geschehen ist
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $selectStatement = "SELECT Beschreibung, Art, Zielsetzung, Taktik, Prioritaet, Mitarbeiter, Starttermin, Endtermin FROM kampagne
                                        WHERE (Beschreibung ='$beschreibung' AND Beschreibung != '')  OR (Art = '$art'AND Art != '')
                                         OR (Zielsetzung = '$zielsetzung' AND Zielsetzung != '') OR (Taktik = '$taktik' AND Taktik != '')
                                         OR (Prioritaet = '$prioritaet'AND Prioritaet != '') OR (Mitarbeiter = '$mitarbeiter'AND Mitarbeiter != '')
                                         OR (Starttermin = '$starttermin'AND Starttermin != '') OR (Endtermin = '$endtermin'AND Endtermin!= '')";
                    $result = mysqli_query($connection, $selectStatement);


                    echo '<div>';
                    echo ' <div class="table-responsive">';
                    echo '   <table class="table">';
                    echo ' <thead>';
                    echo '<tr>';
                    echo '<th>Beschreibung</th>';
                    echo '<th>Art</th>';
                    echo '<th>Zielsetzung</th>';
                    echo '<th>Taktik</th>';
                    echo '<th>Prioritaet</th>';
                    echo '<th>Mitarbeiter</th>';
                    echo '<th>Starttermin</th>';
                    echo '<th>Endtermin</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo ' <tbody>';
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';

                            // echo "</table>";
                            echo " <td>". $row["Beschreibung"]."</td>";
                            echo " <td>". $row["Art"]."</td>";
                            echo " <td>". $row["Zielsetzung"]."</td>";
                            echo " <td>". $row["Taktik"]."</td>";
                            echo " <td>". $row["Prioritaet"]."</td>";
                            echo " <td>". $row["Mitarbeiter"]."</td>";
                            echo " <td>". $row["Starttermin"]."</td>";
                            echo " <td>". $row["Endtermin"]."</td>";
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