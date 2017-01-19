<?php


function verifEmail($email) {
    $reg_ex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,5})$/";

    return preg_match($reg_ex, $email);
}


    if (empty($message_erreur)) {
        // Le mot de passe est suffisamment sécurisé
        return false;
    } else {
        return $message_erreur;
    }
    

function displayMessage($erreur = null, $code_success = null, $password = null) {
    $couleur = empty($erreur) ? "success" : "danger";
    echo '<div class="alert alert-' . $couleur . ' "role="alert">';
    if (!empty($erreur)) {
        switch ($erreur) {
            case 1:
                echo "Tous les champs sont obligatoires";
                break;
            case 2:
                echo "Ton email est invalide";
                break;
            
        }
                
    } else if (!empty($code_success)) {
        switch ($code_success) {
            case 1:
                echo "Ton message a bien été envoyé";
                break;
        }
    }
    echo '</div>';
}
?>

