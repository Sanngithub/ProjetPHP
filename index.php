<?php
    require './connexion.php';
    require './userManager.php';
    session_start();
    $userManager = new UserManager($bdd);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperFilms</title>
</head>
<body>
    <img src="" alt="" id="logo">
    <div id="login">
        <h1>Log-in</h1>
        <form action="" method="post">
            <p>Pseudo : <input type="text" name="pseudo" /></p>
            <p>Mot de passe : <input type="text" name="password" /></p>
            <p><input type="submit" value="OK"></p>
        </form>
    </div>

    <div id="register">
        <h1>Log-in</h1>
        <form action="" method="post">
            <p>Pseudo : <input type="text" name="pseudo" /></p>
            <p>Mot de passe : <input type="text" name="password" /></p>
            <p>Email : <input type="text" name="email" /></p>
            <p>Nom : <input type="text" name="nom" /></p>
            <p>Prenom : <input type="text" name="prenom" /></p>
            <p><input type="submit" value="OK"></p>
        </form>
    </div>

    

    <?php
        if(isset($_SESSION) && isset($_POST['pseudo'])){
            $user = $userManager->login($_POST['pseudo']);
        }

        if(isset($POST['submit']) && isset($_POST['pseudo'])){
            $user = $userManager->login($_POST['pseudo']);
        }
    ?>
</body>
</html>



