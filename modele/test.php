<?php


// $test = (   strcmp( "Sann", "Sann" ) == 0   );
// if ($test) {
//     echo"test ok";
// } else {
    
//     echo"test non ok";
// }

// echo"<br>";
// $var1 = "SanN";
// $var2 = "SanN";
// if (strcmp($var1, $var2) == 0) {
//     echo "$var1 est égal à $var2 par comparaison sensible à la casse.";
// } else {
//     echo "$var1 n'est pas égal à $var2 par comparaison sensible à la casse.";
// }

    require '../modele/animeAjouteManager.php';
    require '../controleur/connexion.php';
    $manager = new AnimeAjouteManager($bdd);
    $list = $manager->getAll();

    echo '<pre>';
    print_r($list);
    echo '</pre>'; 

    // $data = [ 
    //     'idUser' => 18,
    //     'id_anime' => 60
    // ];
    // $anime = new AnimeAjoute();
    // $anime->hydrate($data);
    // $manager->add($anime);


?> 