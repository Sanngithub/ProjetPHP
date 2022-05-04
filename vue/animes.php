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
        <!---------------------------from fontawesome and bootsrap--------------------------------------------------->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.slim.min.js" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" > -->
    <link rel="stylesheet" href="style4.css" type="text/css" />
</head>


<body>
    <!--*************** STATIC BACKGROUND *********************************************************************************************************************************************************************************************************-->
    <!-- <div class="no_print" id="full-size-background"></div> -->


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



