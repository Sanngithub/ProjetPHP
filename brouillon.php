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













<!------------------------BROUILLON DU HEADER-------------------------------------->

<header>
        <div id="logo"  class="colonne">
            <img src="../pictures/logo_fight_club.jpg" alt="logo superfilms" class="small">
        </div>

        <div id="sub_header1">
            <div id="sub_header2">
                <div id="menu"  class="colonne colonne2">
                    <ul>
                    <?php
                    foreach ($listUsers as $user) {
                        if ($_SESSION['pseudo'] == $user->getPseudo()) {

                            echo $user->getPseudo(). "<br>";
                            echo $user->getIdUser(). "<br>";
                            echo $user->getEmail(). "<br>";
                            echo $user->getNom(). "<br>";
                            echo '
                
                            <li><a href="animes.php" target="_self">Accueil</a></li>
                            <li><a href="animes.php?titre=bordel" target="_self">Recherche</a></li>
                            <li><a href="ajouter.php?id='.$user->getIdUser().'" target="_self">Ajouter un Anime</a></li>
                            
                            ';
                        }
                        // <li><a href="liste.php" target="_self">Liste</a></li>
                    }
                    ?> 
                    </ul>
                </div>

                <div id="userinfo"  class="colonne colonne2">
                    <ul>

                        <?php
                        foreach ($listUsers as $user) {
                            if ($_SESSION['pseudo'] == $user->getPseudo()) {
                                echo '
                                <li id="nav_userinfo"><a href="userAnimes.php?id='.$user->getIdUser().'" >Mes films</a></li>
                                <li id="nav_userinfo"><a href="user.php?id='.$user->getIdUser().'" >Profil de '.$user->getPseudo().'</a></li>
                                <li id="nav_logout"><a href="../controleur/logout.php" target="_self">Logout</a></li>
                                ';
                            }
                        }
                        ?> 
<!-- 
                        <li id="nav_userinfo"><a href="user.php?id=<?php $_SESSION['user'] ?>" target="_self"><?php echo $_SESSION['pseudo'] ?></a></li>
                        <li id="nav_useredit"><a href="user.php?action=edit&userid=<?php $_SESSION['user'] ?>" target="_self">Profil</a></li>
                        <li id="nav_logout"><a href="../controleur/logout.php" target="_self">Logout</a></li> -->
                    </ul>
                </div>
            </div>

            <div id="searchboars"  class="colonne colonne2">
                <ul>
                    <li><a href="animes.php?genre=Action">Action</a></li>
                    <li><a href="animes.php?genre=Adventure">Adventure</a></li>
                    <li><a href="animes.php?genre=Chinese">Chinese</a></li>
                    <li><a href="animes.php?genre=Comedy">Comedy</a></li>
                    <li><a href="animes.php?genre=Drama">Drama</a></li>
                    <li><a href="animes.php?genre=Ecchi">Ecchi</a></li>
                    <li id="show_more_type">
                        <a>Plus</a>
                        <ul id="type_submenu" class="hidden">
                            <li><a href="animes.php?genre=Fantasy">Fantasy</a></li>
                            <li><a href="animes.php?genre=Horror">Horror</a></li>
                            <li><a href="animes.php?genre=Mahou Shoujo">Mahou Shoujo</a></li>
                            <li><a href="animes.php?genre=Mecha">Mecha</a></li>
                            <li><a href="animes.php?genre=Music">Music</a></li>
                            <li><a href="animes.php?genre=Mystery">Mystery</a></li>
                            <li><a href="animes.php?genre=Psychological">Psychological</a></li>
                            <li><a href="animes.php?genre=Romance">Romance</a></li>
                            <li><a href="animes.php?genre=Sci-Fi">Sci-Fi</a></li>
                            <li><a href="animes.php?genre=Sports">Sports</a></li>
                            <li><a href="animes.php?genre=Supernatural">Supernatural</a></li>
                            <li><a href="animes.php?genre=Thriller">Thriller</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
        </div>
    </header>


    <header class="header">
        <nav class="navbar navbar-expand-lg fixed-top py-3">
            <div class="container"><a href="#" class="navbar-brand text-uppercase font-weight-bold">Animes</a>
                <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
                
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a href="#" class="nav-link text-uppercase font-weight-bold">Home <span class="sr-only">(current)</span></a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">About</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">Gallery</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">Portfolio</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>



