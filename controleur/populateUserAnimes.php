<?php
    require '../modele/animeManager.php';
    $animeManager = new AnimeManager($bdd);
    $animes = $animeManager->getAll();
    
    echo '<div class="grid">';

    foreach($animes as $anime){
        if ($id == $anime->getCreateur()) {
            echo "<div class=\"item\">";
            echo    "<a href= \"\"><img src='data:image/jpeg;base64," . $anime->getJaquette() . "' alt = \"" . $anime->getTitre_fr() . "\"></a>";
            echo    "<p>" . $anime->getTitre_fr() . "</p>";
            echo "</div>";
        }
    }

    echo "</div>";
?> 