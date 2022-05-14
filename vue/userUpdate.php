<?php
    session_start();    
    require('../controleur/login_verification.php');
    require '../controleur/connexion.php';

    $id = $_GET['id'];
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style4.css?v=<?php echo time(); ?>">
        <title>SuperFilms - My Informations</title>
    </head>
    <body>

        <?php 
            include_once('header.php');
            $usersManager = new userManager($bdd);
            $myUser = $usersManager->getById($id);
        ?>

        <div class="bloc-user-update">

            <h1>Enter new informations</h1>

            <form action="" method="post">
            
                <input type="hidden" value=<?php echo $myUser->getIdUser()?>>

                <p for="pseudo">Pseudo</p>
                <input type="text" id="pseudo" name="pseudo" value="<?php echo $myUser->getPseudo()?>">

                <p for="mail">Email</p>
                <input type="email" id="mail" name="mail" value="<?php echo $myUser->getEmail()?>">

                <p for="nom">Nom*</p>
                <input type="text" id="nom" name="nom" value="<?php echo $myUser->getNom()?>" required>

                <p for="prenom">Prenom*</p>
                <input type="text" id="prenom" name="prenom" value="<?php echo $myUser->getPrenom()?>" required>

                <p for="password">New Password</p>
                <input type="password" id="password" name="password" placeholder="enter new password">

                <p for="verifPassword">Confirm new password</p>
                <input type="password" id="verifPassword" name="verifPassword" placeholder="confirm password...">
                <br>
                <br>
                <button type="submit" name="submit" >click to modify</button>
            </form>

            <?php

                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $myUser->setEmail($_POST['mail']);
                    $myUser->setNom($_POST['nom']);
                    $myUser->setPrenom($_POST['prenom']);
                    if(empty($_POST['verifPassword'])){
                        $myUser->setPassword(   $myUser->getPassword()  );
                        $usersManager->updateWithoutPassword($myUser);
                    }
                    else if (  !empty($_POST['verifPassword'])   &&  $_POST['password'] == $_POST['verifPassword'] ) {
                        $myUser->setPassword(   $_POST['password']    );
                        $usersManager->updateWithPassword($myUser);
                    }
                    header("location:../vue/userInfo.php?id=");
                    }
                    else {
                        echo " <p>lesMots de passe ne correspondent pas</p>";
                    }
            ?> 
        </div>

    </body>
</html>