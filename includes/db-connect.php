<?php
// DB Environnement local
if( $_SERVER['REMOTE_ADDR'] == '::1' ) {
    define('DBNAME', "mettre le nom de votre base de donn�es");
    define('DBUSER', "root");
    define('DBPASSWORD', "ne rien mettre si pas de mdp");
    define('DBHOST', "localhost");
}


//// DB Environnement production
//if( $_SERVER['SERVER_ADDR'] == 'exempleserveur.com' ) {
//    define('DBNAME', "database name");
//    define('DBUSER', "nom user");
//    define('DBPASSWORD', "mdp");
//    define('DBHOST', "exempleovh.serveur.com");
//}

try {
    // On créé l'objet PDO $db. Ils nous permettra toutes les actions avec une DB ( connexion, requêtes, sécurité etc..)
    $db = new PDO('mysql:host='.DBHOST .';dbname='.DBNAME, DBUSER, DBPASSWORD );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("SET CHARACTER SET utf8");
} catch (PDOException $e) {
    echo "<p>Erreur : " . $e->getMessage() . "</p>";
    exit();
}
?>
