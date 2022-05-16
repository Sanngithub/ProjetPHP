<?php
    session_start();
    require('../controleur/login_verification.php');
    $id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style4.css?v=<?php echo time(); ?>">
        <title>SuperAnimes - Add Animes</title>
    </head>

    <body>

        <?php include_once('header.php'); ?>

        <div class="container-add-anime">
            <br>
                <p id="error" class="error">
                    <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $_SESSION['anime'] = $_POST;
                        }
                        if(isset($_SESSION['error_addAnime'])){echo '<br>'.$_SESSION['error_addAnime'].'<br><br>';}
                    ?>
                </p>
                <p id="dbMessage" class="dbMessage">
                    <?php
                        if (!Empty($_GET['dbMessage'])){
                            echo $_GET['dbMessage'];
                        }
                    ?>
                </p>
            <br>
            <div class="title-add-anime">
                <h1>Add Anime</h1>
            </div>
            
            <div class="bloc-add-anime">
                <form enctype="multipart/form-data" action="../controleur/addAnime.php" method="post" id="form-ajouter">
                    <div>
                        <label for="userImage">Image de couverture :</label>
                        <input type="file" name="userImage" required>
                    </div>
                    <br>
                    <div>
                        <label for="titre_native">Titre natif :</label>
                        <input type="text" name="titre_native" id="titre_native" placeholder="Entrez ici le titre d'origine." maxlength="50" pattern="{1,50}" autofocus="autofocus" required> 
                    </div>
                    <br>
                    <div>
                        <label for="titre_romaji">Titre Romaji :</label>
                        <input type="text" name="titre_romaji" id="titre_romaji" placeholder="Entrez ici le titre en rōmaji." maxlength="50" pattern="[A-Za-z0-9_? ]{1,50}" required> 
                    </div>
                    <br>
                    <div>
                        <label for="titre_fr">Titre français :</label>
                        <input type="text" name="titre_fr" id="titre_fr" placeholder="Entrez ici le titre en français."  maxlength="50" pattern="[A-Za-z0-9_? ]{1,50}" required> 
                    </div>
                    <br>
                    <div>
                        <label for="status_anime">Statut de l'anime :</label>
                        <input type="text" name="status_anime" id="status_anime" placeholder="Entrez ici le statut de l'anime (0 = en cours ; 1 = terminée)."  maxlength="1" pattern="[0-1_?]{1,1}" required> 
                    </div>
                    <br>
                    <div>
                        <label for="studio">Nom du studio :</label>
                        <input type="text" name="studio" id="studio" placeholder="Entrez ici le studio de l'anime." maxlength="500"  > 
                    </div>
                    <br>
                    <div>
                        <label for="nb_episodes">Nombre d'épisodes :</label>
                        <input type="text" name="nb_episodes" id="nb_episodes" placeholder="Entrez ici le nombre d'épisodes prévus pour cette l'anime."  maxlength="500" required > 
                    </div>
                    <br>
                    <div>
                        <label for="genre">Genre(s) :</label>
                        <input type="text" name="genre" id="genre" placeholder="Entrez ici le(s) genre(s) de l'anime." maxlength="500"  required> 
                    </div>
                    <br>
                    <div>
                        <label for="synopsis" class="synopsis">Synopsis :</label>
                        <textarea name="synopsis" id="synopsis" class="textarea medium" tabindex="1003" maxlength="600" aria-required="true" aria-invalid="false" rows="10" cols="100" placeholder="Entrez ici le synopsis de l'anime." required ></textarea> 
                    </div>
                    <br>
                    <div class="div-button-add-anime">
                        <input class="button-add-anime" type="submit" name="new_anime" value="click to create">
                    </div>
                </form>
            </div>
        </div>

        <?php include_once('footer.php'); ?>
    </body>
</html>