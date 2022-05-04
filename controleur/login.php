<?php
    require '../controleur/connexion.php';
    require '../modele/userManager.php';
    session_start();
    $userManager = new UserManager($bdd);


    if(     isset($_SESSION['pseudo']) && isset($_SESSION['password'])    ){
        if($user = $userManager->login($_SESSION['pseudo'], $_SESSION['password'])){
            $_SESSION['user'] = $user;
            $_SESSION['logged_in'] = true;
            $_SESSION['error_login'] = "";
            // if (isset($_SESSION['keeplogged']) && $_SESSION['keeplogged'] =1){
            //     setcookie("authToken", $_COOKIE[session_name()], time()+60*60*24*365);
            // }
            // https://www.php.net/manual/fr/function.setcookie.php
            // https://ensweb.users.info.unicaen.fr/pres/sessions/
            // https://openclassrooms.com/forum/sujet/session-php-rester-connecte
            // https://fr.piwigo.org/forum/viewtopic.php?id=8313

            header('location:../vue/animes.php');
            die();
        }
        else{
            session_unset();
            $_SESSION['error_login'] = 'Identifiant ou mot de passe incorrect(s) OU utilisateur inexistant !';
            header('location:../vue/index.php');
        } 
    }
    else{
        $_SESSION['error_login'] = 'Veuillez remplir le formulaire !';
        header('location:../vue/index.php');
    }
?>