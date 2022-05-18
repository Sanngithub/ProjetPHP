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
        <link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <title>SuperAnimes - My Informations</title>
    </head>
    <body>
    
        <?php
        include_once('header.php');
        echo "<br><br><br><br><br><br><br><br>";
        ?>  

        <div class="container-user-info">

            <div class="bloc-info-user">
                    
                    <h1>About me</h1>
        
                    <table>
                        <?php
                            foreach ($users as $user) {
                                if ($_SESSION['pseudo'] == $user->getPseudo() || $id == $user->getIdUser()) {
                    
                                    echo '
                                    <tr>
                                        <td><i class="fas fa-user-alt"></i> my pseudo</td>
                                        <td>'.$user->getPseudo().'</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-envelope-open"></i> my email</td>
                                        <td>'.$user->getEmail().'</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-smile"></i> my name</td>
                                        <td>'.$user->getNom().'</td>
                                    </tr>
                                    <tr>
                                        <td><i class="far fa-smile"></i> my firstname</td>
                                        <td>'.$user->getPrenom().'</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a id="updateUser" href=" ./userUpdate.php?id='.$user->getIdUser().' " ><i class="far fa-edit"></i> Update my informations</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a id="userDelete" href=" ../controleur/deleteUser.php?id='.$user->getIdUser().' "><i class="fas fa-ban"></i> Delete my account</a>
                                        </td>
                                    </tr>
                                ';

                                }
                            }
                        ?> 
                    </table>
            </div>       
        </div>  

        <?php include_once('footer.php'); ?>
        
    </body>
</html>