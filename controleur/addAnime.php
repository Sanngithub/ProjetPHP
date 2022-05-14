<?php
    session_start();
    require '../controleur/connexion.php';
    require '../modele/animeManager.php';
    require '../modele/userManager.php';
    $animeManager = new AnimeManager($bdd);
    $userManager = new UserManager($bdd);
    $listUsers = $userManager->getAll();
    $listAnimes = $animeManager->getAll();
    // $id = $_GET['id'];

    // echo '<pre>';
    // print_r($_SESSION['anime']);
    // echo '</pre>';

    // if( isset($_SESSION['anime']) ){
    //     if($animeed = $animeManager.add($_SESSION['anime'])){
    //         header('location:../vue/ajouter.php?dbMessage=Anime ajoutée !');
    //         die();
    //     }
    //     else{
    //         session_unset();
    //         $_SESSION['error_addAnime'] = 'Erreur : Anime déjà présente------ !';
    //         header('location:../vue/ajouter.php');
    //     } 
    // }
    // else{
    //     $_SESSION['error_addAnime'] = 'Veuillez remplir le formulaire !';
    //     header('location:../vue/ajouter.php');
    // }
    // echo "ok";
    // sleep(5);
    
    if(isset($_POST['new_anime'])) {
        // echo $_POST["titre"];
        $idUser;
        $animeEstDejaPresent = false;

        foreach ($listAnimes as $_anime){
            if ($_anime->getTitre_native() == $_POST['titre_native'] || $_anime->getTitre_romaji() == $_POST['titre_romaji'] || $_anime->getTitre_fr() == $_POST['titre_fr']) {
                $animeEstDejaPresent = true;
            }
        }

        foreach ($listUsers as $user){
            if ($_SESSION['pseudo'] == $user->getPseudo()) {
                $idUser = $user->getIdUser();
            }
        }

        if ($animeEstDejaPresent) {
               
            $_SESSION['error_addAnime'] = 'Erreur : Anime déjà présente------ !';
            header('location:../vue/ajouter.php?id=<php echo $idUser?>');

        }
        
        else {

            $image;
            $b = getimagesize($_FILES["userImage"]["tmp_name"]);
            //Vérifiez si l'utilisateur à sélectionné une image
            if($b !== false){
                //Récupérer le contenu de l'image
                $file = $_FILES['userImage']['tmp_name'];
                // $image = addslashes(file_get_contents($file));
                $imageData = base64_encode(file_get_contents($file));
            }
            
            $data = [
                'titre_native' => $_POST['titre_native'],
                'titre_romaji' => $_POST['titre_romaji'],
                'titre_fr' => $_POST['titre_fr'],
                'status' => $_POST['status_anime'],
                'studio' => $_POST['studio'],
                'genre' => $_POST['genre'],
                'synopsis' => $_POST['synopsis'],
                'nb_episodes' => $_POST['nb_episodes'],
                'jaquette' => $imageData,
                'createur' => $idUser
            ];
            
            $anime = new Anime();
            $anime->hydrate($data);
            $animeManager->add($anime);

            sleep(2);
            header("Location: ../vue/animes.php");
        }     
    }
?>