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
        <div class="row ">
            <div class="col-sm-12 " style="background-color:#C4C4C4;">
            <h2 class="text-center">CRÉER ET PARAMÉRTER VOS QUIZZ</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 bg-white">
                <div class="row ">
                    <div class="col-6">avatar</div>
                    <div class="col-6">name</div>
                </div>
                <div class="row bg-white">
                    <div class="col-12 mt-3" > 
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link " id="v-pills-home-tab" data-toggle="pill" href="admin.php" role="tab"  aria-selected="false">Liste Questions<img class="float-right" src="../style/Images/Icônes/ic-liste.png" alt=""></a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="insAdmin.php" role="tab"  aria-selected="false">Créer Admin<img class="float-right" src="../style/Images/Icônes/ic-ajout.png" alt=""></a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="listeJoueur.php" role="tab"  aria-selected="false">Liste joueurs<img class="float-right" src="../style/Images/Icônes/ic-liste.png" alt=""></a>
                        <a class="nav-link " style="background-color:#C4C4C4;" id="v-pills-settings-tab" data-toggle="pill" href="creerquestion.php" role="tab" aria-selected="true">Créer Questions<img class="float-right" src="../style/Images/Icônes/ic-ajout-active.png" alt=""></a>
                    </div>
                    </div>
                </div>
                <div class="row bg-white mt-3">
                    <div class="col-6 mb-3">
                        <button class="btn btn-danger"><a href="../deconnection.php"> Déconnexion</a></button>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 bg-white">
                <div class="container">
                    <form action="" method="POST" class="form-group mt-3">
                        Questions
                        <input class="" id="validationServer" onkeyup="validQuestion()" name="question"  type="text">
                        <span id="validationServerinf"></span>
                        <br><br><br>
                        Nbre de Points 
                        <input class=" "  name="score" id="score" type="number"  >
                        <br><br><br>
                        Type de réponse
                        <select name="choix" id="typereponse">
                            <option >Donnez le type de réponse</option>
                            <option name="radio" value="simple">Réponse à choix multiples (avec une seule réponse possible)</option>
                            <option name="chexbox" value="multiple">Réponse à choix multiples (avec plusieurs réponse possibles)</option>
                            <option name="text" value="text" >Réponse  texte à saisir</option>
                        </select> <img src="../style/Images/Icônes/ic-ajout-réponse.png" alt="" >
                        <br><br><br>
                        <button class="btn btn-success mb-3" name="Enregistrer" type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
</html>