<?php
    require '../modele/animeManager.php';
    $animeManager = new AnimeManager($bdd);
    $animes = $animeManager->getAll();
    $haveAnime = false;
    
    echo '<div class="grid">';

    foreach($animes as $key=>$value){
        if ($id == $value->getCreateur()) {
            $haveAnime = true;
            echo "<div class=\"item\">";
            echo    "<a href= \"animeDetails.php?id=". $value->getId_anime() ."\"><img src='data:image/jpeg;base64," . $value->getJaquette() . "' alt = \"" . $value->getTitre_fr() . "\"></a>";
            echo    "<p>" . $value->getTitre_fr() . "</p>";
            echo "</div>";
        }
    }

    echo "</div>";

    if (!$haveAnime) {
        echo '
        <div class="msg-no-user-animes">
            <div style="margin: 20px 0px 40px;">
                <h1>YOU DON\'T HAVE ANY ANIMES !</h1>
            </div>
            <div style="padding: 50px;">  
                <img src="../pictures/noANIME.jpeg" id="img-user-no-animes" alt="UNE IMAGE" style="width: 510px;">
            </div>
        </div>
        ';
    }
?> 