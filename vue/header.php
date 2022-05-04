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
        <a href="#" class="logo">LOGO</a>

        <input type="checkbox" id="menu-bar">
        <label for="menu-bar">Menu</label>

        <nav class="navbar">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Category+</a>
                    <ul>
                        <li><a href="#">Shonen+</a>
                            <ul>
                                <li><a href="#">Shonen</a></li>
                                <li><a href="#">Seinen</a></li>
                                <li><a href="#">Comedy</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Seinen+</a>
                            <ul>
                                <li><a href="#">Shonen</a></li>
                                <li><a href="#">Seinen</a></li>
                                <li><a href="#">Comedy</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Comedy+</a>
                            <ul>
                                <li><a href="#">Shonen</a></li>
                                <li><a href="#">Seinen</a></li>
                                <li><a href="#">Comedy</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Hentai+</a>
                            <ul>
                                <li><a href="#">Shonen</a></li>
                                <li><a href="#">Seinen</a></li>
                                <li><a href="#">Comedy</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#">Search</a>
                    <ul>
                        <input type="text" placeholder="shonen, comedy">
                    </ul>
                </li>
                <li><a href="#">Add anime</a></li>
                <li><a href="#">Sann</a>
                    <ul>
                        <li><a href="#">About me</a></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </li>
                <li><a href="#">About us</a></li>
            </ul>
        </nav>

    </header>


