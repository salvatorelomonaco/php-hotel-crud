<?php

include 'functions.php';

// passo la query per visualizzare i dettagli della stanza selezionata tramite l'id
$sql = "SELECT * FROM stanze WHERE id = " . $_GET['id_stanza'];
$result = esegui_query($sql);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "layout/head.html"; ?>
        <title>Dettagli stanza</title>
    </head>
    <body>
        <!-- menu -->
        <?php include "layout/navbar.html"; ?>

        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Dettagli stanza</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a id="torna-in-home" class="btn btn-success" href="index.php">
                            Torna in homepage
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">

                        <?php
                        if ($result && $result->num_rows > 0) {

                            // output data of each row
                            $row = $result->fetch_assoc(); ?>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Dettagli stanza <?php echo $row['id']; ?></h3>
                                </div>
                                <div class="panel-body">
                                    <ul>
                                        <li>Numero stanza: <?php echo $row['room_number']; ?></li>
                                        <li>Piano: <?php echo $row['floor']; ?></li>
                                        <li>Numero letti: <?php echo $row['beds']; ?></li>
                                        <li>Data creazione: <?php echo $row['created_at']; ?></li>
                                        <li>Data ultima modifica: <?php echo $row['updated_at']; ?></li>
                                    </ul>
                                </div>
                            </div>

                            <?php
                        } elseif ($result) { ?>
                            <p>Non ci sono risultati</p>
                            <?php
                        } else {
                            ?>
                            <p>Si è verificato un errore</p>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </main>

        <!-- footer -->
        <?php include "layout/footer.html"; ?>
    </body>
</html>