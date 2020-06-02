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
    
	//Nous allons demander le hash pour cet utilisateur à notre base de données :
	/*$query = $pdo->prepare('SELECT password FROM Admin WHERE login = :login');
	$query->bindParam(':login', $_POST["login"]);
	$query->execute();
	$result = $query->fetch();
	$hash = $result[0];
	
	//Nous vérifions si le mot de passe utilisé correspond bien à ce hash à l'aide de password_verify :
	$correctPassword = password_verify($_POST["mdp"], $hash);
	
	if($correctPassword){
		//Si oui nous accueillons l'utilisateur identifié
		echo "Bienvenu ".$_POST["login"];
	}else{
		//Sinon nous signalons une erreur d'identifiant ou de mot de passe
		echo "login/password incorrect";
    }*/
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
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