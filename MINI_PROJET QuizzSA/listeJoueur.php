<?php
session_start();
$liste=[];   
$json=file_get_contents('joueur.json');
$json=json_decode($json,true);
$liste=$json;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Page connexion</title>
    <link rel="stylesheet" href="listejou.css">
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
                        <li class="list3"><a href="listeJoueur.php">Liste joueurs <img src="Images/Icônes/ic-liste-active.png" alt=""></a></li>
                        <li class="list4"><a href="question.php">Créer Questions <img src="Images/Icônes/ic-ajout.png" alt=""></a></li>
                        </ul>
                </div>
                <div class="fieldset1">
                <h3>LISTE DES JOUEURS PAR SCORE</h3>
                <div class="score">
                    <table>
                        <thead>
                            <tr>
                            <td>prenom</td>
                            <td>nom</td>
                            <td>score</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        for ($i=0; $i < count($liste); $i++) { 
                            echo ' <tr>';
                            echo "<td>".$liste[$i]['prenom']."</td>";
                            echo "<td>".$liste[$i]['nom']."</td>";
                            echo "<td>".$liste[$i]['score']." pts </td>";
                           
                            echo ' </tr>';
                         }
                            
                        ?>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
       </form>
</body>
</html>