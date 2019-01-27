<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$primaryKey = $_GET['id'];
echo $primaryKey;


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
    require "sidebar.html";
    ?>


    <div class="container-fluid">
        <div class="row">
            <?php
            require "navigation-bar.html";
            ?>

        </div>

        <div class="row">
            <div class="col">
                <strong>Account Details</strong>
                <?php
                include("config.php");
                if ($_SERVER["REQUEST_METHOD"] == "GET") {

                    $select = "SELECT ID,Vorname,Nachname, Firma, PLZ, Land, Strasse, Stadt, Hausnummer, Rolle FROM accounts WHERE ID = '$primaryKey'";
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
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo " <td>" . $row['ID'] . "</td>";
                            echo " <td>" . $row["Vorname"] . "</td>";
                            echo " <td>" . $row["Nachname"] . "</td>";
                            echo " <td>" . $row["Firma"] . "</td>";
                            echo " <td>" . $row["PLZ"] . "</td>";
                            echo " <td>" . $row["Land"] . "</td>";
                            echo " <td>" . $row["Strasse"] . "</td>";
                            echo " <td>" . $row["Hausnummer"] . "</td>";
                            echo " <td>" . $row["Rolle"] . "</td>";
                            echo '</tr>';
                        }
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
                    <h1>test</h1>
                </div>

                <div>
                    <button class="btn btn-primary such-button" type="submit">Account anlegen</button>
                </div>
            </div>
        </div>

</div>

        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/Sidebar-Menu.js"></script>


</body>

</html>