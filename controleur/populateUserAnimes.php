<?php
    require '../modele/animeManager.php';
    $animeManager = new AnimeManager($bdd);
    $listAnimesManager = $animeManager->getAll();
    $tabIdDesAnimesDeUser = [];
    
    foreach($listAnimesManager as $anime){
        
        
        if ($id == $anime->getCreateur()) {
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
?> 