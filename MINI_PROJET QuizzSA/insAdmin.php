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
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header class="header">
        <img src="Images\logo-QuizzSA.png" alt="logo">
        <h2>Le plaisir de jouer</h2>
    </header>
    <form action="" method="POST">
            <div class="fieldset">
                <div class="p1">
                    <p class="smallheader">CRÉER ET PARAMÉRTER VOS QUIZZ</p><a href="deconnexion.php"><button type="reset">Déconnexion</button></a>                 
                </div>
                <div class="menu">
                    <div class="avatar">
                        <h2>THIAM</h2>
                        <h2>EL HADJI </h2>
                        <div id="wrapper">
                            <img src="Images/Screenshot_20190317-231913.png" alt="" id="output_image">
                        </div>

                    </div>
                        <ul class="listemenu">
                        <li class="list1"><a href="accueilAdmin.php">Liste Questions <img src="Images/Icônes/ic-liste.png" alt=""></a></li>
                        <li class="list2"><a href="insAdmin.php">Créer Admin<img src="Images/Icônes/ic-ajout-active.png" alt=""></a></li>
                        <li class="list3"><a href="listeJoueur.php">Liste joueurs <img src="Images/Icônes/ic-liste.png" alt=""></a></li>
                        <li class="list4"><a href="question.php">Créer Questions <img src="Images/Icônes/ic-ajout.png" alt=""></a></li>
                        </ul>
                </div>
            </div>
            <div class="fieldset1">
            <div class="p2">
                <h2>S'INSCRIRE</h2>
                <h4>Pour proposer de Quizz </h4>
            </div>
                <div class="p3">
                        <h4>Prenom </h4>
                    <input type="text" name='nom' required="requered">
                        <h4>Nom</h4>
                        <input type="text" name='prenom' required="requered">
                        <h4>Login</h4>
                        <input type="text" name='user' required="requered" >
                        <h4>Password</h4>
                        <input type="text" name="mdp" required="requered" >
                        <h4>Comfirmer Password</h4>
                        <input type="text" name="mdp" required="requered" >
                        <input type="hidden" name="role" value="admin">
                </div>
                    <p class="ava"> Avatar <input accept="image/*" name="image" class="avatar" type="file"></p>
                    <p><button class="valider" type="submit" name="valider">Créer compte</button></p>
            </div>
       </form>
</body>
</html>