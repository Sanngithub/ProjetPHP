<?php
    require '../modele/animeManager.php';
    $animeManager = new AnimeManager($bdd);
    $animes = $animeManager->getAll();

    foreach($animes as $anime) {
        if ($id == $anime->getId_anime()) {
            echo '
                <div id="Global">
                    <div id="gauche"> 
                        <img src="data:image/jpeg;base64,' . $anime->getJaquette() . '" alt="">
                    </div>
                    <div id="droite"> 
                        <ul>
                                <li>
                                    <label for="">Titre :</label>
                                    <p>' . $anime->getTitre_fr() . '</p>
                                </li>
                                <li>
                                    <label for="">Studio :</label>
                                    <p>' . $anime->getStudio() . '</p>
                                </li>
                                <li>
                                    <label for="">Genre(s) :</label>
                                    <p>'. $anime->getGenre() .'</p>
                                </li>
                                <li>
                                    <label for="">Nombre épisodes :</label>
                                    <p>'. $anime->getNb_episodes() .'</p>
                                </li>
                                <li>
                                    <label for="">Synopsis :</label>
                                    <p>'. $anime->getSynopsis() .'</p>
                                </li>
                                <li>
                                    <a href="">Update</a>
                                </li>
                                <li>
                                    <a href="../controleur/deleteAnime.php?id='.$anime->getId_anime().'">Delete Immediatly, take care !</a>
                                    <br><br><p class="error">'. $_GET['error_animeDetail'] .'</p>
                                </li>
                        </ul>
                        
                    </div>
                </div>
            ';
        }
    }
?>   