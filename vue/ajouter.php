<?php
    session_start();
    require('../controleur/login_verification.php');
    $id = $_GET['id'];
    echo "BOUUUUUUUUUUUUUUUUUUUU";
    echo "ID:";
    echo $id;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css?v=<?php echo time(); ?>">
    <title>SuperFilms - Animes</title>
</head>


<body>
    <!--*************** STATIC BACKGROUND *********************************************************************************************************************************************************************************************************-->
    <div class="no_print" id="full-size-background"></div>


    <?php include_once('header.php'); ?>


    <!--*************** MAIN **********************************************************************************************************************************************************************************************************************-->
    <div class="bloc-add-anime">

        <div id="addOrUpdate">
            <fieldset>
                <legend>Selectionner l'action à effectuer :</legend>

                <div>
                    <input type="radio" id="add" name="addOrUpdate" value="Ajouter" checked>
                    <label for="add">Ajouter</label>
                </div>

                <div>
                    <input type="radio" id="update" name="addOrUpdate" value="Modifier">
                    <label for="update">Modifier</label>
                </div>
            </fieldset>
        </div>

        <br>
        <p id="error" class="error">
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $_SESSION['anime'] = $_POST;
                    // header("location:../controleur/addAnime.php");
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

            
        <div class="ajouter-div-form">
            <form action="../controleur/addAnime.php" method="POST" id="form-ajouter">
                            <input type="text" name="titre_native" id="titre_native" placeholder="Entrez ici le titre d'origine." required maxlength="50" pattern="[A-Za-z0-9_? ]{1,50}" autofocus="autofocus" size="35">
                            <input type="text" name="titre_romaji" id="titre_romaji" placeholder="Entrez ici le titre en rōmaji." required maxlength="50" pattern="[A-Za-z0-9_? ]{1,50}" size="35">
                            <input type="text" name="titre_fr" id="titre_fr" placeholder="Entrez ici le titre en français." required maxlength="50" pattern="[A-Za-z0-9_? ]{1,50}" size="35">
                            <input type="text" name="status_anime" id="status_anime" placeholder="Entrez ici le statut de l'anime (0 = en cours ; 1 = terminée)." required maxlength="1" pattern="[0-1_?]{1,1}" size="40">
                            <input type="text" name="studio" id="studio" placeholder="Entrez ici le studio de l'anime." required maxlength="500"  size="100">
                            <input type="text" name="genre" id="genre" placeholder="Entrez ici le(s) genre(s) de l'anime." required maxlength="500"  size="100">
                            <input type="text" name="synopsis" id="synopsis" placeholder="Entrez ici le synopsis de l'anime." required maxlength="500"  size="100">
                            <input type="text" name="nb_episodes" id="nb_episodes" placeholder="Entrez ici le nombre d'épisodes prévus pour cette l'anime." required maxlength="500"  size="20">
                            <input type="submit" name="new_anime" value="Créer">
                            <!-- <input type="text" name="titre_native" id="titre_native" placeholder="Entrez ici le titre d'origine." autofocus="autofocus" size="35" required>
                            <input type="text" name="titre_romaji" id="titre_romaji" placeholder="Entrez ici le titre en rōmaji."  size="35" required>
                            <input type="text" name="titre_fr" id="titre_fr" placeholder="Entrez ici le titre en français."  size="35" required>
                            <input type="text" name="status_anime" id="status_anime" placeholder="Entrez ici le statut de l'anime (0 = en cours ; 1 = terminée)." required maxlength="1" pattern="[0-1_?]{1,1}" size="40" required>
                            <input type="text" name="studio" id="studio" placeholder="Entrez ici le studio de l'anime."   size="100"required>
                            <input type="text" name="genre" id="genre" placeholder="Entrez ici le(s) genre(s) de l'anime."  size="100"required>
                            <input type="text" name="synopsis" id="synopsis" placeholder="Entrez ici le synopsis de l'anime."   size="100"required>
                            <input type="text" name="nb_episodes" id="nb_episodes" placeholder="Entrez ici le nombre d'épisodes prévus pour cette l'anime."  size="20"required>
                            <input type="submit" name="new_anime" value="Créer"> -->

            </form>
        </div>
        


        <?php

        ?>
    </div>

	
   <?php include_once('footer.php'); ?>
</body>
</html>



