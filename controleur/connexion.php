<?php
// Prévoir connexion avec un user avec droits restraints plutôt qu'un compte admin !!!
    // define('DB_NAME', 'projetphp_superfilms');
    // define('DB_USER', 'projetPHP_superfilms');
    // define('DB_PASSWORD', '123456');
    // define('DB_HOST', 'localhost');    
    // define('DB_NAME', 'superfilms');
    // define('DB_USER', 'root');
    // define('DB_PASSWORD', '');
    // define('DB_HOST', '127.0.0.1');    


    try{
        // $bdd = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASSWORD);

        $bdd = new PDO(
            'mysql:hostname=127.0.0.1;dbname=superfilms;charset=utf8',
            'root',
            ''
        );
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
 
?> 