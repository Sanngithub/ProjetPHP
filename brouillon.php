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








    <!---------------------------BROUILLON DU FICHIER ANIMES--------------------------------------------->

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






<!---------------------------BLOC AJOUTER.PHP ------------------------------------->
    <!--*************** MAIN **********************************************************************************************************************************************************************************************************************-->

    <div class="bloc-add-anime">
    
            <!-- <div id="addOrUpdate">
                <fieldset>
                    <legend>Selectionner l'action à effectuer :</legend>
    
                    <div>
                        <input type="radio" id="add" name="addOrUpdate" value="Ajouter" checked>
                        <label for="add">Ajouter</label>
                    </div>
    
                    <div>
                        <input type="radio" id="update" name="addOrUpdate" value="Modifier">
                        <label for="update">Modifier</label>
                    </div>
                </fieldset>
            </div> -->
    
            <br>
            <p id="error" class="error">
                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $_SESSION['anime'] = $_POST;
                        // header("location:../controleur/addAnime.php");
                    }
                    if(isset($_SESSION['error_addAnime'])){echo '<br>'.$_SESSION['error_addAnime'].'<br><br>';}
                ?>
            </p>
            <p id="dbMessage" class="dbMessage">
                <?php
                    if (!Empty($_GET['dbMessage'])){
                        echo $_GET['dbMessage'];
                    }
                ?>
            </p>
            <br>
    
                
            <div class="ajouter-div-form">
                <form action="../controleur/addAnime.php" method="POST" id="form-ajouter">
                    <input type="text" name="titre_native" id="titre_native" placeholder="Entrez ici le titre d'origine." required maxlength="50" pattern="[A-Za-z0-9_? ]{1,50}" autofocus="autofocus" size="35">
                    <input type="text" name="titre_romaji" id="titre_romaji" placeholder="Entrez ici le titre en rōmaji." required maxlength="50" pattern="[A-Za-z0-9_? ]{1,50}" size="35">
                    <input type="text" name="titre_fr" id="titre_fr" placeholder="Entrez ici le titre en français." required maxlength="50" pattern="[A-Za-z0-9_? ]{1,50}" size="35">
                    <input type="text" name="status_anime" id="status_anime" placeholder="Entrez ici le statut de l'anime (0 = en cours ; 1 = terminée)." required maxlength="1" pattern="[0-1_?]{1,1}" size="40">
                    <input type="text" name="studio" id="studio" placeholder="Entrez ici le studio de l'anime." required maxlength="500"  size="100">
                    <input type="text" name="genre" id="genre" placeholder="Entrez ici le(s) genre(s) de l'anime." required maxlength="500"  size="100">
                    <input type="text" name="synopsis" id="synopsis" placeholder="Entrez ici le synopsis de l'anime." required maxlength="500"  size="100">
                    <input type="text" name="nb_episodes" id="nb_episodes" placeholder="Entrez ici le nombre d'épisodes prévus pour cette l'anime." required maxlength="500"  size="20">
                    <input type="submit" name="new_anime" value="Créer">
                                <!-- <input type="text" name="titre_native" id="titre_native" placeholder="Entrez ici le titre d'origine." autofocus="autofocus" size="35" required>
                                <input type="text" name="titre_romaji" id="titre_romaji" placeholder="Entrez ici le titre en rōmaji."  size="35" required>
                                <input type="text" name="titre_fr" id="titre_fr" placeholder="Entrez ici le titre en français."  size="35" required>
                                <input type="text" name="status_anime" id="status_anime" placeholder="Entrez ici le statut de l'anime (0 = en cours ; 1 = terminée)." required maxlength="1" pattern="[0-1_?]{1,1}" size="40" required>
                                <input type="text" name="studio" id="studio" placeholder="Entrez ici le studio de l'anime."   size="100"required>
                                <input type="text" name="genre" id="genre" placeholder="Entrez ici le(s) genre(s) de l'anime."  size="100"required>
                                <input type="text" name="synopsis" id="synopsis" placeholder="Entrez ici le synopsis de l'anime."   size="100"required>
                                <input type="text" name="nb_episodes" id="nb_episodes" placeholder="Entrez ici le nombre d'épisodes prévus pour cette l'anime."  size="20"required>
                                <input type="submit" name="new_anime" value="Créer"> -->
    
                </form>
            </div>

    </div>
