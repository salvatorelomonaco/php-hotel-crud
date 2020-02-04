<?php

//creo una funzione per il collegamento al database con i dati di accesso inclusi dentro db_data.php
function connessione_db() {
    //includo i dati di accesso
    include "db_data.php";

    //creo la connessione 
    $conn = new mysqli($servername, $username, $password, $db_name);

    //restituisco la connessione al database
    return $conn;
}

//creo una funzione che verifica la connesione ed esegue la query
function esegui_query($query) {
    //richiamo la connessione per creare la connessione
    $conn = connessione_db();

    //verifico la connessione
    if ($conn && $conn->connect_error) {
        //connessione fallita
        return null;
    } else {
        //connessione stabilita
        //uso la funzione query per leggere ed eseguire la query passata come parametro
        $result = $conn->query($query);

        //chiudo la connesione
        $conn->close();
        
        //restituisco il risultato
        return $result;
    }
}

//creo una funzione per contralle che i dati inseriti durante la creazione della stanza siano giusti
function controlla_dati_stanza($numero_stanza, $piano, $letti) {
    if(
        !empty($numero_stanza) &&
        !empty($piano) &&
        !empty($letti) &&
        is_numeric($numero_stanza) &&
        is_numeric($piano) &&
        is_numeric($letti) &&
        intval($numero_stanza) > 0 &&
        intval($piano) > 0 &&
        intval($letti) > 0
    ) {
        return true;
    } else {
        return false;
    }
}


?>