<?php 

include 'functions.php';

//controllo nel form per verificare che tutti i campo siano validi
if(
    !empty($_POST) && !empty($_POST['id_stanza']) &&
    controlla_dati_stanza($_POST['numero_stanza'], $_POST['piano'], intval($_POST['letti']))
) {
    // recuperare i dati della stanza da salvare
    $numero_stanza = intval($_POST['numero_stanza']);
    $piano = intval($_POST['piano']);
    $letti = intval($_POST['letti']);
    $id_stanza = intval($_POST['id_stanza']);

    // inserisco la stanza create nel db
    $sql = "UPDATE stanze SET room_number = $numero_stanza, floor = $piano, beds = $letti, updated_at = NOW() WHERE id = $id_stanza";
    $result = esegui_query($sql);

} else {
    $result = false;
}

//se result esiste creo una variabile che contiene una stringa ?success=true
if ($result == true) {
    $get_message = "?success=true&id_stanza" . $id_stanza;
//caso contrario
} else {
    $get_message = "?success=false&id_stanza" . $id_stanza;
}

// visualizza messaggio di conferma e redirect con paramentro get
//la funzione header mi permette di fare un redirect indicando la location, in questo caso ritorno alla pagina create.php è concateno la variable create in precedenza
header('Location: edit.php' . $get_message);

?>