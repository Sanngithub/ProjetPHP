<?php
    require './connexion.php';
    require '../modele/animeManager.php';
    require '../modele/userManager.php';
    session_start();
    $id = $_GET['id'];
    $animeManager = new AnimeManager($bdd);
    $currentAnime = $animeManager->getById($id);

    if($_SESSION['user']->getIdUser() == $currentAnime->getCreateur()){
        $animeManager->delete($currentAnime);
        header('Location: ../vue/animes.php');
        die();
    }

    $error_animeDetail = "erreur : vous ne pouvez pas supprimer une anime que vous n'avez pas créé !";
    $url = "../vue/animeDetails.php?id="    .   $id .   "&error_animeDetail="   .   $error_animeDetail;
    header("Location: $url");
    die();
?> 