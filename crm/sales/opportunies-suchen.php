<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts</title>
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
    include "navigation-bar.html";
    ?>




    <div class="row">
        <div class="col">
            <form action="opportunies-suchen.php" method="post">
                <h1>Opportunity suche</h1>
                <div>
                    <label style="width:80.6px;">Nachname</label>
                    <input type="text" placeholder="Name eingeben" name="nachname" class="ml-2"
                           style="background-color:#ffffff;">
                </div>
                <div>
                    <label style="width:109.6px;">Bewertung</label>
                    <select id="leadInteresse" name="oppInteresse[]"   class="ml-2" >
                        <option></option>
                        <option>Hohes Interesse</option>
                        <option>Mittleres Interesse</option>
                        <option>Geringes Interesse</option>

                    </select>
                    <span class="help-block"><?php echo $leadInteresseError; ?></span>
                </div>
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


            $nachname = trim($_POST["nachname"]);
            $id = trim($_POST["id"]);

            foreach ($_POST['oppInteresse'] as $interesse) {

            }

            echo $interesse;




            //Diese IF Abfrage weil ich sonst Fehler bekommen, da beim ersten Aufruf noch kein post geschehen ist
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $selectStatement = "SELECT ID,Vorname,Nachname, Firma, PLZ, Land, Strasse, Stadt, Hausnummer, Interesse FROM opportunities
                                        WHERE (Nachname ='$nachname' AND Nachname != '')  OR (Interesse = '$interesse')
                                         OR (ID = '$id' AND ID != '')";
                $result = mysqli_query($connection, $selectStatement);


                echo '<div>';
                echo ' <div class="table-responsive">';
                echo '   <table class="table">';
                echo ' <thead>';
                echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>Interesse</th>';
                echo ' <th>Vorname</th>';
                echo '<th>Nachname</th>';
                echo '<th>Firma</th>';
                echo '<th>Strasse</th>';
                echo '<th>Hausnummer</th>';
                echo '<th>Stadt</th>';
                echo '<th>PLZ</th>';
                echo '<th>Land</th>';
                echo '</tr>';
                echo '</thead>';
                echo ' <tbody>';
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $row_id = $row['ID'];
                        echo '<tr>';
                        echo " <td>" . $row['ID'] . "</td>";
                        echo " <td>" . $row["Interesse"] . "</td>";
                        echo " <td>" . $row["Vorname"] . "</td>";
                        echo " <td>" . $row["Nachname"] . "</td>";
                        echo " <td>" . $row["Firma"] . "</td>";
                        echo " <td>" . $row["Strasse"] . "</td>";
                        echo " <td>" . $row["Hausnummer"] . "</td>";
                        echo " <td>" . $row["PLZ"] . "</td>";
                        echo " <td>" . $row["Stadt"] . "</td>";
                        echo " <td>" . $row["Land"] . "</td>";;
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