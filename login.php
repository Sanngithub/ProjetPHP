<?php
    require './connexion.php';
    require './userManager.php';
    session_start();
    $userManager = new UserManager($bdd);


    if(     isset($_POST['pseudo']) && isset($_POST['password'])    ){
        $_SESSION['pseudo'] = $_POST['pseudo'];
        $_SESSION['password'] = $_POST['password'];

        echo  "<br><br>";

        if($user = $userManager->login($_SESSION['pseudo'], $_SESSION['password'])){
            $_SESSION['user'] = $user;
            echo '<pre>';
            print_r($_SESSION['user']);
            echo '</pre>';
            // header("Status: 301 Moved Permanently", false, 301);
            header('location:films.php');
            die();
        }
        else{
            echo 'Identifiant ou mot de passe incorrect(s) OU utilisateur inexistant !';
        }
        
    }
    else{
        echo 'Veuillez remplir le formulaire !';
    }
?>