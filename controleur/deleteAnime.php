<?php
    require './connexion.php';
    require '../modele/animeManager.php';
    require '../modele/userManager.php';
    session_start();
    $id = $_GET['id'];
    $idAdmin = 1;
    $animeManager = new AnimeManager($bdd);
    $currentAnime = $animeManager->getById($id);

    if($_SESSION['user']->getIdUser() == $currentAnime->getCreateur()   ||  $_SESSION['user']->getIdUser() == $idAdmin){
        $animeManager->delete($currentAnime);
        header('Location: ../vue/animes.php');
        die();
    }

    $error_animeDetail = "erreur : vous ne pouvez pas supprimer une anime que vous n'avez pas créé !";
    $url = "../vue/animeDetails.php?id="    .   $id;
    header("Location: $url");
    die();
?> 