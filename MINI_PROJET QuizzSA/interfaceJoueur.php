<?php
session_start();
$donnée=[$_SESSION["nom"],$_SESSION['prenom'],$_SESSION["user"],$_SESSION["mdp"],$_SESSION['image']];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Page connexion</title>
    <link rel="stylesheet" href="interfaceJoueur.css">
</head>
<body>
    <header class="header">
        <img src="Images\logo-QuizzSA.png" alt="logo">
        <h2>Le plaisir de jouer</h2>
    </header>
    <form action="" method="POST">
            <div class="fieldset">
                <div class="p1">
                    <div class="profil"></div>
                    <p class="smallheader"><h3> BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ</h3>
                                   <h3> JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE</h3></p> 
                    <a href="deconnexion.php"><button>Déconnexion   </button></a>                
                </div>
            </div>
       </form>
</body>
</html>