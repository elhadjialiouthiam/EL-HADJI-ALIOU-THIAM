<?php
session_start();
require('data/connection($login,$pwd).php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Page connexion</title>
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/connexion.css">
</head>
<body class="text-center">
        <form action="" method="POST" class="form-signin  " style="background-color: #f5f5f5;" >
            <div class="alert alert-danger">
                <?php echo $msg ?>
            </div>
            <img src="style/Images/logo-QuizzSA.png" alt="" width="75" height="82">
            <h1 class="h3 mb-4 font-weight-normal ">LE PLAISIR DE JOUER</h1>
            <label for="inputLogin" class="float-left">Login</label>
            <input type="login" name="login" id="inputLogin" class="form-control mt-3" placeholder="Login" required >
            <label for="inputPassword" class="float-left">Password</label>
            <input type="password" name="mdp" id="inputPassword" class="form-control mt-3" placeholder="Password" required>
            <button  type="submit"class="btn btn-lg btn-primary btn-block" name="Connexion">Connexion</button>
            <a class="" href="Joueur/insJoueur.php">S'inscrire pour jouer?</a>
        </form>
</body>
</html>