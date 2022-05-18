<?php
    require './connexion.php';
    require '../modele/animeManager.php';
    session_start();
    $id = $_GET['id'];
    $animeManager = new AnimeManager($bdd);
    $myAnime = $animeManager->getById($id);
    $animeManager->delete($myUser);
    header('Location: ../vue/animes.php');
?> 