<?php
session_start();
require_once('../data/db_connect.php');

    global $db;

    $limit = 5;

    $tab = $pdo->query("
    SELECT * 
    FROM Question
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
        <div class="row plaisir">
            <div class="col-sm-1 " >
            <img src="../style/Images/logo-QuizzSA.png" class="img-fluid" alt="Cinque Terre">
            </div>
            <div class="col-sm-11 " style="background-color: rgba(155, 81, 224, 0.9);">
            <h1 class="text-center mt-4 mb-0">LE PLAISIR DE JOUER</h1>
            </div>
        </div>
        <div class="row ">
            <div class="col-sm-12 " style="background-color:#C4C4C4;">
            <h1 class="text-center">CRÉER ET PARAMÉRTER VOS QUIZZ</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3" >
                <div class="row bg-white">
                    <div class="col-6">
                        <img src= "Images/<?php echo $_SESSION['avatar'];?>" alt="" id='output_image'>
                    </div>
                    <div class="col-6">
                        <?php echo "<br>".$_SESSION['prenom'];
                        echo "<br><br>".$_SESSION['nom']; ?>
                    </div>
                </div>
                <div class="row bg-white">
                    <div class="col-12 mt-3" > 
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link " style="background-color:#C4C4C4;" id="v-pills-home-tab" data-toggle="pill" href="admin.php" role="tab"  aria-selected="true">Liste Questions<img class="float-right" src="../style/Images/Icônes/ic-liste-active.png" alt=""></a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="insAdmin.php" role="tab"  aria-selected="false">Créer Admin<img class="float-right" src="../style/Images/Icônes/ic-ajout.png" alt=""></a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="listeJoueur.php" role="tab" aria-selected="false">Liste joueurs<img class="float-right" src="../style/Images/Icônes/ic-liste.png" alt=""></a>
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="creerquestion.php" role="tab"  aria-selected="false">Créer Questions<img class="float-right" src="../style/Images/Icônes/ic-ajout.png" alt=""></a>
                    </div>
                    </div>
        
                </div>
                <div class="row bg-white">
                    <div class="col-6 mb-3">
                        <button class="btn btn-danger"><a href="../deconnection.php"> Déconnexion</a></button>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 bg-white" >
                <?php 
                    
                ?>
            </div>
        </div>
    </div>
</body>
</html>