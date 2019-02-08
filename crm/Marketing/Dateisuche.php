
<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dateisuche</title>
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
            <h2>Kampagnedateien auf dem Server:</h2>
            <div>
                <div class="table-responsive">
                    <?php
                    $alledateien = scandir('/var/www/html/crm/Marketing/Bilder'); //Ordner "files" auslesen

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
