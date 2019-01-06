<?php

include("config.php");

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: Startseite.php");
    exit;
}
// Variablen deklarieren

$username = "";
$password = "";
$usernameError = "";
$passwordError = "";

// Man muss erst überprüfen ob ein Post ausgegeben wird
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Überprüfung ob ein Username eingetragen wurde
    if(empty(trim($_POST["username"]))) {
        $usernameError =  "Bitte geben Sie einen Benutzernamen ein";
    }else {
        $username = trim($_POST["username"]);
    }

    // Überprüfung ob ein Password eingetragen wurde
    if(empty(trim($_POST["password"]))) {
        $passwordError = "Bitte geben Sie ein Passwort ein";
    } else {
        $password = trim($_POST["password"]);
    }

    // Überprüfung ob die Variablen leer sind, wenn ja wurde ein Password und ein Nutzername eingetragen.
    if(empty($usernameError) && empty($passwordError)){
        // Select Statement um Username und Passwort vergleichen zu können
        $sqlSelect = "SELECT id, username, password FROM users WHERE username = '$username'";
        // Erstellt neue mysqli query um zu schauen wie viele Spalten die Tabelle mit dem Username hat.
        $result = mysqli_query($connection, $sqlSelect);
        // Hat der Username genau nur eine Spalte ist er in der Datenbank auch vorhanden, sonst ist er nicht vorhanden und der Benutzername ist falsch.
        if(mysqli_num_rows($result) == 1){
            $row = $result->fetch_assoc();
            $pass = $row['password'];
            if(password_verify($password, $pass)){
                //Password ist korrekt
                session_start();

                $_SESSION["loggedin"] == true;
                $_SESSION["id"] == id;
                $_SESSION["username"] == $username;
                header("location: Startseite.php");
            } else{
                $passwordError = "Passwort ist falsch. Bitte versuchen Sie es erneut";
            }
        } else{
            $usernameError = "Benutzername ist falsch. Bitte geben Sie ihren richtigen Benutzernamen ein.";
        }


    }
    mysqli_close($connection);
}
?>
<!doctype html>
<html lang="en">
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
    body {
        background-image: url("https://mdbootstrap.com/img/Photos/Horizontal/Nature/full page/img(20).jpg");

    }
</style>
<body>

<div class="wrapper">
    <div class="wrapper">
        <h2>Login</h2>
        <form action="login.php" method="post">
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
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Einloggen">
            </div>
            <p> Noch keinen Bentzeraccount? Klicken Sie <a href="register.php">hier!</a></p>
        </form>
    </div>

</body>
</html>
