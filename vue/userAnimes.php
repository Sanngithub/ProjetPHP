<?php
    session_start();
    require('../controleur/login_verification.php');
    $id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css?v=<?php echo time(); ?>">
    <!-- force le cache à se reloader -->
    <title>SuperAnimes - My Animes</title>
</head>


<body>
    <?php include_once('header.php'); ?>
    
    <div class="bloc-animes-user">
        <?php
            require_once('../controleur/populateUserAnimes.php');
        ?>
    </div>
    
    <?php include_once('footer.php'); ?>
</body>
</html>