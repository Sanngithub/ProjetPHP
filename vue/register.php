<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" type="text/css" href="style2.css?v=<?php echo time(); ?>">
        <link rel="shortcut icon" href="../pictures/favicon.ico"/>
        <title>SuperAnimes - Register</title>
    </head>
    <body>

        <div class="container">
            <div class="header">
                <h1>Register</h1>
            </div>

            <div class="error-container">
                    <p class="error">
                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $_SESSION['pseudo'] = $_POST['pseudo'];
                                $_SESSION['password'] = $_POST['password'];
                                $_SESSION['passwordConfirmation'] = $_POST['passwordConfirmation'];
                                $_SESSION['email'] = $_POST['email'];
                                $_SESSION['nom'] = $_POST['nom'];
                                $_SESSION['prenom'] = $_POST['prenom'];

                                header("location:../controleur/register_verification.php");
                                die();
                            }
                            if(isset($_SESSION['error_register'])){echo $_SESSION['error_register'];}
                        ?>
                    </p>
            </div>

            <div class="main">
                <form id="formulaire" name="formulaire" action="" method="post" class="">
                    <span>
                        <i class='fas fa-user-alt'></i>
                        <input type="text" placeholder="Username" name="pseudo" onkeyup="verifierPseudo()" 
                                    onfocus="document.getElementById('explicationUser').style.display = 'block' "
                                    onblur="document.getElementById('explicationUser').style.display ='none'" pattern="^(?=.*[a-zA-Z])(?!.*[-+_!><:;()@#$%^&*., ?])^[^ ]{3,15}$" required>
                                <span class="msg-unvalid-pseudo" ><br>Saisir un pseudo dans les règles et sans espaces !</span>
                                <span class="msg-valid-pseudo" ><br>Saisie du pseudo correct correct ! <br>Le pseudo ne sera plus modifiable !</span>
                    </span><br>
                    <div id="explicationUser">
                        <ul>
                            <li>
                                <img id="case1user" src="../pictures/vide.png" alt="une case" height="30">
                                le pseudo peut contenir des lettres et/ou des chiffres
                            </li>
                            <li>
                                <img id="case2user" src="../pictures/vide.png" alt="une case" height="30">
                                le pseudo ne doit pas contenir de caractères spéciaux
                            </li>
                            <li>
                                <img id="case3user" src="../pictures/vide.png" alt="une case" height="30">
                                le pseudo doit être compris entre 3 et 15 caractères
                            </li>
                        </ul>
                    </div>
                    <span>
                        <i class='fas fa-envelope-open'></i>
                        <input type="email" placeholder="Email" name="email" required>
                    </span><br>
                    <span>
                        <i class='fas fa-smile'></i>
                        <input type="text" placeholder="Name" name="nom">
                    </span><br>
                    <span>
                        <i class='far fa-smile'></i>
                        <input type="text" placeholder="Firstname" name="prenom">
                    </span><br>
                    <span>
                        <i class='fas fa-lock'></i>
                        <input placeholder="Password" type="password" id="password" name="password" onkeyup="verifierMdp()" 
                                    onfocus="document.getElementById('explication').style.display = 'block'"
                                    onblur="document.getElementById('explication').style.display ='none'" pattern="^(?=.*[a-zA-Z])(?=.*\d)(?=.*[-+_!@#$%^&*.,?]).{6,35}$" required>
                        <span class="msg-unvalid-password" ><br>Saisir un mot de passe dans les règles !</span>
                        <span class="msg-valid-password" ><br>Saisie du mot de passe correct !</span>
                    </span><br>
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
                    <span>
                        <i class='fas fa-user-lock'></i>
                        <input type="password" placeholder="Confirm password" id="passwordConfirmation" name="passwordConfirmation" required>
                    </span><br>

                    <button>M'enregistrer</button>
                </form>

                <div class="signup-container">
                    <span>
                        <p>Already an account ? <a href="index.php">Login here</a></p>
                    </span>
                </div>
            </div>
        </div>

        <?php include_once('footer.php'); ?>

        <script type="text/javascript" src="../js/script.js"> </script>

    </body>
</html>