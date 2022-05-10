<?php
<<<<<<< HEAD
// Prévoir connexion avec un user avec droits restraints plutôt qu'un compte admin !!!
    define('DB_NAME', 'projetphp_superfilms');
    define('DB_USER', 'projetPHP_superfilms');
    define('DB_PASSWORD', '123456');
    define('DB_HOST', 'localhost');    

    try{
        $bdd = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
=======
    define('DB_NAME', 'superfilms');
    define('DB_USER', '');
    define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');    

    try{
        $pdo = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
>>>>>>> dbce7a6cd2db0b8e40548534f33b3b762aa780fe
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
?> 