<!-- ----------------------------BROUILLON DE L'INDEX DE BASE---------------------------->

<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style2.css?v=<?php echo time(); ?>">
    <!-- <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>"> -->
    <title>SuperFilms - Accueil</title>
</head>
<body>
    <!--*************** STATIC BACKGROUND *********************************************************************************************************************************************************************************************************-->
    <div class="no_print" id="full-size-background"></div>

    <!--*************** MAIN **********************************************************************************************************************************************************************************************************************-->
    <main>
        <div id="index">
            <div id="logo_accueil">
                <img src="../pictures/logo_fight_club.jpg" alt="logo superfilms">
            </div>
            
            <div id="login" class="center">
                <h1>Log-in</h1>
                <p id="error" class="error">
                    <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $_SESSION['pseudo'] = $_POST['pseudo'];
                            $_SESSION['password'] = $_POST['password'];
                            $_SESSION['keeplogged'] = $_POST['keeplogged'];
                            header("location:../controleur/login.php");
                        }
                        if(isset($_SESSION['error_login'])){echo '<br>'.$_SESSION['error_login'].'<br><br>';}
                    ?>
                </p>
                

                <form action="" method="POST" class="form">
                    <table>
                        <tr>
                            <td colspan="2">
                                <input type="text" name="pseudo" id="pseudo" placeholder="Entrez ici votre pseudo." required maxlength="30" pattern="[A-Za-z0-9_?]{3,20}" autofocus="autofocus" value ="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="password" name="password" id="password" placeholder="Entrez ici votre mot de passe." required maxlength="32" pattern=".{4,32}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="keeplogged" name="keeplogged" value="1">
                                <label for="keeplogged">Je reste connecté</label>
                            </td>
                            <td>
                                <input type="submit" name="login" value="M&#39;identifier">
                            </td>
                        </tr>
                    </table>
                </form>

                <button class="form"><a href="register.php">Register</a></button>

                <?php
                    // echo '<br><br><br><br><br><br>Donnes $_SESSION :<br>';
                    // echo '<pre>';
                    // print_r($_SESSION);
                    // echo '</pre>';
                ?>
            </div>
        </div>
    </main>
</body>
</html>













<!-- ----------------------------BROUILLON DU REGISTER DE BASE---------------------------->



<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>SuperFilms - Register</title>
</head>
<body>
    <!--*************** STATIC BACKGROUND *********************************************************************************************************************************************************************************************************-->
    <div class="no_print" id="full-size-background"></div>

    <!--*************** MAIN **********************************************************************************************************************************************************************************************************************-->
    <main>
        <div id="index">
            <div id="logo_accueil">
                <img src="../pictures/logo_fight_club.jpg" alt="logo superfilms">
            </div>

            <div id="register" class="center">
                <h1>Register</h1>

                <p class="error">
                    <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $_SESSION['pseudo'] = $_POST['pseudo'];
                            $_SESSION['password'] = $_POST['password'];
                            $_SESSION['passwordConfirmation'] = $_POST['passwordConfirmation'];
                            $_SESSION['email'] = $_POST['email'];

                            header("location:../controleur/register_verification.php");
                        }
                        if(isset($_SESSION['error_register'])){echo $_SESSION['error_register'];}
                    ?>
                </p>

                <form action="" method="POST" class="form">
                    <table>
                        <tr>
                            <td colspan="2">
                                <input type="text" name="pseudo" id="pseudo" placeholder="Entrez ici votre pseudo." required maxlength="30" pattern="[A-Za-z0-9_?]{1,20}" autofocus="autofocus" size="40">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="password" name="password" id="password" placeholder="Entrez ici votre mot de passe." required maxlength="32" pattern=".{4,32}" size="40">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="password" name="passwordConfirmation" id="passwordConfirmation" placeholder="Confirmez votre mot de passe." required maxlength="32" pattern=".{4,32}" size="40">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="email" name="email" id="email" placeholder="Entrez ici votre adresse mail." required maxlength="32" pattern=".{4,32}" size="40">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="login" value="M&#39;enregistrer">
                            </td>
                        </tr>
                    </table>
                </form>

                <button class="form"><a href="animes.php">Log-in</a></button>
                <!-- <p><a id="back-to-signin" href="./index.php">back to sign in</a></p> -->

                <p>
                    Conditions de création d'un mot de passe :<br>
                    au moins 8 caractères<br>
                    au moins 1 minuscule et 1 majuscule,<br>
                    au moins un chiffre ou un symbole.
                </p>
                
            </div>
        </div>    
    </main>
</body>
</html>



