<?php
    require '../controleur/connexion.php';
    require '../modele/animeManager.php';
    $animeManager = new AnimeManager($bdd);
    $animes;
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
    
    // foreach($animes as $key=>$value){

    //     $value = (array)$value;
    //     echo '<table>';
    //     foreach($value as $subkey=>$subvalue){
    //         // echo $subkey . ' : ' . $subvalue.'<br>';
    //         echo '<tr><td>' . $subkey . '</td><td> ' . $subvalue . '</td></tr>';
    //     }
    //     echo '</table>';
    // }

    // foreach ($animes as $value) {

    //     echo ' 
    //             <tr class="row-details">
    //                 <td data-label="titre-film" class="cell titre-film">'.$value->getTitre_fr().'</td>
    //                 <td data-label="link-details" class="cell link">
    //                     <a href=" ./detailsFilm.php?id='.$value->getId_anime().' " >Détails</a>
    //                 </td>
    //                 <td data-label="link-update" class="cell link">
    //                     <a href=" ./updateFilm.php?id='.$value->getId_anime().' " >Modifier</a>
    //                 </td>
    //                 <td data-label="link-delete" class="cell link">
    //                     <a href=" ./deleteFilm.php?id='.$value->getId_anime().' " >Supprimer</a>
    //                 </td>
    //             </tr> 
    //     ';
    // }
    echo "<br><br><br><br><br><br><br>";
    foreach ($animes as $anime){
        if ($anime->getId_anime()==61) {
            // echo '<img>'.($anime->getJaquette())['image'].'</img>';
            // echo '<img src="data:image/jpeg;base64,'.base64_encode($anime->getJaquette()['image']).'"/>';
            // echo '<img src="data:image/jpg;base64,'.base64_encode($anime->getJaquette()['image']->load()) .'" />';
            // echo '<img src="data:image/jpg;base64,'.base64_encode( $anime->getJaquette()['image_file'] ).'"/>';
            echo '<img src="data:image/jpeg;base64,'.base64_encode( $anime->getJaquette()['image_file'] ).'"/> width="300px" height="300px"';
  
        }
    }
    // echo '

    // <div class="grid">

    //     <div class="item">
    //         <a href=""><img src="../pictures/snkS1.jpg" alt=""></a>
    //         <p>L\'attaque des Titans saison 1 Vostfr</p>
    //     </div>
    //     <div class="item">
    //         <a href=""><img src="../pictures/snkS2.jpg" alt=""></a>
    //         <p>L\'attaque des Titans saison 2 Vostfr</p>
    //     </div>
    //     <div class="item">
    //         <a href=""><img src="../pictures/snkS3.jpg" alt=""></a>
    //         <p>L\'attaque des Titans saison 3 Vostfr</p>
    //     </div>
    //     <div class="item">
    //         <a href=""><img src="../pictures/snkS4.jpg" alt=""></a>
    //         <p>L\'attaque des Titans saison 4 Vostfr</p>
    //     </div>
    //     <div class="item">
    //         <a href=""><img src="../pictures/narutoshippuden.jpg" alt=""></a>
    //         <p>Naruto Shippuden Vostfr</p>
    //     </div>
    //     <div class="item">
    //         <a href=""><img src="../pictures/boruto.jpg" alt=""></a>
    //         <p>Boruto Next Generations Vostfr</p>
    //     </div>
    //     <div class="item">
    //         <a href=""><img src="../pictures/evangelion.jpg" alt=""></a>
    //         <p>Evangelion Neon Genesis Vostfr</p>
    //     </div>
    //     <div class="item">
    //         <a href=""><img src="../pictures/dbz.jpg" alt=""></a>
    //         <p>Dragon Ball Z Vostfr</p>
    //     </div>
    //     <div class="item">
    //         <a href=""><img src="../pictures/deathnote.jpg" alt=""></a>
    //         <p>Death Note Vostfr</p>
    //     </div>
    //     <div class="item">
    //         <a href=""><img src="../pictures/gto.jpg" alt=""></a>
    //         <p>Great Onizuka Teeacher Vostfr</p>
    //     </div>
    //     <div class="item">
    //         <a href=""><img src="../pictures/onepiece.jpg" alt=""></a>
    //         <p>One Piece Vostfr</p>
    //     </div>
    //     <div class="item">
    //         <a href=""><img src="../pictures/sailormoon.jpg" alt=""></a>
    //         <p>Sailor Moon Vostfr</p>
    //     </div>

    //     <!-- <a href=""><img src="../pictures/snkS1.jpg" alt=""></a>
    //     <a href=""><img src="../pictures/snkS2.jpg" alt=""></a>
    //     <a href=""><img src="../pictures/snkS3.jpg" alt=""></a>
    //     <a href=""><img src="../pictures/snkS4.jpg" alt=""></a>

    //     <a href=""><img src="../pictures/snkS1.jpg" alt=""></a>
    //     <a href=""><img src="../pictures/snkS1.jpg" alt=""></a>
    //     <a href=""><img src="../pictures/snkS1.jpg" alt=""></a>
    //     <a href=""><img src="../pictures/snkS1.jpg" alt=""></a>
        
    //     <a href=""><img src="../pictures/snkS1.jpg" alt=""></a>
    //     <a href=""><img src="../pictures/snkS1.jpg" alt=""></a>
    //     <a href=""><img src="../pictures/snkS1.jpg" alt=""></a>
    //     <a href=""><img src="../pictures/snkS1.jpg" alt=""></a> -->

    // </div>
    
    // ';


?>