<?php
    require_once '../modele/userManager.php';
    session_start();
    require('../controleur/login_verification.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SuperAnimes - Accueil</title>
        <link rel="stylesheet" href="style4.css?v=<?php echo time(); ?>" type="text/css" >
        <link rel="shortcut icon" href="../pictures/favicon.ico"/>
    </head>

    <body>

        <?php include_once('header.php'); ?>

        <div class="bloc-animes">
            <?php
                require_once('../controleur/populateAllAnimes.php');
            ?> 
        </div>

        <?php include_once('footer.php'); ?>
        
    </body>
</html>