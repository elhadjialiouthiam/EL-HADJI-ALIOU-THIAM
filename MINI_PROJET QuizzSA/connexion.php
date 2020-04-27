<?php
session_start();
$error='';
   if(isset($_POST['connexion']))
   {
       $user=$_POST["user"];
       $mdp=$_POST["mdp"];
       $connexion=[];
      
    $json=file_get_contents('connexion.json');
    $json=json_decode($json,true);
    $connexion=$json;
        for ($i=0; $i < Count($connexion); $i++) { 
            if ($connexion[$i]['user']==$user && $connexion[$i]['mdp']==$mdp) {
                if($connexion[$i]['role']=='admin'){
                    $_SESSION["nom"]=$connexion[$i]['nom'];
                    $_SESSION["prenom"]=$connexion[$i]['prenom'];
                    $_SESSION["user"]=$connexion[$i]['user'];
                    $_SESSION["mdp"]=$connexion[$i]['mdp'];
                    $_SESSION['image']=$connexion[$i]['image'];
                    header('Location: accueilAdmin.php');
                }else{
                    $_SESSION["nom"]=$connexion[$i]['nom'];
                    $_SESSION["prenom"]=$connexion[$i]['prenom'];
                    $_SESSION["user"]=$connexion[$i]['user'];
                    $_SESSION["mdp"]=$connexion[$i]['mdp'];
                    $_SESSION['image']=$connexion[$i]['image'];
                    header('Location: interfaceJoueur.php');
                }
            }else {
                $error='login or password wrong';
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
        <form action="" method="POST" >
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
                    <p style="color: red; margin-left: 20px">
                    <?php echo  $error  ?>                   
                    </p>
                    <p><input  type="submit" name="connexion" value="Connexion" />
                    <a href="insJoueur.php" style=" color: grey;text-decoration: none;">S'inscrire pour jouer?</a>
                    </p>
                </div>
            </div>
       </form>
</body>
</html>