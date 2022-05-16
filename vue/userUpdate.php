<?php
    session_start();    
    require '../controleur/login_verification.php';
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
        <title>SuperAnimes - My Informations</title>
    </head>
    <body>

        <?php 
            include_once('header.php');
            $myUser = $userManager->getById($id);
        ?>
        <div class="container-user-update">

<div class="title-user-update">
    <h1>Enter new informations</h1>
</div>

<div class="bloc-user-update">

    <form name="formulaire" id="formulaire" action="../controleur/updateUser.php" method="post">

    <input type="hidden" name="id" value=<?php echo $myUser->getIdUser()?>>

        <div>
            <label for="pseudo">Pseudo :</label>
            <input type="text" id="pseudo" name="pseudo" value="<?php echo $myUser->getPseudo()?>" disabled>
        </div>
        <br>
        <div>
            <label for="mail">Email :</label>
            <input type="email" id="mail" name="mail" value="<?php echo $myUser->getEmail()?>">
        </div>
        <br>
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo $myUser->getNom()?>" required>
        </div>
        <br>
        <div>
            <label for="prenom">Prenom :</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo $myUser->getPrenom()?>" required>
        </div>
        <br>
        <div>
            <label for="password">New Password :</label>
            <input type="password" id="password" name="password" placeholder="enter new password" onkeyup="verifierMdp()"
            onfocus="document.getElementById('explication').style.display = 'block'"
            onblur="document.getElementById('explication').style.display ='none'" pattern="^(?=.*[a-zA-Z])(?=.*\d)(?=.*[-+_!@#$%^&*.,?]).{6,35}$">
        </div>
        <span class="msg-unvalid-password" ><br>Saisir un mot de passe dans les règles !</span>
        <span class="msg-valid-password" ><br>Saisie du mot de passe correct !</span>
        <div id="explication">
            <ul>
                <li>
                    <img id="case1" src="../pictures/vide.png" alt="une case" height="30">
                    le mot de passe doit contenir des lettres et des chiffres
                </li>
                <li>
                    <img id="case2" src="../pictures/vide.png" alt="une case" height="30">
                    le mot de passe doit contenir au moins un caractère spécial
                </li>
                <li>
                    <img id="case3" src="../pictures/vide.png" alt="une case" height="30">
                    le mot de passe doit être compris entre 6 et 35 caractères
                </li>
            </ul>
        </div>
        <br>
        <div>
            <label for="verifPassword">Confirm new password :</label>
            <input type="password" id="verifPassword" name="verifPassword" placeholder="confirm password...">
        </div>
        <br>
        <div class="div-button-user-update">
            <button class="button-user-update" type="submit" name="submit" >click to modify</button>
        </div>
    </form>

        <p id="error" class="error">
            <?php
                if(isset($_SESSION['error_updateUser'])){echo '<br>'.$_SESSION['error_updateUser'].'<br><br>';}
            ?>
        </p>
        </div>
    </body>
</html>