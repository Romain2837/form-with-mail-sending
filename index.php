<?php require_once 'includes/functions.php'; ?>
<?php $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : "" ?>
<?php $code_success = isset($_GET['success']) ? $_GET['success'] : "" ?>

<!DOCTYPE html>

<html lang='fr'>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire openclassroom</title>
        <link rel='stylesheet' href="css/bootstrap.css"/>
        <link rel='stylesheet' href="css/monstyle.css"/>
    </head>
    <body>

        <div class='row'>
            <div class='col-lg-6 col-lg-offset-3'>
                <a href="index.php"><h1 class='titrecentre'>Formulaire pour l'exercice openclassroom git</h1></a>

                <?php
                if (!empty($erreur) || !empty($code_success)) {
                    displayMessage($erreur, $code_success);
                }
                ?>
                <?php if (empty($code_success)) : ?> 
                    <form action='register.php' method="POST" id='formpubndrive'>
                        <div class='form-group'>
                            <label for="nom">Nom:</label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder='champ obligatoire'>
                        </div>
                        <div class='form-group'>
                            <label for="prenom">Prénom:</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder='champ obligatoire'>
                        </div>
                        <div class='form-group'>
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder='champ obligatoire'>
                        </div>
                        <div class='form-group'>
                            <label for="sujet">Sujet:</label>
                            <input type="text" class="form-control" id="sujet" name="sujet" placeholder='champ obligatoire'>
                        </div>
                        <div class="form-group">
                            <label for="commentaire">Commentaire:</label>
                            <textarea class="form-control" rows="5" id="commentaire" name="commentaire" placeholder='champ obligatoire'></textarea>
                        </div>


                        <input type='submit' class='btn btn-success btn-sm pull-right'/>

                    </form>
                <?php endif ?>
            </div>
        </div>
    </body>
</html>
