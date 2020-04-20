<?php
session_start();
$liste=[]; 
$liste=[$_SESSION['prenom'],$_SESSION['nom'],$_SESSION['score']];
$json=file_get_contents('joueur.json');
$json=json_decode($json,true);
$liste=$json;
$json[]=$liste;
$json=json_encode($json);
file_put_contents('joueur.json',$json);
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
                    <div class="profil">
                    <?php
                        echo "<br><br><br><br>".$_SESSION['nom'];echo " ".$_SESSION['prenom']; ?>   
                    </div>
                    <p class="smallheader"><h3> BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ</h3>
                                   <h3> JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE</h3>
                                </p> 
                    <a href="deconnexion.php"><button>Déconnexion   </button></a>                
                </div>
                <div class="p2">
                    <div class="question">

                    </div>
                    <div class="score">

                    </div>
                </div>
            </div>
       </form>
</body>
</html>