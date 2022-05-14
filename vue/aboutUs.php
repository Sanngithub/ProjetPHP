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
    <title>SuperAnimes - About Us</title>
    <link rel="stylesheet" href="style4.css?v=<?php echo time(); ?>" type="text/css" >
</head>
<body>

    <?php include_once('header.php'); ?>

    <div class="container-about-us">
        <div class="bloc-about-us">
            <h1>About us</h1> <br>
            <p class="text-about-us">
                Hello ! we are two students in the DUT IT Special Year, Jonathan and Bernard. You are currently visiting our project developed in PHP, HTML, CSS and JavaScript.
                Do not hesitate to contact us ! We invite you to join us also on social networks.
            </p>
            <br>
                <a class="link-icon"href="https://github.com/" target="blank"  ><img class="icon" src="../pictures/github.png" alt="github"></a>
                <a class="link-icon"href="https://api.whatsapp.com/" target="blank"><img class="icon" src="../pictures/whatsapp_icon.png" alt="whatsapp"></a>
                <a class="link-icon"href="https://www.instagram.com/" target="blank"><img class="icon" src="../pictures/instagram_icon.png" alt="instagram"></a>
                <a class="link-icon"href="https://www.linkedin.com/in/" target="blank"><img class="icon" src="../pictures/linkedn_icon.png" alt="linkedn"></a>
        </div>
    </div>

    <?php include_once('footer.php'); ?>

</body>
</html>