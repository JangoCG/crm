<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$primaryKey = $_GET['id'];



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
    ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col text-right" style="background-color:#37434d;"><input type="search"
                                                                                 placeholder="Suchbegriff eingeben"
                                                                                 id="grossesFeld">
                <button class="btn btn-primary ml-2 mt-1 mb-1" type="button">Button</button>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <strong>Lead Details</strong>
                <?php
                include("config.php");
                if ($_SERVER["REQUEST_METHOD"] == "GET") {

                    $select = "SELECT ID,Vorname,Nachname, Firma, Strasse, leadInteresse, Stadt, Stadt, hausNummer, PLZ, LAND
                              FROM leads WHERE ID = '$primaryKey'";
                    $result = mysqli_query($connection, $select);


                    print "<div class=\"table-responsive\">\n";
                    print "                        <table class=\"table\">\n";
                    print "                            <thead>\n";
                    print "                                <tr>\n";
                    print "                                    <th>Column 1</th>\n";
                    print "                                    <th>Column 2</th>\n";
                    print "                                    <th>Column 2</th>\n";
                    print "                                    <th>Column 2</th>\n";
                    print "                                    <th>Column 2</th>\n";
                    print "                                    <th>Column 2</th>\n";
                    print "                                    <th>Column 2</th>\n";
                    print "                                    <th>Column 2</th>\n";
                    print "                                    <th>Column 2</th>\n";
                    print "                                </tr>\n";
                    print "                            </thead>\n";
                    print "                            <tbody>\n";
                    if (mysqli_num_rows($result) > 0) {
                        print '<form method="post" action ="lead-details.php">';


                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo " <td>" . $row['ID'] . "</td>";
                            echo " <td>" . $row["leadInteresse"] . "</td>";
                            echo " <td>" . $row["Vorname"] . "</td>";
                            echo " <td>" . $row["Nachname"] . "</td>";
                            echo " <td>" . $row["Firma"] . "</td>";
                            echo " <td>" . $row["Strasse"] . "</td>";
                            echo " <td>" . $row["hausNummer"] . "</td>";
                            echo " <td>" . $row["Stadt"] . "</td>";
                            echo " <td>" . $row["PLZ"] . "</td>";

                            echo '</tr>';
                        }
                        print '</form>';
                    }

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
            <button class="btn btn-primary such-button" type="submit">Umwandeln</button>
        </div>
    </div>
</div>

</div>



<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/Sidebar-Menu.js"></script>


</body>

</html>