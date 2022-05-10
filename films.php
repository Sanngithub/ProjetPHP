<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperFilms</title>
</head>
<body>
    <header>

    </header>

    <main>
        
    </main>
	
    <footer>
        <p>SuperFilms, développé par JM & BN - 2022 - Tous droits réservés</p>
    </footer>
    

    <?php
        if(isset($_SESSION)){
            echo $_SESSION['pseudo'];
			echo '<br>';
        	echo $_SESSION['password'];
        }
    ?>
</body>
</html>



