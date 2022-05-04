<?php
    session_start();
    require('../controleur/login_verification.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <!-- force le cache à se reloader -->
    <title>SuperFilms - Animes</title>
</head>


<body>
    <!--*************** STATIC BACKGROUND *********************************************************************************************************************************************************************************************************-->
    <div class="no_print" id="full-size-background"></div>


    <?php include_once('header.php'); ?>


    <!--*************** MAIN **********************************************************************************************************************************************************************************************************************-->
    <main>
        <?php

            require_once('../controleur/populate.php');

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
    </main>

	
   <?php include_once('footer.php'); ?>
</body>
</html>



