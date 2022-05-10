<?php
    session_start();    
    require('../controleur/login_verification.php');
    $id = $_GET['id'];
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css?v=<?php echo time(); ?>">
    <title>SuperFilms - My Informations</title>
</head>
<body>
   
    <?php
    include_once('header.php');
    echo "<br><br><br><br><br><br><br><br>";
    ?>  

    
    <div class="bloc-info-user">
        
            <div>
                <h1>My Informations</h1>
            </div>

            <table>
                <?php
                    foreach ($listUsers as $user) {
                        if ($_SESSION['pseudo'] == $user->getPseudo() || $id == $user->getIdUser()) {
                            echo '
                            <tr>
                                <td>Pseudo</td>
                                <td>'.$user->getPseudo().'</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>'.$user->getEmail().'</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>'.$user->getNom().'</td>
                            </tr>
                            <tr>
                                <td>Firstname</td>
                                <td>'.$user->getPrenom().'</td>
                            </tr>
                            <td>
                            <a href=" ./userUpdate.php?id='.$user->getIdUser().' " >Modifier mes informations</a>
                            </td>
                            <td>
                                <a href=" ../controleur/deleteUser.php?id='.$user->getIdUser().' " >Supprimer le compte</a>
                            </td>

                        ';

                        }
                    }
                ?> 
            </table>
    </div>

    <?php
        // if(isset($_POST['submit'])) {
        //     if ( empty($_POST['verifPassword']) || ($_POST['password'] == $_POST['verifPassword']) ) {
        //         $myUser->setPassword( MD5($_POST['password']) ) ; // hachage de mot de passes
        //         $myUser->setPseudo($_POST['pseudo']);
        //         $myUser->setMail($_POST['mail']);
        //         $usersManager->update($myUser);
        //         header('Location: users.php');
        //     } else {
        //         echo " <p>lesMots de passe ne correspondent pas</p>";
        //     }
        // }


    ?> 
   

</body>
</html>