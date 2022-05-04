<?php
    session_start();    
    require('../controleur/login_verification.php');
    require '../controleur/connexion.php';
    require '../modele/userManager.php';
    $id = $_GET['id'];
    $usersManager = new UserManager($bdd);
    $myUser = $usersManager->getById($id);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperFilms - My Informations</title>
</head>
<body>

    <div>
        <div>
            <h1>My Informations</h1>
        </div>

        <div>
            <table>
                <tr>
                    <td>Pseudo</td>
                    <td><?php echo $myUser->getPseudo()?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $myUser->getEmail()?></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><?php echo $myUser->getNom()?></td>
                </tr>
                <tr>
                    <td>Firstname</td>
                    <td><?php echo $myUser->getPrenom()?></td>
                </tr>
    
            </table>
        </div>

    </div>

    <div>
        <p><a href="./userUpdate.php?id=<?php echo $myUser->getIdUser()?>"> modifier tes informations</a></p>
        <p><a href="../controleur/deleteUser.php?id=<?php echo $myUser->getIdUser()?>"> supprimer ton compte</a></p>
    </div>

    
        <!-- <form action="" method="post">
        
            <input type="hidden" value=<?php echo $myUser->getIdUser()?>>

            <p for="pseudo">Pseudo</p>
            <input type="text" id="pseudo" name="pseudo" value="<?php echo $myUser->getPseudo()?>">

            <p for="mail">Email</p>
            <input type="email" id="mail" name="mail" value="<?php echo $myUser->getEmail()?>">

            <p for="password">New Password</p>
            <input type="password" id="password" name="password" value="<?php echo $myUser->getPassword()?>">

            <p for="verifPassword">Confirm new password</p>
            <input type="password" id="verifPassword" name="verifPassword" placeholder="confirm password...">
            <br>
            <br>
            <button type="submit" name="submit" >click to modify</button>
        </form> -->


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
    </div>

</body>
</html>