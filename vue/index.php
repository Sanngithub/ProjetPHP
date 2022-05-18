<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" type="text/css" href="style2.css?v=<?php echo time(); ?>">
        <link rel="shortcut icon" href="../pictures/favicon.ico"/>
        <title>SuperAnimes - Login</title>
    </head>

    <body>

        <div class="container">
            <div class="header">
                <h1>Login</h1>
            </div>
            <div class="main">
                <form action="" method="post" class="">
                    <span>
                        <i class='fas fa-user-alt'></i>
                        <input type="text" placeholder="Username" name="pseudo">
                    </span><br>
                    <span>
                        <i class='fas fa-lock'></i>
                        <input type="password" placeholder="Password" name="password">
                    </span><br>
                        <button>Login</button>
                </form>

                <div class="signup-container">
                    <span>
                        <p>No account ? <a href="register.php">Register here</a></p>
                    </span>
                </div>

                <div class="error-container">
                    <p id="error" class="error">
                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $_SESSION['pseudo'] = $_POST['pseudo'];
                                $_SESSION['password'] = $_POST['password'];
                                $_SESSION['keeplogged'] = $_POST['keeplogged'];
                                header("location:../controleur/login.php");
                                die();
                            }
                            if(isset($_SESSION['error_login'])){
                                echo '<br>'.$_SESSION['error_login'].'<br><br>';
                            }
                        ?>
                    </p>
                </div>
            </div>
        </div>
        
        <?php include_once('footer.php'); ?>
    </body>
</html>