<?php




$primaryKey = $_GET['id'];
$row;
?>


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


    <div class="container-fluid">
        <div class="row">

        </div>

        <div class="row">
            <div class="col">
                <strong>Lead Details</strong>
                <?php
                include("config.php");
                //if ($_SERVER["REQUEST_METHOD"] == "GET") {

                $select = "SELECT ID,Vorname,Nachname, Firma, Strasse, leadInteresse, Stadt, Stadt, hausNummer, PLZ, Land
                              FROM leads WHERE ID = '$primaryKey'";
                $result = mysqli_query($connection, $select);


                print "<div class=\"table-responsive\">\n";
                print "                        <table class=\"table\">\n";
                print "                            <thead>\n";
                print "                                <tr>\n";
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
                print "                                </tr>\n";
                print "                            </thead>\n";
                print "                            <tbody>\n";
                if (mysqli_num_rows($result) > 0) {
                    print '<form method="post" action ="lead-details.php">';

                    //durch global nimmt er er es von oben
                    global $row;
                    $row = mysqli_fetch_assoc($result);

                    echo '<tr>';
                    echo " <td>" . $row['ID'] . "</td>";
                    echo " <td>" . $row["leadInteresse"] . "</td>";
                    echo " <td>" . $row["Vorname"] . "</td>";
                    echo " <td>" . $row["Nachname"] . "</td>";
                    echo " <td>" . $row["Firma"] . "</td>";
                    echo " <td>" . $row["Strasse"] . "</td>";
                    echo " <td>" . $row["hausNummer"] . "</td>";
                    echo " <td>" . $row["PLZ"] . "</td>";
                    echo " <td>" . $row["Stadt"] . "</td>";
                    echo " <td>" . $row["Land"] . "</td>";

                    echo '</tr>';

                    print '</form>';
                    // }

                }
                ?>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div>
            <h3>Lead umwandeln</h3>
            <p> Sind Sie sicher, dass Sie den Lead in ein eine Opportunite umwandeln möchten?</p>
        </div>

        <div>


            <form method="POST" action='lead-details.php?id=<?= $primaryKey ?>'>

                <input type="text" name="text" style="display:none">
                <input type="submit" class="btn btn-primary such-button" name="button1" value="Umwandeln">
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <?php

        if (isset($_POST['text'])) {
            global $row;

            //Ich speicher die Ausgaben der Tabelle in die Variable
            $vorname = $row['Vorname'];
            $nachname = $row['Nachname'];
            $id = $row['ID'];
            $interesse = $row['leadInteresse'];
            $firma = $row['Firma'];
            $strasse = $row['Strasse'];
            $hausnummer = $row['hausNummer'];
            $stadt = $row['Stadt'];
            $PLZ = $row['PLZ'];
            $land = $row['Land'];

            //Danach fügen wir es in eine andere Tabelle ein

            $sqlInsert = "INSERT INTO opportunities (Vorname, Nachname, Firma, Interesse, Stadt, Hausnummer, PLZ, Land, Strasse)
            VALUES ('$vorname', '$nachname', '$firma', '$interesse', '$stadt', '$hausnummer', '$PLZ', '$land', '$strasse')";
            mysqli_query($connection, $sqlInsert);

            $delete = "DELETE FROM leads WHERE ID='$id'";
            mysqli_query($connection, $delete);

            echo "Lead wurde umgewandelt";
        }


        ?>


    </div>
</div>

</div>


<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/Sidebar-Menu.js"></script>


</body>

</html>