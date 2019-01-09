<?php
/**
 * Created by PhpStorm.
 * User: cengiz
 * Date: 23.11.18
 * Time: 00:09
 */

include("config.php");

//Variablen deklarieren und mit leeren Werten initalisieren

$nachname="";

$nachname = trim($_POST["nachname"]);





//Diese IF Abfrage weil ich sonst Fehler bekommen, da beim ersten Aufruf noch kein post geschehen ist
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $selectStatement = "SELECT Nachname FROM test WHERE Nachname ='$nachname'";
    $result = mysqli_query($connection, $selectStatement);
    var_dump($result);







}
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
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div id="wrapper">
        <div id="sidebar-wrapper" style="background-color:#37434d;">
            <h1><a href="index.php">Sales</a></h1>
            <div class="mt-5">

                <!-- Sidebar Buttons-->

                <div class="dropdown amk-border"><a class="btn btn-primary dropdown-toggle kein-rahmen" data-toggle="dropdown" aria-expanded="false" role="button" href="#">Accounts</a>
                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="accounts.php">Accounts</a><a class="dropdown-item" role="presentation" href="accounts-anlegen.php">Accounts anlegen</a><a class="dropdown-item" role="presentation" href="ansprechpartner.php">Ansprechpartner</a></div>
                </div>
                <div class="dropdown"><button class="btn btn-primary dropdown-toggle kein-rahmen" data-toggle="dropdown" aria-expanded="false" type="button" style="width:248px;">Verkauf</button>
                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="leads.php">Leads</a><a class="dropdown-item" role="presentation" href="opportunitie.php">Opportunitys</a><a class="dropdown-item" role="presentation" href="kundenauftrag.php">Kundenaufträge</a></div>
                </div>
                <div class="dropdown"><button class="btn btn-primary dropdown-toggle kein-rahmen" data-toggle="dropdown" aria-expanded="false" type="button" style="width:100%;">Grundfunktionen</button>
                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="preise.php">Preise</a><a class="dropdown-item" role="presentation" href="produkte.php">Produkte</a><a class="dropdown-item" role="presentation" href="faktura.php">Faktura</a></div>
                </div>
            </div>
            <div></div>
        </div>

        <!-- Container und danach kommt die Obere Navigation-->


        <div class="container-fluid">
            <div class="row">
                <div class="col text-right" style="background-color:#37434d;"><input type="search" placeholder="Suchbegriff eingeben" id="grossesFeld"><button class="btn btn-primary ml-2 mt-1 mb-1" type="button">Button</button></div>
            </div>
            <div class="row">
                <div class="col">
                    <form action="accounts.php" method="post">
                    <h1>Accounts suchen</h1>
                    <div>
                        <label style="width:80.6px;">Nachname</label>
                        <input type="text" placeholder="Name eingeben" name="nachname" class="ml-2" style="background-color:#ffffff;">
                    </div>
                    <div><label style="width:80.6px;">Ort</label><input type="text" placeholder="Ort eingeben" class="ml-2"></div>
                    <div><label style="width:80.6px;">ID</label><input type="text" placeholder="ID eingeben" class="ml-2"><button class="btn btn-primary such-button" type="submit">Suchen</button></div>
                    </form>
                    <div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Column 1</th>
                                        <th>Column 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                    </tr>
                                    <tr>
                                        <td>Cell 3</td>
                                        <td>Cell 4</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/Sidebar-Menu.js"></script>
</body>

</html>