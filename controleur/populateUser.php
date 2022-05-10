<?php
    require '../controleur/connexion.php';
    require '../modele/animeManager.php';
    $animeManager = new AnimeManager($bdd);

    $listAnimesManager = $animeManager->getAll();
    $tabIdDesAnimesDeUser = [];
    
    foreach($listAnimesManager as $anime){
        
        
        if ($id == $anime->getCreateur()) {
            // $tabIdDesAnimesDeUser[] = $anime->getId_anime();
            echo '<table>';
            echo '
                <tr>
                    <td> id_anime </td>
                    <td> '.$anime->getId_anime().' </td>
                </tr>
                <tr>
                    <td> titre_native </td>
                    <td> '.$anime->getTitre_native().' </td>
                </tr>
                <tr>
                    <td> titre_romaji </td>
                    <td> '.$anime->getTitre_romaji().' </td>
                </tr>
                <tr>
                    <td> titre_fr </td>
                    <td> '.$anime->getTitre_fr().' </td>
                </tr>
            
            ';
            echo '</table>';

        }
    }

    // foreach($listAnimesManager as $key=>$value){

    //     $value = (array)$value;
    //     echo '<table>';
    //     foreach($value as $subkey=>$subvalue){
    //         // echo $subkey . ' : ' . $subvalue.'<br>';
    //         if ($subkey == "Animecreateur"){

    //             echo '<tr><td>' . $subkey . '</td><td> ' . $subvalue . '</td></tr>';
    //         }
    //     }
    //     echo '</table>';
    // }


    // echo '<pre>';
    // print_r($tabIdDesAnimesDeUser);
    // echo '</pre>'; 

    // $listFilms = $filmManager->getAll();

    // foreach ($listFilms as $film) {
        
    //     for($i=0; $i< sizeof($tabIdDesAnimesDeUser); $i++) {

    //         if ($tabIdDesAnimesDeUser[$i] == $film->getId_film()) {

    //             echo '
    //             <tr class="row-details">
    //                 <td data-label="titre-film" class="cell titre-film">'.$film->getTitre().'</td>
    //                 <td data-label="link-details" class="cell link">
    //                     <a href=" ./detailsFilm.php?id='.$film->getId_film().' " >Détails</a>
    //                 </td>
    //                 <td data-label="link-update" class="cell link">
    //                     <a href=" ./updateFilm.php?id='.$film->getId_film().' " >Modifier</a>
    //                 </td>
    //                 <td data-label="link-delete" class="cell link">
    //                     <a href=" ./deleteFilm.php?id='.$film->getId_film().' " >Supprimer</a>
    //                 </td>
    //             </tr> 
    //             ';
    //         } 

    //     }
        
    // }
?> 

