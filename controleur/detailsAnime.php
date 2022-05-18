<?php
    require '../modele/animeManager.php';
    $animeManager = new AnimeManager($bdd);
    $animes = $animeManager->getAll();
    $idAdmin = 1;

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
                                    <label for="">Titre original :</label>
                                    <p>' . $anime->getTitre_native() . '</p>
                                </li>
                                <li>
                                    <label for="">Titre romaji :</label>
                                    <p>' . $anime->getTitre_romaji() . '</p>
                                </li>
                                <li>
                                    <label for="">Titre français :</label>
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
                                <a class="download-torrent" href="../pictures/anime.torrent"><i class="fa fa-arrow-circle-down"></i> Download here</a>
                                </li>
                ';
                                if($anime->getCreateur() == $_SESSION['user']->getIdUser()  ||  $_SESSION['user']->getIdUser() == $idAdmin){
                                    echo '
                                        <li>
                                        <a id="update" href="../vue/animeUpdate.php?id='.$anime->getId_anime().'"><i class="far fa-edit"></i> Update</a>
                                        </li>
                                        <li class="forbbiden-del-user"><i class="fas fa-ban"></i> By clicking on "delete", this anime will be immediately deleted without confirmation !</li>
                                        <li>
                                            <a href="../controleur/deleteAnime.php?id='.$anime->getId_anime().'"><i class="fas fa-ban"></i> Delete this anime</a>
                                        </li>
                                        ';
                                }
            echo '
                        </ul>
                        
                    </div>
                </div>
            ';
        }
    }
?> 