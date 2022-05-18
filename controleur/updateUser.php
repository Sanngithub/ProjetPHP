<?php
    session_start();
    require '../controleur/connexion.php';
    require '../modele/userManager.php';
    $userManager = new UserManager($bdd);
    $myUser = $userManager->getById($_POST['id']);
    $myUser->setEmail($_POST['mail']);
    $myUser->setNom($_POST['nom']);
    $myUser->setPrenom($_POST['prenom']);


    if(empty($_POST['verifPassword'])){
        $myUser->setPassword(   $myUser->getPassword()  );
        $userManager->updateWithoutPassword($myUser);
        header("location:../vue/userInfo.php?id=");
        die();
    }

    else if (  !empty($_POST['verifPassword'])   &&  $_POST['password'] == $_POST['verifPassword'] ) {
        $myUser->setPassword(   $_POST['password']    );
        $userManager->updateWithPassword($myUser);
        header("location:../vue/userInfo.php?id=");
        die();
    }

    else {
        $_SESSION['error_updateUser'] = "Erreur : Les mots de passe ne sont pas identiques !";
        header("location:../vue/userUpdate.php?id=");
        die();
    }
?>