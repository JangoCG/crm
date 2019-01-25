<?php
echo $_GET['id'];
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
    <div id="sidebar-wrapper" style="background-color:#37434d;">
        <h1 class="test"> <a id="amkID" href="index.php" >Sales</a></h1>
        <div class="mt-5">

            <!-- Sidebar Buttons-->

            <div class="dropdown amk-border"><a class="btn btn-primary dropdown-toggle kein-rahmen"
                                                data-toggle="dropdown" aria-expanded="false" role="button" href="#">Accounts</a>
                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="accounts.php">Accounts suchen</a><a
                            class="dropdown-item" role="presentation" href="accounts-anlegen.php">Accounts anlegen</a><a
                            class="dropdown-item" role="presentation" href="ansprechpartner.php">Ansprechpartner</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle kein-rahmen" data-toggle="dropdown" aria-expanded="false"
                        type="button" style="width:248px;">Verkauf
                </button>
                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="lead-anlegen.php">Leads</a><a
                            class="dropdown-item" role="presentation" href="opportunitie.php">Opportunitys</a><a
                            class="dropdown-item" role="presentation" href="kundenauftrag.php">Kundenaufträge</a></div>
            </div>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle kein-rahmen" data-toggle="dropdown" aria-expanded="false"
                        type="button" style="width:100%;">Grundfunktionen
                </button>
                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="preise.php">Preise</a><a
                            class="dropdown-item" role="presentation" href="produkte.php">Produkte</a><a
                            class="dropdown-item" role="presentation" href="faktura.php">Faktura</a></div>
            </div>
        </div>
        <div></div>
    </div>


        <div class="container-fluid">
            <div class="row">
                <div class="col text-right" style="background-color:#37434d;"><input type="search" placeholder="Suchbegriff eingeben" id="grossesFeld"><button class="btn btn-primary ml-2 mt-1 mb-1" type="button">Button</button></div>
            </div>
            <div class="row">
                <div class="col"><strong>Account Details</strong>
                    <?php


                    print "<div class=\"table-responsive\">\n";
                    print "                        <table class=\"table\">\n";
                    print "                           k <thead>\n";
                    print "                                <tr>\n";
                    print "                                    <th>Column 1</th>\n";
                    print "                                    <th>Column 2</th>\n";
                    print "                                </tr>\n";
                    print "                            </thead>\n";
                    print "                            <tbody>\n";
                    print "                                <tr>\n";
                    print "                                    <td>Cell 1</td>\n";
                    print "                                    <td>Cell 2</td>\n";
                    print "                                </tr>\n";
                    print "                                <tr>\n";
                    print "                                    <td>Cell 3</td>\n";
                    print "                                    <td>Cell 4</td>\n";
                    print "                                </tr>\n";
                    print "                            </tbody>\n";
                    print "                        </table>\n";
                    print "                    </div>\n";
                    print "                </div>\n";
                    print "            </div>\n";
                    print "            <div class=\"row\">\n";
                    print "                <div class=\"col\"><strong>Opportunities</strong>\n";
                    print "                    <div class=\"table-responsive\">\n";
                    print "                        <table class=\"table\">\n";
                    print "                            <thead>\n";
                    print "                                <tr>\n";
                    print "                                    <th>Column 1</th>\n";
                    print "                                    <th>Column 2</th>\n";
                    print "                                </tr>\n";
                    print "                            </thead>\n";
                    print "                            <tbody>\n";
                    print "                                <tr>\n";
                    print "                                    <td>Cell 1</td>\n";
                    print "                                    <td>Cell 2</td>\n";
                    print "                                </tr>\n";
                    print "                                <tr>\n";
                    print "                                    <td>Cell 3</td>\n";
                    print "                                    <td>Cell 4</td>\n";
                    print "                                </tr>\n";
                    print "                            </tbody>\n";
                    print "                        </table>\n";
                    print "                    </div>\n";
                    print "                </div>\n";
                    print "            </div>\n";
                    print "            <div class=\"row\">\n";
                    print "                <div class=\"col\"><strong>Ansprechpartner</strong>\n";
                    print "                    <div class=\"table-responsive\">\n";
                    print "                        <table class=\"table\">\n";
                    print "                            <thead>\n";
                    print "                                <tr>\n";
                    print "                                    <th>Column 1</th>\n";
                    print "                                    <th>Column 2</th>\n";
                    print "                                </tr>\n";
                    print "                            </thead>\n";
                    print "                            <tbody>\n";
                    print "                                <tr>\n";
                    print "                                    <td>Cell 1</td>\n";
                    print "                                    <td>Cell 2</td>\n";
                    print "                                </tr>\n";
                    print "                                <tr>\n";
                    print "                                    <td>Cell 3</td>\n";
                    print "                                    <td>Cell 4</td>\n";
                    print "                                </tr>\n";
                    print "                            </tbody>\n";
                    print "                        </table>\n";
                    print "                    </div>\n";
                    print "                </div>\n";
                    print "            </div>\n";
                    print "            <div class=\"row\">\n";
                    print "                <div class=\"col\"><strong>Kauf Historie</strong>\n";
                    print "                    <div class=\"table-responsive\">\n";
                    print "                        <table class=\"table\">\n";
                    print "                            <thead>\n";
                    print "                                <tr>\n";
                    print "                                    <th>Column 1</th>\n";
                    print "                                    <th>Column 2</th>\n";
                    print "                                </tr>\n";
                    print "                            </thead>\n";
                    print "                            <tbody>\n";
                    print "                                <tr>\n";
                    print "                                    <td>Cell 1</td>\n";
                    print "                                    <td>Cell 2</td>\n";
                    print "                                </tr>\n";
                    print "                                <tr>\n";
                    print "                                    <td>Cell 3</td>\n";
                    print "                                    <td>Cell 4</td>\n";
                    print "                                </tr>\n";
                    print "                            </tbody>\n";
                    print "                        </table>\n";
                    print "                    </div>\n";
                    print "                </div>\n";
                    print "            </div>\n";
                    print "        </div>\n";
                    print "    </div>";

                    ?>

                    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/Sidebar-Menu.js"></script>
</body>

</html>