<?php
       $connexion=[]; 
        $json=file_get_contents('connexion.json');
        $json=json_decode($json,true);
        $connexion=$json;
if (isset($_POST['valider'])&& isset($_POST['prenom']) &&isset($_POST['nom'])&&isset($_POST['user'])&&isset($_POST['mdp'])&&isset($_POST['cmdp'])) 
{
    for ($i=0; $i < Count($connexion); $i++)
    {
    if ($connexion[$i]['user']==$_POST['user']  ) 
    {
        echo "login ou mot de passe existe deja dans la base";
    }
    else{
            $inscription=[];
            $inscription['nom']=$_POST['nom'];
            $inscription['prenom']=$_POST['prenom'];
            $inscription['user']=$_POST['user'];
            $inscription['mdp']=$_POST['mdp'];
            $inscription['image']=$_POST['image'];
            $inscription['role']=$_POST['role'];
            $connexion=[]; 
            $json=file_get_contents('connexion.json');
            $json=json_decode($json,true);
            $connexion=$json;
            $json[]=$inscription;
            $json=json_encode($json);
            file_put_contents('connexion.json',$json);
            header('Location: connexion.php');
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
    <link rel="stylesheet" href="joueur.css">
    
    
</head>
<body>
    <header class="header">
        <img src="Images\logo-QuizzSA.png" alt="logo">
        <h2>Le plaisir de jouer</h2>
    </header>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="fieldset">
                <div class="p1">
                    <p class="smallheader"><h2>S'INSCRIRE</h2></p>
                    <h4>Pour tester votre niveau de culture générale</h4>
                </div>
                <div class="p2">
                <p>
                        <h3>Prenom<span style="color: red">*</span> </h3>
                    <input type="text" name='prenom' id="prenom" onkeyup="validPrenom()"><br/>
                    <span id="prenominf" style="color: red"></span>
                    </p>
                    <p>
                        <h3>Nom <span style="color: red">*</span></h3>
                        <input type="text" name='nom' id ="nom" onkeyup="validNom()"><br/>
                        <span id="nominf" style="color: red"></span>
                    </p>
                    <p>
                        <h3>Login <span style="color: red">*</span></h3>
                        <input type="text" name='user' required="requered" id="login" onkeyup="validLogin()"><br/>
                        <span id="logininf" style="color: red"></span>
                    </p>
                    <p>
                        <h3>Password <span style="color: red">*</span></h3>
                        <input type="text" name="mdp" required="requered" id="mdp" onkeyup="validMdp()"><br/>
                        <span id="mdpinf" style="color: red"></span>
                    </p>
                    <p>
                        <h3>Comfirmer Password <span style="color: red">*</span></h3>
                        <input type="text" name="cmdp" required="requered" id="cmdp" onkeyup="validCmdp()"><br/>
                        <span id="cmdpinf" style="color: red"></span>
                    </p>
                    <input type="hidden" name="role" value="joueur">
                </div>
                <img alt="" id="output"/>
                <p class="ava"> Avatar <input type="file" name="image" accept="image/*" onchange="loadFile(event)">
                
                </p>
                    <p><button class="valider" type="submit" name="valider" id="btnSumbmit">Créer compte</button></p>
            </div>
       </form>
</body>
<script type="text/javascript" src="insjour.js"></script>
</html> 
