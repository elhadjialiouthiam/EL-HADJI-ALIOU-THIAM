<?php
session_start();

if(isset($_POST['Enregistrer'])){
    $Erreur=array();
    if (!empty($_POST['questions']) && !empty($_POST['howmuch'])&& !empty($_POST['rep'])) {
        if ($_POST['howmuch']>1) {
            $questions=$_POST['questions'];
            $howmuch=$_POST['howmuch'];
            $type=$_POST['type'];
            $rep=$_POST['rep'];
            $vrai=$_POST['vrai'];
            require_once('../data/db_connect.php');
             //On insère les données reçues
             $sth = $pdo->prepare("
             INSERT INTO Question(question, score, type, reponse,vrai)
             VALUES(:question, :score, :type, :reponse,:vrai)");
            $sth->bindParam(':question',$questions);
            $sth->bindParam(':score',$howmuch);
            $sth->bindParam(':type',$type);
            $sth->bindParam(':reponse',$rep);
            $sth->bindParam(':vrai',$vrai);
            $sth->execute();
        }

    }else {
        $Erreur[]="Ce champ est obligatoire";  
    }

    foreach($Erreur as $Error){

        echo "<h4>".$Error."</h4>";

    }   
}
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
        <div class="row ">
            <div class="col-sm-12 " style="background-color:#C4C4C4;">
            <h2 class="text-center">CRÉER ET PARAMÉRTER VOS QUIZZ</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 bg-white">
                <div class="row ">
                    <div class="col-6">
                        <img src= "Images/<?php echo $_SESSION['avatar'];?>" alt="" id='output_image'>
                    </div>
                    <div class="col-6">
                        <?php echo "<br><h4>".$_SESSION['prenom']."</h4>";
                        echo "<h4>".$_SESSION['nom']."</h4>"; ?>
                    </div>
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
                    <form enctype="multipart/form-data" action="" method="post" id="creer_question" class="form form-group mt-3 ml-1">
                            <div id="row_0">
                                <label for="answer" id="question">Question</label>
                                <input id="answer"  name="questions" onkeyup="validQuestion()" style="width: 300px; height: 70px;" type="text"><br/><span id="questioninf" style="color: red"></span>
                                <br><label> Nbre de Points</label>
                                <input name="howmuch" id="howmuch" onkeyup="validScore()" style="width: 40px;" type="number"  >
                                <span id="scoreinf" style="color: red"></span>
                                <br><br><label>Type de réponse</label>
                                <select name="type" id="liste_reponse" style="height:36px" onkeyup="validTypereponse()"><span id="typereponseinf" style="color: red"></span>
                                    <option value="null">Donnez le type de réponse </option>
                                    <option value="Texte">Reponse text</option>
                                    <option value="Une_reponse">Reponse simple</option>
                                    <option value="Multiple">Reponse multiples</option>
                                </select><img src="../style/Images/Icônes/ic-ajout-réponse.png" id="AddInput" onclick='onAddInput()'  alt="" >
                            </div>   
                                   <br> <div id="form">

                                    </div>
                        <button class="btn btn-success mb-3" name="Enregistrer" id="enregistrer" type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    var cpt=0;
    var i=1;
    var j=1;
    function onAddInputTexte(){ 
        
        cpt++;
        var divInputs=document.getElementById('form');
        var newInput=document.createElement('div');
        newInput.setAttribute('class','row');
        newInput.setAttribute('id','row_'+cpt);
        newInput.innerHTML=`<br><br><input style="height:36px ; margin-left: 20px;" class="input-reponse" type="texte" name="rep" id="texte">
                                <img src="../style/Images/Icônes/ic-supprimer.png" style="height:36px ;" onclick='onRemoveInput(${cpt})' id="RemoveInput" alt="">
        `;
        divInputs.appendChild(newInput);
    }
        function onAddInputSimple(){
             
        cpt++;
        var divInputs=document.getElementById('form');
        var newInput=document.createElement('div');
        newInput.setAttribute('class','row');
        newInput.setAttribute('id','row_'+cpt);
        newInput.innerHTML=`
                        <br><br><input style="height:36px ; margin-left: 20px;" class="input-reponse" type="texte" name="rep[${i}]" id="texte">
                        <input type='radio'  id="radio" style="height:36px; whidth:36px;"  name="vrai[${i}]"/>
                        <img src="../style/Images/Icônes/ic-supprimer.png" style="height:36px ;" onclick='onRemoveInput(${cpt})' id="RemoveInput" alt="">
        `;
        divInputs.appendChild(newInput);
        i++;
        }
        function onAddInputMultiple(){
                 
        cpt++;
        var divInputs=document.getElementById('form');
        var newInput=document.createElement('div');
        newInput.setAttribute('class','row');
        newInput.setAttribute('id','row_'+cpt);
        newInput.innerHTML=`
                        <br><br><input style="height:36px ; margin-left: 20px;" class="input-reponse" type="texte" name="rep[${j}]" id="texte">
                        <input type='checkbox' id="checkbox" style="height:36px; whidth:36px;" name="vrai[${j}]"/>
                        <img src="../style/Images/Icônes/ic-supprimer.png" style="height:36px ;" onclick='onRemoveInput(${cpt})' id="RemoveInput" alt="">
        `;
        divInputs.appendChild(newInput);
        j++;
        }
        function onAddInput(){
            var type=document.getElementById("liste_reponse");
            if (type.value == 'Texte') {
            return onAddInputTexte();
        } else if (type.value == 'Une_reponse') {
            return onAddInputSimple();
        } else if(type.value== 'Multiple') {
            return onAddInputMultiple();
        }  
        }
    function onRemoveInput(nbr){
        var target=document.getElementById('row_'+nbr);
        target.remove();
    }
    

    
</script>

<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
</html>