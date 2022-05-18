<?php
    session_start();    
    require('../controleur/login_verification.php');
    require '../controleur/connexion.php';
    require('../modele/animeManager.php');
    $id = $_GET['id'];
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style4.css?v=<?php echo time(); ?>">
        <title>SuperFilms - My Informations</title>
        <style>
  
        </style>
    </head>
    <body>

        <?php 
            include_once('header.php');
            $animeManager = new AnimeManager($bdd);
            $myAnime = $animeManager->getById($id);
        ?>
    <div class="container-user-update">

        <div class="title-user-update">
            <h1>Update informations of the anime</h1>
        </div>

        <div class="bloc-user-update">

            <form name="formulaire" id="formulaire" action="" method="post">

            <div>
                <label for="titre_native">Titre natif :</label>
                <input value="<?php echo $myAnime->getTitre_native()?>"type="text" name="titre_native" id="titre_native" placeholder="Entrez ici le titre d'origine." maxlength="50" pattern="{1,50}" autofocus="autofocus" required> 
            </div>
            <br>
            <div>
                <label for="titre_romaji">Titre Romaji :</label>
                <input value="<?php echo $myAnime->getTitre_romaji()?>" type="text" name="titre_romaji" id="titre_romaji" placeholder="Entrez ici le titre en rōmaji." maxlength="50" pattern="{1,50}" required> 
            </div>
            <br>
            <div>
                <label for="titre_fr">Titre français :</label>
                <input value="<?php echo $myAnime->getTitre_fr()?>" type="text" name="titre_fr" id="titre_fr" placeholder="Entrez ici le titre en français."  maxlength="50" pattern="{1,50}" required> 
            </div>
            <br>
            <div>
                <label for="status_anime">Statut de l'anime :</label>
                <input value="<?php echo $myAnime->getStatus()?>" type="text" name="status_anime" id="status_anime" placeholder="Entrez ici le statut de l'anime (0 = en cours ; 1 = terminée)."  maxlength="1" pattern="[0-1_?]{1,1}" required> 
            </div>
            <br>
            <div>
                <label for="studio">Nom du studio :</label>
                <input value="<?php echo $myAnime->getStudio()?>" type="text" name="studio" id="studio" placeholder="Entrez ici le studio de l'anime." maxlength="500"  > 
            </div>
            <br>
            <div>
                <label for="nb_episodes">Nombre d'épisodes :</label>
                <input value="<?php echo $myAnime->getNb_episodes()?>" type="text" name="nb_episodes" id="nb_episodes" placeholder="Entrez ici le nombre d'épisodes prévus pour cette l'anime."  maxlength="500" required > 
            </div>
            <br>
            <div>
                <label for="genre">Genre(s) :</label>
                <input value="<?php echo $myAnime->getGenre()?>"  type="text" name="genre" id="genre" placeholder="Entrez ici le(s) genre(s) de l'anime." maxlength="500"  required> 
            </div>
            <br>
            <div>
                <label for="synopsis" class="synopsis">Synopsis :</label>
                <textarea  name="synopsis" id="synopsis" class="textarea medium" tabindex="1003" maxlength="1000" aria-required="true" aria-invalid="false" rows="10" cols="100" placeholder="Entrez ici le synopsis de l'anime." required ><?php echo $myAnime->getSynopsis()?></textarea> 
            </div>
            <br>
                <div class="div-button-user-update">
                    <button class="button-user-update" type="submit" name="submit" >click to modify</button>
                </div>
            </form>

                <p id="error" class="error">
                    <?php
                        if(isset($_SESSION['error_updateUser'])){echo '<br>'.$_SESSION['error_updateUser'].'<br><br>';}
                    ?>
                </p>

            <?php

                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // RESTE A FAIRE
                }
            ?> 
        </div>
    </div>
    </body>
</html>