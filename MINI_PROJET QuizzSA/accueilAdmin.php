<?php
session_start();
$donnée=[$_SESSION["nom"],$_SESSION['prenom'],$_SESSION["user"],$_SESSION["mdp"],$_SESSION['image']];
/*$json=file_get_contents('question.json');
$json=json_decode($json,true);
$json[]=$question;
$json=json_encode($json);
file_put_contents('question.json',$json);*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Page connexion</title>
    <link rel="stylesheet" href="accueilAdmin.css">
    </header>
</head>
<body>
    <header class="header">
        <img src="Images\logo-QuizzSA.png" alt="logo">
        <h2>Le plaisir de jouer</h2>
    <form action="" method="POST">
            <div class="fieldset">
                <div class="p1">
                    <p class="smallheader">CRÉER ET PARAMÉRTER VOS QUIZZ</p> <a href="deconnexion.php"><button>Déconnexion</button></a>                
                </div>
                <div class="menu">
                    <div class="avatar">
                        <h2>THIAM</h2>
                        <h2>EL HADJI </h2>
                        <div id="wrapper">
                            <img src="Images/Capture1.PNG" alt="" id="output_image">
                        </div>
                    </div>
                        <ul class="listemenu">
                        <li class="list1"><a href="accueilAdmin.php">Liste Questions <img src="Images/Icônes/ic-liste-active.png" alt=""></a></li>
                        <li class="list2"><a href="insAdmin.php">Créer Admin<img src="Images/Icônes/ic-ajout.png" alt=""></a></li>
                        <li class="list3"><a href="listeJoueur.php">Liste joueurs <img src="Images/Icônes/ic-liste.png" alt=""></a></li>
                        <li class="list4"><a href="question.php">Créer Questions <img src="Images/Icônes/ic-ajout.png" alt=""></a></li>
                        </ul>
                </div>
                <div class="fieldset1">
                    <div class="nbrequestion">
                Nbre de question/Jeu <input class="nbre" type="nombre" name="nbre">
                <button type="submit">OK</button>
                    </div>
                    <div class="question">
                   <br> 1. Les langages Web
                   <br> <input type="checkbox" name="" id=""> HTML
                   <br> <input type="checkbox" name="" id="">R
                   <br> <input type="checkbox" name="" id="">JAVA
                   <br>2. D’où vient le Corona?
                   <br><input type="radio" name="" id="">Italie
                   <br><input type="radio" name="" id="">Chhine
                   <br>3. Quel terme définit langage qui s’adapte sur
                   <br> Androïd et sur Ios?
                   <br><input type="text" name="" id="">
                   <br>4. Quelle est la première école de codage gratuite
                   <br> au Sénégal?
                   <br><input type="radio" name="" id="">Simplon
                   <br><input type="radio" name="" id="">Orange Digital Center
                   <br>5. Les précurseurs de la révolution digitale
                   <br><input type="radio" name="" id="">GAFAM
                   <br><input type="radio" name="" id="">CIA-FB
                    </div>
                    <div class="pagination">
                        <button>SUIVANT</button>
                   </div>
                </div>
            </div>
       </form>
</body>
</html>