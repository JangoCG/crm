<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="navigation-style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Startseite</title>
    <style>
        .mitte {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 100vh;
        }




    </style>
</head>
<body>



        <div class="mitte">
            <h3>Rollenverfügbarkeit</h3>
            <div><form method="get" action="/crm/Marketing/index.php">
                    <button type="submit" style="width:140px" class="btn btn-info btn-lg bb">Marketingpro</button>
                </form></div>
            <div><form method="get" action="/crm/sales/index.php">
                    <button type="submit" style="width:140px" class="btn btn-info btn-lg bb">Salespro</button>
                </form></div>
            <div><form method="get" action="/crm/Servicepro.php">
                    <button type="submit" style="width:140px" class="btn btn-info btn-lg bb">Servicepro</button>
                </form></div>
            <div><form method="get" action="/crm/Lieferdienst">
                    <button type="submit" style="width:140px" class="btn btn-info btn-lg bb">Lieferdienst</button>
                </form></div>
        </div>


</body>
</html>