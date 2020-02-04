<?php 

include "functions.php";

// passo la query per visualizzare id, numero stanza e piano dalla tabella stanze del database
$sql = "SELECT id, room_number, floor FROM stanze";
$result = esegui_query($sql);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "layout/head.html"; ?>
    </head>
    <body>
        <!-- menu -->
        <?php include "layout/navbar.html"; ?>

        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Tutte le stanze dell'hotel</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a id="crea-stanza" class="btn btn-success" href="create.php">
                            Crea nuova stanza
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- ciao -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Room number</th>
                                        <th>Floor</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //se i risultati esistono e il numero di righe della tabella è maggiore di zero, alloro scorro tutti i risultati e li stampo in una tabella
                                    if ($result && $result->num_rows > 0) {

                                        // output data of each row
                                        while($row = $result->fetch_assoc()) { ?>   
                                            <tr>
                                                <!-- numero di stanza -->
                                                <td><?php echo $row['room_number']; ?></td>
                                                <!-- numero di piano -->
                                                <td><?php echo $row['floor']; ?></td>
                                                <!-- azioni -->
                                                <td>
                                                    <a class="btn btn-info" href="details.php">
                                                        Visualizza
                                                    </a>
                                                    <a class="btn btn-warning" href="edit.php">
                                                        Modifica
                                                    </a>
                                                    <a class="btn btn-danger" href="delete.php">
                                                        Cancella
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        // se esiste il risultato ma non ci sono dati nella tabella
                                    } elseif ($result) { ?>
                                        <tr>
                                            <td colspan="3">Non ci sono risultati</td>
                                        </tr>
                                        <?php
                                        // se il risultato non esiste
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="3">Si è verificato un errore</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- footer -->
        <?php include "layout/footer.html"; ?>
    </body>
</html>