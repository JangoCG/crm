<!DOCTYPE html>
<html>

<head>
    <title>Account & Produkte</title>
    <?php
    include 'template/navigation-head.html';
    ?>
</head>

<body>
<div id="wrapper">
    <?php
    include 'template/navigation-body.html';
    ?>

        <h1>Accounts & Produkte</h1>
    <div class="row">
        <div class="col">
            <div class="one"><h4>Suchen</h4></div>
            <div class="one-container">
                <div><a href="accountsearch.php">Accounts</a></div>
                <div><a href="mitsearch.php">Mitarbeiter</a></div>
                <div><a href="ansprechsearch.php">Ansprechpartner</a></div>
            </div>
            <div class="col">
                <div class="one mt-5"><h4>Anlegen</h4></div>
                <div class="one-container">
                    <div><a href="accounts.php">Account</a></div>
                    <div><a href="mitarbeiter.php">Mitarbeiter</a></div>
                    <div><a href="ansprechpartner.php">Ansprechpartner</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>