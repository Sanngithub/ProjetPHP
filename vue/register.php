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
                        }
                        if(isset($_SESSION['error_register'])){echo $_SESSION['error_register'];}
                    ?>
                </p>
        </div>

        <div class="main">
            <form id="formulaire" name="formulaire" action="" method="post" class="">
                <span>
                    <i class='fas fa-user-alt'></i>
                    <input type="text" placeholder="Username" name="pseudo" required>
                </span><br>
                <span>
                    <i class='fas fa-envelope-open'></i>
                    <input type="email" placeholder="Email" name="email" required>
                </span><br>
                <span>
                    <i class='fas fa-smile'></i>
                    <input type="text" placeholder="Name" name="nom" required>
                </span><br>
                <span>
                    <i class='far fa-smile'></i>
                    <input type="text" placeholder="Firstname" name="prenom" required>
                </span><br>
                <span>
                    <i class='fas fa-lock'></i>
                    <input placeholder="Password" type="password" id="password" name="password" onkeyup="verifierMdp()" 
                                onfocus="document.getElementById('explication').style.display = 'block' "
                                onblur="document.getElementById('explication').style.display ='none'" required>
                    <span class="msg-unvalid-password" ><br>Saisir un mot de passe dans les règles !</span>
                    <span class="msg-valid-password" ><br>Saisie du mot de passe correct !</span>
                </span><br>
                <span>
                    <i class='fas fa-user-lock'></i>
                    <input type="password" placeholder="Confirm password" name="passwordConfirmation" required>
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
                            le mot de passe doit être compris entre 5 et 35 caractères
                        </li>
                    </ul>
                </div>
                <button>M'enregistrer</button>
            </form>

            <div class="signup-container">
                <span>
                    <p>Already an account ? <a href="index.php">Login here</a></p>
                </span>
            </div>

        </div>

    </div>

    <div class="footer">
        <footer>
            <p class="copyright">SuperAnimes, développé par JM & BN - Tous droits réservés &copy; </p>
        </footer>
    </div>

    <script type="text/javascript" src="../js/script.js"> </script>

</body>
</html>

