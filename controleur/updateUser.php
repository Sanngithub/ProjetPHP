<?php
    require '../controleur/connexion.php';
    require '../modele/userManager.php';
    $userManager = new UserManager($bdd);

    if(empty($_POST['verifPassword'])){
        $myUser->setPassword(   $myUser->getPassword()  );
        $usersManager->updateWithoutPassword($myUser);
        header("location:../vue/userInfo.php?id=");
    }

    else if (  !empty($_POST['verifPassword'])   &&  $_POST['password'] == $_POST['verifPassword'] ) {
        $myUser->setPassword(   $_POST['password']    );
        $usersManager->updateWithPassword($myUser);
        header("location:../vue/userInfo.php?id=");
    }

    else {
        $_SESSION['error_updateUser'] = "Erreur : Les mots de passe ne sont pas identiques !";
        header("location:../vue/userUpdate.php");
    }
?>