<?php
if (isset($_POST['valider'])) {
    $inscription=[];
    $inscription['nom']=$_POST['nom'];
    $inscription['prenom']=$_POST['prenom'];
    $inscription['user']=$_POST['user'];
    $inscription['mdp']=$_POST['mdp'];
    $inscription['image']=$_POST['image'];
    $inscription['role']=$_POST['role'];
    $json=file_get_contents('connexion.json');
    $json=json_decode($json,true);
    $json[]=$inscription;
    $json=json_encode($json);
    file_put_contents('connexion.json',$json);
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
        <form action="" method="POST">
            <div class="fieldset">
                <div class="p1">
                    <p class="smallheader"><h2>S'INSCRIRE</h2></p>
                    <h4>Pour tester votre niveau de culture générale</h4>
                </div>
                <div class="p2">
                <p>
                        <h3>Prenom </h3>
                    <input type="text" name='nom'>
                    </p>
                    <p>
                        <h3>Nom</h3>
                        <input type="text" name='prenom' >
                    </p>
                    <p>
                        <h3>Login</h3>
                        <input type="text" name='user' required="requered" >
                    </p>
                    <p>
                        <h3>Password</h3>
                        <input type="text" name="mdp" required="requered" >
                    </p>
                    <p>
                        <h3>Comfirmer Password</h3>
                        <input type="text" name="mdp" required="requered" >
                    </p>
                    <input type="hidden" name="role" value="joueur">
                </div>
                    <p class="ava"> Avatar <input name="image" accept="image/*" class="avatar" type="file">
                     <img src="Images/Capture1.PNG" alt="" id="output_image">
                    </p>
                    <p><button class="valider" type="submit" name="valider">Créer compte</button></p>
            </div>
       </form>
</body>
</html>
