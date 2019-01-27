<!DOCTYPE html>
<html>

<head>
    <title>Fälle suchen</title>
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
        <div class="col">
            <form action="fallsearch.php" method="post">
                <h1>Fälle suchen</h1>
                <div>
                    <label style="width:80.6px;">Mitarbeiter</label>
                    <input type="text" placeholder="Mitarbeiter eingeben" name="mitarbeiter" class="ml-2"
                           style="background-color:#ffffff;">
                </div>
                <div><label style="width:80.6px;">Beschreibung</label><input type="text" name="beschreibung"
                                                                             placeholder="Beschreibung eingeben"
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
            $auftraggeber = "";
            $beschreibung = "";
            $id = "";
            $auftraggeber = trim($_POST["auftraggeber"]);
            $beschreibung = trim($_POST["beschreibung"]);
            $id = trim($_POST["id"]);
            //Diese IF Abfrage weil ich sonst Fehler bekommen, da beim ersten Aufruf noch kein post geschehen ist
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $selectStatement = "SELECT Beschreibung, Art, Mitarbeiter, Status, Prioritaet, Grund FROM fall
                                        WHERE (Beschreibung ='$beschreibung' AND Beschreibung != '')  OR (Mitarbeiter = '$mitarbeiter'AND Mitarbeiter != '')
                                         OR (ID = '$id' AND ID != '')";
                $result = mysqli_query($connection, $selectStatement);
                echo '<div>';
                echo ' <div class="table-responsive">';
                echo '   <table class="table">';
                echo ' <thead>';
                echo '<tr>';
                echo '<th>ID</th>';
                echo ' <th>Beschreibung</th>';
                echo '<th>Art</th>';
                echo '<th>Mitarbeiter</th>';
                echo '<th>Status</th>';
                echo '<th>Priorität</th>';
                echo '<th>Grund</th>';
                echo '</tr>';
                echo '</thead>';
                echo ' <tbody>';
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        // echo "</table>";
                        echo " <td>" . $row["ID"] . "</td>";
                        echo " <td>" . $row["Beschreibung"] . "</td>";
                        echo " <td>" . $row["Art"] . "</td>";
                        echo " <td>" . $row["Mitarbeiter"] . "</td>";
                        echo " <td>" . $row["Status"] . "</td>";
                        echo " <td>" . $row["Priorität"] . "</td>";
                        echo " <td>" . $row["Grund"] . "</td>";
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
</body>

</html>