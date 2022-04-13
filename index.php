<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperFilms - Accueil</title>
</head>
<body>
    <!--*************** STATIC BACKGROUND *********************************************************************************************************************************************************************************************************-->
    <div class="no_print" id="full-size-background"></div>

    <!--*************** MAIN **********************************************************************************************************************************************************************************************************************-->
    <main id="main">
        <div id="logo">
            <img src="./pictures/logo_fight_club.jpg" alt="logo superfilms">
        </div>
        
        <div id="login" class="center">
            <h1>Log-in</h1>
            <p class="error">
                <?php
                    function login(){
                        require './connexion.php';
                        require './userManager.php';
                        
                        $userManager = new UserManager($bdd);

                        if(     isset($_POST['pseudo']) && isset($_POST['password'])    ){
                            $_SESSION['pseudo'] = $_POST['pseudo'];
                            $_SESSION['password'] = $_POST['password'];
                    
                            if($user = $userManager->login($_SESSION['pseudo'], $_SESSION['password'])){
                                $_SESSION['user'] = $user;
                                header('location:films.php');
                                die();
                            }
                            else{
                                echo 'Identifiant ou mot de passe incorrect(s) OU utilisateur inexistant !';
                            }
                            
                        }
                        else{
                            echo 'Veuillez remplir le formulaire !';
                        }
                    }
            
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        login();
                    }
                ?>
            </p>

            <form action="" method="POST">
                <table>
                    <tr>
                        <td colspan="2">
                            <input type="text" name="pseudo" id="pseudo" placeholder="Entrez ici votre pseudo." required maxlength="30" pattern="[A-Za-z0-9_?]{1,20}" autofocus="autofocus">
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

            <button><a href="register.php">Register</a></button>
        </div>
    </main>


    <!--*************** STYLE **********************************************************************************************************************************************************************************************************************-->
    <style>
/* 1f1f1c */
        
        #full-size-background{
            z-index: -1;
            background-image: radial-gradient(#2d2f33,black);
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
        }

        #main{
            color: #F1F1F1;
            font-family: Arial,sans-serif;
            font-size: 11px;
            margin: 0;
            margin-top : 10vh;
        }

        #logo{
            display: flex;
            justify-content: center;
        }

        .center{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            flex-direction: column;
            align-content: center;
            align-items: center;
        }

        .error{
            color:red;
            font-weight:bold;
        }
    </style>

    
    <!--*************** PHP CODE **********************************************************************************************************************************************************************************************************************-->
    
</body>
</html>



