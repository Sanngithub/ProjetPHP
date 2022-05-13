<!--*************** HEADER **********************************************************************************************************************************************************************************************************************-->
<?php
    require '../controleur/connexion.php';
    require '../modele/userManager.php';
    $userManager = new userManager($bdd);
    $listUsers = $userManager->getAll();
?>

<header>
        <a href="#" class="logo">
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
                        <li><a href="#">Hentai+</a>
                            <ul>
                                <li><a href="#">XXX</a></li>
                                <li><a href="#">YYY</a></li>
                                <li><a href="#">OOO</a></li>
                            </ul>
                        </li>
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
                                    <li id="nav_userinfo"><a href="user.php?id='.$user->getIdUser().'" >About me</a></li>
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
                        <!-- <li><a href="user.php">About me</a></li>
                        <li><a href="user.php?">Mes animes</a></li>
                        <li id="nav_logout"><a href="../controleur/logout.php" target="_self">Logout</a></li> -->
                    </ul>
                </li>
                <li><a href="#">About us</a></li>
            </ul>
        </nav>
    </header>