<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Page connexion</title>
    <link rel="stylesheet" href="creer.css">
</head>
<body>
    <header class="header">
        <img src="Images\logo-QuizzSA.png" alt="logo">
        <h2>Le plaisir de jouer</h2>
    </header>
    <form action="" method="POST">
            <div class="fieldset">
                <div class="p1">
                    <p class="smallheader">CRÉER ET PARAMÉRTER VOS QUIZZ</p> <a href="deconnexion.php"><button>Déconnexion</button></a>                
                </div>
                <div class="menu">
                    <div class="avatar">
                        <div class="donnée">
                    <?php echo "<br>".$_SESSION['prenom'];
                        echo "<br><br>".$_SESSION['nom']; ?>
                        </div>
                        <div id="wrapper">
                            <img src="<?="./".$_SESSION['image']; ?>" alt="" id="output_image">
                        </div>
                    </div>
                        <ul class="listemenu">
                        <li class="list1"><a href="accueilAdmin.php">Liste Questions <img src="Images/Icônes/ic-liste.png" alt=""></a></li>
                        <li class="list2"><a href="insAdmin.php">Créer Admin<img src="Images/Icônes/ic-ajout.png" alt=""></a></li>
                        <li class="list3"><a href="listeJoueur.php">Liste joueurs <img src="Images/Icônes/ic-liste.png" alt=""></a></li>
                        <li class="list4"><a href="question.php">Créer Questions <img src="Images/Icônes/ic-ajout-active.png" alt=""></a></li>
                        </ul>
                </div>
                <div class="fieldset1">
                    <DIV class="smallheader">
                        <h2>PARAMETRER VOTRE QUESTION</h2>
                    </DIV>
                    <div class="parametre">
                    Questions <input style="width: 400px; height: 70px;" type="text" name="" id="">
                    <br><br><br>Nbre de Points <input style="width: 30px;" type="number" name="" id="">
                    <br><br><br>Type de réponse <select style="width: 300px;height:40px" name="" id="">
                    <option value="">Donnez le type de réponse</option></select> <img src="Images/Icônes/ic-ajout-réponse.png" alt="">
                    <br><br><br>Réponse1 <input style="width: 300px;height:30px" type="text" name="" id="">  <input type="radio" name="" id="">  <input type="checkbox" name="" id="">  <img src="Images/Icônes/ic-supprimer.png" alt="">
                    </div>
                    </div>
            </div>
       </form>
</body>
</html>