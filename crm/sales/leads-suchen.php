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
                <form action="leads-suchen.php" method="post">
                    <h1>Leads suche</h1>
                    <div>
                        <label style="width:80.6px;">Nachname</label>
                        <input type="text" placeholder="Name eingeben" name="nachname" class="ml-2"
                               style="background-color:#ffffff;">
                    </div>
                    <div>
                        <label style="width:109.6px;">Bewertung</label>
                        <!-- leadInteresse als Array deklariert, um es durchsuchen zu können -->
                        <select id="leadInteresse" name="leadInteresse[]"   class="ml-2" >
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


                include("config.php");



                $nachname = trim($_POST["nachname"]);
                $id = trim($_POST["id"]);

                //lead interesse als array deklariert, weil wir es hier mit for each schleife durchlaufen müssen

                foreach ($_POST['leadInteresse'] as $interesse) {

                }

                echo $interesse;




                //Diese IF Abfrage weil ich sonst Fehler bekommen, da beim ersten Aufruf noch kein post geschehen ist
                if ($_SERVER["REQUEST_METHOD"] == "POST") {



                    $selectStatement = "SELECT ID,Vorname,Nachname, Firma, PLZ, Land, Strasse, Stadt, hausNummer, leadInteresse FROM leads
                                        WHERE (Nachname ='$nachname' AND Nachname != '')  OR (leadInteresse = '$interesse')
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
                    echo '<th>Hausnummer</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo ' <tbody>';
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $row_id = $row['ID'];
                            echo '<tr>';
                            //Die links verlinken auf die lead-details seite und übergeben die ID
                            echo " <td>"  . "<a href=\"lead-details.php?id=" . $row_id . "\">" . $row_id . "</a></td>";
                            echo " <td>"  . "<a href=\"lead-details.php?id=" . $row_id . "\">" . $row["Vorname"] . "</a></td>";
                            echo " <td>"  . "<a href=\"lead-details.php?id=" . $row_id . "\">" . $row["Nachname"] . "</a></td>";

                            echo " <td>" . $row["Firma"] . "</td>";
                            echo " <td>" . $row["PLZ"] . "</td>";
                            echo " <td>" . $row["Land"] . "</td>";
                            echo " <td>" . $row["Strasse"] . "</td>";
                            echo " <td>" . $row["hausNummer"] . "</td>";
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