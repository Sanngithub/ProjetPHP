<!--*************** HEADER **********************************************************************************************************************************************************************************************************************-->
<?php
    require_once '../controleur/connexion.php';
    require_once '../modele/userManager.php';
    $userManager = new userManager($bdd);
    $listUsers = $userManager->getAll();
?>

<header>
        <a href="animes.php" class="logo">
            Super<span>Animes</span>
        </a>

        <input type="checkbox" id="menu-bar">
        <label for="menu-bar">☰</label>

        <nav class="navbar">
            <ul>
                <li><a href="animes.php" target="_self">Home</a></li>

                <li><a href="#">Category</a>
                    <ul>
                        <li><a href="animes.php?genre=Action">Action</a></li>
                        <li><a href="animes.php?genre=Adventure">Adventure</a></li>
                        <li><a href="animes.php?genre=Chinese">Chinese</a></li>
                        <li><a href="animes.php?genre=Comedy">Comedy</a></li>
                        <li><a href="animes.php?genre=Drama">Drama</a></li>
                        <li><a href="animes.php?genre=Ecchi">Ecchi</a></li>
                        <li><a href="animes.php?genre=Hentai">Hentai</a></li>
                        <li><a href="animes.php?genre=Seinen">Seinen</a></li>
                        <li><a href="animes.php?genre=Shonen">Shonen</a></li>
                        <li><a href="animes.php?genre=Shonen">Sport</a></li>
                    </ul>
                </li>

                <li><a href="#">Search</a>
                    <ul>
                        <form action="animes.php" method="get">
                            <input type="text" id="search" name="search" placeholder="titre">
                        </form>
                    </ul>
                </li>

                <li>
                    <a href="#"><?php echo $_SESSION['pseudo']?> </a>
                    <ul>
                        <?php   
                            foreach ($listUsers as $user) {
                                if ($_SESSION['pseudo'] == $user->getPseudo()) {
                                    echo '
                                    <li id="nav_userinfo"><a href="userInfo.php?id='.$user->getIdUser().'" >About me</a></li>
                                    <li><a href="ajouter.php?id='.$user->getIdUser().'" target="_self">Add anime</a></li>
                                    <li id="nav_userinfo"><a href="userAnimes.php?id='.$user->getIdUser().'" >My animes</a></li>
                                    <li id="nav_logout"><a href="../controleur/logout.php" target="_self">Logout</a></li>
                                    ';
                                }
                            }
                            // echo '
                            //     <li id="nav_userinfo"><a href="user.php?id='.$_SESSION['user']->getIdUser().'" >About me</a></li>
                            //     <li><a href="ajouter.php?id='.$_SESSION['user']->getIdUser().'" target="_self">Add anime</a></li>
                            //     <li id="nav_userinfo"><a href="userAnimes.php?id='.$_SESSION['user']->getIdUser().'" >My animes</a></li>
                            //     <li id="nav_logout"><a href="../controleur/logout.php" target="_self">Logout</a></li>
                            // ';
                        ?>
                    </ul>
                </li>
                <li><a href="aboutUs.php">About us</a></li>
            </ul>
        </nav>
    </header>