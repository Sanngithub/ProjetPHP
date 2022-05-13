<?php
    if(!empty($_GET['id'])){

        require('../controleur/connexion.php');
        
        //Get the image from the database
        $res = $bdd->query("SELECT jaquette FROM animes WHERE id_anime = 11");
        $res->execute();

        $image = $res->fetch(PDO::FETCH_ASSOC);
        // echo "test";
        //Render the image
        // header("Content-type: image/jpeg"); 
        $src = "data:image/jpeg;base64," . $image['jaquette'];
        echo "<img src=\"" .$src. ">";
        // echo $image['jaquette'];
        
    } 
?>