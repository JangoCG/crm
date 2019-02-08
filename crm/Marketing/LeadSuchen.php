<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lead suchen</title>
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
                <form action="LeadSuchen.php" method="post">
                    <h1>Leads suchen</h1>
                    <div>
                        <label style="width:80.6px;">ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" placeholder="ID eingeben" name="id" class="ml-2"
                               style="background-color:#ffffff;">
                    </div>
                    <div><label style="width:80.6px;">Beschreibung</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="beschreibung" placeholder="Beschreibung eingeben"
                                                                          class="ml-2"></div>
                    <div><label style="width:80.6px;">Interessent</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="interessent" placeholder="Interessent eingeben"
                                                                       class="ml-2">
                    </div>
                    <div>
                        <label style="width:80.6px;">Kampagne</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" placeholder="Kampagne eingeben" name="kampagne" class="ml-2"
                               style="background-color:#ffffff;">
                    </div>
                    <div>
                        <label style="width:80.6px;">Partnernummer</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" placeholder="Partnernummer eingeben" name="partnernummer" class="ml-2"
                               style="background-color:#ffffff;">
                    </div>
                    <div>
                        <label style="width:80.6px;">Starttermin</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" placeholder="Starttermin eingeben" name="starttermin" class="ml-2"
                               style="background-color:#ffffff;">
                    </div>
                    <div>
                        <label style="width:80.6px;">Endtermin</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" placeholder="Endtermin eingeben" name="endtermin" class="ml-2"
                               style="background-color:#ffffff;">
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

                $id = "";
                $beschreibung = "";
                $interessent = "";
                $kampagne = "";
                $partnernummer = "";
                $starttermin = "";
                $endtermin = "";

                $id = trim($_POST["id"]);
                $beschreibung = trim($_POST["beschreibung"]);
                $interessent = trim($_POST["interessent"]);
                $kampagne = trim($_POST["kampagne"]);
                $partnernummer = trim($_POST["partnernummer"]);
                $starttermin = trim($_POST["starttermin"]);
                $endtermin = trim($_POST["endtermin"]);

                //Diese IF Abfrage weil ich sonst Fehler bekommen, da beim ersten Aufruf noch kein post geschehen ist
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $selectStatement = "SELECT ID, Beschreibung, Interessent, Kampagne, Partnernummer, Starttermin, Endtermin FROM Lead
                                        WHERE (ID ='$id' AND ID != '')  OR (Beschreibung = '$beschreibung'AND Beschreibung != '')
                                         OR (Interessent = '$interessent' AND Interessent != '') OR (Kampagne = '$kampagne' AND Kampagne != '')
                                         OR (Partnernummer = '$partnernummer'AND Partnernummer != '') OR (Starttermin = '$starttermin'AND Starttermin != '')
                                         OR (Endtermin = '$endtermin'AND Endtermin != '')";
                    $result = mysqli_query($connection, $selectStatement);


                    echo '<div>';
                    echo ' <div class="table-responsive">';
                    echo '   <table class="table">';
                    echo ' <thead>';
                    echo '<tr>';
                    echo '<th>ID</th>';
                    echo '<th>Beschreibung</th>';
                    echo '<th>Interessent</th>';
                    echo '<th>Kampagne</th>';
                    echo '<th>Partnernummer</th>';
                    echo '<th>Starttermin</th>';
                    echo '<th>Endtermin</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo ' <tbody>';
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';

                            // echo "</table>";
                            echo " <td>". $row["ID"]."</td>";
                            echo " <td>". $row["Beschreibung"]."</td>";
                            echo " <td>". $row["Interessent"]."</td>";
                            echo " <td>". $row["Kampagne"]."</td>";
                            echo " <td>". $row["Partnernummer"]."</td>";
                            echo " <td>". $row["Starttermin"]."</td>";
                            echo " <td>". $row["endtermin"]."</td>";
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