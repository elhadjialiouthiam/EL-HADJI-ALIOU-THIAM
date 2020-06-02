<?php
session_start();
require('db_connect.php');
//Nous vérifions que l'utilisateur a bien envoyé les informations demandées 
//if(isset($_POST["login"]) && isset($_POST["mdp"])){
    if (isset($_POST['connexion'])) {
            $login = $_POST['login'];
            $mdp = $_POST['mdp'];
                $query = $pdo->prepare("SELECT * FROM Admin WHERE login='$login' AND password='$mdp'");
                $query->execute();
                $result = $query->fetch();
    
                  header('Location: Admin/admin.php');

}else echo "login ou password incorrect";
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/Style.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" >
    <div class='container'>
        <div class='contenu'>
            <div class='text'>
                <h1>LE PLAISIR DE JOUER</h1>
            </div>
            <div class='logo' >
            </div>
            <div class='login_form'>
                <div class='login'>
                    <div class='p1'>
                        <p> 
                            <input  class="input1"  type="username" name="login" placeholder="LOGING" required="requered" id="login" onkeyup="validLogin()">
                            <span id="logininf" style="color: red"></span>
                        </p>
                        <p>
                            <input  class="input2" type="password" name="mdp" placeholder="PASSWORD" required="requered" id="mdp" onkeyup="validMdp()">
                            <span id="mdpinf" style="color: red"></span>
                        </p>
                    </div>
                    <div class='p2'>
                        <input  type="submit" name="connexion" value="Connexion"/>
                        <a href="Joueur/insJoueur.php">S'inscrire pour jouer?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>