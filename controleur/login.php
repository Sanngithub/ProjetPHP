<?php
    require_once '../controleur/connexion.php';
    require_once '../modele/userManager.php';
    session_start();
    $userManager = new UserManager($bdd);

    if(     isset($_SESSION['pseudo']) && isset($_SESSION['password'])    ){
        if($user = $userManager->login($_SESSION['pseudo'], $_SESSION['password'])){
            $_SESSION['user'] = $user;
            $_SESSION['logged_in'] = true;
            $_SESSION['error_login'] = "";

            header('location:../vue/animes.php');
            die();
        }
        else{
            session_unset();
            $_SESSION['error_login'] = 'Identifiant ou mot de passe incorrect(s) OU utilisateur inexistant !';
            header('location:../vue/index.php');
            die();
        } 
    }
    else{
        $_SESSION['error_login'] = 'Veuillez remplir le formulaire !';
        header('location:../vue/index.php');
        die();
    }
?>