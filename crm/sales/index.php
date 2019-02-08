<!DOCTYPE html>
<html>

<!--Das hier in deine ganzen Dateien kopieren -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account anlegen</title>
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

    <!--Bis hier hin -->


    <div class="row">
        &emsp;&emsp;<div class="col">
            <br><h3>Wilkommen im Sales Bereich.</h3>

            <p><b>Wetter-Widget</p>

            <iframe
                    src="https://www.wetter.de/deutschland/wetter-fulda-18221348.html"
                    width="90%"
                    height="400"
                    name="SELFHTML_in_a_box">

                <p>
                    <a href="https://wiki.selfhtml.org/wiki/Startseite">SELFHTML</a>
                </p>
            </iframe>
        </div>

        <div class="col">
            </b><br><br><br><b><p>Golem-Widget</p>
                <iframe
                        src="https://www.golem.de/"
                        width="90%"
                        height="400"
                        name="SELFHTML_in_a_box">

                    <p>
                        <a href="https://wiki.selfhtml.org/wiki/Startseite">SELFHTML</a>
                    </p>
                </iframe>
        </div>

    </div>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/Sidebar-Menu.js"></script>
</body>

</html>