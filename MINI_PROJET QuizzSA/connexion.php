<?php
   if(isset($_POST['connexion']))
   {
       $user=$_POST["user"];
       $mdp=$_POST["mdp"];
       $connexion=[];
    $json=file_get_contents('connexion.json');
    $json=json_decode($json,true);
    $connexion=$json;
        for ($i=0; $i < Count($connexion); $i++) { 
            if ($connexion[$i]['user1']==$user && $connexion[$i]['mdp1']==$mdp) {
                header('Location: accueilAdmin.php');
        $_SESSION["nom"]=$connexion[$i]['nom1'];
        $_SESSION["prenom"]=$connexion[$i]['prenom1'];
        $_SESSION["user"]=$connexion[$i]['user1'];
        $_SESSION["mdp"]=$connexion[$i]['mdp1'];
        $_SESSION["image"]=$connexion[$i]['image1'];
            }elseif ($connexion[$i]['user2']==$user && $connexion[$i]['mdp2']==$mdp) {
                header('Location: interfaceJoueur.php');
                $_SESSION["nom"]=$connexion[$i]['nom2'];
                $_SESSION["prenom"]=$connexion[$i]['prenom2'];
                $_SESSION["user"]=$connexion[$i]['user2'];
                $_SESSION["mdp"]=$connexion[$i]['mdp2'];
                $_SESSION["image"]=$connexion[$i]['image2'];
            }else {
               
                echo 'login or password wrong';
            }
        }
        }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Page connexion</title>
    <link rel="stylesheet" href="connexion.css">
</head>
<body>
    <header class="header">
        <img src="Images\logo-QuizzSA.png" alt="logo">
        <h2>Le plaisir de jouer</h2>
    </header>
        <form action="" method="POST">
            <div class="fieldset">
                <div class="p1">
                    <p class="smallheader">Login form  <span class="close">X</span></p>                 
                </div>
                <div class="p2">
                    <p>
                        <input  class="input1"  type="text" name="user" placeholder="LOGING" required="requered" >
                    </p>
                    <p>
                        <input  class="input2" type="text" name="mdp" placeholder="PASSWORD" required="requered">                      
                    </p>
                    <p><input  type="submit" name="connexion" value="Connexion" />
                    <a href="insJoueur.php" style=" color: grey;text-decoration: none;">S'inscrire pour jouer?</a>
                    </p>
                </div>
            </div>
       </form>
</body>
</html>
