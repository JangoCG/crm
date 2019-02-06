<?PHP
if(!empty($_FILES['hochgeladeneDatei'])) {
    $path = "Bilder/"; //Pfad indem die Datei gespeichert werden soll
    $path = $path . basename( $_FILES['hochgeladeneDatei']['name']); //Pfad/Dateiname
    if(move_uploaded_file($_FILES['hochgeladeneDatei']['tmp_name'], $path)) { //Hier wird die Datei hochgeladen
        echo "Die Datei ".  basename( $_FILES['hochgeladeneDatei']['name']).
            " wurde hochgeladen.";
    } else{
        echo "Fehler beim hochladen der Datei!";
    }
}
?>


