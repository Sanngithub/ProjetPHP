<!--*************** HEADER **********************************************************************************************************************************************************************************************************************-->
<?php
    require '../controleur/connexion.php';
    // require '../modele/animeClass.php';
    // require '../modele/animeManager.php';
    // include '../modele/userClass.php';
    require '../modele/userManager.php';
    $userManager = new userManager($bdd);
    $listUsers = $userManager->getAll();
?>

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