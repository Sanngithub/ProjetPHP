<?php
    session_start();
    require '../controleur/connexion.php';
    require '../modele/userManager.php';
    $userManager = new UserManager($bdd);

    $REGEX_PSEUDO = "^(?=.*[a-zA-Z])(?!.*[-+_!@#$%^&*.,?])^[^ ]{3,15}$" ;
    $REGEX_PASSWORD = "^(?=.*[a-zA-Z])(?=.*\d)(?!.*[-+_!@#$%^&*.,?]).{6,35}$";
    $REGEX_EMAIL = "^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$";

    if( isset($_SESSION['pseudo'])
        && isset($_SESSION['password'])
        && isset($_SESSION['passwordConfirmation'])
        && isset($_SESSION['email'])
        && $_SESSION['password'] === $_SESSION['passwordConfirmation']){

            if( trim($_SESSION['pseudo']) != ""
                // && preg_match($REGEX_PSEUDO, $_SESSION['pseudo'])
                && trim($_SESSION['password']) != ""
                // && preg_match($REGEX_PASSWORD, $_SESSION['password'])
                && trim($_SESSION['email']) != ""
                // && preg_match($REGEX_EMAIL, $_SESSION['email'])
                ) {
                
                        $user = new User();
                        $user->setPseudo($_SESSION['pseudo']);
                        $user->setPassword($_SESSION['password']);
                        $user->setEmail($_SESSION['email']);
                        $user->setNom($_SESSION['nom']);
                        $user->setPrenom($_SESSION['prenom']);
                        
                        $isUserCreated = $userManager->add($user);
                        if ($isUserCreated){
                            header('location:../controleur/login.php');
                            die();
                        }
                        else{
                            $_SESSION['error_register'] = "Pseudo déjà utilisé !";
                            header('location:../vue/register.php');
                            die();
                        }
            }
    }
    else if (   isset($_SESSION['pseudo'])
                && isset($_SESSION['password'])
                && isset($_SESSION['passwordConfirmation'])
                && isset($_SESSION['email'])
                && trim($_SESSION['pseudo']) != ""
                && trim($_SESSION['password']) != ""
                && trim($_SESSION['email']) != ""
                && $_SESSION['password'] != $_SESSION['passwordConfirmation']) {
        
        $_SESSION['error_register'] = "Les mots de passent que vous avez saisi ne sont pas identiques !";
        header('location:../vue/register.php');
        die();
    }
    else{
        $_SESSION['error_register'] = "Veuillez remplir le formulaire d\'enregistrement avec les informations requises !";
        header('location:../vue/register.php');
        die();
    }
?>