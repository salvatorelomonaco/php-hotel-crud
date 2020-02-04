<?php

include 'functions.php';

// passo la query per visualizzare i dettagli della stanza selezionata tramite l'id, da inserire dentro al form
$sql = "SELECT * FROM stanze WHERE id = " . $_GET['id_stanza'];
$result = esegui_query($sql);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "layout/head.html"; ?>
        <title>Modifica stanza</title>
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

                            //COLLEGAMENTO CON LA PAGINA CREATED.PHP
                                //Se il paramentro 'success' in GET, ovvero nell'url non è vuoto  
                                if (!empty($_GET['success'])) { ?>
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <?php
                                                //se il contenuto di success è true
                                                if ($_GET['success'] == 'true') { ?>
                                                    <div class="alert alert-success" role="alert">
                                                        Stanza modificata con successo
                                                    </div>
                                                <?php    
                                                } else { ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        Si è verificato un errore
                                                    </div>
                                                <?php    
                                                } ?>
                                        </div>
                                    </div>
                                <?php           
                                } 

                            // output data of each row
                            $row = $result->fetch_assoc(); ?>

                            <div class="row">
                                <div class="col-sm-12">
                                    <form method="post" action="updated.php">
                                        <input type="hidden" name="id_stanza" value="<?php echo $row['id']?>">
                                    <div class="form-group">
                                        <label for="numero_stanza">Numero stanza</label>
                                        <input name="numero_stanza" type="text" class="form-control" id="numero_stanza" placeholder="Numero stanza" value="<?php echo $row['room_number']?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="piano">Piano</label>
                                        <input name="piano" type="text" class="form-control" id="piano" placeholder="Piano" value="<?php echo $row['floor']?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="letti">Numero letti</label>
                                        <input name="letti" type="text" class="form-control" id="letti" placeholder="Letti" value="<?php echo $row['beds']?>" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Modifica stanza</button>
                                    </form>
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