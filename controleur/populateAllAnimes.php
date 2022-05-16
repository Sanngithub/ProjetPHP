<?php
    require '../modele/animeManager.php';
    $animeManager = new AnimeManager($bdd);
    $animes;
    if (Empty($_GET['genre'])){
        if (Empty($_GET['search'])){
            $animes = $animeManager->getAll();
        }
        else{
            $animes = $animeManager->getAllByTitre($_GET['search']);
        }
    }
    else{
        $animes = $animeManager->getAllByGenre($_GET['genre']);
    }

    echo '<div class="grid">';

    foreach($animes as $key=>$value){
        echo "<div class=\"item\">";
        echo    "<a href= \"\"><img src='data:image/jpeg;base64," . $value->getJaquette() . "' alt = \"" . $value->getTitre_fr() . "\"></a>";
        echo    "<p>" . $value->getTitre_fr() . "</p>";
        echo "</div>";
    }

    echo "</div>";
?>