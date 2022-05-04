<?php
    require '../controleur/connexion.php';
    require '../modele/animeManager.php';
    $animeManager = new AnimeManager($bdd);


    if (Empty($_GET['genre'])){
        if (Empty($_GET['titre'])){
            $animes = $animeManager->getAll();
        }
        else{
            $animes = $animeManager->getAllByTitre($_GET['titre']);
        }
    }
    else{
        $animes = $animeManager->getAllByGenre($_GET['genre']);
    }
    
    foreach($animes as $key=>$value){

        $value = (array)$value;
        echo '<table>';
        foreach($value as $subkey=>$subvalue){
            // echo $subkey . ' : ' . $subvalue.'<br>';
            echo '<tr><td>' . $subkey . '</td><td> ' . $subvalue . '</td></tr>';
        }
        echo '</table>';
    }


?>