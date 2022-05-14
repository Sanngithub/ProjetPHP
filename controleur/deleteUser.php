<?php

    require './connexion.php';
    require '../modele/userManager.php';
    session_start();
    $id = $_GET['id'];
    $userManager = new UserManager($bdd);

    $myUser = $userManager->getById($id);

    $userManager->delete($myUser);

    header('Location: ../vue/index.php');
?> 