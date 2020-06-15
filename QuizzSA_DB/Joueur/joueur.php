<?php
session_start();
require_once('../data/db_connect.php');
global $db;

    $limit = 5;

    $tab = $pdo->query("
    SELECT * 
    FROM Joueur
    ORDER BY score DESC
    LIMIT {$limit} 
    ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Page connexion</title>
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="../style/Style.css">
</head>
<body>
    <div class="container">
        <div class="row ">
            <div class="col-sm-1 h-10" >
            <img src="../style/Images/logo-QuizzSA.png" class="img-fluid" alt="Cinque Terre">
            </div>
            <div class="col-sm-11 " style="background-color: rgba(155, 81, 224, 0.9);">
            <h1 class="text-center mt-4 mb-0">LE PLAISIR DE JOUER</h1>
            </div>
        </div>
        <div class="row text-center"style="background-color:#C4C4C4;" >
            <div class="col " >
                <label class="text-center" for="">BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE</label>
            </div>
        </div>
        <div class="row bg-white">
            <div class="col-8" >
                <div class="col">
                    <img src= "<?php echo $_SESSION['avatar'];?>" alt="" id='output_image'>
                </div>
                <div class="col ">
                        <?php echo "<br><h5>".$_SESSION['prenom']."<br>".$_SESSION['nom']."</h5>";?>
                </div> 
            </div>
            <div class="col-4 mt-3 mb-3 float-right ">
                <button class="btn btn-danger "><a href="../deconnection.php"> Déconnexion</a></button>
            </div>
        </div>
        <div class="row bg-white">
            <div class="col bg-white">
                    <label class="text-center mt-3 mb-0" for="">MON MEILLEUR SCORE</label>
                    <?php
                        if ($donnees['login']=$_SESSION['login']) {
                            echo $donnees['score'];
                        }
                    ?>
                </div>
            <div class="cols bg-white">
                <label class="text-center mt-3 mb-0" for="">TOP SCORE</label>
                    <table class="table ">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">PRENOM</th>
                            <th scope="col">NOM</th>
                            <th scope="col">SCORE</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <?php 
                                while ($donnees = $tab->fetch()){
                                echo "<tr>";
                                echo "<td>".$donnees['prenom']."</td>";
                                echo "<td>".$donnees['nom']."</td>" ;
                                echo "<td>".$donnees['score']."</td>" ;
                                echo "</tr>";
                                }
                                ?> 
                        </tbody>
                    </table>
                </div>
        </div>
        <div class="row bg-white">
            <div class="cols bg-white " >
            <label for="">Quelle est la première école de codage gratuiteau Sénégal</label>
            </div>
        </div>
    </div>
</body>
</html>