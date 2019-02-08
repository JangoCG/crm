<?php
/**
 * Created by PhpStorm.
 * User: cengiz
 * Date: 23.11.18
 * Time: 00:09
 */

include("config.php");

//Variablen deklarieren und mit leeren Werten initalisieren

$username = "";
$password = "";
$passwordConfirm = "";
$usernameError = "";
$passwordError ="";
$passwordConfirmError ="";

//USERNAMEN Prüfen
//Diese IF Abfrage weil ich sonst Fehler bekommen, da beim ersten Aufruf noch kein post geschehen ist
if($_SERVER["REQUEST_METHOD"] == "POST"){



    /*Das empty prüft ob die Variable leer ist
    **Das trim entfernt die Leerzeichen
     mit $_POST["username"] hole ich mir das password aus meiner HTML Form
    Insgesamt wird hier geschaut ob das passwort leer ist
    */
    if(empty(trim($_POST["username"]))) {
        $usernameError =  "Bitte geben Sie einen Benutzernamen ein";

    } elseif(!(ctype_alpha($_POST["username"]))) { //ctype_alpha prüft ob nur buchstaben vorhanden sind
        $usernameError = "Bitte verwende nur Buchstaben für deinen Benutzername";
    } elseif (strlen(trim($_POST["username"])) < 6) {
        $usernameError = "Der Benutzername muss 6 Buchstaben oder mehr enthalten";
    } elseif (strlen(trim($_POST["username"]))  > 14) {
        $usernameError = "Der Benutzername muss 14 Buchstaben oder weniger enthalten";
    }
    else {
        $username = trim($_POST["username"]);
    }
}

//Passwort prüfen

if(empty(trim($_POST["password"]))) {
    $passwordError = "Bitte geben Sie ein Passwort ein";

} elseif (strlen(trim($_POST["password"])) < 6) {
    $passwordError = "Passwort muss mindestens 6 Zeichen lang sein";

} elseif (strlen(trim($_POST["password"])) > 30) {
    $passwordError = "Passwort darf nicht mehr als 30 Zeichen haben";

}  elseif(!(ctype_alnum(trim($_POST["password"])))) {
    $passwordError = "Passwort darf nur aus Buchstaben und Zahlen bestehen";

} else {
    $password = trim($_POST["password"]);
}

//Passwort bestätigung prüfen

if(empty(trim($_POST["passwordConfirm"]))) {
    $passwordConfirmError = "Bitte bestätigen Sie ihr Passwort.";


} else {
    $passwordConfirm = trim($_POST["passwordConfirm"]);
    if($password != $passwordConfirm) {
        $passwordConfirmError = "Passwörter stimmen nicht überein";
    }
}

//Überprüfen auf Eingabefehler
if(empty($usernameError) && empty($passwordError) && empty($passwordConfirmError)) {


 //Passwort verschlüsseln mit dem PASSWORD_DEFAULT algorithmus welches bcrypt ist und für
//Blowfish Algorithmus steht
$hash = password_hash($password, PASSWORD_DEFAULT);
//SQL Statement Variable übergeben
$sqlStatement = "INSERT INTO users (username, password)
VALUES ('$username', '$hash')";

//SQL Insert durchführen mit mysqli query

if(mysqli_query($connection, $sqlStatement)) {
echo "Registrierung erfolgreich";

//Inno: Verlinking zur Startseite
header("Location: /crm/startseite.php");
} else {
echo "Error:" .$sqlStatement . "<br>" . mysqli_error($connection);
}
}

?>





<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>

<style>

</style>

<body>




<div class="wrapper">
    <div class="wrapper">
        <h2>Registrieren</h2>
        <p>Bitte erstelle eine Account</p>
        <form action="index.php" method="post">
            <div>
                <label>Benutzername</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $usernameError; ?></span>
            </div>
            <div>
                <label>Passwort</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $passwordError; ?></span>
            </div>
            <div>
                <label>Passwort bestätigen</label>
                <input type="password" name="passwordConfirm" class="form-control" value="<?php echo $passwordConfirm; ?>">
                <span class="help-block"><?php echo $passwordConfirmError; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Registrieren">
            </div>
            <p>Sie haben bereits einen Account? <a href="login.php">Login hier</a>.</p>
        </form>
    </div>

</body>
</html>