<?php

require_once('includes/db-connect.php');
require_once('includes/functions.php');

$nom = isset($_POST['nom']) ? trim($_POST['nom']) : "";
$prenom = isset($_POST['prenom']) ? trim($_POST['prenom']) : "";
$email = isset($_POST['email']) ? trim($_POST['email']) : "";
$sujet = isset($_POST['sujet']) ? trim($_POST['sujet']) : "";
$commentaire = isset($_POST['commentaire']) ? trim($_POST['commentaire']) : "";

if (empty($nom) || empty($prenom) || empty($email) || empty($sujet) || empty($commentaire)) {
    header('Location: index.php?erreur=1');
} elseif (verifEmail($email) == false) {
    header('Location: index.php?erreur=2');
    die();
} else {

//sécuriser les données avant d'exécuter des req. sql

    $nom = $db->quote($nom, PDO::PARAM_STR);
    $prenom = $db->quote($prenom, PDO::PARAM_STR);
    $email = $db->quote($email, PDO::PARAM_STR);
    $sujet = $db->quote($sujet, PDO::PARAM_STR);
    $commentaire = $db->quote($commentaire, PDO::PARAM_STR);


    $sql = "INSERT INTO utilisateurs (nom,prenom,email,sujet,commentaire) VALUES($nom,$prenom,$email,$sujet,$commentaire)";


    $db->exec($sql);
//Fermeture connection DB
    $db = null;

    $to = 'votremail@mail.com';
    $subject = 'Sujet email que vous allez recevoir';
    $contenu = "	  
 	   
 		 Nom:
		 $nom 	   
	   
 		 Prenom:
		 $prenom	   

 		 Email:
		 $email 	   

 		 Sujet:
		 $sujet	
                 
         Commentaire:
         $commentaire
      
        ";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers = 'From: ' . $email . '' . "\r\n";
    mail($to, $subject, $contenu, $headers);
    header('Location: index.php?success=1');
    die();
}
?>


