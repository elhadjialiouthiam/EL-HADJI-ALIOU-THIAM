<?php
session_start();
$joueur=[]; 
$_SESSION['score']='';
$joueur=["prenom"=> $_SESSION['prenom'],"nom"=>$_SESSION['nom'],"score"=>$_SESSION['score']];
$json=file_get_contents('joueur.json');
$json=json_decode($json,true);
$liste=$json;
$json[]=$joueur;
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
                                <button class="deconnexion"> <a href="deconnexion.php"> Déconnexion</a></button>                
                </div>
                <div class="p2">
                    <div class="question">
                    <?php
                         $totalValeur=5;
                        $nombreparpage=1;
                        $nombredepage=ceil($totalValeur/$nombreparpage);
                        for ($i=1; $i <5 ; $i++) { 
                            echo '<a href="interfacejoueur.php?page='.$i.'"></a>';
                        }
                        ?>
                        <p><h1 style="text-align: center">Question<?=$i/$totalValeur?></h1></p>
                        <p><h2 style="text-align: center">Les langages web</h2></p>
                        <p><button style="float: right" disabled="disabled">100pts</button></p>
                        <p>
                        <input type="checkbox" name="" id=""><h2> HTML</h2>
                        <input type="checkbox" name="" id=""><h2>R</h2>
                        <input type="checkbox" name="" id=""><h2>JAVA</h2>
                        </p>
                        <button class="pre" value=<?=$i-1?>>PRECEDENT</button>
                        <button class="sui" value=<?=$i?>>SUIVANT</button>
                    </div>
                    <div class="score">
                        <div class="topscore">
                        Top scores 
                        <div class="myscore">
                        Mon meilleur score
                        <?php
                        //echo "Votre meilleur score est".$_SESSION['score'];                           
                        ?> 
                        </div>
                        <?php
                        $liste=[];   
                        $json=file_get_contents('joueur.json');
                        $json=json_decode($json,true);
                        $liste=$json;
                        for ($i=0; $i < 5; $i++) { 
                            echo ' <tr>';
                            echo "<td>".$liste[$i]['prenom']."</td>";
                            echo "<td>".$liste[$i]['nom']."</td>";
                            echo "<td>".$liste[$i]['score']." pts </td>";
                            echo ' </tr>';
                         }
                        ?> 
                        </div>  
                    </div>
                </div>
            </div>
       </form>
</body>
</html>