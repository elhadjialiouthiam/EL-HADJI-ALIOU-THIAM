<?php
session_start();
       $connexion=[]; 
        $json=file_get_contents('connexion.json');
        $json=json_decode($json,true);
        $connexion=$json;
if (isset($_POST['valider'])&& isset($_POST['prenom']) &&isset($_POST['nom'])&&isset($_POST['user'])&&isset($_POST['mdp'])&&isset($_POST['cmdp'])) {
    for ($i=0; $i < Count($connexion); $i++){
    if ($connexion[$i]['user']==$_POST['user']  ) {
        echo "login ou mot de passe existe deja dans la base";
    }else {
            $inscription=[];
            $inscription['nom']=$_POST['nom'];
            $inscription['prenom']=$_POST['prenom'];
            $inscription['user']=$_POST['user'];
            $inscription['mdp']=$_POST['mdp'];
            $inscription['image']=$_POST['image'];
            $inscription['role']=$_POST['role'];
            $connexion=[]; 
            $json=file_get_contents('connexion.json');
            $json=json_decode($json,true);
            $connexion=$json;
            $json[]=$inscription;
            $json=json_encode($json);
            file_put_contents('connexion.json',$json);
            header('Location: connexion.php');
        }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Page connexion</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header class="header">
        <img src="Images\logo-QuizzSA.png" alt="logo">
        <h2>Le plaisir de jouer</h2>
    </header>
    <form action="" method="POST">
            <div class="fieldset">
                <div class="p1">
                    <p class="smallheader">CRÉER ET PARAMÉRTER VOS QUIZZ</p><button class="deconnexion"> <a href="deconnexion.php"> Déconnexion</a></button>                 
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
                        <li class="list2"><a href="insAdmin.php">Créer Admin<img src="Images/Icônes/ic-ajout-active.png" alt=""></a></li>
                        <li class="list3"><a href="listeJoueur.php">Liste joueurs <img src="Images/Icônes/ic-liste.png" alt=""></a></li>
                        <li class="list4"><a href="question.php">Créer Questions <img src="Images/Icônes/ic-ajout.png" alt=""></a></li>
                        </ul>
                </div>
            </div>
            <div class="fieldset1">
            <div class="p2">
                <h2>S'INSCRIRE</h2>
                <h4>Pour proposer de Quizz </h4>
            </div>
                <div class="p3">
                        <h4>Prenom<span style="color: red">*</span> </h4>
                    <input type="text" name='prenom' id="prenom" onkeyup="validPrenom()"><br/>
                    <span id="prenominf" style="color: red"></span>
                        <h4>Nom <span style="color: red">*</span></h4>
                        <input type="text" name='nom' id ="nom" onkeyup="validNom()"><br/>
                        <span id="nominf" style="color: red"></span>
                        <h4>Login <span style="color: red">*</span></h4>
                        <input type="text" name='user' required="requered" id="login" onkeyup="validLogin()"><br/>
                        <span id="logininf" style="color: red"></span>
                        <h4>Password <span style="color: red">*</span></h4>
                        <input type="text" name="mdp" required="requered" id="mdp" onkeyup="validMdp()"><br/>
                        <span id="mdpinf" style="color: red"></span>
                        <h4>Comfirmer Password <span style="color: red">*</span></h4>
                        <input type="text" name="cmdp" required="requered" id="cmdp" onkeyup="validCmdp()"><br/>
                        <span id="cmdpinf" style="color: red"></span>
                    <input type="hidden" name="role" value="admin">
                </div>
                    <p class="ava"> Avatar <input accept="image/*" name="image" class="avatar" type="file"></p>
                    <p><button class="valider" type="submit" name="valider">Créer compte</button></p>
            </div>
       </form>
</body>
<script type="text/javascript" src="insjour.js"></script>
</html>