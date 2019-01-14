
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produkt suchen</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="../assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="../assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="../assets/css/styles.css">

<style>hr {
        width: 100%;
        height: 2px;
        margin:  auto;
        color: blue;
        background: #d3d9df;
    }
</style>

</head>

<body>
<div id="wrapper">
    <div id="sidebar-wrapper" style="background-color:#37434d;">
        <h1><a href="Dateisuche.php">Marketingpro</a></h1>
        <div class="mt-5">
            <div class="dropdown amk-border"><a class="btn btn-primary dropdown-toggle kein-rahmen" data-toggle="dropdown" aria-expanded="false" role="button" href="#">Accounts & Produkte</a>
                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="ProduktAnlegen.php">Produkt anlegen</a><a class="dropdown-item" role="presentation" href="ProduktSuchen.php">Produkt suchen</a><a class="dropdown-item" role="presentation" href="PrivatAccountanlegen.php">Privat-Account anlegen</a><a class="dropdown-item" role="presentation" href="PrivatAccountsuchen.php">Privat-Account suchen</a></div>
            </div>
            <div class="dropdown"><button class="btn btn-primary dropdown-toggle kein-rahmen" data-toggle="dropdown" aria-expanded="false" type="button" style="width:248px;">Marketing</button>
                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">Leads anlegen</a><a class="dropdown-item" role="presentation" href="#">Leads suchen</a><a class="dropdown-item" role="presentation" href="KampagneAnlegen.php">Kampagne anlegen</a><a class="dropdown-item" role="presentation" href="#">Kampagne suchen</a><a class="dropdown-item" role="presentation" href="#">Marketingplan anlegen</a><a class="dropdown-item" role="presentation" href="#">Marketingplan suchen</a></div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col text-right" style="background-color:#37434d;"><input type="search" placeholder="Suchbegriff eingeben" id="suche"><button class="btn btn-primary ml-2 mt-1 mb-1" type="button">Button</button></div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h2>Dateien auf dem Server:</h2>
            <div>
                <div class="table-responsive">
                    <?php
                    $alledateien = scandir('/var/www/html/crm/Marketing/'); //Ordner "files" auslesen

                    foreach ($alledateien as $datei) { // Ausgabeschleife
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". $datei. "<a href=\"/crm/Marketing/Bilder\">". "<hr>"; //Ausgabe Einzeldatei
                    };
                    ?>
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
