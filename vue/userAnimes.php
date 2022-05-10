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
    <title>SuperFilms - Mes Animes</title>
</head>


<body>
    <!--*************** STATIC BACKGROUND *********************************************************************************************************************************************************************************************************-->

    <?php include_once('header.php'); ?>


    <!--*************** MAIN **********************************************************************************************************************************************************************************************************************-->
    <div class="bloc-animes-user">

        <?php

            require_once('../controleur/populateUser.php');

            echo '<br><br><br><br><br>';


            if(isset($_SESSION)){
                echo '<pre>';
                print_r($_SESSION);
                echo '</pre>';
                
                echo '<pre>';
                print_r($_COOKIE);
                echo '</pre>';
            }
        ?>

    </div>
    

	<!-- <div class="div-footer">
        <?php include_once('footer.php'); ?>

    </div> -->
</body>
</html>



