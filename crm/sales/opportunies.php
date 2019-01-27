<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>andisos</title>
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

        <!-- Container und danach kommt die Obere Navigation-->


        <div class="container-fluid">
            <div class="row">
                <div class="col text-right" style="background-color:#37434d;"><input type="search" placeholder="Suchbegriff eingeben" id="grossesFeld"><button class="btn btn-primary ml-2 mt-1 mb-1" type="button">Button</button></div>
            </div>
            <div class="row">
                <div class="col">
                    <h1>Accounts suchen</h1>
                    <div><label style="width:80.6px;">Nachname</label><input type="text" placeholder="Name eingeben" class="ml-2" style="background-color:#ffffff;"></div>
                    <div><label style="width:80.6px;">Ort</label><input type="text" placeholder="Ort eingeben" class="ml-2"></div>
                    <div><label style="width:80.6px;">ID</label><input type="text" placeholder="ID eingeben" class="ml-2"><button class="btn btn-primary such-button" type="button">Suchen</button></div>
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