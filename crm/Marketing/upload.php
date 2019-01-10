<?PHP
if(!empty($_FILES['uploaded_file']))
{
    $path = "uploads/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
        echo "Die Datei ".  basename( $_FILES['uploaded_file']['name']).
            " wurde hochgeladen.";
    } else{
        echo "Fehler beim hochladen der Datei!";
    }
}
?>