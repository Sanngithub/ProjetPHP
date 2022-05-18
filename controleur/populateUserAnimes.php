<?php
    require '../modele/animeManager.php';
    $animeManager = new AnimeManager($bdd);
    $animes = $animeManager->getAll();
    
    echo '<div class="grid">';

    foreach($animes as $key=>$value){
        if ($id == $value->getCreateur()) {
            echo "<div class=\"item\">";
            echo    "<a href= \"animeDetails.php?id=". $value->getId_anime() ."\"><img src='data:image/jpeg;base64," . $value->getJaquette() . "' alt = \"" . $value->getTitre_fr() . "\"></a>";
            echo    "<p>" . $value->getTitre_fr() . "</p>";
            echo "</div>";
        }
    }

    echo "</div>";
?> 