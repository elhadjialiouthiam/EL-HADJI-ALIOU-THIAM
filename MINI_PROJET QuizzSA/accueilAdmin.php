<?php
session_start();
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
                    <p class="smallheader">CRÉER ET PARAMÉRTER VOS QUIZZ</p><button class="deconnexion"> <a href="deconnexion.php"> Déconnexion</a></button>              
                </div>
                <div class="menu">
                    <div class="avatar">
                        <div class="donnée">
                        <?php echo "<br>".$_SESSION['prenom'];
                        echo "<br><br>".$_SESSION['nom']; 
                        $image=$_SESSION['image'];?>
                        </div>
                        <div id="wrapper">
                            <img src= "images/<?=$image;?>" alt="" id='output_image'>
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
                Nbre de question/Jeu <input class="nbre" value="5" type="nombre" name="nbre">
                <button type="submit">OK</button>
                    </div>
                    <div class="question">
                   <br> 1. Les langages Web
                   <br> <input type="checkbox" name="" id=""> HTML
                   <br> <input type="checkbox" name="" id="">R
                   <br> <input type="checkbox" name="" id="">JAVA
                   <br>2. D’où vient le Corona?
                   <br><input type="radio" name="" id="">Italie
                   <br><input type="radio" name="" id="">Chine
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
                        <?php
                        $question=[];
                         $totalValeur=count($question);
                        $nombreparpage=5;
                        $nombredepage=ceil($totalValeur/$nombreparpage);
                        for ($i=1; $i <$nombredepage ; $i++) { 
                            echo '<a href="accueilAdmin.php?page='.$i.'">'.$i.'</a>';
                        }
                        ?>
                        <button value=<?=$i?>>SUIVANT</button>
                   </div>
                </div>
            </div>
       </form>
</body>
</html>